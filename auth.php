<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $website_title = "Авторизація на сайті";
        require 'blocks/head.php';
    ?>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../css/admin.css">
</head>
<body>
    <?php require 'blocks/header.php' ?>

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8 mb-3">
                    <?php
                        if ($_COOKIE['user'] ==''):
                    ?>
                    <h4>Авторизація</h4>
                    <form action="" method="post">

                        <label for="email">email</label>
                        <input type="email" name="email" id="email" class="form-control">

                        <label for="pass">Пароль</label>
                        <input type="password" name="pass" id="pass" class="form-control">

                        <div class="aletr alert-danger mt-3" id="errorBlock"></div>

                        <button type="button" id="auth_user" class="btn btn-success mt-5">Ввійти</button>
                    </form>
                    <?php
                        else:
                    ?>
                    <h2><?=$_COOKIE['user']?></h2>
<div class="accordion" id="accordionExample">
    <div class="card">
        <div class="card-header highlight" id="headingOne">
            <h2 class="clearfix mb-0">
                <a class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">Перелік користувачів, що містяться в базі даних<i class="material-icons">add</i></a>
            </h2>
        </div>
        <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
            <div class="container-xl">
                <div class="table-responsive-xl">
                    <div class="table-wrapper">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>BookingID</th>
                                <th>Імя</th>
                                <th>Прізвище</th>
                                <th>Дата-час</th>
                                <th>Номер столика</th>
                                <th>Кількість місць</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php 
                                    require 'mysql_connect.php';

                                    $email = $_COOKIE['user'];
                                    $sql ='SELECT `BookingID`, `UserName`, `SurName`, `DateTime`, `NumberTable`, `NumberSeats`  FROM `booking` WHERE `Email` = ? ORDER BY BookingID DESC';
                                    $query = $pdo->prepare($sql);
                                    $query->execute([$email]);
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
                    <h4>Скасувати замовлення</h4>
                    <form action="" method="post">

                        <label for="BookingID">Введіть номер замовлення, яке хочете скасувати</label>
                        <input type="number" name="BookingID" id="BookingID" class="form-control">

                        <div class="aletr alert-danger mt-3" id="errorBlock"></div>
                        <button class="btn btn-success mb-5" id="delete_booking">Видалити</button>

                    </form>           
    <button class="btn btn-danger" id="exit_btn">Вийти</button>
    <?php endif; ?>
        </div>
    </div>
</div>

        
    <?php require 'blocks/footer.php'?>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
    $(document).ready(function(){
        $(".collapse.show").each(function(){
            $(this).siblings(".card-header").find(".btn i").html("remove");
            $(this).prev(".card-header").addClass("highlight");
        });
        $(".collapse").on('show.bs.collapse', function(){
            $(this).parent().find(".card-header .btn i").html("remove");
        }).on('hide.bs.collapse', function(){
            $(this).parent().find(".card-header .btn i").html("add");
        });
    });
    </script>

    <script>
            $('#exit_btn').click(function() {
            $.ajax({
                url: 'ajax/exit.php',
                type: 'POST',
                cache: false,
                data: {},
                dataType: 'html',
                success: function(data) {
                    document.location.replace('./auth.php');
                }
            });
        });

        $('#auth_user').click(function() {
            var email = $('#email').val();
            var pass = $('#pass').val();

            $.ajax({
                url: 'ajax/auth.php',
                type: 'POST',
                cache: false,
                data: {'email': email, 'pass': pass},
                dataType: 'html',
                success: function(data) {
                    if (data == true) {
                    $('#auth_user').text('Готово');
                    $('#errorBlock').hide();
                    document.location.reload(true);
                    } else {
                        $('#errorBlock').show();
                        $('#errorBlock').text(data);
                    }
                }
            });
        });

        $('#delete_booking').click(function() {
            var BookingID = $('#BookingID').val();
            
            $.ajax({
                url: 'ajax/deletebooking.php',
                type: 'POST',
                cache: false,
                data: {'BookingID': BookingID},
                dataType: 'html',
                success: function(data) {
                    if (data == true) {
                    $('#delete_booking').text('Готово');
                    $('#errorBlocks').hide();
                    document.location.reload(true);
                    } else {
                        $('#errorBlocks').show();
                        $('#errorBlocks').text(data);
                    }
                }
            });
        });
    </script>

</body>
</html>