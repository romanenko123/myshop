<?php

/**
 * Основные функции
 */

/**
 * Функция отладки. Останавливает значение прграммы выводя значение переменной
 * 
 * @param unknown $value
 * @param number $die
 */
function d($value, $die = 1)
{
    echo 'Debug: <br /><pre>';
    print_r($value);
    echo '</pre>';
    
    if ($die) die();
}

/**
 * Формирование запрашиваемой стр
 * 
 * @param string $controllerName название контроллера
 * @param string $actionName название акшина обработки стр
 */

function loadPage($smarty, $controllerName, $actionName = "index")
{
    // подключаем нужный контроллер
    include_once PathPrefix . $controllerName . PathPostfix;

    // формируем название необходимой функции
    $function = $actionName . "Action";

    // выполняем нашу функцию
    $function($smarty);
}

/**
 * Загрузка шаблона
 * 
 * @param object $smarty объект шаблонизатора
 * @param string $templateName название файла шаблона
 */
function loadTemplate($smarty, $templateName)
{
    $smarty->display($templateName. TemplatePostfix);
}