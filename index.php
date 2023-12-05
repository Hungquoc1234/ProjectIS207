<?php
    require_once('php/DatabaseConnection.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/index.css?v=<?php echo time(); ?>">
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
                            <a href="" class="menu-button">
                                <i class="fa-solid fa-house menu-icon"></i>
                                <span class="menu-name">Home</span>
                            </a>
                        </li>
                        <li class="menu-item list">
                            <a href="" class="menu-button">
                                <i class="fa-solid fa-list menu-icon"></i>
                                <span class="menu-name">Product List</span>
                            </a>
                        </li>
                    </div>
                    
                    <div class="">
                        <div class="light-dark-theme">
                            <div class="switch">
                                <i class="fa-solid fa-sun"></i>
                            </div>
                            <span class="theme-mode-name">Light</span>
                        </div>
                    </div>
                </div>
            </ul>
        </div>

        <div class="body">
            <div class="container-container">
                <div class="container">
                    <div class="another-container">
                        <form class="search" method="post">
                            <div class="searchbar">
                                <button type="submit" class="search-button"><i class="fa-solid fa-magnifying-glass magnifying-glass"></i></button>
                                <input type="text" class="search-bar" placeholder="Search" name="searchKeyword">
                            </div>
                        </form>
                        <div class="cart-user">
                            <i class="fa-solid fa-cart-shopping"></i>
                            <i class="fa-solid user">
                                <img src="img\usericon.png" alt="">
                                <div class="dropdown">
                                    <div class="form">
                                        <center><h2>Đăng nhập</h2></center>

                                        <ul class="message-container">
                                            <li>Đây là message</li>
                                        </ul>

                                        <div class="input-container">
                                            <i class="fa-solid fa-envelope"></i>
                                            <input type="text" id="email-input" required>
                                            <label for="email-input">Email</label>
                                        </div>

                                        <div class="input-container">
                                            <i class="fa-solid fa-lock"></i>
                                            <input type="password" id="password-input" required>
                                            <label for="password-input">Mật khẩu</label>
                                        </div>

                                        <button class="submit-button" onclick="submitForm()">Đăng nhập</button>

                                        <div class="dont-have-account">Bạn chưa có tài khoản? 
                                            <a href="Signup.php">Đăng ký!</a>
                                        </div>
                                    </div>
                                </div>
                            </i>
                        </div>
                    </div>
                </div>
                    
                    
                    
                
                <div class="content-container">
                        <?php
                            $result = mysqli_query($con, 'select * from product join user on product.UserID = user.UserID');
                            while($row = mysqli_fetch_array($result)){
                                echo '
                                    <div class="product-container">
                                        <a href="php/ProductDetail.php?product-id='.$row['ProductID'].'" class="product">
                                            <img src="img/'.$row['Image'].'" class="product-image">
                                            <div class="name-price-container">
                                                <h3 class="product-name">'.$row['Name'].'</h3>
                                                <h5 class="user-name">'.$row['UserName'].'<h5>
                                            </div>
                                            <div class="price-profileImage-container">
                                                <h3 class="product-price">'.number_format($row['Price'], 0, '', '.').'đ</h3>
                                                <img src="img/'.$row['ProfileImage'].'" class="profile-image">
                                            </div>
                                           
                                        </a>
                                    </div>
                                ';
                            }
                        ?>
                </div>
            </div>
        </div>


    </div>

    <script src="js/SideBar.js?v=<?php echo time(); ?>"></script>
    <script src="js/LightDarkSwitch.js?v=<?php echo time(); ?>"></script>
    <script src="js/DropDown.js?v=<?php echo time(); ?>"></script>
    <script src="js/Login.js?v=<?php echo time(); ?>"></script>
    <script src="js/index.js?v=<?php echo time(); ?>"></script>
    
</body>
</html>