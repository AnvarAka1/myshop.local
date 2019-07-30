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
    $name = isset($name) ? trim($name) : null;

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
            // d($userData);
            $resData['message'] = "Пользователь успешно зарегистрирован";
            $resData['success'] = 1;
            $userData = $userData[0];

            $resData['userName'] = $userData['name'] ?? $userData['email'];
            $resData['userEmail'] = $email;

            $_SESSION['user'] = $userData;
            $_SESSION['user']['displayName'] = $userData['name'] ?? $userData['email'];
        } else {
            $resData['success'] = 0;
            $resData['message'] = "Ошибка регистрации";
        }
    }
    echo json_encode($resData);
}
function logoutAction()
{
    if (isset($_SESSION['user'])) {
        unset($_SESSION['user']);
        unset($_SESSION['cart']);
    }
    redirect('/');
}
function loginAction($smarty, $pdo)
{

    $email = $_REQUEST['email'] ?? null;
    $email = trim($email);

    $pwd = $_REQUEST['pwd'] ?? null;
    $pwd = trim($pwd);
    // d($email . " " . $pwd);
    $userData = loginUser($pdo, $email, $pwd);
    if ($userData['success']) {
        $userData = $userData[0];
        $_SESSION['user'] = $userData;
        $_SESSION['user']['displayName'] = empty($userData['name']) ? $userData['name'] : $userData['email'];
        // d($_SESSION['user']);
        $resData = $_SESSION['user'];
        $resData['success'] = 1;
    } else {
        $resData['success'] = 0;
        $resData['message'] = "Неверный логин или пароль";
    }
    echo json_encode($resData);
}

function indexAction($smarty, $pdo)
{
    if (!$_SESSION['user']) {
        redirect("/");
    }
    $rsCategories = getAllMainCatsWithChildren($pdo);

    $smarty->assign('pageTitle', 'Страница пользователя');
    $smarty->assign('rsCategories', $rsCategories);

    loadTemplate($smarty, 'header');
    loadTemplate($smarty, 'user');
    loadTemplate($smarty, 'footer');
}


// update user info
// ajax
function updateAction($smarty, $pdo)
{
    if (!isset($_SESSION['user'])) {
        redirect('/');
    }

    $resData = [];
    $name = $_REQUEST['name'] ?? null;
    $phone = $_REQUEST['phone'] ?? null;
    $address = $_REQUEST['address'] ?? null;
    $pwd1 = $_REQUEST['pwd1'] ?? null;
    $pwd2 = $_REQUEST['pwd2'] ?? null;
    $curPwd = $_REQUEST['curPwd'] ?? null;

    $curPwdMD5 = md5($curPwd);
    if (!$curPwd || ($curPwdMD5 != $_SESSION['user']['pwd'])) {
        $resData['success'] = 0;
        $resData['message'] = "Текущий пароль неверный!";
        echo json_encode($resData);
        return false;
    }

    $res = updateUserData($pdo, $name, $phone, $address, $pwd1, $pwd2, $curPwdMD5);
    // d("result = ", $res);
    if ($res) {
        $resData['success'] = 1;
        $resData['message'] = 'Данные сохранены';
        $resData['userName'] = $name;

        $_SESSION['user']['name'] = $name;
        $_SESSION['user']['phone'] = $phone;
        $_SESSION['user']['address'] = $address;

        $newPwd = $_SESSION['user']['pwd'];
        if ($pwd1 && $pwd1 == $pwd2) {
            $newPwd = md5(trim($pwd1));
        }
        $_SESSION['user']['pwd'] = $newPwd;
        $_SESSION['user']['displayName'] = !empty($name) ? $name : $_SESSION['user']['email'];
    } else {
        $resData['success'] = 0;
        $resData['message'] = "Ошибка сохранения данных";
    }
    echo json_encode($resData);
}
