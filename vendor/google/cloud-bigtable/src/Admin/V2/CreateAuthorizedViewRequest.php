<?php
# Generated by the protocol buffer compiler.  DO NOT EDIT!
# source: google/bigtable/admin/v2/bigtable_table_admin.proto

namespace Google\Cloud\Bigtable\Admin\V2;

use Google\Protobuf\Internal\GPBType;
use Google\Protobuf\Internal\RepeatedField;
use Google\Protobuf\Internal\GPBUtil;

/**
 * The request for
 * [CreateAuthorizedView][google.bigtable.admin.v2.BigtableTableAdmin.CreateAuthorizedView]
 *
 * Generated from protobuf message <code>google.bigtable.admin.v2.CreateAuthorizedViewRequest</code>
 */
class CreateAuthorizedViewRequest extends \Google\Protobuf\Internal\Message
{
    /**
     * Required. This is the name of the table the AuthorizedView belongs to.
     * Values are of the form
     * `projects/{project}/instances/{instance}/tables/{table}`.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     */
    private $parent = '';
    /**
     * Required. The id of the AuthorizedView to create. This AuthorizedView must
     * not already exist. The `authorized_view_id` appended to `parent` forms the
     * full AuthorizedView name of the form
     * `projects/{project}/instances/{instance}/tables/{table}/authorizedView/{authorized_view}`.
     *
     * Generated from protobuf field <code>string authorized_view_id = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $authorized_view_id = '';
    /**
     * Required. The AuthorizedView to create.
     *
     * Generated from protobuf field <code>.google.bigtable.admin.v2.AuthorizedView authorized_view = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     */
    private $authorized_view = null;

    /**
     * @param string                                         $parent           Required. This is the name of the table the AuthorizedView belongs to.
     *                                                                         Values are of the form
     *                                                                         `projects/{project}/instances/{instance}/tables/{table}`. Please see
     *                                                                         {@see BigtableTableAdminClient::tableName()} for help formatting this field.
     * @param \Google\Cloud\Bigtable\Admin\V2\AuthorizedView $authorizedView   Required. The AuthorizedView to create.
     * @param string                                         $authorizedViewId Required. The id of the AuthorizedView to create. This AuthorizedView must
     *                                                                         not already exist. The `authorized_view_id` appended to `parent` forms the
     *                                                                         full AuthorizedView name of the form
     *                                                                         `projects/{project}/instances/{instance}/tables/{table}/authorizedView/{authorized_view}`.
     *
     * @return \Google\Cloud\Bigtable\Admin\V2\CreateAuthorizedViewRequest
     *
     * @experimental
     */
    public static function build(string $parent, \Google\Cloud\Bigtable\Admin\V2\AuthorizedView $authorizedView, string $authorizedViewId): self
    {
        return (new self())
            ->setParent($parent)
            ->setAuthorizedView($authorizedView)
            ->setAuthorizedViewId($authorizedViewId);
    }

    /**
     * Constructor.
     *
     * @param array $data {
     *     Optional. Data for populating the Message object.
     *
     *     @type string $parent
     *           Required. This is the name of the table the AuthorizedView belongs to.
     *           Values are of the form
     *           `projects/{project}/instances/{instance}/tables/{table}`.
     *     @type string $authorized_view_id
     *           Required. The id of the AuthorizedView to create. This AuthorizedView must
     *           not already exist. The `authorized_view_id` appended to `parent` forms the
     *           full AuthorizedView name of the form
     *           `projects/{project}/instances/{instance}/tables/{table}/authorizedView/{authorized_view}`.
     *     @type \Google\Cloud\Bigtable\Admin\V2\AuthorizedView $authorized_view
     *           Required. The AuthorizedView to create.
     * }
     */
    public function __construct($data = NULL) {
        \GPBMetadata\Google\Bigtable\Admin\V2\BigtableTableAdmin::initOnce();
        parent::__construct($data);
    }

    /**
     * Required. This is the name of the table the AuthorizedView belongs to.
     * Values are of the form
     * `projects/{project}/instances/{instance}/tables/{table}`.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @return string
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Required. This is the name of the table the AuthorizedView belongs to.
     * Values are of the form
     * `projects/{project}/instances/{instance}/tables/{table}`.
     *
     * Generated from protobuf field <code>string parent = 1 [(.google.api.field_behavior) = REQUIRED, (.google.api.resource_reference) = {</code>
     * @param string $var
     * @return $this
     */
    public function setParent($var)
    {
        GPBUtil::checkString($var, True);
        $this->parent = $var;

        return $this;
    }

    /**
     * Required. The id of the AuthorizedView to create. This AuthorizedView must
     * not already exist. The `authorized_view_id` appended to `parent` forms the
     * full AuthorizedView name of the form
     * `projects/{project}/instances/{instance}/tables/{table}/authorizedView/{authorized_view}`.
     *
     * Generated from protobuf field <code>string authorized_view_id = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return string
     */
    public function getAuthorizedViewId()
    {
        return $this->authorized_view_id;
    }

    /**
     * Required. The id of the AuthorizedView to create. This AuthorizedView must
     * not already exist. The `authorized_view_id` appended to `parent` forms the
     * full AuthorizedView name of the form
     * `projects/{project}/instances/{instance}/tables/{table}/authorizedView/{authorized_view}`.
     *
     * Generated from protobuf field <code>string authorized_view_id = 2 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param string $var
     * @return $this
     */
    public function setAuthorizedViewId($var)
    {
        GPBUtil::checkString($var, True);
        $this->authorized_view_id = $var;

        return $this;
    }

    /**
     * Required. The AuthorizedView to create.
     *
     * Generated from protobuf field <code>.google.bigtable.admin.v2.AuthorizedView authorized_view = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @return \Google\Cloud\Bigtable\Admin\V2\AuthorizedView|null
     */
    public function getAuthorizedView()
    {
        return $this->authorized_view;
    }

    public function hasAuthorizedView()
    {
        return isset($this->authorized_view);
    }

    public function clearAuthorizedView()
    {
        unset($this->authorized_view);
    }

    /**
     * Required. The AuthorizedView to create.
     *
     * Generated from protobuf field <code>.google.bigtable.admin.v2.AuthorizedView authorized_view = 3 [(.google.api.field_behavior) = REQUIRED];</code>
     * @param \Google\Cloud\Bigtable\Admin\V2\AuthorizedView $var
     * @return $this
     */
    public function setAuthorizedView($var)
    {
        GPBUtil::checkMessage($var, \Google\Cloud\Bigtable\Admin\V2\AuthorizedView::class);
        $this->authorized_view = $var;

        return $this;
    }

}
