<?php 
setcookie('user', $user, time() - 3600 * 24 * 30, "/");
setcookie('admin', $login, time() - 3600 * 24 * 30, "/");
echo true;
?>