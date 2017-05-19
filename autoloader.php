<?php
spl_autoload_register(function ($class) {

    $class = str_replace('\\','/', $class);
    $file = __DIR__."/$class.php";

    try {

        if (file_exists($file)) require_once $file;

    } catch (Exception $e) {
        echo $e->getMessage(), "\n";
    }
});