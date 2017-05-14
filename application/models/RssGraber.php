<?php
namespace application\models;

class RssGraber {

    protected $url = [
        'https://lenta.ru/rss/news'
    ];

    protected $keywords = [
        'ЕВРОВИДЕНИЕ',
        'ОБРАЗОВАНИЕ',
        'ФУТБОЛ',
    ];

    public function get(){
        $rss = simplexml_load_file($this->url[0]);

        $arrayNews = [];

        foreach ($rss->channel->item as $item) {

            // Проверяем наличие ключевых слов в тексте
            if (!$this->is_forbidden($item->description)) continue;

            $news = new News();
            $news->title = $item->title;
            $news->content  = $item->description;
            $news->source_link  = $item->link;
            $news->date_pub  = strtotime($item->pubDate);

            if (is_object($item->enclosure->attributes)){
                $news->img = $item->enclosure->attributes()->url;
            }

            $arrayNews[] = $news;

        }

        return $arrayNews;
    }


    // Проверяем наличие ключевых слов в тексте
    public function is_forbidden($stringtocheck)
    {
        $phpmorph = new PHPMorph();
        $forbiddenWords = $phpmorph->getPseudoRoot($this->keywords);

        foreach ($forbiddenWords as $value) {
            if (mb_stripos($stringtocheck, $value[0]) !== FALSE) {
                return true;
            }
        }

        return false;
    }
}