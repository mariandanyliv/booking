<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $website_title = "BookingRestoran";
        require 'blocks/head.php';
    ?>
</head>
<body>
<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h2 class="my-0 mr-md-auto font-weight-normal"><a href="/index.php">BookingRestoran</a></h2>
</div>
<div class="container">
    <div class="title">
        <h2 style="text-align: center">Звіт по кількості замовлень</h2>
    </div>

    <table class="table">
  <thead class="thead-light">
    <tr>
      <th scope="col">#</th>
      <th scope="col">BookingID</th>
      <th scope="col">UserName</th>
      <th scope="col">SurName</th>
      <th scope="col">Email</th>
      <th scope="col">DataTime</th>
      <th scope="col">NumberTable</th>
      <th scope="col">NumberSeats</th>
    </tr>
  </thead>
  <tbody>
  <?php
        require 'mysql_connect.php';
        $query =$pdo->query('SELECT *  FROM `booking` ORDER BY BookingID DESC');
        $i = 1;
        $a = 0;
        while($row = $query->fetch(PDO::FETCH_OBJ)){
            echo '<tr>
            <td>' . $i . '</td>
            <td>' . $row->BookingID . '</td>
            <td>' . $row->UserName . '</td>
            <td>' . $row->SurName . '</td>
            <td>' . $row->Email . '</td>
            <td>' . $row->DateTime . '</td>
            <td>' . $row->NumberTable . '</td>
            <td>' . $row->NumberSeats . '</td>
            </tr>';
            $i++;
            $a+=1;
        }
        ?>
  </tbody>
</table>
</div>

<footer class="footer mt-auto py-3">
  <div class="container">
    <span class="text-muted ml-1">Кількість замовлень: <?php echo $a; ?></span>
  </div>
</footer>
</body>
</html>