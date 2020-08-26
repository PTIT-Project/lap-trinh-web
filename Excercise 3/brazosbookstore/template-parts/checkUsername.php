<?php 
    $DB_LINK = new mysqli('localhost', 'root', '', 'brazos_bookstore') or die('LỖI KẾT NỐI CƠ SỞ DỮ LIỆU');
    
    $username = $_GET['username'];
    $rsGET = mysqli_query($DB_LINK, "SELECT * FROM user WHERE username = '$username'");

    $isExist = mysqli_num_rows($rsGET);

    echo $isExist;
?>