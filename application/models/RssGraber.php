<?php
namespace application\models;

class RssGraber {

    protected $rssLinks = [
        'https://lenta.ru/rss/news' => 'lenta.ru',
        'https://www.vedomosti.ru/rss/news' => 'vedomosti.ru',
        'https://tvrain.ru/export/rss/all.xml' => 'tvrain.ru',
        'http://1yar.tv/ru/rss' => '1yar.ru',
    ];

    public function get(){

        $arrayNews = [];
        foreach ($this->rssLinks as $link => $name){
            $rss = simplexml_load_file($link);

            foreach ($rss->channel->item as $item) {
                // Проверяем наличие ключевых слов в тексте
                $resultData = $this->is_forbidden(dom_import_simplexml($item->description)->nodeValue);
                if (empty($resultData['types_ids'])) continue;

                $news = new News();
                $news->types_ids = $resultData['types_ids'];
                $news->keywords_ids = $resultData['keywords_ids'];
                $news->title = $item->title;
                $news->content  = $item->description;
                $news->source_link  = $item->link;
                $news->date_pub  = strtotime($item->pubDate);
                $news->source_name = $name;

                if (is_object($item->enclosure->attributes)){
                    $news->img = $item->enclosure->attributes()->url;
                }

                $arrayNews[] = $news;

            }

        }
        return $arrayNews;
    }


    // Проверяем наличие ключевых слов в тексте
    public function is_forbidden($stringtocheck)
    {
        $phpmorph = new PHPMorph();

        $types = Keywords::getTypes();

        $types_ids = [];
        $keywords_ids = [];
        foreach ($types as $type){
            $keywords = Keywords::getWords($type->alias);
//            $keywords = array_map(create_function('$o', 'return mb_strtoupper($o->keyword);'), $keywords);

            foreach($keywords as $word){
                if ($this->isSimilar(mb_strtoupper($word->keyword),$stringtocheck)){
                    $types_ids[] = $type->id;
                    $keywords_ids[] = $word->id;
                    break;
                }
            }
        }

        return [
            'types_ids' => $types_ids,
            'keywords_ids' => $keywords_ids
        ];
    }

    public function isSimilar($word,$stringtocheck){
        $phpmorph = new PHPMorph();
        $root = $this->getRoot($word);
        $lemma = $phpmorph->lemmatize($word);

        /**
         * >4 потому что считаюся кавычки
         */
        if (strlen($root) > 4){
            return $this->findForRoot($root,$stringtocheck);
        }

        $base = $phpmorph->getBaseForm($word);
        $findWord = $phpmorph->findWord($word);

        $paradigms = empty($findWord) ? [] : $findWord;

        foreach ($paradigms as $p){
            $allForms = $p->getAllForms();
            foreach ($allForms as $wordForm){
                if ($this->findForRoot($wordForm, $stringtocheck)){
                    return true;
                }
            }
        }
    }

    protected function findForRoot($root,$stringtocheck){
        if (mb_stripos($stringtocheck, $root) !== FALSE) {
            return true;
        }

        return false;
    }

    protected function getRoot($word){
        $phpmorph = new PHPMorph();
        $roots = $phpmorph->getPseudoRoot([$word])[$word];

        if (count($roots) > 1)
            return $roots[1];

        return $roots[0];
    }
}