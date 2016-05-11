<?php
/**
 * UserController.php
 *
 * Контроллер пользователей ()
 */

// подключаем модели
include_once '../models/CategoriesModel.php';
// include_once '../models/ProductsModel.php';
include_once '../models/UsersModel.php';

// function indexAction($link)
// {
// checkUserEmail($link, "email@com.ua");
// }

/**
 * разлогиневание пользователя
 */
function logoutAction()
{
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
        unset($_SESSION['cart']);
    }
    
    redirect('/');
}

/**
 * AJAX регистрация пользователя
 * Инициализация сессионной переменной ($_SESSION['user'])
 *
 * @param object $link
 *            for db
 * @return json массив данных нового пользователя
 */
function registerAction($link)
{
    $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : null;
    $email = trim($email);
    $pwd1 = isset($_REQUEST['pwd1']) ? $_REQUEST['pwd1'] : null;
    $pwd2 = isset($_REQUEST['pwd2']) ? $_REQUEST['pwd2'] : null;
    $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
    $adress = isset($_REQUEST['adress']) ? $_REQUEST['adress'] : null;
    $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
    $name = trim($name);
    
    $resultData = null;
    $resultData = checkRegisterParams($email, $pwd1, $pwd2);
    
    if (! $resultData && checkUserEmail($link, $email)) {
        $resultData['success'] = false;
        $resultData['message'] = "Пользователь с таким email ('{$email}') уже зарегистрирован";
    }
    
    if (! $resultData) {
        $pwdMD5 = md5($pwd1);
        
        $userData = registerNewUser($link, $email, $pwdMD5, $name, $phone, $adress);
        if ($userData['success']) {
            $resultData['message'] = "Пользователь успешно зарегистрирован";
            $resultData['success'] = true;
            
            $resultData['userName'] = $userData['name'] ? $userData['name'] : $userData['email'];
            $resultData['userEmail'] = $userData['email'];
            
            $_SESSION['user'] = $userData;
            $_SESSION['user']['displayName'] = $userData['name'] ? $userData['name'] : $userData['email'];
        } else {
            $resultData['success'] = false;
            $resultData['message'] = "Ошибка регистрации";
        }
    }
    
    echo json_encode($resultData);
}