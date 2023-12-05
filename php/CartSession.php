<?php
session_start();

if(isset($_POST['product-id']) and isset($_POST['quantity'])){
    $_SESSION['cart'][] = [$_POST['product-id'], $_POST['quantity']];
}

if(isset($_POST['id'])){
    $cart = $_SESSION['cart'];

    for($i = 0; $i < count($cart); $i++){
        if($cart[$i][0] == $_POST['id']){
            array_splice($cart, $i, 1);
        }
        
        $_SESSION['cart'] = $cart;
    }
}