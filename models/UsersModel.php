<?php

/**
 * Модель для таблицы пользователей (users)
 */

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