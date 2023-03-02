<?php

namespace a4smanjorg5\Utils;

use JsonSerializable;

class Role implements JsonSerializable
{
    /**
     * The key identifier for the role.
     *
     * @var string
     */
    public $key;

    const OWNER_KEY = 'owner';

    /**
     * The name of the role.
     *
     * @var string
     */
    public $name;

    /**
     * The role's permissions.
     *
     * @var int
     */
    protected $permissions;

    /**
     * The role's description.
     *
     * @var string
     */
    public $description;

    /**
     * Create a new role instance.
     *
     * @param  string  $key
     * @param  string  $name
     * @param  int  $permissions
     * @return void
     */
    public function __construct($key, $name, $permissions)
    {
        if ($permissions < 1)
            throw new Exception('Unexpected permission not greater than zero');
        $this->key = $key;
        $this->name = $name;
        $this->permissions = (int)$permissions;
    }

    /**
     * Describe the role.
     *
     * @param  string  $description
     * @return $this
     */
    public function description($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Determine if the role has the given permission.
     *
     * @param  int  $permission
     * @return bool
     */
    public function hasPermission($permission) {
        if ($this->isOwner())
            return true;
        $permission = array_bitmask(func_get_args());
        return $this->permissions & $permission == $permission;
    }

    /**
     * Determine if the role is owner.
     *
     * @param  int  $permission
     * @return bool
     */
    public function isOwner() {
        return $this->permissions < 0;
    }

    /**
     * Get the JSON serializable representation of the object.
     *
     * @return array
     */
    public function jsonSerialize()
    {
        $permissions = [];
        for ($i=1; $i <= $this->permissions; $i*=2) { 
            if ($this->permissions & $i == $i)
                $permissions[] = $i;
        }
        return [
            'key' => $this->key,
            'name' => $this->name,
            'description' => $this->description,
            'permissions' => $permissions,
            'permission' => $this->permissions,
        ];
    }
}
