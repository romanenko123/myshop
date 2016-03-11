<?php

/**
 * Модель для таблицы продуктов (products)
 */

/**
 * Получаем последние добавленные товары
 * 
 * @param integer $limit Лимит вывода товаров
 * @return array Массив товаров
 */
function getLastProducts($limit){
    $sql = "SELECT * FROM `products` ORDER BY `id` DESC";
    
    if ($limit) {
        $sql .=" LIMIT $limit";
    }
    
    $rs = mysql_query($sql);
    
    return createSmartyRsArray($rs);
}

/**
 * Получить продукты для категории $itemId
 * 
 * @param integer $itemId ID категории
 * @return array массив продуктов
 */
function getProductsByCat($itemId){
    $itemId = intval($itemId);
    $sql = "SELECT * FROM `products` WHERE `category_id` = '{$itemId}'";
    
    $rs = mysql_query($sql);
    
    return createSmartyRsArray($rs);
}

/**
 * Получить данные продукта по id
 * 
 * @param integer $item id продукта
 * @return array массив данных продукта
 */
function getProductById($item){
    $item = intval($item);
    $sql = "SELECT * FROM `products` WHERE `id` = $item";
    
    $rs = mysql_query($sql);
    return mysql_fetch_assoc($rs);
}

/**
 * Получить список продуктов из массива индентификаторов (ID's)
 * 
 * @param array $itemsIds массив индентификаторов продуктов
 * @return array массив данных продуктов
 */
function getProductsFromArray($itemsIds){
    $strIds = implode($itemsIds, ', ');
    $sql = "SELECT * FROM `products` WHERE `id` IN ($strIds)";
    $rs = mysql_query($sql);
    
    return createSmartyRsArray($rs);
}