<?php
require_once('DatabaseConnection.php');

if(isset($_POST['product-id'])){
    mysqli_query($con, "delete from product where ProductID = ".$_POST['product-id']);

    echo $_POST['product-id'];
}

mysqli_close($con);