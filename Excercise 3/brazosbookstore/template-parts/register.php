<?php 
    $DB_LINK = new mysqli('localhost', 'root', '', 'brazos_bookstore') or die('LỖI KẾT NỐI CƠ SỞ DỮ LIỆU');

    $username = $_GET['username'];
    $password = $_GET['password'];
    $address = $_GET['address'];
    $name = $_GET['name'];
    $city = $_GET['city'];
    $country = $_GET['country'];
    $phone = $_GET['phone'];
    $postalCode = $_GET['postalCode'];

    if($username && $password && $address && $name && $city && $country && $phone && $postalCode) {
        $rsGET = mysqli_query($DB_LINK, "SELECT * FROM user WHERE username = '$username'");
        $isExist = mysqli_num_rows($rsGET);

        if($isExist == 0) {
            if (mysqli_query($DB_LINK, "INSERT INTO user(username, password, role) VALUES ('$username', '$password', 'CUSTOMER')")) {
                $userID = mysqli_insert_id($DB_LINK);
                if(mysqli_query($DB_LINK, "INSERT INTO customers (`CustomerName`, `Phone`, `Address`, `City`, `PostalCode`, `Country`, `UserID`) VALUES ('$name', '$phone', '$address', '$city', '$postalCode', '$country', '$userID')")) {
                    echo 'SUCCESS';
                }
            } else {
                echo 'FAILED';
            }
        } else {
            echo 'USERNAME_EXIST';
        }
    } else {
        echo 'NULL';
    }
?>