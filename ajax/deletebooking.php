<?php
    $BookingID = trim(filter_var($_POST['BookingID'], FILTER_SANITIZE_NUMBER_INT));
    $error = '';

  if (strlen($BookingID) <= 0) 
    $error = 'Введість коректне бронювання';

    if($error != '') {
        echo $error;
    exit();
    }

    require_once '../mysql_connect.php';

    $sql = 'DELETE FROM `booking` WHERE `BookingID` = :BookingID';
    $query = $pdo->prepare($sql);
    $query->execute(['BookingID' => $BookingID]);
    echo true;
?>