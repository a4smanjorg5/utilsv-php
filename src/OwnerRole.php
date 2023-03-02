<?php

namespace a4smanjorg5\Utils;

class OwnerRole extends Role
{
    /**
     * Create a new role instance.
     *
     * @return void
     */
    public function __construct($name = 'Owner')
    {
        parent::__construct(static::OWNER_KEY, $name, 1);
        $this->permissions = -1;
    }
}
