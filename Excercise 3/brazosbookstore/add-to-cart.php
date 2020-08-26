<?php 
    include './template-parts/database.php';

    $id = (int)$_GET['id'];
    $quantity = (int)$_GET['quantity'];

    if(mysqli_num_rows(mysqli_query($DB_LINK, "SELECT * FROM books WHERE BookID = $id")) == 0) {
        die(404);
    }

    if(isset($_COOKIE['cart'])) {
        $cart = unserialize($_COOKIE['cart']);
        if(isset($cart[$id])) {
            $cart[$id] += $quantity; 
        } else {
            $cart[$id] = $quantity; 
        }
    }
    else {
        $cart = [$id => $quantity];
    }

    //Tính lại số items trong giỏ
    $items = 0;
    foreach ($cart as $id => $quantity) {
        $items += $quantity;
    }

    $cartSerilized = serialize($cart);
    setcookie('cart', $cartSerilized, time() + 3600, '/'); 
    echo $items;

?>