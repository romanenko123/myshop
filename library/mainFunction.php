<?php

/**
 * Основные функции
 */

/**
 * Формирование запрашиваемой стр
 * 
 * @param string $controllerName название контроллера
 * @param string $actionName название акшина обработки стр
 */

function loadPage($controllerName, $actionName = "index")
{
    // подключаем нужный контроллер
    include_once PathPrefix . $controllerName . PathPostfix;

    // формируем название необходимой функции
    $function = $actionName . "Action";

    // выполняем нашу функцию
    $function();
}