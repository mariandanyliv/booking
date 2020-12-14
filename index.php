<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
        $website_title = "BookingRestoran";
        require 'blocks/head.php'
    ?>
</head>
<body>
    <?php require 'blocks/header.php' ?>
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
    <div class="row">
            <div class="col-4">
                <div class="portfolio-item">
                    <div class="portfolio-item__img">
                        <img src="/img/split.jpg"
                            alt="Kyiv">
                    </div>
                    <div class="portfolio-item__title">
                        <a href="work-organika.html">Split</a>
                    </div>
                    <div  type="button" id="auth_user" class="btn btn-success mt-2">Забронювати</div>
                </div>
            </div>

            <div class="col-4">
                <div class="portfolio-item">
                    <div class="portfolio-item__img">
                        <img src="/img/Lviv.jpg" alt="Lviv">
                    </div>
                    <div class="portfolio-item__title">
                        <a href="work-apollo.html">Львів</a>
                    </div>
                    <div  type="button" id="auth_user" class="btn btn-success mt-2">Забронювати</div>
                </div>
            </div>
    
        <div class="col-4">
            <div class="portfolio-item">
                <div class="portfolio-item__img">
                    <img src="/img/Harkiv.jpg"
                        alt="особистий сайт порфоліо">
                </div>
                <div class="portfolio-item__title">
                    <a href="work-portfolio.html">Харків</a>
                </div>
                <div  type="button" id="auth_user" class="btn btn-success mt-2">Забронювати</div>
            </div>
        </div>
      </div>
    </div>
</div>
    <?php require 'blocks/footer.php' ?>
</body>
</html>