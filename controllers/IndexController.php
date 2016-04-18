<?php
/**
 * Контроллер главной стр
 */

include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

function testAction()
{
    echo "это tect action from index controller";
}


/**
 * Формирование главной стр сайта
 * 
 * @param obj $link линк для бд
 * @param object $smarty шаблонизатор
 */
function indexAction($link, $smarty)
{
    $resultCategories = getAllMainCatsWithChildren($link);
    $resultProducts = getLastProducts($link, 16);
    
    $smarty->assign('pageTitle', "Главная стр сайта");
    $smarty->assign('resultCategories', $resultCategories);
    $smarty->assign('resultProducts', $resultProducts);
    
    loadTemplate($smarty, "header");
    loadTemplate($smarty, "index");
    loadTemplate($smarty, "footer");
}