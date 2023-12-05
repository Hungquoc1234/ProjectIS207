<?php
require_once('DatabaseConnection.php');

$ValidFormat = true;
$ErrorMessage = '';
if(!isset($_FILES['image'])){
    $ValidFormat = false;
    $ErrorMessage = 'Xin vui lòng nhập đầy đủ thông tin!';
}

else if(isset($_FILES['image']) and isset($_POST['product-name']) and isset($_POST['product-price']) and isset($_POST['description'])){
    $Image = $_FILES['image']['name'];
    $ProductName = $_POST['product-name'];
    $ProductPrice = $_POST['product-price'];
    $Description = $_POST['description'];
    
    if(empty($ProductName) or empty($ProductPrice)){
        $ValidFormat = false;
        $ErrorMessage = 'Xin vui lòng nhập đầy đủ thông tin!';
    }
    
    else{
        $Description = str_replace("'", "`", $Description);

        mysqli_query($con, "insert into product values('', ".$_COOKIE['UserID'].", '$Image', '', '$ProductName', '$ProductPrice', '$Description')");

        move_uploaded_file($_FILES['image']['tmp_name'], "../img/".$Image);
    }
}

echo json_encode(
    [
        'ValidFormat' => $ValidFormat,
        'ErrorMessage' => $ErrorMessage
    ]
);

mysqli_close($con);