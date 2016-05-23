<?php

/**
 * cartController.php
 * 
 * Контроллер работы с корзиной (/cart/)
 */

// подключаем модели
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

/**
 * Формирование стр заказы
 * 
 * @param obj $link линк для бд
 * @param object $smarty шаблонизатор
 */
function orderAction($link, $smarty)
{
    //  получаем массив идентификаторов (ID) продуктов корзины
    $itemIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
    //  если корзина пуста то редиректим в корзину
    if (! $itemIds) {
        redirect("/cart/");
        return ;
    }
    //  получаем из массива $_POST количество покупаемых товаров
    $itemsCnt = array();
    foreach ($itemIds as $item) {
        // формируем ключ для массива POST
        $postVar = "itemCnt_".$item;
        // создаем элемент массива количества покупаемого товара
        // ключ массива - ID товара, значение массива - количество товара
        // $itemsCnt[1] = 3; товар с ID == 1 покупают 3 шт
        $itemsCnt[$item] = isset($_POST[$postVar]) ? $_POST[$postVar] : null;
    }
    $resultProducts = getProductsFromArray($link, $itemIds);
    
    // добовляем каждому продукту дополнительное поле
    // "realPrice" = количество продуктов * на цену продукта
    // "cnt" = количество покупаемого товара
    
    // &$item - для того чтобы при изменении переменной $item
    // менялся и элемент массива $resultProduct
    $i = 0;
    foreach ($resultProducts as &$item) {
        $item['cnt'] = isset($itemsCnt[$item['id']]) ? $itemsCnt[$item['id']] : 0;
        if ($item['cnt']) {
            $item['realPrice'] = $item['cnt'] * $item['price'];
        } else {
            // если вдруг получилось так что товар в корзине есть
            // а количество == 0, то удаляем этот товар
            unset($resultProducts[$i]);
        }
        $i++;
    }
    
    if (! $resultProducts) {
        echo "Корзина пуста";
        return ;
    }
    
    // полученный массив покупаемых товаров помещаем в ссесию
    $_SESSION["saleCart"] = $resultProducts;
    
    $resultCategories = getAllMainCatsWithChildren($link);
    
    // hideLoginBox переменная - флаг для того чтобы спрятать 
    // блоки логина и регистрации в боковой панели
    if (! isset($_SESSION["user"])) {
        $smarty->assign("hideLoginBox", true);
    }
    
    $smarty->assign("pageTitle", "Заказ");
    $smarty->assign("resultCategories", $resultCategories);
    $smarty->assign("resultProducts", $resultProducts);
    
    loadTemplate($smarty, "header");
    loadTemplate($smarty, "cart");
    loadTemplate($smarty, "footer");
}

/**
 * Формирование стр корзины
 * 
 * @param obj $link линк для бд
 * @param object $smarty шаблонизатор
 */
function indexAction($link, $smarty)
{
    $itemsIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
    
    $resultCategories = getAllMainCatsWithChildren($link);
    $resultProducts = getProductsFromArray($link, $itemsIds);
    
    $smarty->assign("pageTitle", "Корзина");
    $smarty->assign("resultCategories", $resultCategories);
    $smarty->assign("resultProducts", $resultProducts);
    
    loadTemplate($smarty, "header");
    loadTemplate($smarty, "cart");
    loadTemplate($smarty, "footer");
}

/**
 * Добавление продукта в корзину
 * 
 * @param integer id GET параметр - ID добавляемого продукта
 * @return json информация об операции (успех, кол-во элементов в корзине)
 */
function addtocartAction()
{
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
    if (! $itemId) return false;
    
    $resData = array();
    
    //   если значение не найдено, то добавляем
    if (isset($_SESSION['cart']) && array_search($itemId, $_SESSION['cart']) === false) {
        $_SESSION['cart'][] = $itemId;
        $resData['cntItems'] = count($_SESSION['cart']);
        $resData['success'] = 1;
    } else {
        $resData['success'] = 0;
    }
    
    echo  json_encode($resData);
}

/**
 * Удаление продукта из корзины
 * 
 * @param integer id GET параметр - ID добавляемого продукта
 * @return json информация об операции (успех, кол-во элементов в корзине)
 */
function removefromcartAction()
{
    $itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
    if (! $itemId) return false;
    
    $resData = array();
    $key = array_search($itemId, $_SESSION['cart']);
    if ($key !== false) {
        unset($_SESSION['cart'][$key]);
        $resData['success'] = true;
        $resData['cntItems'] = count($_SESSION['cart']);
    } else {
        $resData['success'] = false;
    }
    echo  json_encode($resData);
}
