<?php
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $pass = trim(filter_var($_POST['pass'], FILTER_SANITIZE_STRING));

    $error = '';

  if (strlen($email) <= 3) 
    $error = 'Введість коректний email';
        else if (strlen($pass) <= 3) 
            $error = 'Введість коректний пароль';

    if($error != '') {
        echo $error;
    exit();
    }

    $hash = "op;olikfjirghjldfkgdlfnbs;dp'fowq'";
    $pass = md5($pass . $hash);

    require_once '../mysql_connect.php';

    $sql = 'SELECT `id` FROM `users` WHERE `email` = :email && `pass` = :pass';
    $query = $pdo->prepare($sql);
    $query->execute(['email' => $email, 'pass' => $pass]);

    $user = $query->fetch(PDO::FETCH_OBJ);
    if($user->id == 0)
        echo 'Користувача не знайдено';
        else {
            setcookie('user', $email, time() + 3600 * 24 * 30, "/");
            echo true;
        }
       
?>