<?php

/**
 * Контроллер стр товара (/product/1/)
 */

// подключаем модели
include_once '../models/ProductsModel.php';
include_once '../models/CategoriesModel.php';

/**
 * Формирование стр продукта
 * 
 * @param object $smarty шаблонизатор
 */
function indexAction($smarty){
    $item = isset($_GET['id']) ? $_GET['id'] : null;
    if ($item == null) exit();
    
    // получить данные продукта
    $rsProduct = getProductById($item);
    
    // получить все категории
    
    $rsCategories = getAllMainCatsWithChildren();
    
    $smarty->assign('itemInCart', 0);
    if (in_array($item, $_SESSION['cart'])) {
        $smarty->assign('itemInCart', 1);
    }
    
    $smarty->assign('pageTitle', '');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProduct', $rsProduct);
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'product');
    loadTemplate($smarty, 'footer');
}