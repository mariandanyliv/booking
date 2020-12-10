<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        $website_title = "Реєстрація на сайті";
        require 'blocks/head.php';
    ?>
</head>
<body>
    <?php require 'blocks/header.php' ?>

        <div class="container mt-5">
            <div class="row">
                <div class="col-md-8 mb-3">
                    <h4>Реєстрація</h4>
                    <form action="" method="post">
                        <label for="username">Ім'я</label>
                        <input type="text" name="username" id="username" class="form-control">

                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control">

                        <label for="login">Логін</label>
                        <input type="text" name="login" id="login" class="form-control">

                        <label for="pass">Пароль</label>
                        <input type="password" name="pass" id="pass" class="form-control">

                        <div class="aletr alert-danger mt-3" id="errorBlock"></div>

                        <button type="button" id="reg_user" class="btn btn-success mt-5">Зареєструватися</button>
                    </form>
                </div>
            </div>
        </div>
    
    <?php require 'blocks/footer.php' ?>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    
    <script>
        $('#reg_user').click(function() {
            var name = $('#username').val();
            var email = $('#email').val();
            var login = $('#login').val();
            var pass = $('#pass').val();

            $.ajax({
                url: 'ajax/reg.php',
                type: 'POST',
                cache: false,
                data: {'username': name, 'email': email, 'login': login, 'pass': pass},
                dataType: 'html',
                success: function(data) {
                    if (data == 'Готово') {
                    $('#reg_user').text('Все готово');
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