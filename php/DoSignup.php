<?php
require_once('DatabaseConnection.php');

$SingupSuccess = true;
$ErrorMessage = [];

if(isset($_POST['username']) and isset($_POST['email']) and isset($_POST['phonenumber']) and isset($_POST['password']) and isset($_POST['confirmpassword'])){
    
    $Username = $_POST['username'];
    $Email = $_POST['email'];
    $Phonenumber = $_POST['phonenumber'];
    $Password = $_POST['password'];
    $ConfirmPassword = $_POST['confirmpassword'];
    
    if(empty($Username) or empty($Email) or empty($Phonenumber) or empty($Password) or empty($ConfirmPassword)){
        $SingupSuccess = false;
        $ErrorMessage[] = 'Xin vui lòng nhập đầy đủ thông tin!';
    }
    
    else if($SingupSuccess == true){
        $result1 = mysqli_query($con, "select Email from user where Email = '$Email'");
        $result2 = mysqli_query($con, "select UserName from user where UserName = '$Username'");

        if(mysqli_num_rows($result1) > 0){
            $SingupSuccess = false;
            $ErrorMessage[] = 'Email đã tồn tại, vui lòng nhập Email khác!';
        }

        if(mysqli_num_rows($result2) > 0){
            $SingupSuccess = false;
            $ErrorMessage[] = 'Tên đã tồn tại, vui lòng nhập tên khác!';
        }

        if($Password == $ConfirmPassword){
            $SingupSuccess = true;

            mysqli_query($con, "insert into user values('', '', '$Username', '$Email', '$Phonenumber', '', '$Password', 'user')");     
            mysqli_close($con);
        }

        else{
            $SingupSuccess = false;
            $ErrorMessage[] = 'Mật khẩu không khớp!';
        }
    }
}

echo json_encode(
    [
        'SignupSuccess' => $SingupSuccess,
        'ErrorMessage' => $ErrorMessage
    ]
);