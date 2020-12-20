<?php
    $nameRestoran = trim(filter_var($_POST['nameRestoran'], FILTER_SANITIZE_STRING));
    $error = '';

  if (strlen($nameRestoran) <= 0) 
    $error = 'Введість існуючу назву товару';

    if($error != '') {
        echo $error;
    exit();
    }

    require_once '../mysql_connect.php';

    $sql = 'DELETE FROM `restoran` WHERE `nameRestoran` = :nameRestoran';
    $query = $pdo->prepare($sql);
    $query->execute(['nameRestoran' => $nameRestoran]);
    echo true;
?>