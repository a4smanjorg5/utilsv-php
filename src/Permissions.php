<?php

namespace GenrWork\Tim;

class Permissions
{
    public function add($keyword, $from = null) {
        if (is_array($from)) {
            $this->permissions[$keyword] = $this->available($from);
        } else {
            $p = $this->last;
            $this->last *= 2;
            $this->permissions[$keyword] = $p;
        }
        
        return $this;
    }

    public function available($keywords = []) {
        if (!$keywords)
            return array_keys($this->permissions);
        return array_bitmask(array_map(function($keyword) {
            return $this->permissions[$keyword];
        }, $keywords));
    }

    protected $permissions = [];

    private $last = 1;
}
