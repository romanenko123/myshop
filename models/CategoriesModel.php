<?php

/**
 * Модель для таблицы категорий (categories)
 */

function getAllMainCatsWithChildren(mysqli $link)
{
    $query = "SELECT * FROM `categories` WHERE `parent_id` = 0";
    
    $result = $link->query($query);
    
    $smartyResult = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $smartyResult[] = $row;
    }
    
    return $smartyResult;
}