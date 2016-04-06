<?php

/**
 * Модель для таблицы категорий (categories)
 */


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

