<?php

/**
 * Инициализация подключения к БД
 */

$dblocation = "127.0.0.1";
$dbname = "myshop";
$dbuser = "root";
$dbpasswd = "";

// соединяемся с БД
$link = mysqli_connect($dblocation, $dbuser, $dbpasswd, $dbname);
$link->set_charset("utf8");
// print "<pre>";
// print_r($link);
// print "</pre>";

if (!$link) {
    echo "Error: Unable to connect to MySQL." . PHP_EOL;
    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
    exit;
}



