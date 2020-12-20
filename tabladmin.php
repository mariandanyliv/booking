<head>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="../css/admin.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
</head>
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
                                <th>ID</th>
                                <th>Імя</th>
                                <th>Email</th>
                                <th>login</th>
                            </tr>
                            </thead>
                            <tbody><?php
                            require 'mysql_connect.php';
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
                            ?></tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="card">
        <div class="card-header" id="headingTwo">
            <h2 class="mb-0">
                <a class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">Перелік усіх ресторанів<i class="material-icons">add</i></a>
            </h2>
        </div>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
            <div class="container-xl">
                <div class="table-responsive-xl">
                    <div class="table-wrapper">
                        <table class="table table-striped">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>restoranid</th>
                                <th>Назва ресторану</th>
                                <th>Email ресторану</th>
                                <th>рейтинг</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $query = $pdo->query('SELECT * FROM `restoran` ORDER BY restoranid DESC');
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>