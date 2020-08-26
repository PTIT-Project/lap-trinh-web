<?php 
    $DB_LINK = new mysqli('localhost', 'root', '', 'brazos_bookstore') or die('LỖI KẾT NỐI CƠ SỞ DỮ LIỆU');

    $username = $_GET['username'];
    $password = $_GET['password'];

    if($username && $password) {
        $rsGET = mysqli_query($DB_LINK, "SELECT * FROM user WHERE username = '$username'");
        $isExist = mysqli_num_rows($rsGET);

        if($isExist == 0) {
            if (mysqli_query($DB_LINK, "INSERT INTO user(username, password) VALUES ('$username', '$password')")) {
                echo 'SUCCESS';
            } else {
                echo 'FAILED';
            }
        } else {
            echo 'USERNAME_EXIST';
        }
    } else if($username) {
        echo 'PASSWORD_NULL';
    } else if($password) {
        echo 'USERNAME_NULL';
    } else {
        echo 'NULL';
    }
?>