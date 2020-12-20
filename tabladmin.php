<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../css/admin.css">    
</head>
<?php  require 'mysql_connect.php'; ?>
<table class="table">
  <thead class="thead-dark">
    <tr>
    <h5>Перелік усіх користувачів</h5>
      <th scope="col">#</th>
      <th scope="col">ID</th>
      <th scope="col">name</th>
      <th scope="col">email</th>
      <th scope="col">login</th>
    </tr>
  </thead>
  <tbody>
  <?php

    $query = $pdo->query('SELECT * FROM users ORDER BY id DESC');
    $i = 1;
    while($row = $query->fetch(PDO::FETCH_OBJ)){
        echo '<tr>
        <td>' . $i . '</td>
        <td>' . $row->id . '</td>
        <td>' . $row->name . '</td>
        <td>' . $row->email . '</td>
        <td>' . $row->login . '</td>
        </tr>';
        $i++;
    }
    ?>
  </tbody>
</table>
<table class="table">
  <thead class="thead-dark">
    <tr>
    <h5>Перелік усіх ресторанів</h5>
      <th scope="col">#</th>
      <th scope="col">ID</th>
      <th scope="col">nameRestoran</th>
      <th scope="col">email</th>
      <th scope="col">score</th>
    </tr>
  </thead>
  <tbody>
  <?php
    $query =$pdo->query('SELECT `restoranid`, `nameRestoran`, `email`, `score` FROM `restoran` ORDER BY restoranid DESC');
    $i = 1;
    while($row = $query->fetch(PDO::FETCH_OBJ)){
        echo '<tr>
        <td>' . $i . '</td>
        <td>' . $row->restoranid . '</td>
        <td>' . $row->nameRestoran . '</td> 
        <td>' . $row->email . '</td>
        <td>' . $row->score . '</td>
        </tr>';
        $i++;   
    } 
        ?>
  </tbody>
</table>

<table class="table">
  <thead class="thead-dark">
    <tr>
    <h5>Перелік усіх бронюваннь</h5>
      <th scope="col">#</th>
      <th scope="col">BookingID</th>
      <th scope="col">UserName</th>
      <th scope="col">SurName</th>
      <th scope="col">DataTime</th>
      <th scope="col">NumberTable</th>
      <th scope="col">NumberSeats</th>
    </tr>
  </thead>
  <tbody>
  <?php
        $query =$pdo->query('SELECT `BookingID`, `UserName`, `SurName`, `Email`, `DateTime`, `NumberTable`, `NumberSeats`  FROM `booking` ORDER BY BookingID DESC');
        $i = 1;
        while($row = $query->fetch(PDO::FETCH_OBJ)){
            echo '<tr>
            <td>' . $i . '</td>
            <td>' . $row->BookingID . '</td>
            <td>' . $row->UserName . '</td>
            <td>' . $row->SurName . '</td>
            <td>' . $row->DateTime . '</td>
            <td>' . $row->NumberTable . '</td>
            <td>' . $row->NumberSeats . '</td>
            </tr>';
            $i++;
        }
        ?>
  </tbody>
</table>