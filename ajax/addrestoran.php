<?php
    $restoranName = trim(filter_var($_POST['restoranName'], FILTER_SANITIZE_STRING));
    $email = trim(filter_var($_POST['email'], FILTER_SANITIZE_EMAIL));
    $img = trim(filter_var($_POST['img'], FILTER_SANITIZE_STRING));
    $score = $_POST['score'];

    $error = '';

    if (strlen($restoranName) <= 1) 
        $error = 'Введість коректне імя';
        else if (strlen($img) <= 2) 
            $error = 'Вставте картинку';
            else if ($score <= 0) 
                $error = 'Введість рейтинг';

    if($error != '') {
        echo $error;
    exit();
    }

    require_once '../mysql_connect.php';

    $sql = 'INSERT INTO restoran(NameRestoran, email, img, score) VALUES(?,?,?,?)';
    $query = $pdo->prepare($sql);
    $query->execute([$restoranName, $email, $img, $score]);
    echo true;
?>