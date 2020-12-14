<!DOCTYPE html>
<?php 
        $website_title = "BookingRestoran";
        require 'blocks/head.php'
    ?>
<body>
<?php require 'blocks/header.php' ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 mb-3">
                <h4>Форма бронювання</h4>
                <form action="" method="post">
                    <label for="username">Ім'я</label>
                    <input type="text" name="username" id="username" class="form-control">

                    <label for="username">Прізвище</label>
                    <input type="text" name="username" id="username" class="form-control">

                    <label for="email">Email</label>
                    <input type="email" name="email" id="email" class="form-control">

                    <label for="pass">Кількість місьць</label>
                    <input type="password" name="pass" id="pass" class="form-control">

                    <label for="pass">Дата</label>
                    <input type="date" name="pass" id="pass" class="form-control">

                    <div class="aletr alert-danger mt-3" id="errorBlock"></div>

                    <button type="button" id="reg_user" class="btn btn-success mt-5">Зареєструватися</button>
                </form>
            </div>
        </div>
    </div>
<?php require 'blocks/footer.php' ?>
</body>
</html>