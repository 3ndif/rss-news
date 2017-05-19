<?php
namespace application\models;

class Keywords {

    const MAIN_KEYWORDS_ALIAS = 'extra';
    const REGION_KEYWORDS_ALIAS = 'region';
    const EDUCATION_KEYWORDS_ALIAS = 'education';

    public $types_id = self::MAIN_KEYWORDS_ALIAS;
    public $keyword = '';

    public function append(){

        $db = (new DB())->get();
        $stmt = $db->prepare("INSERT INTO keywords (types_id,keyword) VALUES (:types_id,:word)");
        $stmt->bindParam(':types_id', $this->types_id);
        $stmt->bindParam(':word', $this->keyword);
        $stmt->execute();

        return $db;
    }

    public function delete($ids = []){

        $ids = implode("','",$ids);

        $db = (new DB())->get();
        $stmt = $db->prepare("DELETE FROM keywords WHERE id IN ('$ids')");
        $stmt->execute();

        return $stmt;
    }

    /**
     * Получаем слова из набора по алиасу
     */
    public function getWords($alias = self::MAIN_KEYWORDS_ALIAS){
        $type = self::getType($alias);

        $types_id = $type->id;
        $db = (new DB())->get();
        $stmt = $db->prepare('SELECT * FROM keywords WHERE `types_id`= :types_id ORDER BY id desc');
        $stmt->execute(compact('types_id'));
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public static function getType($alias = self::MAIN_KEYWORDS_ALIAS){
        $db = (new DB())->get();
        $stmt = $db->prepare('SELECT * FROM types WHERE `alias`= :alias LIMIT 1');
        $stmt->execute(compact('alias'));
        return $stmt->fetch(\PDO::FETCH_OBJ);
    }

    public static function getTypes(){
        $db = (new DB())->get();
        $stmt = $db->query('SELECT * FROM types');
        return $stmt->fetchAll(\PDO::FETCH_OBJ);
    }

    public static function getNewsIdsForType($types_id){
        $db = (new DB())->get();
        $stmt = $db->query("SELECT * FROM types_news WHERE `types_id`=$types_id");
        $types_news = $stmt->fetchAll(\PDO::FETCH_OBJ);

        $news_ids = array_map(create_function('$o', 'return $o->news_id;'), $types_news);

        $ids = implode("','",$news_ids);
        $stmt = $db->query("SELECT * FROM news WHERE `id` IN ('$ids')");
        $news = $stmt->fetchAll(\PDO::FETCH_OBJ);

        return $news;
    }
}