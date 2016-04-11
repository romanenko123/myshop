<?php

/**
 * categoryController.php
 * 
 * Контроллер стр категорий (/category/1)
 */

// подключаем модели
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

/**
 * Формирование стр категорий
 * 
 * @param object $link
 * @param object $smarty
 */
function indexAction($link, $smarty)
{
    $resultChildCats = null;
    $resultProducts = null;
    
    $catId = isset($_GET['id']) ? $_GET['id'] : null;
    if (! $catId) exit();
    
    $resultCategory = getCatById($link, $catId);
    
//     если главная категория то показываем дочерние категории
//     иначе показываем товар
    if ($resultCategory['parent_id'] == 0) {
        $resultChildCats = getChildrenForCat($link, $catId);
    }   else {
        $resultProducts = getProductByCatId($link, $catId);
    }
    
    $resultCategories = getAllMainCatsWithChildren($link);
    
    $smarty->assign('pageTitle', "Товары категории");
    
    $smarty->assign('resultCategory', $resultCategory);
    $smarty->assign('resultCategories', $resultCategories);
    $smarty->assign('resultChildCats', $resultChildCats);
    $smarty->assign('resultProducts', $resultProducts);
    
    loadTemplate($smarty, "header");
    loadTemplate($smarty, "category");
    loadTemplate($smarty, "footer");
}