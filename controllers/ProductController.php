<?php
 /**
  * ProductController.php
  * 
  * Контроллер стр товара (/product/1/)
  */

// подключаем модели

include_once '../models/ProductsModel.php';
include_once '../models/CategoriesModel.php';

/**
 * Формирование стр продукта
 * 
 * @param obj $link линк для бд
 * @param obj $smarty шаблонизатор
 */
function indexAction($link, $smarty)
{
    $itemId = isset($_GET['id']) ? $_GET['id'] : null;
    if ($itemId == null) exit();
    
//     получить данные продукта
    $resultProduct = getProductById($link, $itemId);
    
    $resultCategories = getAllMainCatsWithChildren($link);
    
    $smarty->assign('pageTitle', "");
    
    $smarty->assign('resultCategories', $resultCategories);
    $smarty->assign('resultProduct', $resultProduct);
    
    loadTemplate($smarty, "header");
    loadTemplate($smarty, "product");
    loadTemplate($smarty, "footer");
}