<?php
    require_once("php/DatabaseConnection.php");
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/Checkout.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="sidebar-body-container">
        <div class="sidebar">
            <ul class="menu">
                <div class="hamburger-bars">
                    <div class="hamburger-bar"></div>
                    <div class="hamburger-bar"></div>
                    <div class="hamburger-bar"></div>
                </div>

                <div class="real-menu">
                    <div class="">
                        <li class="menu-item home">
                            <a href="HomeAdmin.php" class="menu-button">
                                <i class="fa-solid fa-house menu-icon"></i>
                                <span class="menu-name">Trang chủ</span>
                            </a>
                        </li>
                        <li class="menu-item list">
                            <a href="" class="menu-button">
                                <i class="fa-solid fa-list menu-icon"></i>
                                <span class="menu-name">Danh mục sản phẩm</span>
                            </a>
                        </li>
                        <?php 
                            if(isset($_COOKIE['UserID'])){
                                echo '
                                    <li class="menu-item orders">
                                        <a href="" class="menu-button">
                                            <i class="fa-solid fa-box menu-icon"></i>
                                            <span class="menu-name">Đơn hàng của bạn</span>
                                        </a>
                                    </li>
                                    <li class="menu-item products">
                                        <a href="ProductManagement.php" class="menu-button">
                                            <i class="fa-solid fa-pen-to-square menu-icon"></i>
                                            <span class="menu-name">Sản phẩm của bạn</span>
                                        </a>
                                    </li>
                                    <li class="menu-item chat">
                                        <a href="" class="menu-button">
                                            <i class="fa-solid fa-comments menu-icon"></i>
                                            <span class="menu-name">Chat</span>
                                        </a>
                                    </li>
                                </div>
                                ';
                            }
                        ?>
                    
                    <div class="">
                        <?php
                            if(isset($_COOKIE['UserID'])){
                                echo '
                                    <li class="menu-item">
                                        <a href="Logout.php" class="menu-button">
                                            <i class="fa-solid fa-right-from-bracket menu-icon"></i>
                                            <span class="menu-name">Đăng xuất</span>
                                        </a>
                                    </li>
                                ';
                            }
                        ?>

                        <div class="light-dark-theme">
                            <div class="switch">
                                <i class="fa-solid fa-sun"></i>
                            </div>
                            <span class="theme-mode-name">Sáng</span>
                        </div>
                    </div>
                </div>
            </ul>
        </div>

        <div class="body">
            <div class="container-container">
                <div class="form">
                    <ul class="message-container">
                        <li>Xin vui lòng nhập đầy đủ thông tin!</li>
                    </ul>

                    <label for="input-name">Họ và tên:</label>
                    <input type="text" id="input-name">
                    <br>  

                    <label for="input-email">Email:</label>
                    <input type="text" id="input-email">
                    <br>  

                    <label for="input-phone">Số điện thoại:</label>
                    <input type="tel" id="input-phone">  
                    <br>  

                    <label for="input-address">Địa chỉ:</label>
                    <input type="text" id="input-address">
                    <br>  
                    <div class="save-cancel-button">
                        <button class="save-button" onclick="submitForm()">Đặt hàng</button>
                        <a href="index.php" class="cancel-button"><span>Về lại trang chủ</span></a>
                    </div>
                </div>

                <div class="cart-container">
                    <table class="cart">

                    </table>
                </div>
            </div>
        </div>

        <div class="black-curtain">
            <div class="notification">
                <div class="check-container"><i class="fa-solid fa-check"></i></div>
                <div id="head">Đặt hàng thành công</div>
                <p>Đơn hàng của bạn đã được ghi nhận, hãy quay về trang chủ để tiếp tục mua sắm!</p>
                <div class="sure-cancel-container">
                    <a class="home-button" href="HomeUser.php"><span>Về trang chủ</span></a>
                </div>
            </div>
        </div>
    </div>

    <script src="js/SideBar.js?v=<?php echo time(); ?>"></script>
    <script src="js/LightDarkSwitch.js?v=<?php echo time(); ?>"></script>
    <script src="js/Checkout.js?v=<?php echo time(); ?>"></script>

</body>
</html>