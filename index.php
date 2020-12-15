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
        if ($_COOKIE['log']=='' && $_COOKIE['admin']=='') {
            require 'blocks/header.php';
        } else if ($_COOKIE['log']!='') {
            require 'blocks/header.php';
        } else if ($_COOKIE['admin']!='') {
            require 'blocks/admin.php';
        }
 ?>   
    <?php require 'blocks/restoran.php'; ?>
    <?php require 'blocks/footer.php'; ?>
</body>
</html>