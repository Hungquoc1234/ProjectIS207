<?php
require_once('DatabaseConnection.php');

$Image = '';
$Detail = '';
$Description = '';

if(isset($_POST['product-id'])){
    $result = mysqli_query($con, "select * from user join product on user.UserID = product.UserID where ProductID = ".$_POST['product-id']);

    $row = mysqli_fetch_array($result);

    $Image = '<img src="img/'.$row['Image'].'" class="product-image">';
    $Detail = '<h1 class="product-name">'.$row['Name'].'</h1>
    <div class="product-price">'.number_format($row['Price'], 0, '', '.').'đ</div>
    <div class="user-image-name-container">
        <img src="img/'.$row['ProfileImage'].'" class="user-image">
        <span>'.$row['UserName'].'</span>
    </div>';
    $Description = '<p class="description">'.$row['Description'].'</p>';
}

echo json_encode(
    [
        'Image' => $Image,
        'Detail' => $Detail,
        'Description' => $Description
    ]
);