<div class="intro" id="intro">
    <div class="container">
        <div class="intro__inner">
            <h2 class="intro__suptitle">SEARCH RESTORAN</h2>
        </div>
    </div>
</div>

<div class="portfolio">
    <div class="container">
      <div class="title">
        Про нас
      </div>
        <div class="subtitle mb-5">
            Онла́йн-бронюва́ння - бронювання через Інтернет, в інтерактивному режимі. Термін застосовується по відношенню до бронювання номерів в готелях, квитків (авіа, залізничних, автобусних тощо), місць в ресторанах і театрах, прокату автомобілів тощо.
        </div>    
        <?php
            $user = 'root';
            $password = 'root';
            $db = 'bookingRestoran';
            $host = 'localhost';
            $port = 3306;
        
            $dsn = 'mysql:host='.$host.';dbname='.$db;
            $pdo = new PDO($dsn, $user, $password);

            $query = $pdo->query('SELECT * FROM restoran');

            while($rowing = $query->fetch(PDO::FETCH_OBJ)) {
                if ($_COOKIE['user']=='')
                {
                    echo '
                            <div class="col-4">
                                <div class="portfolio-item">
                                    <div class="portfolio-item__img">
                                        <img src="' . $rowing->img . '"alt="photo restoran">
                                    </div>
                                <div class="portfolio-item__title">
                                        <a href="#">' . $rowing->nameRestoran . '</a>
                                </div>
                                    <div class="portfolio-item__title">
                                        <a href="#">Рейтинг:' . $rowing->score . '</a>
                                    </div>
                                <a type="button" id="booking" class="btn btn-success mt-2" href="../auth.php">Забронювати</a>
                                </div>
                            </div>';
                } else {
                    echo '
                            <div class="col-4">
                                <div class="portfolio-item">
                                    <div class="portfolio-item__img">
                                        <img src="' . $rowing->img . '"alt="photo restoran">
                                    </div>
                                <div class="portfolio-item__title">
                                    <a href="#">' . $rowing->nameRestoran . '</a>
                                </div>
                                    <div class="portfolio-item__title">
                                        <a href="#">Рейтинг:' . $rowing->score . '</a>
                                    </div>
                                    <a type="button" id="booking" class="btn btn-success mt-2" href="../formbooking.php">Забронювати</a>
                                    </div>
                                </div>';
            }
           
        }
        ?>

    </div>
</div> 


