<?php

namespace application\models;

use application\models\Keywords;

class News{

    public $title = '';

    public $content = '';

    public $img = '';

    public $date_pub = null;

    public $source_link = '';

    public $types_ids = [];

    public function getAllNews(){
        $db = (new DB())->get();
        return $db->query('SELECT * FROM news ORDER BY date_pub desc')->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getAliasNews($alias = Keywords::MAIN_KEYWORDS_ALIAS){

        $type = Keywords::getType($alias);
        return Keywords::getNewsIdsForType($type->id);
    }
}

