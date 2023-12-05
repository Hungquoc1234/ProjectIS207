<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/SignupAndLogin.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="container">
        <div class="form">
            <center><h1>Đăng nhập</h1></center>

            <ul class="message-container">
                <li>Đây là message</li>
            </ul>

            <div class="input-container">
                <i class="fa-solid fa-envelope"></i>
                <input type="email" id="email-input" required>
                <label for="email-input">Email</label>
            </div>

            <div class="input-container">
                <i class="fa-solid fa-lock"></i>
                <input type="password" id="password-input" required>
                <label for="password-input">Mật khẩu</label>
            </div>

            <button class="submit-button" onclick="submitForm()">Đăng nhập</button>
            <a href="index.php" class="submit-button">Trang chủ</a>
            <span class="abc"><center>Chưa có tài khoản? <a href="SignUp.php">Đăng ký</a></center></span>
        </form>
    </div>

    <script src="js/Login.js?v=<?php echo time(); ?>"></script>
</body>
</html>