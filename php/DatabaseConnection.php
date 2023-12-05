<?php
    $con = mysqli_connect('localhost', 'root', '', 'webbanhang');

    if(!$con){
        die("Connection failed:".mysqli_connect_error());
    }
?>