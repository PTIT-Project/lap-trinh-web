<?php 
    require 'config/config-decode.php';

    $DB_LINK = new mysqli($_CONFIG['host'], $_CONFIG['database']['user'],  $_CONFIG['database']['pass'],  $_CONFIG['database']['name']) or die('LỖI KẾT NỐI CƠ SỞ DỮ LIỆU');
    // $DB_LINK = new mysqli('localhost', 'root', '',  'brazos_bookstore') or die('LỖI KẾT NỐI CƠ SỞ DỮ LIỆU');
    mysqli_query($DB_LINK, 'SET NAMES UTF8');
?>