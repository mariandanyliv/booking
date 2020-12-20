<!DOCTYPE html>
<html lang="en">
<head>
<?php 
        $website_title = "BookingRestoran";
        require 'blocks/head.php';
    ?>
</head>
<body>
<?php 
        if ($_COOKIE['user']=='' && $_COOKIE['admin']=='') {
            require 'blocks/header.php';
        } else if ($_COOKIE['user']!='') {
            require 'blocks/header.php';
        } else if ($_COOKIE['admin']!='') {
            require 'blocks/admin.php';
        }
 ?>  

 <div class="container mt-5">
    <div class="row">
        <div class="col-md-8 mb-3">
            <h4>Бронювання</h4>
            <form action="" method="post">
                <label for="UserName">Ім'я</label>
                <input type="text" name="UserName" id="UserName" class="form-control">

                <label for="SurName">Ім'я</label>
                <input type="surname" name="SurName" id="SurName" class="form-control">

                <label for="Email">Email</label>
                <input type="email" name="Email" id="Email" class="form-control" value="<?php echo $_COOKIE['user'] ?>">

                <label for="datetime">Дата</label>
                <input type="datetime-local" name="DateTime" id="DateTime" class="form-control">

                <label for="number table">Номер столика</label>
                <input type="number" name="NumberTable" id="NumberTable" class="form-control">

                <label for="number of seats">Кількість місць</label>
                <input type="number" name="NumberSeats" id="NumberSeats" class="form-control">

                <div class="aletr alert-danger mt-3" id="errorBlock"></div>

                <button type="button" id="booking_restoran" class="btn btn-success mt-5">Забронювати</button>
            </form>
        </div>
    </div>
</div>

<?php require 'blocks/footer.php'; ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $('#booking_restoran').click(function() {
        var UserName = $('#UserName').val();
        var SurName = $('#SurName').val();
        var Email = $('#Email').val();
        var DateTime = $('#DateTime').val();
        var NumberTable = $('#NumberTable').val();
        var NumberSeats=$('#NumberSeats').val();

        $.ajax({
            url: 'ajax/booking.php',
            type: 'POST',
            cache: false,
            data: {'UserName': UserName, 'SurName': SurName, 'Email': Email, 'DateTime': DateTime, 'NumberTable': NumberTable, 'NumberSeats': NumberSeats},
            dataType: 'html',
            success: function(data) {
                if (data == true) {
                $('#booking_restoran').text('Все готово');
                $('#errorBlock').hide();
                document.location.replace('auth.php');
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