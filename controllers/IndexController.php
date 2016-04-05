<?php
/**
 * Контроллер главной стр
 */

include_once '../models/CategoriesModel.php';

function testAction()
{
    echo "это tect action from index controller";
}


/**
 * Формирование главной стр сайта
 * 
 * @param object $smarty шаблонизатор
 */
function indexAction($link, $smarty)
{
    $resultCategories = getAllMainCatsWithChildren($link);
    
    $smarty->assign('pageTitle', "Главная стр сайта");
    $smarty->assign('resultCategories', $resultCategories);
    
    loadTemplate($smarty, "header");
    loadTemplate($smarty, "index");
    loadTemplate($smarty, "footer");
}