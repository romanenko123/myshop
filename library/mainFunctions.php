<?php

/**
 * 
 * Основные функции
 * 
 */

function redirect($url){
    if (! $url) $url = '/';
    header("Location: {$url}");
    exit;
}

/**
 * Формирование запрашиваемой страницы
 * 
 * @param string $controllerName название контроллера
 * @param string $actionName название функции обработки страницы
 */
function loadPage($smarty, $controllerName, $actionName = 'index'){
    
    // подключаем контроллер
    include_once PathPrefix . $controllerName . PathPostfix;

    // формируем название функции
    $function = $actionName . "Action";

    $function($smarty);

}

/**
 * Загрузка шаблона
 * 
 * @param object $smarty объект шаблонизатора
 * @param string $templateName название файла шаблона
 */
function loadTemplate($smarty, $templateName) {
    $smarty->display($templateName . TemplatePostfix);
}


/**
 * Функция отладки. Останавливает работу программы выводя значение переменной.
 * $value
 * 
 * @param variant $value переменная для вывода ее на стр
 * @param number $die если второй параметр 0 то скрипт не остановиться
 */
function d($value = NULL, $die = 1){
    echo 'Debug: <br /><pre>';
    print_r($value);
    echo '</pre>';
    
    if ($die) die;
}

/**
 * Преобразование результата работы функции выборки в асоц массив
 * 
 * @param recordset $rs набор строк - результат работы SELECT
 * @return array
 */
function createSmartyRsArray($rs){
    if (! $rs) return false;
    
    $smartyRs = array();
    while ($row = mysql_fetch_assoc($rs)) {
        $smartyRs[] = $row;
    }
    
    return $smartyRs;
}