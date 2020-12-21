<!DOCTYPE html>
<html lang="en">
<?php
        $website_title = "Авторизація на сайті";
        require 'blocks/head.php';
?>
      
<body>
<?php require 'blocks/admin.php' ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 mb-3">
            <?php
                if ($_COOKIE['admin'] ==''):
            ?>
            <h4>Авторизація адміна</h4>
            <form action="" method="post">

                <label for="login">Логін</label>
                <input type="text" name="login" id="login" class="form-control">

                <label for="pass">Пароль</label>
                <input type="password" name="pass" id="pass" class="form-control">

                <div class="aletr alert-danger mt-3" id="errorBlock"></div>

                <button type="button" id="adminauth_user" class="btn btn-success mt-1">Ввійти</button>
            </form>
            <?php
                else:
            ?>
            <h2><?=$_COOKIE['admin']?></h2>
            <form action="" method="post">
                    <h4>Додавання ресторану</h4>
                <label for="login">Назва ресторану</label>
                <input type="text" name="restoranName" id="restoranName" class="form-control">

                <label for="email">Email ресторану</label>
                <input type="text" name="email" id="email" class="form-control">

                <label for="img">Фото ресторану</label>
                <input type="text" name="img" id="img" class="form-control">
                
                <label for="pass">Рейтинг</label>
                <input type="number" name="score" id="score" class="form-control">

                <div class="aletr alert-danger mt-3" id="errorBlock"></div>

                <button type="button" id="add_restoran" class="btn btn-success mt-1">Додати</button>

            </form>

            <form action="" method="post">
                <h4 class="mt-5">Видалення ресторану</h4>
                <label for="nameRestoran">Введіть назву ресторану</label>
                <input type="text" name="nameRestoran" id="nameRestoran" class="form-control">

                <div class="aletr alert-danger mt-3" id="errorBlocks"></div>

                <button type="button" id="delete_restoran" class="btn btn-success mt-1">Видалити ресторан</button>

            </form>

            <form action="" method="post">
                <h4 class="mt-5">Видалення користувача</h4>
                <label for="login">Введіть логін користувача</label>
                <input type="text" name="login" id="login" class="form-control">

                <div class="aletr alert-danger mt-3" id="errorBlockss"></div>

                <button type="button" id="delete_user" class="btn btn-success mt-1">Видалити користувача</button>

            </form>

            <form action="" method="post">
                <h4 class="mt-5">Редагування ресторану</h4>

                <label for="restoranid">ID ресторану</label>
                <input type="number" name="restoranid" id="restoranid" class="form-control">

                <label for="NAMERestoran">Назва ресторану</label>
                <input type="text" name="NAMERestoran" id="NAMERestoran" class="form-control">

                <label for="Email">Email ресторану</label>
                <input type="text" name="Email" id="Email" class="form-control">

                <label for="imgg">Фото ресторану</label>
                <input type="text" name="imgg" id="imgg" class="form-control">
                
                <label for="scoree">Рейтинг </label>
                <input type="number" name="scoree" id="scoree" class="form-control">

                <div class="aletr alert-danger mt-3" id="errorBlocksss"></div>

                <button type="button" id="upd_restoran" class="btn btn-success mt-1">Редагувати</button>

            </form>
                <form action="" method="post">
                <h4 class="mt-5">Скасувати замовлення</h4>
                    <label for="BookingID">Введіть номер замовлення, яке хочете скасувати</label>
                    <input type="number" name="BookingID" id="BookingID" class="form-control">

                    <div class="aletr alert-danger mt-3" id="errorBlock"></div>
                    <button class="btn btn-success mb-5" id="delete_booking">Видалити</button>

                 </form>           

                 
                    <?php  require 'tabladmin.php' ?>
            
                    <a class="btn btn-success mb-5" href="report.php">Звіт по кількості замовлень</a>

            <?php
                endif;
            ?>
        </div>
    </div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
            $('#exit_btn').click(function() {
            $.ajax({
                url: 'ajax/exit.php',
                type: 'POST',
                cache: false,
                data: {},
                dataType: 'html',
                success: function(data) {
                    document.location.reload(true);
                }
            });
        });

        $('#adminauth_user').click(function() {
            var login = $('#login').val();
            var pass = $('#pass').val();

            $.ajax({
                url: 'ajax/adminauth.php',
                type: 'POST',
                cache: false,
                data: {'login': login, 'pass': pass},
                dataType: 'html',
                success: function(data) {
                    if (data == 'Готово') {
                    $('#adminauth_user').text('Готово');
                    $('#errorBlock').hide();
                    document.location.reload(true);
                    } else {
                        $('#errorBlock').show();
                        $('#errorBlock').text(data);
                    }
                }
            });
        });

            $('#add_restoran').click(function() {
            var restoranName = $('#restoranName').val();
            var email = $('#email').val();
            var img = $('#img').val();
            var score = $('#score').val();
            
            $.ajax({
                url: 'ajax/addrestoran.php',
                type: 'POST',
                cache: false,
                data: {'restoranName': restoranName,'email': email, 'img': img, 'score': score},
                dataType: 'html',
                success: function(data) {
                    if (data == true) {
                    $('#add_restoran').text('Готово');
                    $('#errorBlock').hide();
                    document.location.reload(true);
                    } else {
                        $('#errorBlock').show();
                        $('#errorBlock').text(data);
                    }
                }
            });
        });

            $('#delete_restoran').click(function() {
            var nameRestoran = $('#nameRestoran').val();
            
            $.ajax({
                url: 'ajax/deleterestoran.php',
                type: 'POST',
                cache: false,
                data: {'nameRestoran': nameRestoran},
                dataType: 'html',
                success: function(data) {
                    if (data == true) {
                    $('#delete_restoran').text('Готово');
                    $('#errorBlocks').hide();
                    document.location.reload(true);
                    } else {
                        $('#errorBlocks').show();
                        $('#errorBlocks').text(data);
                    }
                }
            });
        });

        $('#delete_user').click(function() {
            var login = $('#login').val();
            
            $.ajax({
                url: 'ajax/deleteuser.php',
                type: 'POST',
                cache: false,
                data: {'login': login},
                dataType: 'html',
                success: function(data) {
                    if (data == true) {
                    $('#delete_user').text('Готово');
                    $('#errorBlockss').hide();
                    document.location.reload(true);
                    } else {
                        $('#errorBlockss').show();
                        $('#errorBlockss').text(data);
                    }
                }
            });
        });

        $('#upd_restoran').click(function() {
            var restoranid = $('#restoranid').val();
            var NAMERestoran = $('#NAMERestoran').val();
            var imgg = $('#imgg').val();
            var scoree = $('#scoree').val();
            
            $.ajax({
                url: 'ajax/updrestoran.php',
                type: 'POST',
                cache: false,
                data: {'restoranid': restoranid, 'NAMERestoran': NAMERestoran, 'imgg': imgg, 'scoree': scoree},
                dataType: 'html',
                success: function(data) {
                    if (data == true) {
                    $('#upd_restoran').text('Готово');
                    $('#errorBlocksss').hide();
                    document.location.reload(true);
                    } else {
                        $('#errorBlocksss').show();
                        $('#errorBlocksss').text(data);
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
    </script>

<?php require 'blocks/footer.php' ?>
</body>
</html>