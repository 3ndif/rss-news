<?php
namespace application\models;

class Controller {

    public function run(){

//        $rssGraber = new RssGraber();
//        $rssNews = $rssGraber->get();
        $rssNews = (new News())->getAllNews();
//var_dump($rssNews);die;
        return include(__DIR__ . '/../../application/views/index.php');
    }
}