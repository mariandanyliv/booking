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
                        if ($_COOKIE['log'] ==''):
                    ?>
                    <h4>Авторизація</h4>
                    <form action="" method="post">

                        <label for="login">Логін</label>
                        <input type="text" name="login" id="login" class="form-control">

                        <label for="pass">Пароль</label>
                        <input type="password" name="pass" id="pass" class="form-control">

                        <div class="aletr alert-danger mt-3" id="errorBlock"></div>

                        <button type="button" id="auth_user" class="btn btn-success mt-5">Ввійти</button>
                    </form>
                    <?php
                        else:
                    ?>
                    <h2><?=$_COOKIE['log']?></h2>
                    <button class="btn btn-danger" id="exit_btn">Вийти</button>
                    <?php
                        endif;
                    ?>
                </div>
            </div>
        </div>
    
    <?php require 'blocks/footer.php' ?>
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

        $('#auth_user').click(function() {
            var login = $('#login').val();
            var pass = $('#pass').val();

            $.ajax({
                url: 'ajax/auth.php',
                type: 'POST',
                cache: false,
                data: {'login': login, 'pass': pass},
                dataType: 'html',
                success: function(data) {
                    if (data == 'Готово') {
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
    </script>

</body>
</html>