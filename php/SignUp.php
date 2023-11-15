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
    <link rel="stylesheet" href="../css/SignUp.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="container">
        <form method="post">
            <?php 
                if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['phonenumber']) && isset($_POST['password']) && isset($_POST['cpassword'])){
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $phonenumber = $_POST['phonenumber'];
                    $password = $_POST['password'];
                    $cpassword = $_POST['cpassword'];

                    if(empty($username) || empty($email) || empty($phonenumber) || empty($password) || empty($cpassword)){
                        //thong bao yeu cau nhap day du thong tin
                        echo '
                            <i class="fa-sharp fa-solid fa-circle-exclamation"></i>
                            <span class="alert not-enough-information">Thông tin nhập chưa đầy đủ!</span>
                        ';
                    }
                    else{
                        if($password != $cpassword){
                            echo '<span class="alert mismatched-password">Mật khẩu không khớp!</span>';
                        }
                        else{
                            
                            $result2 = mysqli_query($con, "select Email from user where Email = '$email'");
                            $result = mysqli_query($con, "select UserName from user where UserName = '$username'");

                            if(mysqli_num_rows($result) > 0 and mysqli_num_rows($result2) > 0){
                                echo '<i class="fa-sharp fa-solid fa-circle-exclamation a"></i>';
                                echo '<span class="alert existed-username">Tên người dùng đã tồn tại.</span>';
                                echo '<i class="fa-sharp fa-solid fa-circle-exclamation b"></i>';
                                echo '<span class="alert existed-email">Email này đã tồn tại.</span>';
                            }
                            else if(mysqli_num_rows($result2) > 0){
                                echo '<i class="fa-sharp fa-solid fa-circle-exclamation b"></i>';
                                echo '<span class="alert existed-email">Email này đã tồn tại.</span>';
                            }
                            else if(mysqli_num_rows($result) > 0){
                                echo '<i class="fa-sharp fa-solid fa-circle-exclamation a"></i>';
                                echo '<span class="alert existed-username">Tên người dùng đã tồn tại.</span>';
                            }
                            else{
                                mysqli_query($con, "insert into user values('', '', '$username', '$email', '$phonenumber', '', '$password', 'user')");
                                
                                mysqli_close($con);
                
                                //chuyen sang trang Login.php
                                header('Location: LoginPage.php');
                                
                                die();
                            }
                        }
                    }
                }
            ?>

            <h1>Đăng ký</h1>

            <div class="username-input-container">
                <i class="fa-solid fa-user"></i>
                <input type="text" placeholder="Tên người dùng" name="username" value=
                "<?php 
                    if(isset($username)){
                        echo $username;
                    }
                ?>"><br>
            </div>

            <div class="email-input-container">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" placeholder="Email" name="email" value=
                "<?php
                    if(isset($email)){
                        echo $email;
                    }
                ?>"><br>
            </div>

            <div class="phonenumber-input-container">
                <i class="fa-solid fa-phone"></i>
                <input type="text" placeholder="Số điện thoại" name="phonenumber" value=
                "<?php
                    if(isset($phonenumber)){
                        echo $phonenumber;
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

            <div class="cpassword-input-container">
                <input type="password" placeholder="Xác nhận mật khẩu" name="cpassword" value=
                "<?php
                    if(isset($cpassword)){
                        echo $cpassword;
                    }
                ?>"><br>
            </div>

            <button class="submit-button" type="submit">Đăng ký</button>
            <span class="abc"><center>Đã có tài khoản? <a href="LoginPage.php">Đăng nhập</a></center></span>
        </form>
    </div>
</body>
</html>