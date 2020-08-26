<?php 
    require "./template-parts/database.php";

    if (isset($_COOKIE['cart']) && isset($_COOKIE['userID'])) {
        $user = $_COOKIE['userID'];
        $note = $_GET['note'];
        $cart = unserialize($_COOKIE['cart']);
        
        foreach ($cart as $product => $quantity) {
            if(mysqli_query($DB_LINK, "INSERT INTO orders (CustomerID, BookID, Quantity, Note) VALUES ('$user', '$product', '$quantity','$note')")) {
            } else {
                echo 500;
            }
        }
        
        // header('location:cart.php');
        setcookie('cart', '', time() - 3600, '/');
        echo json_encode($user, JSON_UNESCAPED_UNICODE);
    }
?>