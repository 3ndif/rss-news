<?php
namespace application\models;

class RssGraber {

    protected $rssLinks = [
//        'https://lenta.ru/rss/news',
//        'https://www.vedomosti.ru/rss/news',
        'https://tvrain.ru/export/rss/all.xml',
    ];

    public function get(){

        $arrayNews = [];
        foreach ($this->rssLinks as $link){
            $rss = simplexml_load_file($link);
//            var_dump($rss->channel);die;
            foreach ($rss->channel->item as $item) {

                // Проверяем наличие ключевых слов в тексте
                $types_ids = $this->is_forbidden(dom_import_simplexml($item->description)->nodeValue);
                if (empty($types_ids)) continue;

                $news = new News();
                $news->types_ids = $types_ids;
                $news->title = $item->title;
                $news->content  = $item->description;
                $news->source_link  = $item->link;
                $news->date_pub  = strtotime($item->pubDate);

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
        foreach ($types as $type){
            $keywords = Keywords::getWords($type->alias);
            $keywords = array_map(create_function('$o', 'return mb_strtoupper($o->keyword);'), $keywords);

            $forbiddenWords = $phpmorph->getPseudoRoot($keywords);

//            foreach ($keywords as $keyword){
////                $fw = $phpmorph->findWord($keyword);
//                foreach ($phpmorph->findWord($keyword) as $p){
//                    var_dump($p->getAllForms());
//                }
//                var_dump($phpmorph->getBaseForm($keyword));
//                var_dump($phpmorph->lemmatize($keyword,\phpMorphy::NORMAL));
//            }
//            die;
            foreach($keywords as $word){
                if ($this->isSimilar($word,$stringtocheck)){
                    $types_ids[] = $type->id;
                    break;
                }
            }

//            foreach ($forbiddenWords as $value) {
//                if (strlen($value[0]) <= 2) continue;
//                if (mb_stripos($stringtocheck, $value[0]) !== FALSE) {
//                    $types_ids[] = $type->id;
//                    break;
//                }
//            }
        }

        return $types_ids;
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
        $paradigms = $phpmorph->findWord($word);

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
//            var_dump(mb_substr($stringtocheck, 0, mb_stripos($stringtocheck, $root)));
//            var_dump(mb_stripos($stringtocheck, $root));die();
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