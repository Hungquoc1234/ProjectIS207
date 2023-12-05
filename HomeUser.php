<?php
    require_once("php/DatabaseConnection.php");
    if($_COOKIE['Role'] != 'user'){
        if($_COOKIE['Role'] == 'admin'){
            header('Location: HomeAdmin.php');
        }
        else{
            header('Location: index.php');
        }
    }

    $result = mysqli_query($con, 'select ProfileImage, UserName from user where UserID = '.$_COOKIE['UserID']);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        $Image = $row['ProfileImage'];
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/Home.css?v=<?php echo time(); ?>">
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
                    <div class="upper-menu">
                        <li class="menu-item home">
                            <a href="" class="menu-button">
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
                    
                    <div class="lower-menu">
                        <li class="menu-item">
                            <a href="Logout.php" class="menu-button">
                                <i class="fa-solid fa-right-from-bracket menu-icon"></i>
                                <span class="menu-name">Đăng xuất</span>
                            </a>
                        </li>

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
                <div class="container">
                    <div class="another-container">
                        <form class="search" method="post">
                            <div class="searchbar">
                                <button type="submit" class="search-button"><i class="fa-solid fa-magnifying-glass magnifying-glass"></i></button>
                                <input type="text" class="search-bar" placeholder="Tìm kiếm..." name="searchKeyword">
                            </div>
                        </form>
                        <div class="cart-user">
                            <div class="fa-solid fa-cart-shopping">
                                <div class="cart-container">

                                </div>
                            </div>
                            <div class="user">
                                <div class="B"></div>
                                <div class="dropdown">
                                    <i class="fa-solid fa-xmark"></i>
                                    <div class="dropdown-container">
                                        <div class="image-name-container">
                                            <div class="A"></div>
                                            <div class="edit-image-button" onclick="openUpdateImageContainer()">
                                                <i class="fa-solid fa-pen"></i>
                                            </div>
                                        </div>
                                        <a href="" class="dropdown-icon account-detail-button"><i class="fa-solid fa-user"></i>Chi tiết tài khoản</a>
                                        <a href="" class="dropdown-icon your-products-button"><i class="fa-solid fa-pen-to-square"></i>Sản phẩm của bạn</a>
                                        <a href="" class="dropdown-icon your-orders-button"><i class="fa-solid fa-box"></i>Đơn hàng của bạn</a>
                                        <button class="dropdown-icon switch-account-button" onClick="changeToLoginForm()"><i class="fa-solid fa-repeat"></i>Chuyển tài khoản</button>
                                        <a href="Logout.php" class="dropdown-icon logout-button"><i class="fa-solid fa-right-from-bracket"></i>Đăng xuất</a>
                                    </div>
                                        
                                    <div class="form">
                                        <i class="fa-solid fa-arrow-left" onClick="backToAccountInfo()"></i>
                                        <center><h2>Đăng nhập</h2></center>

                                        <ul class="message-container">
                                            <li>Đây là message</li>
                                        </ul>

                                        <div class="input-container">
                                            <i class="fa-solid fa-envelope"></i>
                                            <input type="email" id="email-input" required>
                                            <label for="email-input" class="input-label">Email</label>
                                        </div>

                                        <div class="input-container">
                                            <i class="fa-solid fa-lock"></i>
                                            <input type="password" id="password-input" required>
                                            <label for="password-input" class="input-label">Mật khẩu</label>
                                        </div>

                                        <button class="submit-button" onclick="submitForm()">Đăng nhập</button>

                                        <div class="dont-have-account">Bạn chưa có tài khoản? 
                                            <a href="Signup.php">Đăng ký!</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                    
                    
                <div class="content-container">
                        
                </div>
            </div>
        </div>

    <div class="black-curtain">
        <dive class="update-profile-image-form" enctype="multipart/form-data" onsubmit="updateImageFormSubmit()">
            <img class="profile-image" src="img/<?php echo $Image; ?>" alt="">
            <div class="edit-image-button1">
                <label for="input-file" class="fa-solid fa-pen"></label>
                <input id="input-file" type="file" accept="image/jpeg, image/png, image/jpg" onchange="viewImage()">
            </div>
            <div class="update-profile-image-button-container">
                <button class="update-profile-image-button" onclick="updateImageFormSubmit()">Cập nhật</button>
                <button class="cancel-update-profile-image-button" onclick="cancelUpdateImage()">Hủy</button>
            </div>
        </div>
    </div>


    </div>

    <script src="js/SideBar.js?v=<?php echo time(); ?>"></script>
    <script src="js/LightDarkSwitch.js?v=<?php echo time(); ?>"></script>
    <script src="js/DropDown.js?v=<?php echo time(); ?>"></script>
    <script src="js/Login.js?v=<?php echo time(); ?>"></script>
    <script src="js/Home.js?v=<?php echo time(); ?>"></script>

    <script>
        function viewImage(){
            document.querySelector('.profile-image').src = URL.createObjectURL(document.querySelector('#input-file').files[0]);
        }

        function openUpdateImageContainer(){
            document.querySelector('.black-curtain').style.display = 'flex';
            document.querySelector('.update-profile-image-form').style.display = 'flex';
        }

        function cancelUpdateImage(){
            document.querySelector('.black-curtain').style.display = 'none';
        }
    </script>
</body>
</html>