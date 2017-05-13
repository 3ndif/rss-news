<?php

namespace application\models;

class Core {

    public function run(){
        return (new \application\models\Controller())->run();
    }
}