<?php

require_once  __DIR__ . '/autoloader.php';
require_once  __DIR__ . '/vendor/phpmorphy-0.3.7/src/common.php';

$db = new application\models\DB();
$db = $db->get();

$graber = new application\models\RssGraber();
$news = $graber->get();

/**
 * Проверяем по заголовку на наличие существующей новости в базе
 * добавляем при отсутствии
 */
foreach ($news as $item){

    $stm  = $db->prepare("SELECT * FROM news WHERE title LIKE ? LIMIT 1");
    $stm->execute([$item->title]);
    $ourNews = $stm->fetch(\PDO::FETCH_OBJ);
    $newsId = (!empty($ourNews)) ? $ourNews->id : null;

    if (empty($ourNews)){

        $stmt = $db->prepare("INSERT INTO news (img,title,content,date_pub,source_link) VALUES (:img,:title,:content,:date,:source)");
        $stmt->bindParam(':img', $item->img);
        $stmt->bindParam(':title', $item->title);
        $stmt->bindParam(':content', $item->content);
        $stmt->bindParam(':date', $item->date_pub);
        $stmt->bindParam(':source', $item->source_link);
        $stmt->execute();

        $newsId = $db->lastInsertId();
    }

    foreach($item->types_ids as $types_id){
        $stm  = $db->query("SELECT * FROM types_news WHERE news_id=$newsId AND types_id=$types_id LIMIT 1");
        $result = $stm->fetch(\PDO::FETCH_OBJ);

        if (empty($result)){
            $stmt = $db->prepare("INSERT INTO types_news (types_id,news_id) VALUES (:types_id,:news_id)");
            $stmt->bindParam(':types_id', $types_id);
            $stmt->bindParam(':news_id', $newsId);
            $stmt->execute();
        }
    }

}
?>