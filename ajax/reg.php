<?php
    $username = trim(filter_var($_POST['username'], FILTER_SANITIZE_STRING));
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
    $pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

    $error = '';

    if (strlen($username) <= 3) 
        $error = 'Введість коректне імя';
        else if (strlen($email) <= 3) 
            $error = 'Введість коректний email';
            else if (strlen($login) <= 3) 
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

    $sql = 'INSERT INTO users(name, email, login, pass) VALUES(?, ?, ?, ?)';
    $query = $pdo->prepare($sql);
    $query->execute([$username, $email, $login, $pass]);

    setcookie('user', $email, time() + 3600 * 24 * 30, "/");
    echo 'Готово';
?>