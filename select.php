<?php

require __DIR__ . '/vendor/autoload.php';

use Google\Cloud\Spanner\SpannerClient;
use Google\Cloud\Spanner\Session\CacheSessionPool;
use Google\Auth\Cache\SysVCacheItemPool;
use Google\Cloud\Spanner\Timestamp;
use Google\Cloud\Spanner\V1\ExecuteSqlRequest;
use Google\Cloud\Spanner\ValueInterface;
use Google\Protobuf\Internal\Message;
use Grpc\BaseStub;
use OpenCensus\Trace\Exporter\StackdriverExporter;
use OpenCensus\Trace\Tracer;
use OpenCensus\Trace\Integrations\Grpc;

$clearSession = false;
$explicitWarmup = true;
$metadataQuery = false;
$displayResult = false;
$displayStats = false;  // Only setting this true doesn't display stats, $displayResult needs to be true as well
$gfeLatency = false;
$rowsLimit = 100;

// $projectId = 'saransh-devrel-external';
// $instanceId = 'ee-singapore';
// $databaseId = 'ee-singapore';

$projectId = 'span-cloud-latency-testing';
$instanceId = 'testinstance';
$databaseId = 'testdb';

$authCache = new SysVCacheItemPool();
$sessionCache = new SysVCacheItemPool([
    // Use a different project identifier for ftok than the default
    'proj' => 'B',
    // We highly recommend using 250kb as it should safely contain the default
    // 500 maximum sessions the pool can handle. Please modify this value
    // accordingly depending on the number of maximum sessions you would like
    // for the pool to handle.
    'memsize' => 2500000
]);

$pid = getmypid();

echo "PID: " . $pid . PHP_EOL;

$spanner = new SpannerClient([
    'projectId' => $projectId,
    'authCache' => $authCache
]);

$sessionPool = new CacheSessionPool(
  $sessionCache,
  [
      'minSessions' => 5,
      'maxSessions' => 5  // Here it will create 10 sessions under the cover.
  ]
);

$database = $spanner->connect(
  $instanceId,
  $databaseId,
  [
      'sessionPool' => $sessionPool
  ]
);

if ($clearSession) {
    echo "clearing session\n";
    $sessionPool->clear();
    echo "session cleared\n";
} else {
    echo "Not clearing session!\n";
}

$start = hrtime(true);
if ($explicitWarmup) {
    $time = hrtime(true);
    $sessionPool->warmup();
    echo "time taken to warmup " . showTime($time)."\n";
} else {
    echo "No explicit warmup\n";
}
BaseStub::$logs[] = ['warmup_time', '', hrtime(true) - $start];
BaseStub::$logs[] = ['query_end'];

$start = hrtime(true);
if($metadataQuery) {
    echo "executing metadata query\n";
    $time = hrtime(true);
    $database->execute("select 1");
    echo "done " . showTime($time)."\n";
} else {
    echo "Not executing metadata query\n";
}
BaseStub::$logs[] = ['metadata_query', '', hrtime(true) - $start];
BaseStub::$logs[] = ['query_end'];


$exporter = new StackdriverExporter([
    'clientConfig' => [
        'projectId' => $projectId
    ]
]);
Grpc::load();
$queriesStart = hrtime(true);
$i = 0;
while($i<2) {
    // Tracer::start($exporter, [
    //     // 'propagator' => new GrpcMetadataPropagator(),
    //     'name' => 'sar-test',
    //     'startTime' => microtime(true),
    //     'attributes' => [
    //         'query' => $i,
    //         'pid' => $pid
    //     ]
    // ]);

    $bt = hrtime(true);
    // The query plan for this query will never be present,
    // so all these should be slow
    $id = $i + 2;
    // $query = "select *," .time() . " AS t from Accounts WHERE accountId = $id LIMIT $rowsLimit";
    // $query = "select *," .time() . " AS t from Accounts LIMIT $rowsLimit";
    $query = "select * from Accounts LIMIT $rowsLimit";

    # A simpler variant
    // $query = "select 1 as a," .time() . " AS t";

    // The query plan for the following will be generated after the first query
    // If all the queries are submitted to the same SpanFE, then the subsequent queries
    // will be faster. The difference should be ~7ms, but can be more for complex queries.
    // $query = "select * from Accounts LIMIT $rowsLimit";

    // echo "Running query $query\n";
    $options = [];
    if ($displayStats) {
        $options['queryMode'] = 2;
        $options[] = true;
    }

    Tracer::start($exporter, [
        // 'propagator' => new GrpcMetadataPropagator(),
        'name' => 'sg-w-opcache',
        'startTime' => microtime(true),
        'attributes' => [
            'query' => $i,
            'pid' => $pid,
            'start' => microtime(true),
            'startReadable' => (new DateTime())->format('H:i:s u')
        ]
    ]);
    $start = hrtime(true);
    $accounts = Tracer::inSpan([
        'name' => 'db_execute',
        'startTime' => microtime(true)
    ], [$database, 'execute'], [$query, $options]);
    BaseStub::$logs[] = ['query_time', '', hrtime(true) - $start];

    // print "Select done in ". showTime($bt) ."\n";
    $queryTime = showTime($bt);
    // sleep(1);

    // if($displayResult) {
    //     displayResult($accounts);
    //     if($accounts->stats() && $displayStats) {
    //         displayStats($accounts);
    //     }
    // }

    BaseStub::$logs[] = ['query_end'];
    Tracer::$instance->onExit();

    // print "Select(including output) done in ". showTime($bt) ." Query Return time: $queryTime\n\n";
    // print " Query Return time: $queryTime\n\n";

  $i += 1;
}

displayLogs();


print "Completed in ". showTime($queriesStart) ."\n";

function showTime($oldTime) {
    $t = hrtime(true) - $oldTime;

    $ms = $t / pow(10,6);

    if ($ms < 1000) {
        return $ms . ' ms';
    }

    $s = round($ms/1000, 2);

    return $s . ' s';
}

function displayResult($records) {
    global $gfeLatency;

    $fetchedGfeLatency = false;

    foreach($records as $row) {
        if($gfeLatency && isset($records->metadata()['server-timing'])) {
            $fetchedGfeLatency = "GFE: " . $records->metadata()['server-timing'];
        }
        foreach($row as $key => $val) {
            $str = $val;

            if(is_array($val)) {
                $str = "(array) : " . json_encode($val);
            }
            else if($val instanceof ValueInterface) {
                $str = get_class($val) . " : " . $val->formatAsString();
            }

        //   echo "$key: $str \n";
        }
    }

    if($fetchedGfeLatency) {
        echo $fetchedGfeLatency . "\n";
    }
}

function displayStats($result) {
    $queryPlan = $result->stats()['queryPlan'];
    $queryStats = $result->stats()['queryStats'];
    echo "Stats: " . json_encode($queryStats, JSON_PRETTY_PRINT) . "\n";
}

function displayLogs() {
    foreach(BaseStub::$logs as $row) {
        if($row[0] === 'query_end') {
            echo PHP_EOL . PHP_EOL;
            continue;
        }
        echo $row[0] . " : " . round($row[2]/1e6,2) . PHP_EOL;
    }
}

?>
