<?php

namespace GenrWork\Tim;

class OwnerRole extends Role
{
    /**
     * Create a new role instance.
     *
     * @return void
     */
    public function __construct($name = 'Owner')
    {
        $p = \GenrWork\Tim::permissions();
        parent::__construct(static::OWNER_KEY, $name, 1);
        $this->permissions = -1;
    }
}
