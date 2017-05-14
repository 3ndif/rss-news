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

    $stm  = $db->prepare("SELECT * FROM news WHERE title LIKE ?");
    $stm->execute([$item->title]);
    $data = $stm->fetchAll();

    if (empty($data)){
        $stmt = $db->prepare("INSERT INTO news (img,title,content,date_pub,source_link) VALUES (:img,:title,:content,:date,:source)");
        $stmt->bindParam(':img', $item->img);
        $stmt->bindParam(':title', $item->title);
        $stmt->bindParam(':content', $item->content);
        $stmt->bindParam(':date', $item->date_pub);
        $stmt->bindParam(':source', $item->source_link);
        $stmt->execute();
    }
}
/*

$host='localhost'; // имя хоста (уточняется у провайдера)
$user='root'; // заданное вами имя пользователя, либо определенное провайдером
$pswd='415263'; // заданный вами пароль
$database='rss'; // имя базы данных, которую вы должны создать

$rssSQL = mysql_connect($host, $user, $pswd) or die("Не могу соединиться с MySQL.");
mysql_select_db($database) or die("Не могу подключиться к базе.");
mysql_query ("INSERT INTO rssn (title, description, pubdate) VALUES ('dsfgsdf', 'sdfsd', NOW())")
//wget -q --no-check-certificate -0- /home/hailstorm/rss-local/crontest.php
 *
 */
?>