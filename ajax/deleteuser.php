<?php
    $login = trim(filter_var($_POST['login'], FILTER_SANITIZE_STRING));
    $error = '';

  if (strlen($login) <= 0) 
    $error = 'Введість існуючого користувача';

    if($error != '') {
        echo $error;
    exit();
    }

    require_once '../mysql_connect.php';

    $sql = 'DELETE FROM `users` WHERE `login` = :login';
    $query = $pdo->prepare($sql);
    $query->execute(['login' => $login]);
    
    echo true;
?>