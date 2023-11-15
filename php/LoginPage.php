<?php
    require_once("KetNoiCSDL.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/Login.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="container">
        <form method="post">
            <?php 
                if(isset($_POST['email']) && isset($_POST['password'])){
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    if(empty($email) || empty($password)){
                        //thong bao yeu cau nhap day du thong tin
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
                                setcookie("UserID", $row['UserID'], time() + 36000, "/");
                                setcookie("Role", $row['Role'], time() + 36000, "/");

                                if($row['Role'] == 'admin'){
                                    header('Location: HomeAdmin.php');
                                }
                                else if($row['Role'] == 'user'){
                                    header('Location: HomeUser.php');
                                }
                                mysqli_close($con);
                                
                                die();
                            }
                            else{
                                //thong bao tai khoan hoac password khong dung
                                echo '
                                    <i class="fa-sharp fa-solid fa-circle-exclamation a"></i>
                                    <span class="alert wrong-account-or-password">Sai Email hoặc mật khẩu!</span>
                                ';
                            }
                        }
                        else{
                            //thong bao tai khoan hoac password khong dung
                            echo '<span class="alert wrong-account-or-password">Sai Email hoặc mật khẩu!</span>';
                        }
                    }
                }
            ?>

            <h1>Đăng nhập</h1>

            <div class="email-input-container">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" placeholder="Email" name="email" value=
                "<?php
                    if(isset($email)){
                        echo $email;
                    }
                ?>"><br>
            </div>

            <div class="password-input-container">
                <i class="fa-solid fa-lock"></i>
                <input type="password" placeholder="Mật khẩu" name="password" value=
                "<?php
                    if(isset($password)){
                        echo $password;
                    }
                ?>"><br>
            </div>

            <button class="submit-button" type="submit">Đăng nhập</button>
            <a class="goto-homepage" href="../index.php">Trang chủ</a>
            <span class="abc"><center>Bạn chưa có tài khoản? <a href="SignUp.php">Đăng ký</a></center></span>
        </form>
    </div>
</body>
</html>