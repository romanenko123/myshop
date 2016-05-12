<?php

/**
 * Модель для таблицы пользователей (users)
 */


/**
 * Изменение данных пользователя
 * 
 * @param string $name имя пользователя
 * @param string $phone телефон
 * @param string $adress адрес
 * @param string $pwd1 новый пароль
 * @param string $pwd2 повтор нового пароля
 * @param string $curPwd текущий пароль
 * @param obj $link db
 * 
 * @return boolean true в случае успеха
 */
function updateUserData($link, $name, $phone, $adress, $pwd1, $pwd2, $curPwd)
{
    $email = htmlspecialchars(mysqli_real_escape_string($link, $_SESSION['user']['email'])); 
    $name = htmlspecialchars(mysqli_real_escape_string($link, $name)); 
    $phone = htmlspecialchars(mysqli_real_escape_string($link, $phone)); 
    $adress = htmlspecialchars(mysqli_real_escape_string($link, $adress)); 
    $pwd1 = trim($pwd1);
    $pwd2 = trim($pwd2);
    
    $newPwd = null;
    if ($pwd1 && ($pwd1 == $pwd2)) {
        $newPwd = md5($pwd1);
    }
    
    $query = "UPDATE `users` SET ";
    if ($newPwd) {
        $query .= "`pwd` = '{$newPwd}',";
    }
    $query .= "
            `name` = '{$name}',
            `phone` = '{$phone}',
            `adress` = '{$adress}' 
            WHERE 
            `email` = '{$email}' AND `pwd` = '{$curPwd}' 
            LIMIT 1
        ";
    $result = $link->query($query);
    
    return $result;
}

/**
 * Получение залогиненого пользователя
 * 
 * @param string $email
 * @param string $pwd
 * @param obj $link db
 * 
 * @return array массив данных пользователя
 */
function loginUser($link, $email, $pwd)
{
    $email = htmlspecialchars(mysqli_real_escape_string($link, $email)); 
    $pwd = md5($pwd);
   
    $query = "SELECT * FROM `users` WHERE `email` = '{$email}' AND `pwd` = '{$pwd}' LIMIT 1";
    $result = $link->query($query);
    $result = mysqli_fetch_assoc($result);
    
    if ($result) {
        $result['success'] = true;
    } else {
        $result['success'] = false;
    }
    
    return $result;
}

/**
 * Проверка адреса email
 * 
 * @param string $email
 * @return array массив - строка из табл users, либо пустой массив
 */
function checkUserEmail($link, $email)
{
    $email = mysqli_real_escape_string($link, $email);
    $query = "SELECT `id` FROM `users` WHERE `email` = '{$email}' LIMIT 1";
    $result = $link->query($query);
    $result = mysqli_fetch_assoc($result);
    
    return $result;
}

/**
 * Проверка параметров для реистрации пользователя
 * 
 * @param string $email
 * @param string $pwd1
 * @param string $pwd2
 */
function checkRegisterParams($email, $pwd1, $pwd2)
{
    $result = null;
    
    if (! $email) {
        $result['success'] = false;
        $result['message'] = "Введите email";
    }
    if (! $pwd1) {
        $result['success'] = false;
        $result['message'] = "Введите пароль";
    }
    if (! $pwd2) {
        $result['success'] = false;
        $result['message'] = "Введите повтор пароля";
    }
    if ($pwd1 != $pwd2) {
        $result['success'] = false;
        $result['message'] = "Пароли не совпадают";
    }
    
    return $result;
}

/**
 * Регистрация нового пользователя
 *
 * @param string $email            
 * @param string $pwdMD5            
 * @param string $name            
 * @param string $phone            
 * @param string $adress            
 * @return array массив данных нового пользователя
 */
function registerNewUser($link, $email, $pwdMD5, $name, $phone, $adress)
{
    $email = htmlspecialchars($link->real_escape_string($email));
    $pwdMD5 = htmlspecialchars($link->real_escape_string($pwdMD5));
    $name = htmlspecialchars($link->real_escape_string($name));
    $phone = htmlspecialchars($link->real_escape_string($phone));
    $adress = htmlspecialchars($link->real_escape_string($adress));
    
    $query = "INSERT INTO `users`(`email`, `pwd`, `name`, `phone`, `adress`) VALUES ('{$email}', '{$pwdMD5}', '{$name}', '{$phone}', '{$adress}')";
    
    $result = $link->query($query);
    
    if ($result) {
        $query = "SELECT * FROM `users` WHERE (`email` = '{$email}' AND `pwd` = '{$pwdMD5}') LIMIT 1";
        $result = $link->query($query);
        $result = mysqli_fetch_assoc($result);
        
        if (isset($result['id'])) {
            $result['success'] = true;
        } else {
            $result['success'] = false;
        }
    } else {
        $result['success'] = false;
    }
    
    return $result;
}