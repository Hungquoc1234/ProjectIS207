<?php
require_once('DatabaseConnection.php');

if(isset($_FILES['image'])){
    $Image = $_FILES['image']['name'];

    mysqli_query($con, "update user set ProfileImage = '".$Image."' where UserID = ".$_COOKIE['UserID']);

    move_uploaded_file($_FILES['image']['tmp_name'], "../img/".$Image);

    echo $Image;
}