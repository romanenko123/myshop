<?php
session_start(); // старт сесси

// если в сессии нет масива корзины то создаем его
if (! isset($_SESSION['cart'])) {
    $_SESSION['cart'] = array();
}

include_once '../config/config.php'; // Инициализация настроек
include_once '../config/db.php'; // Инициализация базы данных
include_once '../library/mainFunction.php'; // Основные функции

// определяем необходимый контроллер
$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : "Index";

// определяем необходимое действие
$actionName = isset($_GET['action']) ? $_GET['action'] : "index";

// усли в сессии есть данные об авторизированном пользователе, то передаем их в шаблон
if (isset($_SESSION['user'])) {
    $smarty->assign('arUser', $_SESSION['user']);
}

$smarty->assign('cartCntItems', count($_SESSION['cart']));

loadPage($link, $smarty, $controllerName, $actionName);

