<?php

/**
 * This file is part of the utilsv package.
 *
 * (c) a4smanjorg5
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (! function_exists('app_model')) {
    /**
     * Expand model name.
     *
     * @param string $modelName
     * @param bool $newInstance
     * @return string
     */
    function app_model($modelName, $newInstance = true) {
        preg_match('/^[^\\\\]+/', $modelName, $m);
        $model = 'App\\Models\\' . $m[0];
        if ($m[0]) {
            if ($newInstance)
                return new $model;
            else return $model;
        }
    }
}

if (! function_exists('array_bitmask')) {
    /**
     * Reduce array as bitmask.
     *
     * @param array $flagsArray
     * @param array $compArray
     * @return int
     */
    function array_bitmask($flagsArray, $compArray = null) {
        $flags = array_reduce($flagsArray, function($c, $i) {
            return $c | $i;
        });
        if (is_array($compArray))
            return $flags & array_bitmask($compArray);
        return $flags;
    }
}

