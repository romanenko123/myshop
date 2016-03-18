<?php

/**
 * Контроллер работы с корзиной (/cart/)
 */

// подключаем модули
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

/**
 * Формирование стр заказа
 * 
 * @param unknown $smarty
 */
function orderAction($smarty){
    // получаем массив индетификаторов (ID) продуктов корзины
    $itemsIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
    // если корзина пуста то редирект в корзину
    if (! $itemsIds) {
        redirect('/cart/');
        return ;
    }
    
    $itemsCnt = array();
    foreach ($itemsIds as $item){
        // формируем ключ для массива POST
        $postVar = 'itemCnt_' . $item;
        // создаем элемент массива количества покупаемого товара
        // ключ массива - ID товара, значение массива - количество товара
        // $itemCnt[1] = 3; товар с ID == 1 покупают 3 шт
        $itemsCnt[$item] = isset($_POST[$postVar]) ? $_POST[$postVar] : null;
    }
//      d($itemsCnt, 1);
    
    // получаем список продуктов по массиву корзины
    $rsProducts  = getProductsFromArray($itemsIds);
    
    // добовляем каждому продукту дополнительное поле
    // "realPrice = количество продуктов * на цену продукта"
    // "cnt" = количество покупаемого товара
    // &$item - для того чтобы при изменении переменной $item
    // менялся и элемент массива $rsProducts
    $i = 0;
    foreach ($rsProducts as &$item){
        $item['cnt'] = isset($itemsCnt[$item['id']]) ? $itemsCnt[$item['id']] : 0;
        if ($item['cnt']) {
            $item['realPrice'] = $item['cnt'] * $item['price'];
        } else {
            // если вдруг получилось так что товар в корзине есть, а количество == 0
            // то удаляем этот товар
            unset($rsProducts[$i]);
        }
        $i++;
    }
    
    if (! $rsProducts) {
        echo "Корзина пуста";
        return ;
    }
    
    $_SESSION['saleCart'] = $rsProducts;
    
    $rsCategories = getAllMainCatsWithChildren();
    
    // hideLoginBox переменная - флаг для того чтобы спрятать блоки логина и аавторизаци
    // в боковой панели
    if (! isset($_SESSION['user'])) {
        $smarty->assign('hideLoginBox', 1);
    }
    
    $smarty->assign('pageTitle', 'Заказ');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'order');
    loadTemplate($smarty, 'footer');
    
}

/**
 * Добавление продукта в корзину
 * 
 * @param integer id Get параметр - ID добавление продукта
 * @return json информация об операции (успех, кол-во элементов в корзине)
 */
function addtocartAction(){
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
    if (! $itemId) return false;
    
    $resData = array();
    
    // если значение не найдено, то добавляем
    if (isset($_SESSION['cart']) && array_search($itemId, $_SESSION['cart']) === false) {
        $_SESSION['cart'][] = $itemId;
        $resData['cntItems'] = count($_SESSION['cart']);
        $resData['success'] = 1;
    } else {
        $resData['success'] = 0;
    }
    
    echo json_encode($resData);
}

/**
 * Удаление продукта из корзины
 * 
 * @param integer id Get параметр - ID удаляемого продукта
 * @return json информация об операции (успех, кол-во элементов в корзине)
 */
function removefromcartAction(){
    $item = isset($_GET['id']) ? intval($_GET['id']) : null;
    if (! $item) exit();
    $resData = array();
    $key = array_search($item, $_SESSION['cart']);
    if ($key !== false) {
        unset($_SESSION['cart'][$key]);
        $resData['success'] = 1;
        $resData['cntItems'] = count($_SESSION['cart']);
    } else {
        $resData['success'] = 0;
    }
    
    echo json_encode($resData);
}


function indexAction($smarty){
    $itemIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
    
    $rsCategories = getAllMainCatsWithChildren();
    $rsProducts = getProductsFromArray($itemIds);
    
    $smarty->assign('pageTitle', 'Корзина');
    $smarty->assign('rsCategories', $rsCategories);
    $smarty->assign('rsProducts', $rsProducts);
    
    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'cart');
    loadTemplate($smarty, 'footer');
}