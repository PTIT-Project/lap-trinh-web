<?php
    setcookie('password', $_POST['username'], time() - 3600);
    setcookie('username', $_POST['password'], time() - 3600);
    header('location:index.php');
?>