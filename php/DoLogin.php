<?php
require_once('DatabaseConnection.php');

$LoginSuccess = true;
$ErrorMessage = [];

if(isset($_POST['email']) and isset($_POST['password'])){
    
    $Email = $_POST['email'];
    $Password = $_POST['password'];
    
    if(empty($Email) or empty($Password)){
        $LoginSuccess = false;
        $ErrorMessage[] = 'Xin vui lòng nhập đầy đủ thông tin!';
    }
    
    else if($LoginSuccess == true){
        $result = mysqli_query($con, "select UserID, Email, Password, Role from user where Email = '$Email'");

        if(mysqli_num_rows($result) > 0){
            $row = mysqli_fetch_array($result);

            if($Password == $row['Password']){
                $LoginSuccess = true;

                setcookie("UserID", '', time() - 3600, "/");
                setcookie("Role", '', time() - 3600, "/");
                setcookie("UserID", $row['UserID'], time() + 3600, "/");
                setcookie("Role", $row['Role'], time() + 3600, "/");

                mysqli_close($con);
            }

            else{
                $LoginSuccess = false;
                $ErrorMessage[] = 'Sai mật khẩu hoặc Email!';
            }
        }

        else{
            $LoginSuccess = false;
            $ErrorMessage[] = 'Sai mật khẩu hoặc Email!';
        }
    }
}

echo json_encode(
    [
        'SignupSuccess' => $LoginSuccess,
        'ErrorMessage' => $ErrorMessage
    ]
);