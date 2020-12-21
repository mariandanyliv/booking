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
    <div class="row" style="justify-content: center">
        <?php require 'blocks/restoran.php'; ?>
    </div> 
    <?php require 'blocks/footer.php'; ?>
</body>
</html>