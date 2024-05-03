<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/spanner/admin/database/v1/spanner_database_admin.proto

namespace GPBMetadata\Google\Spanner\Admin\Database\V1;

class SpannerDatabaseAdmin
{
    public static $is_initialized = false;

    public static function initOnce() {
        $pool = \Google\Protobuf\Internal\DescriptorPool::getGeneratedPool();

        if (static::$is_initialized == true) {
          return;
        }
        \GPBMetadata\Google\Api\Annotations::initOnce();
        \GPBMetadata\Google\Api\Client::initOnce();
        \GPBMetadata\Google\Api\FieldBehavior::initOnce();
        \GPBMetadata\Google\Api\Resource::initOnce();
        \GPBMetadata\Google\Iam\V1\IamPolicy::initOnce();
        \GPBMetadata\Google\Iam\V1\Policy::initOnce();
        \GPBMetadata\Google\Longrunning\Operations::initOnce();
        \GPBMetadata\Google\Protobuf\GPBEmpty::initOnce();
        \GPBMetadata\Google\Protobuf\FieldMask::initOnce();
        \GPBMetadata\Google\Protobuf\Timestamp::initOnce();
        \GPBMetadata\Google\Spanner\Admin\Database\V1\Backup::initOnce();
        \GPBMetadata\Google\Spanner\Admin\Database\V1\Common::initOnce();
        $pool->internalAddGeneratedFile(
            '
�R
=google/spanner/admin/database/v1/spanner_database_admin.proto google.spanner.admin.database.v1google/api/client.protogoogle/api/field_behavior.protogoogle/api/resource.protogoogle/iam/v1/iam_policy.protogoogle/iam/v1/policy.proto#google/longrunning/operations.protogoogle/protobuf/empty.proto google/protobuf/field_mask.protogoogle/protobuf/timestamp.proto-google/spanner/admin/database/v1/backup.proto-google/spanner/admin/database/v1/common.proto"�
RestoreInfoH
source_type (23.google.spanner.admin.database.v1.RestoreSourceTypeC
backup_info (2,.google.spanner.admin.database.v1.BackupInfoH B
source_info"�
Database
name (	B�AD
state (20.google.spanner.admin.database.v1.Database.StateB�A4
create_time (2.google.protobuf.TimestampB�AH
restore_info (2-.google.spanner.admin.database.v1.RestoreInfoB�AR
encryption_config (22.google.spanner.admin.database.v1.EncryptionConfigB�AN
encryption_info (20.google.spanner.admin.database.v1.EncryptionInfoB�A%
version_retention_period (	B�A>
earliest_version_time (2.google.protobuf.TimestampB�A
default_leader	 (	B�AP
database_dialect
 (21.google.spanner.admin.database.v1.DatabaseDialectB�A
enable_drop_protection (
reconciling (B�A"M
State
STATE_UNSPECIFIED 
CREATING	
READY
READY_OPTIMIZING:b�A_
spanner.googleapis.com/Database<projects/{project}/instances/{instance}/databases/{database}"v
ListDatabasesRequest7
parent (	B\'�A�A!
spanner.googleapis.com/Instance
	page_size (

page_token (	"o
ListDatabasesResponse=
	databases (2*.google.spanner.admin.database.v1.Database
next_page_token (	"�
CreateDatabaseRequest7
parent (	B\'�A�A!
spanner.googleapis.com/Instance
create_statement (	B�A
extra_statements (	B�AR
encryption_config (22.google.spanner.admin.database.v1.EncryptionConfigB�AP
database_dialect (21.google.spanner.admin.database.v1.DatabaseDialectB�A
proto_descriptors (B�A"P
CreateDatabaseMetadata6
database (	B$�A!
spanner.googleapis.com/Database"K
GetDatabaseRequest5
name (	B\'�A�A!
spanner.googleapis.com/Database"�
UpdateDatabaseRequestA
database (2*.google.spanner.admin.database.v1.DatabaseB�A4
update_mask (2.google.protobuf.FieldMaskB�A"�
UpdateDatabaseMetadataH
request (27.google.spanner.admin.database.v1.UpdateDatabaseRequestE
progress (23.google.spanner.admin.database.v1.OperationProgress/
cancel_time (2.google.protobuf.Timestamp"�
UpdateDatabaseDdlRequest9
database (	B\'�A�A!
spanner.googleapis.com/Database

statements (	B�A
operation_id (	
proto_descriptors (B�A"S
DdlStatementActionInfo
action (	
entity_type (	
entity_names (	"�
UpdateDatabaseDdlMetadata6
database (	B$�A!
spanner.googleapis.com/Database

statements (	5
commit_timestamps (2.google.protobuf.Timestamp
	throttled (B�AE
progress (23.google.spanner.admin.database.v1.OperationProgressI
actions (28.google.spanner.admin.database.v1.DdlStatementActionInfo"P
DropDatabaseRequest9
database (	B\'�A�A!
spanner.googleapis.com/Database"R
GetDatabaseDdlRequest9
database (	B\'�A�A!
spanner.googleapis.com/Database"G
GetDatabaseDdlResponse

statements (	
proto_descriptors ("�
ListDatabaseOperationsRequest7
parent (	B\'�A�A!
spanner.googleapis.com/Instance
filter (	
	page_size (

page_token (	"l
ListDatabaseOperationsResponse1

operations (2.google.longrunning.Operation
next_page_token (	"�
RestoreDatabaseRequest7
parent (	B\'�A�A!
spanner.googleapis.com/Instance
database_id (	B�A4
backup (	B"�A
spanner.googleapis.com/BackupH a
encryption_config (2A.google.spanner.admin.database.v1.RestoreDatabaseEncryptionConfigB�AB
source"�
RestoreDatabaseEncryptionConfign
encryption_type (2P.google.spanner.admin.database.v1.RestoreDatabaseEncryptionConfig.EncryptionTypeB�A?
kms_key_name (	B)�A�A#
!cloudkms.googleapis.com/CryptoKey"�
EncryptionType
ENCRYPTION_TYPE_UNSPECIFIED +
\'USE_CONFIG_DEFAULT_OR_BACKUP_ENCRYPTION
GOOGLE_DEFAULT_ENCRYPTION
CUSTOMER_MANAGED_ENCRYPTION"�
RestoreDatabaseMetadata2
name (	B$�A!
spanner.googleapis.com/DatabaseH
source_type (23.google.spanner.admin.database.v1.RestoreSourceTypeC
backup_info (2,.google.spanner.admin.database.v1.BackupInfoH E
progress (23.google.spanner.admin.database.v1.OperationProgress/
cancel_time (2.google.protobuf.Timestamp(
 optimize_database_operation_name (	B
source_info"�
 OptimizeRestoredDatabaseMetadata2
name (	B$�A!
spanner.googleapis.com/DatabaseE
progress (23.google.spanner.admin.database.v1.OperationProgress"�
DatabaseRole
name (	B�A:{�Ax
#spanner.googleapis.com/DatabaseRoleQprojects/{project}/instances/{instance}/databases/{database}/databaseRoles/{role}"z
ListDatabaseRolesRequest7
parent (	B\'�A�A!
spanner.googleapis.com/Database
	page_size (

page_token (	"|
ListDatabaseRolesResponseF
database_roles (2..google.spanner.admin.database.v1.DatabaseRole
next_page_token (	*5
RestoreSourceType
TYPE_UNSPECIFIED 

BACKUP2�%
DatabaseAdmin�
ListDatabases6.google.spanner.admin.database.v1.ListDatabasesRequest7.google.spanner.admin.database.v1.ListDatabasesResponse">�Aparent���/-/v1/{parent=projects/*/instances/*}/databases�
CreateDatabase7.google.spanner.admin.database.v1.CreateDatabaseRequest.google.longrunning.Operation"��Ad
)google.spanner.admin.database.v1.Database7google.spanner.admin.database.v1.CreateDatabaseMetadata�Aparent,create_statement���2"-/v1/{parent=projects/*/instances/*}/databases:*�
GetDatabase4.google.spanner.admin.database.v1.GetDatabaseRequest*.google.spanner.admin.database.v1.Database"<�Aname���/-/v1/{name=projects/*/instances/*/databases/*}�
UpdateDatabase7.google.spanner.admin.database.v1.UpdateDatabaseRequest.google.longrunning.Operation"��A"
DatabaseUpdateDatabaseMetadata�Adatabase,update_mask���B26/v1/{database.name=projects/*/instances/*/databases/*}:database�
UpdateDatabaseDdl:.google.spanner.admin.database.v1.UpdateDatabaseDdlRequest.google.longrunning.Operation"��AS
google.protobuf.Empty:google.spanner.admin.database.v1.UpdateDatabaseDdlMetadata�Adatabase,statements���:25/v1/{database=projects/*/instances/*/databases/*}/ddl:*�
DropDatabase5.google.spanner.admin.database.v1.DropDatabaseRequest.google.protobuf.Empty"D�Adatabase���3*1/v1/{database=projects/*/instances/*/databases/*}�
GetDatabaseDdl7.google.spanner.admin.database.v1.GetDatabaseDdlRequest8.google.spanner.admin.database.v1.GetDatabaseDdlResponse"H�Adatabase���75/v1/{database=projects/*/instances/*/databases/*}/ddl�
SetIamPolicy".google.iam.v1.SetIamPolicyRequest.google.iam.v1.Policy"��Aresource,policy����">/v1/{resource=projects/*/instances/*/databases/*}:setIamPolicy:*ZA"</v1/{resource=projects/*/instances/*/backups/*}:setIamPolicy:*�
GetIamPolicy".google.iam.v1.GetIamPolicyRequest.google.iam.v1.Policy"��Aresource����">/v1/{resource=projects/*/instances/*/databases/*}:getIamPolicy:*ZA"</v1/{resource=projects/*/instances/*/backups/*}:getIamPolicy:*�
TestIamPermissions(.google.iam.v1.TestIamPermissionsRequest).google.iam.v1.TestIamPermissionsResponse"��Aresource,permissions����"D/v1/{resource=projects/*/instances/*/databases/*}:testIamPermissions:*ZG"B/v1/{resource=projects/*/instances/*/backups/*}:testIamPermissions:*ZY"T/v1/{resource=projects/*/instances/*/databases/*/databaseRoles/*}:testIamPermissions:*�
CreateBackup5.google.spanner.admin.database.v1.CreateBackupRequest.google.longrunning.Operation"��A`
\'google.spanner.admin.database.v1.Backup5google.spanner.admin.database.v1.CreateBackupMetadata�Aparent,backup,backup_id���5"+/v1/{parent=projects/*/instances/*}/backups:backup�

CopyBackup3.google.spanner.admin.database.v1.CopyBackupRequest.google.longrunning.Operation"��A^
\'google.spanner.admin.database.v1.Backup3google.spanner.admin.database.v1.CopyBackupMetadata�A*parent,backup_id,source_backup,expire_time���5"0/v1/{parent=projects/*/instances/*}/backups:copy:*�
	GetBackup2.google.spanner.admin.database.v1.GetBackupRequest(.google.spanner.admin.database.v1.Backup":�Aname���-+/v1/{name=projects/*/instances/*/backups/*}�
UpdateBackup5.google.spanner.admin.database.v1.UpdateBackupRequest(.google.spanner.admin.database.v1.Backup"W�Abackup,update_mask���<22/v1/{backup.name=projects/*/instances/*/backups/*}:backup�
DeleteBackup5.google.spanner.admin.database.v1.DeleteBackupRequest.google.protobuf.Empty":�Aname���-*+/v1/{name=projects/*/instances/*/backups/*}�
ListBackups4.google.spanner.admin.database.v1.ListBackupsRequest5.google.spanner.admin.database.v1.ListBackupsResponse"<�Aparent���-+/v1/{parent=projects/*/instances/*}/backups�
RestoreDatabase8.google.spanner.admin.database.v1.RestoreDatabaseRequest.google.longrunning.Operation"��Ae
)google.spanner.admin.database.v1.Database8google.spanner.admin.database.v1.RestoreDatabaseMetadata�Aparent,database_id,backup���:"5/v1/{parent=projects/*/instances/*}/databases:restore:*�
ListDatabaseOperations?.google.spanner.admin.database.v1.ListDatabaseOperationsRequest@.google.spanner.admin.database.v1.ListDatabaseOperationsResponse"G�Aparent���86/v1/{parent=projects/*/instances/*}/databaseOperations�
ListBackupOperations=.google.spanner.admin.database.v1.ListBackupOperationsRequest>.google.spanner.admin.database.v1.ListBackupOperationsResponse"E�Aparent���64/v1/{parent=projects/*/instances/*}/backupOperations�
ListDatabaseRoles:.google.spanner.admin.database.v1.ListDatabaseRolesRequest;.google.spanner.admin.database.v1.ListDatabaseRolesResponse"N�Aparent���?=/v1/{parent=projects/*/instances/*/databases/*}/databaseRolesx�Aspanner.googleapis.com�A\\https://www.googleapis.com/auth/cloud-platform,https://www.googleapis.com/auth/spanner.adminB�
$com.google.spanner.admin.database.v1BSpannerDatabaseAdminProtoPZFcloud.google.com/go/spanner/admin/database/apiv1/databasepb;databasepb�&Google.Cloud.Spanner.Admin.Database.V1�&Google\\Cloud\\Spanner\\Admin\\Database\\V1�+Google::Cloud::Spanner::Admin::Database::V1�AJ
spanner.googleapis.com/Instance\'projects/{project}/instances/{instance}bproto3'
        , true);

        static::$is_initialized = true;
    }
}

