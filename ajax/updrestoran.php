<?php
    $restoranid = trim(filter_var($_POST['restoranid'], FILTER_SANITIZE_NUMBER_INT));
    $NAMERestoran = trim(filter_var($_POST['NAMERestoran'], FILTER_SANITIZE_STRING));
    $imgg = trim(filter_var($_POST['imgg'], FILTER_SANITIZE_STRING));
    $scoree = $_POST['scoree'];

    $error = '';

    if (strlen($restoranid) <= 1)
        $error = 'Введіть ID';
    else if (strlen($NAMERestoran) <= 1) 
        $error = 'Введість коректне імя';
        else if (strlen($imgg) <= 2) 
            $error = 'Вставте картинку';
            else if ($scoree <= 0) 
                $error = 'Введість рейтинг';

    if($error != '') {
        echo $error;
    exit();
    }

    require_once '../mysql_connect.php';

    $sql = 'UPDATE FROM restoran(restoranid, NAMERestoran, img, score) VALUES(?,?,?,?)';
    $query = $pdo->prepare($sql);
    $query->execute([$restoranid, $NAMERestoran, $imgg, $scoree]);
    echo true;
?>