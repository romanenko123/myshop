<?php

include_once '../config/config.php'; // Инициализация настроек
include_once '../config/db.php'; // Инициализация базы данных
include_once '../library/mainFunction.php'; // Основные функции

// определяем необходимый контроллер
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : "Index";

// определяем необходимое действие
$actionName = isset($_GET['action']) ? $_GET['action'] : "index";

loadPage($link, $smarty, $controllerName, $actionName);

