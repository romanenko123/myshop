<?php

/**
 * 
 *  Контроллер главной страницы
 *  
 */

function testAction() {
    echo "IndexController.php > testAction";
}

/**
 * 
 * Формирование главной стр сайта
 * 
 * @param object $smarty шаблонизатор
 */
function indexAction($smarty){
    $smarty->assign('pageTitle', 'Главная стр сайта!');
    
    loadTemplate($smarty, 'index');
}