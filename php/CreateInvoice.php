<?php
require_once('DatabaseConnection.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $jsonData = $_POST['jsonData'];
    $Name = $_POST['Name'];
    $Email = $_POST['Email'];
    $Phone = $_POST['Phone'];
    $Address = $_POST['Address'];
    $TotalPrice = 0;

    // Giải mã JSON thành mảng PHP
    $data = json_decode($jsonData, true);

    foreach ($data as $value) {
        $TotalPrice += $value['TotalPrice'];
    }

    if(empty($Name) or empty($Email) or empty($Phone) or empty($Address)){
        $Full = false;
        $ErrorMessage = 'Xin vui lòng nhập đủ thông tin!';
    }
    else{
        $Full = true;

        if(isset($_COOKIE['UserID'])){
            mysqli_query($con, "insert into invoice values('', ".$_COOKIE['UserID'].", '".date('Y-m-d')."', '$TotalPrice', '$Name', '$Address', '$Phone', '$Email')");     
        }

        else{
            mysqli_query($con, "insert into invoice values('', NULL, '".date('Y-m-d')."', '$TotalPrice', '$Name', '$Address', '$Phone', '$Email')");     
        }

        foreach ($data as $value) {
            mysqli_query($con, "insert into invoice_detail values(".mysqli_insert_id($con).", ".$value['ProductID'].", ".$value['Quantity'].")");   
        }

        session_destroy();
    }

    echo 'da tao hoa don';
} 

else {
    echo 'Invalid request method';
}