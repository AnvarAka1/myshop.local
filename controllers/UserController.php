<?php

include_once('../models/CategoriesModel.php');
include_once('../models/UsersModel.php');

function registerAction($smarty, $pdo)
{
    $email = $_REQUEST['email'] ?? null;
    $email = trim($email);

    $pwd1 = $_REQUEST['pwd1'] ?? null;
    $pwd2 = $_REQUEST['pwd2'] ?? null;

    $phone = $_REQUEST['phone'] ?? null;
    $address = $_REQUEST['address'] ?? null;
    $name = $_REQUEST['name'] ?? null;
    $name = trim($name);


    $resData = null;
    // if resData = null => no error
    // else something is missing
    $resData = checkRegisterParams($email, $pwd1, $pwd2);

    if (!$resData && checkUserEmail($pdo, $email)) {
        $resData['success'] = false;
        $resData['message'] = "Пользователь с таким email('{$email}') уже зарегистрирован";
    }
    if (!$resData) {
        $pwdMD5 = md5($pwd1);
        $userData = registerNewUser($pdo, $email, $pwdMD5, $name, $phone, $address);
        if ($userData['success']) {
            $resData['message'] = "Пользователь успешно зарегистрирован";
            $resData['success'] = 1;
            $userData = $userData[0];
            $resData['userName'] = $userData['user'] ?? $userData['email'];
            $resData['userEmail'] = $email;

            $_SESSION['user'] = $userData;
            $_SESSION['user']['displayName'] = $userData['user'] ?? $userData['email'];
        } else {
            $resData['success'] = 0;
            $resData['message'] = "Ошибка регистрации";
        }
    }
    echo json_encode($resData);
}
