<?php

/**
 * Модель для таблицы продукции (products)
 */

/**
 * Получить продукты для массива id-шников ($itemsIds)
 * 
 * @param object $link
 * @param array $itemsIds itemsIds продуктов
 * @return array массив продуктов
 */
function getProductsFromArray($link, $itemsIds)
{
    $strIds = implode($itemsIds, ', ');
    
    $query = "SELECT * FROM `products` WHERE `id` IN ({$strIds})";
    
    $result = $link->query($query);
    
    return (getArrResultFromDB($result));
    
}

/**
 * Получить продукты для категории $itemId
 * 
 * @param object $link
 * @param integer $catId Id категории
 * @return array массив продуктов
 */
function getProductByCatId($link, $catId)
{
    $catId = intval($catId);
    
    $query = "SELECT * FROM `products` WHERE `category_id` = '{$catId}'";
    
    $result = $link->query($query);
    
    return (getArrResultFromDB($result));
}

/**
 * Получить продукт по id $itemId
 * 
 * @param object $link
 * @param integer $itemId Id продукта
 * @return array массив данных продукта
 */
function getProductById($link, $itemId)
{
    $itemId = intval($itemId);
    
    $query = "SELECT * FROM `products` WHERE `id` = '{$itemId}'";
    
    $result = $link->query($query);
    
    return (mysqli_fetch_assoc($result));
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