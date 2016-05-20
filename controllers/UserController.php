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


/**
 * 
 * @param obj $link линк для бд
 * @param object $smarty шаблонизатор
 * @return json response
 */
function updateAction($link, $smarty)
{
//     если пользователь не залогинен то перенаправление на homepage
    if (! isset($_SESSION['user'])) {
        redirect("/");
    }
    $resultData = array();
    $phone = isset($_REQUEST['phone']) ? $_REQUEST['phone'] : null;
    $adress = isset($_REQUEST['adress']) ? $_REQUEST['adress'] : null;
    $name = isset($_REQUEST['name']) ? $_REQUEST['name'] : null;
    $pwd1 = isset($_REQUEST['pwd1']) ? $_REQUEST['pwd1'] : null;
    $pwd2 = isset($_REQUEST['pwd2']) ? $_REQUEST['pwd2'] : null;
    $curPwd = isset($_REQUEST['curPwd']) ? $_REQUEST['curPwd'] : null;
    
    // проверка правильности ввода пароля
    $curPwdMD5 = md5($curPwd);
    if (! $curPwd || ($_SESSION['user']['pwd'] != $curPwdMD5)) {
        $resultData['success'] = false;
        $resultData['message'] = "Текущий пароль не верный";
        echo json_encode($resultData);
        return false;
    }
    
    // обновление данных пользователя
    $result = updateUserData($link, $name, $phone, $adress, $pwd1, $pwd2, $curPwdMD5);
    if ($result) {
        $resultData['success'] = true;
        $resultData['message'] = "Данные сохранены";
        $resultData['name'] = $name;
        
        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['phone'] = $phone;
        $_SESSION['user']['adress'] = $adress;
        $newPwd = $_SESSION['user']['pwd'];
        if ($pwd1 && ($pwd1 === $pwd2)) {
            $newPwd = md5(trim($pwd1));
        }
        $_SESSION['user']['pwd'] = $newPwd;
    } else {
        $resultData['success'] = false;        
        $resultData['message'] = "Ошибка сохранения данных";        
    }
    echo json_encode($resultData);
} 


/**
 * отображение стр пользователя
 * 
 * @param obj $link линк для бд
 * @param object $smarty шаблонизатор
 */
function indexAction($link, $smarty)
{
    // если пользователь не залогинен то редирект на стартовую стр
    if (! isset($_SESSION['user'])) {
        redirect("/");
    }
    
    $resultCategories = getAllMainCatsWithChildren($link);
    
    $smarty->assign("pageTitle", "Страница пользователя");
    $smarty->assign("resultCategories", $resultCategories);
    
    loadTemplate($smarty, "header");
    loadTemplate($smarty, "user");
    loadTemplate($smarty, "footer");
}

/**
 * AJAX авторизация пользователя
 *
 * @param object $link обьект db
 *            
 * @return json массив данных залогиненого пользователя
 */
function loginAction($link)
{
    $email = isset($_REQUEST['loginEmail']) ? $_REQUEST['loginEmail'] : null;
    $email = trim($email);
    
    $pwd = isset($_REQUEST['loginPwd']) ? $_REQUEST['loginPwd'] : null;
    $pwd = trim($pwd);
    
    $userData = loginUser($link, $email, $pwd);
    
    if ($userData['success']) {
        if (strlen($userData['name']) === 0) {
            $userData['name'] = $userData['email'];
        } 
        $_SESSION['user'] = $userData;
    } else {
        $userData['message'] = "Проверьте правильность ввода email и пароль";
    }
    
    echo json_encode($userData);
}

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
            
            if (strlen($userData['name']) === 0) {
                $userData['name'] = $userData['email'];
            } 
            
            $_SESSION['user'] = $userData;
            $userData['message'] = "Пользователь успешно зарегистрирован";
            
        } else {
            $userData['message'] = "Ошибка регистрации";
        }
    }
    
    echo json_encode($userData);
}