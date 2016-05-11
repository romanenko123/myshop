<?php

/**
 * Основные функции
 */

/**
 * редирект
 * @param string $url адресс для перенаправления
 */
function redirect($url)
{
    if (! $url) {
        $url = "/";
    }
    header("Location: {$url}");
    exit();
}

/**
 * Преобразование результата работы выборки в ассоциативный массив
 * @param unknown $result
 * @return array
 */
function getArrResultFromDB($result)
{
    if (! $result) return false;

    $arrResult = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $arrResult[] = $row;
    }

    return $arrResult;
}

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

function loadPage($link, $smarty, $controllerName, $actionName = "index")
{
    // подключаем нужный контроллер
    include_once PathPrefix . $controllerName . PathPostfix;

    // формируем название необходимой функции
    $function = $actionName . "Action";

    // выполняем нашу функцию
    $function($link, $smarty);
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