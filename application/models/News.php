<?php

namespace application\models;

class News{

    public $title = '';

    public $content = '';

    public $img = '';

    public $date_pub = null;

    public $source_link = '';

    public function getAllNews(){
        $db = (new DB())->get();
        return $db->query('SELECT * FROM news')->fetchAll(\PDO::FETCH_OBJ);
    }
}

