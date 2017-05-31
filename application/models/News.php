<?php

namespace application\models;

use application\models\Keywords;

class News{

    public $title = '';

    public $content = '';

    public $img = '';

    public $date_pub = null;

    public $source_link = '';
    public $source_name = '';

    /**
     * Используется при парсинге нвостей, и при успешном поиске новости по словам данной категории
     * добавляется в массив, для создания последующей связи между новостью и категорией(типом)
     */
    public $types_ids = [];


    /**
     * Используется при парсинге нвостей, и при успешном поиске новости по определенному ключ. слову
     * добавляется в массив, для создания последующей связи между новостью и ключевый словом
     */
    public $keywords_ids = [];

    public function getAllNews(){
        $db = (new DB())->get();
        return $db->query('SELECT * FROM news ORDER BY date_pub desc')->fetchAll(\PDO::FETCH_OBJ);
    }

    public function getAliasNews($alias = Keywords::MAIN_KEYWORDS_ALIAS){

        $type = Keywords::getType($alias);
        return Keywords::getNewsIdsForType($type->id);
    }
}

