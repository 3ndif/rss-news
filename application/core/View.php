<?php
namespace application\core;

class View {

    public static $main = __DIR__ . '/../../application/views/main.php';

    /**
     * Возвращает шаблон
     *
     * @param string $template Имя шаблона
     * @param array $params    Параметры для шаблона
     */
    public static function show($template = '',$params = []){

        if(is_array($params)) {
            // преобразуем элементы массива в переменные
            extract($params);
        }

        ob_start();
        include (__DIR__ . '/../../application/views/'.$template.'.php');
        $content = ob_get_clean();

        return include self::$main;
    }
}