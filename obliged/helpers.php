<?php
function app_model($modelName, $newInstance = true) {
    preg_match('/^[^\\\\]+/', $modelName, $m);
    $model = 'App\\Models\\' . $m[0];
    if ($m[0]) {
        if ($newInstance)
            return new $model;
        else return $model;
    }
}

