<?php

function loadPage($controllerName, $actionName = "index")
{
    // подключаем нужный контроллер
    include_once PathPrefix . $controllerName . PathPostfix;

    // формируем название необходимой функции
    $function = $actionName . "Action";

    // выполняем нашу функцию
    $function();
}