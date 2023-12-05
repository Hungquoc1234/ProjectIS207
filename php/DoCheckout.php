<?php
require_once('DatabaseConnection.php');
session_start();

if(isset($_SESSION['cart'])){
    $CartList = [];

    for($i = 0; $i < count($_SESSION['cart']); $i++){
        if(isset($_SESSION['cart'][$i])){
            $result = mysqli_query($con, 'select ProductID, Image, Name, Price from product where ProductID = '.$_SESSION['cart'][$i][0]);
            
            $row = mysqli_fetch_array($result);
    
            $Cart = [
                'ProductID' => $row['ProductID'],
                'ProductImage' => $row['Image'],
                'ProductName' => $row['Name'],
                'ProductPrice' => $row['Price'],
                'Quantity' => $_SESSION['cart'][$i][1]
            ];
            
            $CartList[] = $Cart;
        }
    }

    echo json_encode($CartList);
}
else{
    echo 'ko co cart';
}

mysqli_close($con);