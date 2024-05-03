<?php
require __DIR__ . '/vendor/autoload.php';

use Google\Cloud\Spanner\SpannerClient;
use Google\Cloud\Spanner\Session\CacheSessionPool;
use Google\Auth\Cache\SysVCacheItemPool;

$projectId = 'span-cloud-latency-testing';
$instanceId = 'testinstance';
$databaseId = 'testdb';

$pid = getmypid();
echo "My PID: " . getmypid() . "\n";

$authCache = new SysVCacheItemPool();
$sessionCache = new SysVCacheItemPool([
    // Use a different project identifier for ftok than the default
    'proj' => 'B',
    'variableKey' => $pid,
    // We highly recommend using 250kb as it should safely contain the default
    // 500 maximum sessions the pool can handle. Please modify this value
    // accordingly depending on the number of maximum sessions you would like
    // for the pool to handle.
    'memsize' => 25000000
]);

$spanner = new SpannerClient([
    'projectId' => $projectId,
    'authCache' => $authCache,
]);

$sessionPool = new CacheSessionPool(
  $sessionCache,
  [
      'minSessions' => 1,
      'maxSessions' => 1  // Here it will create 10 sessions under the cover.
  ]
);
// $sessionPool->clear();
// die();
$database = $spanner->connect(
  $instanceId,
  $databaseId,
  [
      'sessionPool' => $sessionPool
  ]
);

$sessionPool->clear();
$sessionPool->warmup();
echo "warm up done\n";

$database->execute("select 1");
echo "select 1 done\n";
?>
