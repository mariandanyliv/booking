<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
  <h5 class="my-0 mr-md-auto font-weight-normal"><a href="/index.php">BookingRestoran</a></h5>

  <?php if ($_COOKIE['user']==''):?>
  <a class="btn btn-outline-primary mr-2 mb-2" href="/auth.php">Увійти</a>
  <a class="btn btn-outline-primary mb-2" href="/reg.php">Реєстрація</a>
  <?php else: ?>
  <a class="btn btn-outline-primary mr-2 mb-2" href="./auth.php">Профіль</a>
  <?php endif; ?>

</div>