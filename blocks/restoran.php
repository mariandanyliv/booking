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
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Aspernatur aliquid placeat eius quas! Enim similique sequi assumenda non fugiat aperiam iure nobis quia? Quidem optio voluptatibus mollitia laborum dolor debitis.
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
            echo '<div class="row">
                <div class="col-4">
                <div class="portfolio-item">
                    <div class="portfolio-item__img">
                        <img src="' . $rowing->img . '"alt="Split">
                    </div>
                    <div class="portfolio-item__title">
                        <a href="#">' . $rowing->nameRestoran . '</a>
                    </div>
                    <div class="portfolio-item__title">
                    <a href="#">Рейтинг:' . $rowing->score . '</a>
                </div>
                    <div  type="button" id="booking" class="btn btn-success mt-2">Забронювати</div>
                </div>
            </div>';
        }
        ?>
    </div>
</div> 

