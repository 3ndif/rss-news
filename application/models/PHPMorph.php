<?php
namespace application\models;

class PHPMorph extends \phpMorphy{

    // Укажите путь к каталогу со словарями
    protected $dir = 'vendor/phpmorphy-0.3.7/dicts';

    /* Укажите, для какого языка будем использовать словарь.
       Язык указывается как ISO3166 код страны и ISO639 код языка,
       разделенные символом подчеркивания (ru_RU, uk_UA, en_EN, de_DE и т.п.)
    */
    protected $lang = 'ru_RU';

    /**
     * options
     */
    protected $opts = [
                'storage' => PHPMORPHY_STORAGE_FILE,
            ];

    /**
     * готовыый объект phpmorph
     */
    private $instance = null;

    public function __construct(){
        parent::__construct($this->dir, $this->lang, $this->opts);
    }
}