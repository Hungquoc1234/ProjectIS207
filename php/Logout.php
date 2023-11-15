<?php
    setcookie("UserID", '', time() - 36000, "/");
    setcookie("Role", '', time() - 36000, "/");

    header('Location: LoginPage.php');
?>