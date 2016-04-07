<?php
/**
 * Модель для таблицы продукции (products)
 */

/**
 * Получаем последние добавленые товары
 * 
 * @param integer $limit Лимит товаров
 * @return array Массив товаров
 */
 function getLastProducts($link, $limit = NULL)
 {
     $query = "SELECT * FROM `products` ORDER BY `id` DESC";
     if ($limit) {
         $query .= " LIMIT {$limit}";
     }
     
     $result = $link->query($query);
     
     return (getArrResultFromDB($result));
     
 }