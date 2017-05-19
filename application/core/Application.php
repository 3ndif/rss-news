<?php

namespace application\core;

class Application {

    public function run(){
        return (new \application\core\Route())->start();
    }
}