<?php
class Object {
    function ClassName() {
        return get_class($this);
    }
    function ClassType() {
        return gettype($this);
    }
    function ClassParent() {
        return get_parent_class($this);
    }
}

