<?php
    require_once('KetNoiCSDL.php');
    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = $_POST['email'];
        $password = $_POST['password'];

        if(empty($email) || empty($password)){
            //thong bao yeu cau nhap day du thong tin
            session_start();
            $_SESSION['alert'] = 'true';
            echo '
                <i class="fa-sharp fa-solid fa-circle-exclamation"></i>
                <span class="alert not-enough-information">Thông tin nhập chưa đầy đủ!</span>
            ';
        }
        else{                           
            $result = mysqli_query($con, "select UserID, Password, Role from user where Email = '$email'");
            if(mysqli_num_rows($result) > 0){
                $row = mysqli_fetch_assoc($result);

                //kiem tra password co dung khong
                if($password == $row['Password']){
                    setcookie("UserID", '', time() - 36000, "/");
                    setcookie("Role", '', time() - 36000, "/");
                    setcookie("UserID", $row['UserID'], time() + 36000, "/");
                    setcookie("Role", $row['Role'], time() + 36000, "/");

                    if($row['Role'] == 'admin'){
                        header('Location: php/HomeAdmin.php');
                    }
                    else if($row['Role'] == 'user'){
                        header('Location: php/HomeUser.php');
                    }
                    mysqli_close($con);
                    
                    die();
                }
                else{
                    //thong bao tai khoan hoac password khong dung
                    session_start();
                    $_SESSION['alert'] = 'true';
                    echo '
                        <i class="fa-sharp fa-solid fa-circle-exclamation a"></i>
                        <span class="alert wrong-account-or-password">Sai Email hoặc mật khẩu!</span>
                    ';
                }
            }
            else{
                //thong bao tai khoan hoac password khong dung
                session_start();
                $_SESSION['alert'] = 'true';
                echo '
                    <i class="fa-sharp fa-solid fa-circle-exclamation a"></i>
                    <span class="alert wrong-account-or-password">Sai Email hoặc mật khẩu!</span>
                ';
            }
        }
    }
?>