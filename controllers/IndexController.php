<?php
/**
 * Контроллер главной стр
 */

function testAction()
{
    echo "это tect action from index controller";
}

/**
 * Формирование главной стр сайта
 * 
 * @param object $smarty шаблонизатор
 */
function indexAction($smarty)
{
    $smarty->assign('pageTitle', "Главная стр сайта");
    
    loadTemplate($smarty, "header");
    loadTemplate($smarty, "index");
    loadTemplate($smarty, "footer");
}