<!DOCTYPE html>
<html lang="en">
<head>
<?php
        $website_title = "Авторизація на сайті";
        require 'blocks/head.php';
    ?>
</head>
<body>
<?php require 'blocks/header.php' ?>

<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 mb-3">
            <?php
                if ($_COOKIE['admin'] ==''):
            ?>
            <h4>Авторизація</h4>
            <form action="" method="post">

                <label for="login">Логін</label>
                <input type="text" name="login" id="login" class="form-control">

                <label for="pass">Пароль</label>
                <input type="password" name="pass" id="pass" class="form-control">

                <div class="aletr alert-danger mt-3" id="errorBlock"></div>

                <button type="button" id="adminauth_user" class="btn btn-success mt-5">Ввійти</button>
            </form>
            <?php
                else:
            ?>
            <h2><?=$_COOKIE['admin']?></h2>
            <form action="" method="post">
                    <h4>Додавання ресторану</h4>
                <label for="login">Назва ресторану</label>
                <input type="text" name="restoranName" id="restoranName" class="form-control">

                <label for="img">Фото ресторану</label>
                <input type="text" name="img" id="img" class="form-control">
                
                <label for="pass">Рейтинг</label>
                <input type="number" name="score" id="score" class="form-control">

                <div class="aletr alert-danger mt-3" id="errorBlock"></div>

                <button type="button" id="add_restoran" class="btn btn-success mt-5">Додати</button>

            </form>

            <form action="" method="post">
                <h4>Видалення ресторану</h4>
                <label for="nameRestoran">Введіть назву ресторану</label>
                <input type="text" name="nameRestoran" id="nameRestoran" class="form-control">

                <div class="aletr alert-danger mt-3" id="errorBlocks"></div>

                <button type="button" id="delete_restoran" class="btn btn-success mt-5">Видалити ресторан</button>

            </form>

            <form action="" method="post">
                <h4>Видалення користувача</h4>
                <label for="login">Введіть логін користувача</label>
                <input type="text" name="login" id="login" class="form-control">

                <div class="aletr alert-danger mt-3" id="errorBlockss"></div>

                <button type="button" id="delete_user" class="btn btn-success mt-5">Видалити користувача</button>

            </form>

            <form action="" method="post">
                <h4>Редагування ресторану</h4>

                <label for="restoranid">ID ресторану</label>
                <input type="number" name="restoranid" id="restoranid" class="form-control">

                <label for="NAMERestoran">Назва ресторану</label>
                <input type="text" name="NAMERestoran" id="NAMERestoran" class="form-control">

                <label for="imgg">Фото ресторану</label>
                <input type="text" name="imgg" id="imgg" class="form-control">
                
                <label for="scoree">Рейтинг </label>
                <input type="number" name="scoree" id="scoree" class="form-control">

                <div class="aletr alert-danger mt-3" id="errorBlocksss"></div>

                <button type="button" id="upd_restoran" class="btn btn-success mt-5">Редагувати</button>

            </form>

            <button type="button" class="btn btn-danger" id="exit_btn">Вийти</button>
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
            var img = $('#img').val();
            var score = $('#score').val();
            
            $.ajax({
                url: 'ajax/addrestoran.php',
                type: 'POST',
                cache: false,
                data: {'restoranName': restoranName, 'img': img, 'score': score},
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
    </script>

<?php require 'blocks/footer.php' ?>
</body>
</html>