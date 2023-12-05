<?php
require_once('DatabaseConnection.php');

$Image = '';
$ProductName = '';
$ProductPrice = '';
$Description = '';

if(isset($_POST['product-id'])){
    $result = mysqli_query($con, "select Image, Name, Price, Description from product where ProductID = ".$_POST['product-id']);
    
    $row = mysqli_fetch_array($result);

    $ProductName = $row['Name'];
    $ProductPrice = $row['Price'];
    $Description = $row['Description'];
    $Image = $row['Image'];
}

echo json_encode(
    [
        'ProductName' => $ProductName,
        'ProductPrice' => $ProductPrice,
        'Description' => $Description,
        'Image' =>$Image
    ]
);

mysqli_close($con);