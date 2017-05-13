<?php
spl_autoload_register(function ($class) {

    $class = str_replace('\\','/', $class);

    try {
        include __DIR__."/$class.php";
    } catch (Exception $e) {
        echo $e->getMessage(), "\n";
    }
});