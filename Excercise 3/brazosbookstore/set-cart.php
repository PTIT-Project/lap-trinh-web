<?php
    if(!isset($_COOKIE['cart'])) {
        $cart = [];
        setcookie('cart', serialize($cart), time() + 3600, '/'); 
    }
    else {
        if(isset($_GET['id']) && isset($_GET['quantity'])) {
            $cart = unserialize($_COOKIE['cart']);
            foreach ($cart as $id => $quantity) {
                
                if($id == (int)$_GET['id']) {
                    $cart[$id] = (int)$_GET['quantity'];
                    $serializedCart = serialize($cart);
                    setcookie('cart', $serializedCart, time() + 3600, '/');
                    echo json_encode($cart);
                    return;
                }
            }
        }
    }
?>