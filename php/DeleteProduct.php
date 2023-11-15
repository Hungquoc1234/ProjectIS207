<?php
    require_once('KetNoiCSDL.php');
    if(isset($_POST['id'])){
        mysqli_query($con, "delete from product where ProductID = ".$_POST['id']);
    }
    mysqli_close($con);
?>