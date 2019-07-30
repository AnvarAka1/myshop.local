<?php
function registerNewUser($pdo, $email, $pwdMD5, $name, $phone, $address)
{
    // $email = htmlspecialchars($pdo->quote($email));
    // $name = htmlspecialchars($pdo->quote($name));
    // $phone = htmlspecialchars($pdo->quote($phone));
    // $address = htmlspecialchars($pdo->quote($address));

    // to prevent sql injections use this type of sql statements with placeholders
    // whenever you have user typed values
    $sql = "INSERT INTO `users` (`email`, `pwd`, `name`, `phone`, `address`) VALUES (?,?,?,?,?)";
    $rs = $pdo->prepare($sql);
    $rs->execute([$email, $pwdMD5, $name, $phone, $address]);
    // $rs->execute();

    if ($rs) {
        $sql = "SELECT * FROM `users` WHERE (`email` = ? and `pwd` = ?) LIMIT 1";
        $rs = prepareCreateSmartyRsArray($pdo, $sql, [$email, $pwdMD5]);

        if (isset($rs[0])) {
            $rs['success'] = 1;
        } else {
            $rs['success'] = 0;
        }
    } else {
        $rs['success'] = 0;
    }
    return $rs;
}


function checkRegisterParams($email, $pwd1, $pwd2)
{
    $res = null;

    if (!$email) {
        $res['success'] = false;
        $res['message'] = "Введите email";
    }
    if (!$pwd1) {
        $res['success'] = false;
        $res['message'] = "Введите пароль";
    }
    if (!$pwd2) {
        $res['success'] = false;
        $res['message'] = "Введите повтор пароля";
    }
    if ($pwd1 != $pwd2) {
        $res['success'] = false;
        $res['message'] = "Пароли не совпадают";
    }
    return $res;
}

function checkUserEmail($pdo, $email)
{
    // $email = $pdo->quote($email);
    $res = null;

    $sql = "SELECT * FROM `users` WHERE `email`=?";
    $rs = $pdo->prepare($sql);
    $rs->execute([$email]);
    $res = $rs->fetchAll(PDO::FETCH_ASSOC);

    return $res;
}

function loginUser($pdo, $email, $pwd)
{
    // $email = htmlspecialchars($pdo->quote($email));
    $pwd = md5($pwd);
    $sql = "SELECT * FROM `users` WHERE `email` = ? AND `pwd` = ?";
    $rs = prepareCreateSmartyRsArray($pdo, $sql, [$email, $pwd]);
    // d($rs);
    if (isset($rs[0])) {
        $rs['success'] = 1;
    } else {
        $rs['success'] = 0;
    }
    return $rs;
}

function updateUserData($pdo, $name, $phone, $address, $pwd1, $pwd2, $curPwd)
{
    $email = $_SESSION['user']['email'];
    // $name = htmlspecialchars($pdo->quote($name));
    // $phone = htmlspecialchars($pdo->quote($phone));
    // $address = htmlspecialchars($pdo->quote($address));
    $pwd1 = trim($pwd1);
    $pwd2 = trim($pwd2);

    $newPwd = null;
    $paramArray = array();
    if ($pwd1 && ($pwd1 == $pwd2)) {
        $newPwd = md5($pwd1);
    }

    $sql = "UPDATE `users` SET ";
    if ($newPwd) {
        $sql .= "`pwd`=?, ";
        array_push($paramArray, $newPwd);
    }
    // d($newPwd . " " . $curPwd);
    $sql .= "`name`=?, `phone`=?, `address`=? WHERE `email`=? AND `pwd` = ? LIMIT 1";

    array_push($paramArray, $name, $phone, $address, $email, $curPwd);
    $rs = $pdo->prepare($sql);

    $rs->execute($paramArray);
    // d($paramArray, 0);
    // d($rs);

    return $rs;
}
