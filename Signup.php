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
            <center><h1>Đăng ký</h1></center>

            <ul class="message-container">
                <li>Đây là message</li>
            </ul>

            <div class="input-container">
                <i class="fa-solid fa-user"></i>
                <input type="text" id="username-input" required>
                <label for="username-input">Tên của bạn</label>
            </div>

            <div class="input-container">
                <i class="fa-solid fa-envelope"></i>
                <input type="text" id="email-input" required>
                <label for="email-input">Email</label>
            </div>

            <div class="input-container">
                <i class="fa-solid fa-phone"></i>
                <input type="tel" id="phonenumber-input" required>
                <label for="phonenumber-input">Số điện thoại</label>
            </div>

            <div class="input-container">
                <i class="fa-solid fa-lock"></i>
                <input type="password" id="password-input" required>
                <label for="password-input">Mật khẩu</label>
            </div>

            <div class="input-container">
                <input type="password" id="cpassword-input" required>
                <label for="cpassword-input">Xác nhận mật khẩu</label>
            </div>

            <button class="submit-button" onclick="submitForm()">Đăng ký</button>
            <span class="abc"><center>Đã có tài khoản? <a href="Login.php">Đăng nhập</a></center></span>
        </form>
    </div>

    <script src="js/Signup.js?v=<?php echo time(); ?>"></script>
</body>
</html>