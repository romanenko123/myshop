<?php

/**
 * Модель для таблицы категорий (categories)
 */

/**
 * Получить данные категории по Id
 * 
 * @param integer $catId Id категории
 * @return array массив - строка категории
 */
function getCatById($link, $catId)
{
    $catId = intval($catId);
    
    $query = "SELECT * FROM `categories` WHERE `id` = '{$catId}'";
    
    $result = $link->query($query);
    
    return (mysqli_fetch_assoc($result));
}

/**
 * Получить дочерние категории по parent_id ($catId)
 * 
 * @param integer $catId ID категории
 * @return array массив дочерних категорий
 */
function getChildrenForCat(mysqli $link, $catId = 0)
{
    $query = "SELECT * FROM `categories` WHERE `parent_id` = '{$catId}'";
    
    $result = $link->query($query);
    
    return (getArrResultFromDB($result));
}

/**
 * Получить главные категории с привязками дочерних
 * 
 * @param mysqli $link
 * @return array массив категорий
 */
function getAllMainCatsWithChildren($link)
{
    $result = getChildrenForCat($link);
    foreach ($result as &$item){
        $item['children'] = getChildrenForCat($link, $item['id']);
    }
    
    return $result;
}

