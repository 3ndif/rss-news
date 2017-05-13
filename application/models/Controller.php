<?php
namespace application\models;

class Controller {

    public function run(){

        $rssGraber = new RssGraber();
        $rssNews = $rssGraber->get();

        return include(__DIR__ . '/../../application/views/index.php');
    }
}