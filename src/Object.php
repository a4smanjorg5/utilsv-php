<?php

/**
 * This file is part of the utilsv package.
 *
 * (c) a4smanjorg5
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace a4smanjorg5;

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
?>
