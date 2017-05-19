<?php
namespace application\core;

use application\core\View;

class BaseController {

    /**
     * Возвращает шаблон
     *
     * @param string $template Имя шаблона
     * @param array $params    Параметры для шаблона
     */
    public function render($template = '',$params = []){
        return View::show($template, $params);
    }

    public function is_ajax() {
        return isset($_SERVER['HTTP_X_REQUESTED_WITH'])
            && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) == 'xmlhttprequest';
    }
}