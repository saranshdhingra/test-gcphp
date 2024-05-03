<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/firestore/admin/v1/operation.proto

namespace GPBMetadata\Google\Firestore\Admin\V1;

class Operation
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Firestore\Admin\V1\Index::initOnce();
        \GPBMetadata\Google\Protobuf\Timestamp::initOnce();
        $pool->internalAddGeneratedFile(
            '
�
)google/firestore/admin/v1/operation.protogoogle.firestore.admin.v1%google/firestore/admin/v1/index.protogoogle/protobuf/timestamp.proto"�
IndexOperationMetadata.

start_time (2.google.protobuf.Timestamp,
end_time (2.google.protobuf.Timestamp
index (	8
state (2).google.firestore.admin.v1.OperationState?
progress_documents (2#.google.firestore.admin.v1.Progress;
progress_bytes (2#.google.firestore.admin.v1.Progress"�
FieldOperationMetadata.

start_time (2.google.protobuf.Timestamp,
end_time (2.google.protobuf.Timestamp
field (	_
index_config_deltas (2B.google.firestore.admin.v1.FieldOperationMetadata.IndexConfigDelta8
state (2).google.firestore.admin.v1.OperationState?
progress_documents (2#.google.firestore.admin.v1.Progress;
progress_bytes (2#.google.firestore.admin.v1.ProgressZ
ttl_config_delta (2@.google.firestore.admin.v1.FieldOperationMetadata.TtlConfigDelta�
IndexConfigDeltab
change_type (2M.google.firestore.admin.v1.FieldOperationMetadata.IndexConfigDelta.ChangeType/
index (2 .google.firestore.admin.v1.Index">

ChangeType
CHANGE_TYPE_UNSPECIFIED 
ADD

REMOVE�
TtlConfigDelta`
change_type (2K.google.firestore.admin.v1.FieldOperationMetadata.TtlConfigDelta.ChangeType">

ChangeType
CHANGE_TYPE_UNSPECIFIED 
ADD

REMOVE"�
ExportDocumentsMetadata.

start_time (2.google.protobuf.Timestamp,
end_time (2.google.protobuf.TimestampB
operation_state (2).google.firestore.admin.v1.OperationState?
progress_documents (2#.google.firestore.admin.v1.Progress;
progress_bytes (2#.google.firestore.admin.v1.Progress
collection_ids (	
output_uri_prefix (	
namespace_ids (	1
snapshot_time	 (2.google.protobuf.Timestamp"�
ImportDocumentsMetadata.

start_time (2.google.protobuf.Timestamp,
end_time (2.google.protobuf.TimestampB
operation_state (2).google.firestore.admin.v1.OperationState?
progress_documents (2#.google.firestore.admin.v1.Progress;
progress_bytes (2#.google.firestore.admin.v1.Progress
collection_ids (	
input_uri_prefix (	
namespace_ids (	"4
ExportDocumentsResponse
output_uri_prefix (	"�
RestoreDatabaseMetadata.

start_time (2.google.protobuf.Timestamp,
end_time (2.google.protobuf.TimestampB
operation_state (2).google.firestore.admin.v1.OperationState8
database (	B&�A#
!firestore.googleapis.com/Database4
backup (	B$�A!
firestore.googleapis.com/Backup@
progress_percentage (2#.google.firestore.admin.v1.Progress":
Progress
estimated_work (
completed_work (*�
OperationState
OPERATION_STATE_UNSPECIFIED 
INITIALIZING

PROCESSING

CANCELLING

FINALIZING

SUCCESSFUL

FAILED
	CANCELLEDB�
com.google.firestore.admin.v1BOperationProtoPZ9cloud.google.com/go/firestore/apiv1/admin/adminpb;adminpb�GCFS�Google.Cloud.Firestore.Admin.V1�Google\\Cloud\\Firestore\\Admin\\V1�#Google::Cloud::Firestore::Admin::V1bproto3'
        , true);

        static::$is_initialized = true;
    }
}

