<?php
namespace application\controllers;

use application\core\BaseController;
use application\models\News;
use application\models\Keywords;

class IndexController extends BaseController {

    public function actionIndex(){
        $rssNews = (new News())->getAllNews();
        return $this->render('index',[
            'rssNews' => $rssNews
        ]);
    }

    public function actionEducation(){
        $rssNews = (new News())->getAliasNews(Keywords::EDUCATION_KEYWORDS_ALIAS);
        return $this->render('index',[
            'rssNews' => $rssNews
        ]);
    }

    public function actionRegion(){
        $rssNews = (new News())->getAliasNews(Keywords::REGION_KEYWORDS_ALIAS);
        return $this->render('index',[
            'rssNews' => $rssNews
        ]);
    }

    public function actionSettings(){
        $mainkeywords = Keywords::getWords();
        $regionkeywords = Keywords::getWords(Keywords::REGION_KEYWORDS_ALIAS);
        $educationKeywords = Keywords::getWords(Keywords::EDUCATION_KEYWORDS_ALIAS);

        return $this->render('settings',[
            'mainKeywords' => $mainkeywords,
            'regionKeywords' => $regionkeywords,
            'educationKeywords' => $educationKeywords,
        ]);
    }

    public function actionError404(){
        return $this->render('404');
    }

    public function actionDelete(){
        if (!$this->is_ajax()) return false;

        $keyword = new \application\models\Keywords();
        $keyword->delete($_POST['ids']);
    }

    public function actionKeywordappend(){
        if (!$this->is_ajax()) return false;

        $keyword = new \application\models\Keywords();
        $keyword->types_id = $_POST['types_id'];
        $keyword->keyword = $_POST['keyword'];
        $keyword = $keyword->append();

        echo json_encode([
            'id' => $keyword->lastInsertId()
        ]);
    }
}