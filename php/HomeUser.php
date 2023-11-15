<?php
    require_once("KetNoiCSDL.php");
    if($_COOKIE['Role'] != 'user'){
        if($_COOKIE['Role'] == 'admin'){
            header('Location: HomeUser.php');
        }
        else{
            header('Location: ../index.php');
        }
    }
    require_once('Login.php');

    $result = mysqli_query($con, 'select ProfileImage, UserName from user where UserID = '.$_COOKIE['UserID']);

    if(mysqli_num_rows($result) > 0){
        $row = mysqli_fetch_array($result);
        $Image = $row['ProfileImage'];
    
        if(isset($_FILES['ProfileImage'])){
            $Image = $_FILES['ProfileImage']['name'];

            mysqli_query($con, "update user set ProfileImage = '../img/".$_FILES['ProfileImage']['name']."' where UserID = ".$_COOKIE['UserID']);

            move_uploaded_file($_FILES['ProfileImage']['tmp_name'], "../img/".$_FILES['ProfileImage']['name']);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="../css/Home.css?v=<?php echo time(); ?>">
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
                    
                    <div class="">
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
                            <i class="fa-solid fa-cart-shopping"></i>
                            <div class="user">
                                <img src="<?php echo "../img/".$Image; ?>" alt="">
                                <div class="dropdown">
                                    <div class="dropdown-container">
                                        <div class="image-name-container">
                                            <img class="image" src="<?php echo "../img/".$Image; ?>" alt="">
                                            <h2><?php echo $row['UserName']; ?></h2>
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
                                    <form method="post" class="dropdown-container1">
                                        <i class="fa-solid fa-arrow-left" onClick="backToAccountInfo()"></i>
                                        <?php
                                            if(isset($_SESSION['alert'])){
                                                echo '<script>
                                                        document.querySelector(".user").classList.toggle("active");
                                                        document.querySelector(".dropdown-container1").style.display = "flex";
                                                        document.querySelector(".dropdown-container").style.display = "none";
                                                    </script>';
                                                unset($_SESSION['alert']);
                                            }
                                        ?>
                                        <h2><center>Đăng nhập</center></h2>
                                        <div class="email-input-container">
                                            <i class="fa-solid fa-envelope"></i>
                                            <input type="text" name="email" placeholder="Email"><br>
                                        </div>
                                        <div class="password-input-container">
                                            <i class="fa-solid fa-lock"></i>
                                            <input type="password" name="password" placeholder="Mật khẩu"><br>
                                        </div>
                                        <button class="submit-button" type="submit">Đăng nhập</button>
                                        <span class="dont-have-account">Bạn chưa có tài khoản? 
                                            <a href="SignUp.php">Đăng ký!</a>
                                        </span>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    
                    
                    
                <div class="content-container">
                        <?php
                            $result = mysqli_query($con, 'select * from product join user on product.UserID = user.UserID order by ProductID desc');
                            while($row = mysqli_fetch_array($result)){
                                echo '
                                    <div class="product-container">
                                        <a href="ProductDetail.php?product-id='.$row['ProductID'].'" class="product">
                                            <img src="../img/'.$row['Image'].'" class="product-image">
                                            <div class="name-price-container">
                                                <h3 class="product-name">'.$row['Name'].'</h3>
                                                <h5 class="user-name">'.$row['UserName'].'<h5>
                                            </div>
                                            <div class="price-profileImage-container">
                                                <h3 class="product-price">'.number_format($row['Price'], 0, '', '.').'đ</h3>
                                                <img src="../img/'.$row['ProfileImage'].'" class="user-profile-image">
                                            </div>
                                           
                                        </a>
                                    </div>
                                ';
                            }
                        ?>
                </div>
            </div>
        </div>

    <div class="black-curtain">
        <form class="update-profile-image-container" method="post" enctype="multipart/form-data" onsubmit="onFormSubmit()">
            <img class="profile-image" src="../img/<?php echo $Image; ?>" alt="">
            <div class="edit-image-button1">
                <label for="input-file" class="fa-solid fa-pen"></label>
                <input id="input-file" type="file" accept="image/jpeg, image/png, image/jpg" onchange="inputFile()" name="ProfileImage">
            </div>
            <div class="update-profile-image-button-container">
                <button type="submit" class="update-profile-image-button" onclick="reloadPage()">Update</button>
                <button class="cancel-update-profile-image-button" onclick="cancelUpdateImage()">Cancel</button>
            </div>
        </form>
    </div>


    </div>

    <script src="../js/SideBar.js?v=<?php echo time(); ?>"></script>
    <script src="../js/LightDarkSwitch.js?v=<?php echo time(); ?>"></script>
    <script src="../js/DropDown.js?v=<?php echo time(); ?>"></script>
    <script src="../js/InputFile.js?v=<?php echo time(); ?>"></script>
    <script src="../js/StopAutoSubmitFormFromReloadPage.js?v=<?php echo time(); ?>"></script>
    <script>
        document.querySelector('.dropdown-container').appendChild(document.querySelector('.fa-circle-exclamation'));
        document.querySelector('.dropdown-container').appendChild(document.querySelector('.alert'));

        function openUpdateImageContainer(){
            document.querySelector('.black-curtain').style.display = 'flex';
            document.querySelector('.update-profile-image-container').style.display = 'flex';
        }
    </script>
</body>
</html>