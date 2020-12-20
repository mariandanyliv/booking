<?php
    $UserName = trim(filter_var($_POST['UserName'], FILTER_SANITIZE_STRING));
    $SurName = trim(filter_var($_POST['SurName'], FILTER_SANITIZE_STRING));
    $Email = trim(filter_var($_POST['Email'], FILTER_SANITIZE_EMAIL));
    $DateTime = trim(filter_var($_POST['DateTime'], FILTER_SANITIZE_STRING));
    $NumberTable = trim(filter_var($_POST['NumberTable'], FILTER_SANITIZE_NUMBER_INT));
    $NumberSeats = trim(filter_var($_POST['NumberSeats'], FILTER_SANITIZE_NUMBER_INT));
    

    $error = '';

  if (strlen($UserName) <= 3) 
    $error = 'Введість коректне імя';
        else if (strlen($SurName) <= 3) 
            $error = 'Введість коректне прізвище';
                else if (strlen($Email) <= 3) 
                $error = 'Введість коректний email';
                    else if (strlen($DateTime) <= 3) 
                    $error = 'Введість коректний email';
                        else if (strlen($NumberTable) <= 0) 
                        $error = 'Введість коректний email';
                            else if (strlen($NumberSeats) <= 0) 
                            $error = 'Введість коректний email';

    if($error != '') {
        echo $error;
    exit();
    }

    require_once '../mysql_connect.php';

    $sql = 'INSERT INTO booking(UserName, SurName, Email, DateTime, NumberTable, NumberSeats) VALUES(?, ?, ?, ?, ?, ?)';
    $query = $pdo->prepare($sql);
    $query->execute([$UserName, $SurName, $Email, $DateTime, $NumberTable, $NumberSeats]);
    
    echo true;

?>