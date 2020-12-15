<?php
    $user = 'root';
    $password = 'root';
    $db = 'bookingRestoran';
    $host = 'localhost';
    $port = 3306;

    $dsn = 'mysql:host='.$host.';dbname='.$db;
    $pdo = new PDO($dsn, $user, $password);
?>