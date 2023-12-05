<?php
require_once('DatabaseConnection.php');

$ValidFormat = true;
$ErrorMessage = '';

if(isset($_POST['product-id'])){    
    if(!isset($_FILES['image']) and isset($_POST['product-name']) and isset($_POST['product-price']) and isset($_POST['description'])){
        $result = mysqli_query($con, "select Image from product where ProductID = ".$_POST['product-id']);
        $row = mysqli_fetch_array($result);
        $Image = $row['Image'];
        $ProductName = $_POST['product-name'];
        $ProductPrice = $_POST['product-price'];
        $Description = $_POST['description'];
    
        if(empty($ProductName) or empty($ProductPrice) or empty($Description)){
            $ValidFormat = false;
            $ErrorMessage = 'Xin vui lòng nhập đầy đủ thông tin!';
        }
    
        else{
            $Description = str_replace("'", "`", $Description);
    
            mysqli_query($con, "update product set Image = '".$Image."', Name = '".$ProductName."',  Price = ".$ProductPrice.",  Description = '".$Description."' where ProductID = ".$_POST['product-id']);
        }
    }
    
    else if(isset($_FILES['image']) and isset($_POST['product-name']) and isset($_POST['product-price']) and isset($_POST['description'])){
        $Image = $_FILES['image']['name'];
        $ProductName = $_POST['product-name'];
        $ProductPrice = $_POST['product-price'];
        $Description = $_POST['description'];
        
        if(empty($ProductName) or empty($ProductPrice) or empty($Description)){
            $ValidFormat = false;
            $ErrorMessage = 'Xin vui lòng nhập đầy đủ thông tin!';
        }
        
        else{
            $Description = str_replace("'", "`", $Description);
    
            mysqli_query($con, "update product set Image = '".$Image."', Name = '".$ProductName."',  Price = ".$ProductPrice.",  Description = '".$Description."' where ProductID = ".$_POST['product-id']);
    
            move_uploaded_file($_FILES['image']['tmp_name'], "../img/".$Image);
        }
    }
}

echo json_encode(
    [
        'ValidFormat' => $ValidFormat,
        'ErrorMessage' => $ErrorMessage
    ]
);

mysqli_close($con);