<?php
    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
    $pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

    $error = '';

  if (strlen($login) <= 3) 
    $error = 'Введість коректний логін';
        else if (strlen($pass) <= 3) 
            $error = 'Введість коректний пароль';

    if($error != '') {
        echo $error;
    exit();
    }

    $hash = "op;olikfjirghjldfkgdlfnbs;dp'fowq'";
    $pass = md5($pass . $hash);

    require_once '../mysql_connect.php';

    $sql = 'SELECT `adminid` FROM `admin` WHERE `login` = :login && `pass` = :pass';
    $query = $pdo->prepare($sql);
    $query->execute(['login' => $login, 'pass' => $pass]);

    $admins = $query->fetch(PDO::FETCH_OBJ);
    if($admins->adminid == 0){
            setcookie('admin', $login, time() + 3600 * 24 * 30, "/");
            echo 'Готово';
        }

?>