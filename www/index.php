<?php

include_once '../config/config.php';
include_once '../library/mainFunction.php';

// определяем необходимый контроллер
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : "Index";

// определяем необходимое действие
$actionName = isset($_GET['action']) ? $_GET['action'] : "index";

loadPage($controllerName, $actionName);

