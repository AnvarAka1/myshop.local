<?php
function registerNewUser($pdo, $email, $pwdMD5, $name, $phone, $address)
{
    $email = htmlspecialchars($pdo->quote($email));
    $name = htmlspecialchars($pdo->quote($name));
    $phone = htmlspecialchars($pdo->quote($phone));
    $address = htmlspecialchars($pdo->quote($address));

    // to prevent sql injections use this type of sql statements with placeholders
    // whenever you have user typed values
    $sql = "INSERT INTO `users` (`email`, `pwd`, `name`, `phone`, `address`) VALUES (?,?,?,?,?)";
    $rs = $pdo->prepare($sql);
    $rs->execute([$email, $pwdMD5, $name, $phone, $address]);

    if ($rs) {
        $sql = "SELECT * FROM `users` WHERE (`email` = ? and `pwd` = ?) LIMIT 1";
        $rs = $pdo->prepare($sql);
        $rs->execute([$email, $pwdMD5]);
        // $rs = prepareCreateSmartyRsArray($pdo, $sql, [$email, $pwdMD5]);
        $rs = $rs->fetch();
        // d($rs);

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
    $email = $pdo->quote($email);
    $res = null;
    $sql = "SELECT * FROM `users` WHERE `email`={$email}";
    foreach ($pdo->query($sql, PDO::FETCH_ASSOC) as $row) {
        $res = $row;
    }
    return $res;
}
