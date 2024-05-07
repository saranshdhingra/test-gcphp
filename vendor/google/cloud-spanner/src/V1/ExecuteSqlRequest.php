<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/spanner/v1/spanner.proto

namespace Google\Cloud\Spanner\V1;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;
use OpenCensus\Trace\Tracer;

echo "hey\n";

/**
 * The request for [ExecuteSql][google.spanner.v1.Spanner.ExecuteSql] and
 * [ExecuteStreamingSql][google.spanner.v1.Spanner.ExecuteStreamingSql].
 *
 * Generated from protobuf message <code>google.spanner.v1.ExecuteSqlRequest</code>
 */
class ExecuteSqlRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. The session in which the SQL query should be performed.
     *
     * Generated from protobuf field <code>string session = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    private $session = '';
    /**
     * The transaction to use.
     * For queries, if none is provided, the default is a temporary read-only
     * transaction with strong concurrency.
     * Standard DML statements require a read-write transaction. To protect
     * against replays, single-use transactions are not supported.  The caller
     * must either supply an existing transaction ID or begin a new transaction.
     * Partitioned DML requires an existing Partitioned DML transaction ID.
     *
     * Generated from protobuf field <code>.google.spanner.v1.TransactionSelector transaction = 2;</code>
     */
    private $transaction = null;
    /**
     * Required. The SQL string.
     *
     * Generated from protobuf field <code>string sql = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $sql = '';
    /**
     * Parameter names and values that bind to placeholders in the SQL string.
     * A parameter placeholder consists of the `&#64;` character followed by the
     * parameter name (for example, `&#64;firstName`). Parameter names must conform
     * to the naming requirements of identifiers as specified at
     * https://cloud.google.com/spanner/docs/lexical#identifiers.
     * Parameters can appear anywhere that a literal value is expected.  The same
     * parameter name can be used more than once, for example:
     * `"WHERE id > &#64;msg_id AND id < &#64;msg_id + 100"`
     * It is an error to execute a SQL statement with unbound parameters.
     *
     * Generated from protobuf field <code>.google.protobuf.Struct params = 4;</code>
     */
    private $params = null;
    /**
     * It is not always possible for Cloud Spanner to infer the right SQL type
     * from a JSON value.  For example, values of type `BYTES` and values
     * of type `STRING` both appear in
     * [params][google.spanner.v1.ExecuteSqlRequest.params] as JSON strings.
     * In these cases, `param_types` can be used to specify the exact
     * SQL type for some or all of the SQL statement parameters. See the
     * definition of [Type][google.spanner.v1.Type] for more information
     * about SQL types.
     *
     * Generated from protobuf field <code>map<string, .google.spanner.v1.Type> param_types = 5;</code>
     */
    private $param_types;
    /**
     * If this request is resuming a previously interrupted SQL statement
     * execution, `resume_token` should be copied from the last
     * [PartialResultSet][google.spanner.v1.PartialResultSet] yielded before the
     * interruption. Doing this enables the new SQL statement execution to resume
     * where the last one left off. The rest of the request parameters must
     * exactly match the request that yielded this token.
     *
     * Generated from protobuf field <code>bytes resume_token = 6;</code>
     */
    private $resume_token = '';
    /**
     * Used to control the amount of debugging information returned in
     * [ResultSetStats][google.spanner.v1.ResultSetStats]. If
     * [partition_token][google.spanner.v1.ExecuteSqlRequest.partition_token] is
     * set, [query_mode][google.spanner.v1.ExecuteSqlRequest.query_mode] can only
     * be set to
     * [QueryMode.NORMAL][google.spanner.v1.ExecuteSqlRequest.QueryMode.NORMAL].
     *
     * Generated from protobuf field <code>.google.spanner.v1.ExecuteSqlRequest.QueryMode query_mode = 7;</code>
     */
    private $query_mode = 0;
    /**
     * If present, results will be restricted to the specified partition
     * previously created using PartitionQuery().  There must be an exact
     * match for the values of fields common to this message and the
     * PartitionQueryRequest message used to create this partition_token.
     *
     * Generated from protobuf field <code>bytes partition_token = 8;</code>
     */
    private $partition_token = '';
    /**
     * A per-transaction sequence number used to identify this request. This field
     * makes each request idempotent such that if the request is received multiple
     * times, at most one will succeed.
     * The sequence number must be monotonically increasing within the
     * transaction. If a request arrives for the first time with an out-of-order
     * sequence number, the transaction may be aborted. Replays of previously
     * handled requests will yield the same response as the first execution.
     * Required for DML statements. Ignored for queries.
     *
     * Generated from protobuf field <code>int64 seqno = 9;</code>
     */
    private $seqno = 0;
    /**
     * Query optimizer configuration to use for the given query.
     *
     * Generated from protobuf field <code>.google.spanner.v1.ExecuteSqlRequest.QueryOptions query_options = 10;</code>
     */
    private $query_options = null;
    /**
     * Common options for this request.
     *
     * Generated from protobuf field <code>.google.spanner.v1.RequestOptions request_options = 11;</code>
     */
    private $request_options = null;
    /**
     * Directed read options for this request.
     *
     * Generated from protobuf field <code>.google.spanner.v1.DirectedReadOptions directed_read_options = 15;</code>
     */
    private $directed_read_options = null;
    /**
     * If this is for a partitioned query and this field is set to `true`, the
     * request is executed with Spanner Data Boost independent compute resources.
     * If the field is set to `true` but the request does not set
     * `partition_token`, the API returns an `INVALID_ARGUMENT` error.
     *
     * Generated from protobuf field <code>bool data_boost_enabled = 16;</code>
     */
    private $data_boost_enabled = false;

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $session
     *           Required. The session in which the SQL query should be performed.
     *     @type \Google\Cloud\Spanner\V1\TransactionSelector $transaction
     *           The transaction to use.
     *           For queries, if none is provided, the default is a temporary read-only
     *           transaction with strong concurrency.
     *           Standard DML statements require a read-write transaction. To protect
     *           against replays, single-use transactions are not supported.  The caller
     *           must either supply an existing transaction ID or begin a new transaction.
     *           Partitioned DML requires an existing Partitioned DML transaction ID.
     *     @type string $sql
     *           Required. The SQL string.
     *     @type \Google\Protobuf\Struct $params
     *           Parameter names and values that bind to placeholders in the SQL string.
     *           A parameter placeholder consists of the `&#64;` character followed by the
     *           parameter name (for example, `&#64;firstName`). Parameter names must conform
     *           to the naming requirements of identifiers as specified at
     *           https://cloud.google.com/spanner/docs/lexical#identifiers.
     *           Parameters can appear anywhere that a literal value is expected.  The same
     *           parameter name can be used more than once, for example:
     *           `"WHERE id > &#64;msg_id AND id < &#64;msg_id + 100"`
     *           It is an error to execute a SQL statement with unbound parameters.
     *     @type array|\Google\Protobuf\Internal\MapField $param_types
     *           It is not always possible for Cloud Spanner to infer the right SQL type
     *           from a JSON value.  For example, values of type `BYTES` and values
     *           of type `STRING` both appear in
     *           [params][google.spanner.v1.ExecuteSqlRequest.params] as JSON strings.
     *           In these cases, `param_types` can be used to specify the exact
     *           SQL type for some or all of the SQL statement parameters. See the
     *           definition of [Type][google.spanner.v1.Type] for more information
     *           about SQL types.
     *     @type string $resume_token
     *           If this request is resuming a previously interrupted SQL statement
     *           execution, `resume_token` should be copied from the last
     *           [PartialResultSet][google.spanner.v1.PartialResultSet] yielded before the
     *           interruption. Doing this enables the new SQL statement execution to resume
     *           where the last one left off. The rest of the request parameters must
     *           exactly match the request that yielded this token.
     *     @type int $query_mode
     *           Used to control the amount of debugging information returned in
     *           [ResultSetStats][google.spanner.v1.ResultSetStats]. If
     *           [partition_token][google.spanner.v1.ExecuteSqlRequest.partition_token] is
     *           set, [query_mode][google.spanner.v1.ExecuteSqlRequest.query_mode] can only
     *           be set to
     *           [QueryMode.NORMAL][google.spanner.v1.ExecuteSqlRequest.QueryMode.NORMAL].
     *     @type string $partition_token
     *           If present, results will be restricted to the specified partition
     *           previously created using PartitionQuery().  There must be an exact
     *           match for the values of fields common to this message and the
     *           PartitionQueryRequest message used to create this partition_token.
     *     @type int|string $seqno
     *           A per-transaction sequence number used to identify this request. This field
     *           makes each request idempotent such that if the request is received multiple
     *           times, at most one will succeed.
     *           The sequence number must be monotonically increasing within the
     *           transaction. If a request arrives for the first time with an out-of-order
     *           sequence number, the transaction may be aborted. Replays of previously
     *           handled requests will yield the same response as the first execution.
     *           Required for DML statements. Ignored for queries.
     *     @type \Google\Cloud\Spanner\V1\ExecuteSqlRequest\QueryOptions $query_options
     *           Query optimizer configuration to use for the given query.
     *     @type \Google\Cloud\Spanner\V1\RequestOptions $request_options
     *           Common options for this request.
     *     @type \Google\Cloud\Spanner\V1\DirectedReadOptions $directed_read_options
     *           Directed read options for this request.
     *     @type bool $data_boost_enabled
     *           If this is for a partitioned query and this field is set to `true`, the
     *           request is executed with Spanner Data Boost independent compute resources.
     *           If the field is set to `true` but the request does not set
     *           `partition_token`, the API returns an `INVALID_ARGUMENT` error.
     * }
     */
    public function __construct($data = NULL) {
        Tracer::inSpan(['name' => 'execute_sql_req_instantiation'], function () use($data){
          Tracer::inSpan(['name' => 'self'], function () use($data){
            \GPBMetadata\Google\Spanner\V1\Spanner::initOnce();
          });
          Tracer::inSpan(['name' => 'parent'], function () use($data){
            parent::__construct($data);
          });
        });
    }

    /**
     * Required. The session in which the SQL query should be performed.
     *
     * Generated from protobuf field <code>string session = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getSession()
    {
        return $this->session;
    }

    /**
     * Required. The session in which the SQL query should be performed.
     *
     * Generated from protobuf field <code>string session = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setSession($var)
    {
        GPBUtil::checkString($var, True);
        $this->session = $var;

        return $this;
    }

    /**
     * The transaction to use.
     * For queries, if none is provided, the default is a temporary read-only
     * transaction with strong concurrency.
     * Standard DML statements require a read-write transaction. To protect
     * against replays, single-use transactions are not supported.  The caller
     * must either supply an existing transaction ID or begin a new transaction.
     * Partitioned DML requires an existing Partitioned DML transaction ID.
     *
     * Generated from protobuf field <code>.google.spanner.v1.TransactionSelector transaction = 2;</code>
     * @return \Google\Cloud\Spanner\V1\TransactionSelector|null
     */
    public function getTransaction()
    {
        return $this->transaction;
    }

    public function hasTransaction()
    {
        return isset($this->transaction);
    }

    public function clearTransaction()
    {
        unset($this->transaction);
    }

    /**
     * The transaction to use.
     * For queries, if none is provided, the default is a temporary read-only
     * transaction with strong concurrency.
     * Standard DML statements require a read-write transaction. To protect
     * against replays, single-use transactions are not supported.  The caller
     * must either supply an existing transaction ID or begin a new transaction.
     * Partitioned DML requires an existing Partitioned DML transaction ID.
     *
     * Generated from protobuf field <code>.google.spanner.v1.TransactionSelector transaction = 2;</code>
     * @param \Google\Cloud\Spanner\V1\TransactionSelector $var
     * @return $this
     */
    public function setTransaction($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Spanner\V1\TransactionSelector::class);
        $this->transaction = $var;

        return $this;
    }

    /**
     * Required. The SQL string.
     *
     * Generated from protobuf field <code>string sql = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getSql()
    {
        return $this->sql;
    }

    /**
     * Required. The SQL string.
     *
     * Generated from protobuf field <code>string sql = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setSql($var)
    {
        GPBUtil::checkString($var, True);
        $this->sql = $var;

        return $this;
    }

    /**
     * Parameter names and values that bind to placeholders in the SQL string.
     * A parameter placeholder consists of the `&#64;` character followed by the
     * parameter name (for example, `&#64;firstName`). Parameter names must conform
     * to the naming requirements of identifiers as specified at
     * https://cloud.google.com/spanner/docs/lexical#identifiers.
     * Parameters can appear anywhere that a literal value is expected.  The same
     * parameter name can be used more than once, for example:
     * `"WHERE id > &#64;msg_id AND id < &#64;msg_id + 100"`
     * It is an error to execute a SQL statement with unbound parameters.
     *
     * Generated from protobuf field <code>.google.protobuf.Struct params = 4;</code>
     * @return \Google\Protobuf\Struct|null
     */
    public function getParams()
    {
        return $this->params;
    }

    public function hasParams()
    {
        return isset($this->params);
    }

    public function clearParams()
    {
        unset($this->params);
    }

    /**
     * Parameter names and values that bind to placeholders in the SQL string.
     * A parameter placeholder consists of the `&#64;` character followed by the
     * parameter name (for example, `&#64;firstName`). Parameter names must conform
     * to the naming requirements of identifiers as specified at
     * https://cloud.google.com/spanner/docs/lexical#identifiers.
     * Parameters can appear anywhere that a literal value is expected.  The same
     * parameter name can be used more than once, for example:
     * `"WHERE id > &#64;msg_id AND id < &#64;msg_id + 100"`
     * It is an error to execute a SQL statement with unbound parameters.
     *
     * Generated from protobuf field <code>.google.protobuf.Struct params = 4;</code>
     * @param \Google\Protobuf\Struct $var
     * @return $this
     */
    public function setParams($var)
    {
        GPBUtil::checkMessage($var, \Google\Protobuf\Struct::class);
        $this->params = $var;

        return $this;
    }

    /**
     * It is not always possible for Cloud Spanner to infer the right SQL type
     * from a JSON value.  For example, values of type `BYTES` and values
     * of type `STRING` both appear in
     * [params][google.spanner.v1.ExecuteSqlRequest.params] as JSON strings.
     * In these cases, `param_types` can be used to specify the exact
     * SQL type for some or all of the SQL statement parameters. See the
     * definition of [Type][google.spanner.v1.Type] for more information
     * about SQL types.
     *
     * Generated from protobuf field <code>map<string, .google.spanner.v1.Type> param_types = 5;</code>
     * @return \Google\Protobuf\Internal\MapField
     */
    public function getParamTypes()
    {
        return $this->param_types;
    }

    /**
     * It is not always possible for Cloud Spanner to infer the right SQL type
     * from a JSON value.  For example, values of type `BYTES` and values
     * of type `STRING` both appear in
     * [params][google.spanner.v1.ExecuteSqlRequest.params] as JSON strings.
     * In these cases, `param_types` can be used to specify the exact
     * SQL type for some or all of the SQL statement parameters. See the
     * definition of [Type][google.spanner.v1.Type] for more information
     * about SQL types.
     *
     * Generated from protobuf field <code>map<string, .google.spanner.v1.Type> param_types = 5;</code>
     * @param array|\Google\Protobuf\Internal\MapField $var
     * @return $this
     */
    public function setParamTypes($var)
    {
        $arr = GPBUtil::checkMapField($var, \Google\Protobuf\Internal\GPBType::STRING, \Google\Protobuf\Internal\GPBType::MESSAGE, \Google\Cloud\Spanner\V1\Type::class);
        $this->param_types = $arr;

        return $this;
    }

    /**
     * If this request is resuming a previously interrupted SQL statement
     * execution, `resume_token` should be copied from the last
     * [PartialResultSet][google.spanner.v1.PartialResultSet] yielded before the
     * interruption. Doing this enables the new SQL statement execution to resume
     * where the last one left off. The rest of the request parameters must
     * exactly match the request that yielded this token.
     *
     * Generated from protobuf field <code>bytes resume_token = 6;</code>
     * @return string
     */
    public function getResumeToken()
    {
        return $this->resume_token;
    }

    /**
     * If this request is resuming a previously interrupted SQL statement
     * execution, `resume_token` should be copied from the last
     * [PartialResultSet][google.spanner.v1.PartialResultSet] yielded before the
     * interruption. Doing this enables the new SQL statement execution to resume
     * where the last one left off. The rest of the request parameters must
     * exactly match the request that yielded this token.
     *
     * Generated from protobuf field <code>bytes resume_token = 6;</code>
     * @param string $var
     * @return $this
     */
    public function setResumeToken($var)
    {
        GPBUtil::checkString($var, False);
        $this->resume_token = $var;

        return $this;
    }

    /**
     * Used to control the amount of debugging information returned in
     * [ResultSetStats][google.spanner.v1.ResultSetStats]. If
     * [partition_token][google.spanner.v1.ExecuteSqlRequest.partition_token] is
     * set, [query_mode][google.spanner.v1.ExecuteSqlRequest.query_mode] can only
     * be set to
     * [QueryMode.NORMAL][google.spanner.v1.ExecuteSqlRequest.QueryMode.NORMAL].
     *
     * Generated from protobuf field <code>.google.spanner.v1.ExecuteSqlRequest.QueryMode query_mode = 7;</code>
     * @return int
     */
    public function getQueryMode()
    {
        return $this->query_mode;
    }

    /**
     * Used to control the amount of debugging information returned in
     * [ResultSetStats][google.spanner.v1.ResultSetStats]. If
     * [partition_token][google.spanner.v1.ExecuteSqlRequest.partition_token] is
     * set, [query_mode][google.spanner.v1.ExecuteSqlRequest.query_mode] can only
     * be set to
     * [QueryMode.NORMAL][google.spanner.v1.ExecuteSqlRequest.QueryMode.NORMAL].
     *
     * Generated from protobuf field <code>.google.spanner.v1.ExecuteSqlRequest.QueryMode query_mode = 7;</code>
     * @param int $var
     * @return $this
     */
    public function setQueryMode($var)
    {
        GPBUtil::checkEnum($var, \Google\Cloud\Spanner\V1\ExecuteSqlRequest\QueryMode::class);
        $this->query_mode = $var;

        return $this;
    }

    /**
     * If present, results will be restricted to the specified partition
     * previously created using PartitionQuery().  There must be an exact
     * match for the values of fields common to this message and the
     * PartitionQueryRequest message used to create this partition_token.
     *
     * Generated from protobuf field <code>bytes partition_token = 8;</code>
     * @return string
     */
    public function getPartitionToken()
    {
        return $this->partition_token;
    }

    /**
     * If present, results will be restricted to the specified partition
     * previously created using PartitionQuery().  There must be an exact
     * match for the values of fields common to this message and the
     * PartitionQueryRequest message used to create this partition_token.
     *
     * Generated from protobuf field <code>bytes partition_token = 8;</code>
     * @param string $var
     * @return $this
     */
    public function setPartitionToken($var)
    {
        GPBUtil::checkString($var, False);
        $this->partition_token = $var;

        return $this;
    }

    /**
     * A per-transaction sequence number used to identify this request. This field
     * makes each request idempotent such that if the request is received multiple
     * times, at most one will succeed.
     * The sequence number must be monotonically increasing within the
     * transaction. If a request arrives for the first time with an out-of-order
     * sequence number, the transaction may be aborted. Replays of previously
     * handled requests will yield the same response as the first execution.
     * Required for DML statements. Ignored for queries.
     *
     * Generated from protobuf field <code>int64 seqno = 9;</code>
     * @return int|string
     */
    public function getSeqno()
    {
        return $this->seqno;
    }

    /**
     * A per-transaction sequence number used to identify this request. This field
     * makes each request idempotent such that if the request is received multiple
     * times, at most one will succeed.
     * The sequence number must be monotonically increasing within the
     * transaction. If a request arrives for the first time with an out-of-order
     * sequence number, the transaction may be aborted. Replays of previously
     * handled requests will yield the same response as the first execution.
     * Required for DML statements. Ignored for queries.
     *
     * Generated from protobuf field <code>int64 seqno = 9;</code>
     * @param int|string $var
     * @return $this
     */
    public function setSeqno($var)
    {
        GPBUtil::checkInt64($var);
        $this->seqno = $var;

        return $this;
    }

    /**
     * Query optimizer configuration to use for the given query.
     *
     * Generated from protobuf field <code>.google.spanner.v1.ExecuteSqlRequest.QueryOptions query_options = 10;</code>
     * @return \Google\Cloud\Spanner\V1\ExecuteSqlRequest\QueryOptions|null
     */
    public function getQueryOptions()
    {
        return $this->query_options;
    }

    public function hasQueryOptions()
    {
        return isset($this->query_options);
    }

    public function clearQueryOptions()
    {
        unset($this->query_options);
    }

    /**
     * Query optimizer configuration to use for the given query.
     *
     * Generated from protobuf field <code>.google.spanner.v1.ExecuteSqlRequest.QueryOptions query_options = 10;</code>
     * @param \Google\Cloud\Spanner\V1\ExecuteSqlRequest\QueryOptions $var
     * @return $this
     */
    public function setQueryOptions($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Spanner\V1\ExecuteSqlRequest\QueryOptions::class);
        $this->query_options = $var;

        return $this;
    }

    /**
     * Common options for this request.
     *
     * Generated from protobuf field <code>.google.spanner.v1.RequestOptions request_options = 11;</code>
     * @return \Google\Cloud\Spanner\V1\RequestOptions|null
     */
    public function getRequestOptions()
    {
        return $this->request_options;
    }

    public function hasRequestOptions()
    {
        return isset($this->request_options);
    }

    public function clearRequestOptions()
    {
        unset($this->request_options);
    }

    /**
     * Common options for this request.
     *
     * Generated from protobuf field <code>.google.spanner.v1.RequestOptions request_options = 11;</code>
     * @param \Google\Cloud\Spanner\V1\RequestOptions $var
     * @return $this
     */
    public function setRequestOptions($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Spanner\V1\RequestOptions::class);
        $this->request_options = $var;

        return $this;
    }

    /**
     * Directed read options for this request.
     *
     * Generated from protobuf field <code>.google.spanner.v1.DirectedReadOptions directed_read_options = 15;</code>
     * @return \Google\Cloud\Spanner\V1\DirectedReadOptions|null
     */
    public function getDirectedReadOptions()
    {
        return $this->directed_read_options;
    }

    public function hasDirectedReadOptions()
    {
        return isset($this->directed_read_options);
    }

    public function clearDirectedReadOptions()
    {
        unset($this->directed_read_options);
    }

    /**
     * Directed read options for this request.
     *
     * Generated from protobuf field <code>.google.spanner.v1.DirectedReadOptions directed_read_options = 15;</code>
     * @param \Google\Cloud\Spanner\V1\DirectedReadOptions $var
     * @return $this
     */
    public function setDirectedReadOptions($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Spanner\V1\DirectedReadOptions::class);
        $this->directed_read_options = $var;

        return $this;
    }

    /**
     * If this is for a partitioned query and this field is set to `true`, the
     * request is executed with Spanner Data Boost independent compute resources.
     * If the field is set to `true` but the request does not set
     * `partition_token`, the API returns an `INVALID_ARGUMENT` error.
     *
     * Generated from protobuf field <code>bool data_boost_enabled = 16;</code>
     * @return bool
     */
    public function getDataBoostEnabled()
    {
        return $this->data_boost_enabled;
    }

    /**
     * If this is for a partitioned query and this field is set to `true`, the
     * request is executed with Spanner Data Boost independent compute resources.
     * If the field is set to `true` but the request does not set
     * `partition_token`, the API returns an `INVALID_ARGUMENT` error.
     *
     * Generated from protobuf field <code>bool data_boost_enabled = 16;</code>
     * @param bool $var
     * @return $this
     */
    public function setDataBoostEnabled($var)
    {
        GPBUtil::checkBool($var);
        $this->data_boost_enabled = $var;

        return $this;
    }

}

