<?php 
    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        if(isset($_COOKIE['cart'])) {
            $cart = unserialize($_COOKIE['cart']);
            if(isset($cart[$id])) {
                unset($cart[$id]);
            }
        }

        $cartSerilized = serialize($cart);
        setcookie('cart', $cartSerilized, time() + 3600, '/'); 
        
        header('location:cart.php');
    }
?>