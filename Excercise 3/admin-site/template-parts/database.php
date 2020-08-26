<?php 
    $DB_LINK = new mysqli('localhost', 'root', '', 'brazos_bookstore') or die('LỖI KẾT NỐI CƠ SỞ DỮ LIỆU');
    mysqli_query($DB_LINK, 'SET NAMES UTF8');
?>