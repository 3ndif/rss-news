<?php
namespace application\models;

class RssGraber {

    protected $url = [
        'https://lenta.ru/rss/news'
    ];

    public function get(){
        $rss = simplexml_load_file($this->url[0]);

        $arrayNews = [];

        foreach ($rss->channel->item as $item) {

        $news = new News();
        $news->title = $item->title;
        $news->text  = $item->description;
        $news->link  = $item->link;
        $news->date  = strtotime($item->pubDate);

        if (is_object($item->enclosure->attributes)){
            $news->img = $item->enclosure->attributes()->url;
        }


        $arrayNews[] = $news;


//        $post_pub_date = date('Y-m-d G:i:s',strtotime($item->pubDate));
//        $insertResult = mysql_query ("INSERT INTO rssn (title, description, pubdate) VALUES ('$post_title', '$post_text','$post_pub_date') ");
        }

        return $arrayNews;
    }
}