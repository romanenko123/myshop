<?php

/**
 * Модель для таблицы продукции (products)
 */

/**
 * Получить продукты для категории $itemId
 * 
 * @param object $link
 * @param integer $catId Id категории
 * @return array массив продуктов
 */
function getProductById($link, $catId)
{
    $catId = intval($catId);
    
    $query = "SELECT * FROM `products` WHERE `category_id` = '{$catId}'";
    
    $result = $link->query($query);
    
    return (getArrResultFromDB($result));
}

/**
 * Получаем последние добавленые товары
 *
 * @param integer $limit
 *            Лимит товаров
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