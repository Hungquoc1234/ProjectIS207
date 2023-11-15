<?php
    require_once('KetNoiCSDL.php');
    require_once('Login.php');
    if(!$_COOKIE['Role']){
        header('Location: ../index.php');
    }
    // if(isset($_POST['searchKeyword']) and !empty($_POST['searchKeyword'])){
    //     $searchKeyword = $_POST['searchKeyword'];
    //     mysqli_close($con);
    //     header("Location: ProductsManagingSearch.php?keyword=$searchKeyword");
    //     die();
    // }
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="..\css\ProductManagement.css?v=<?php echo time(); ?>">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                        <li class="menu-item orders">
                            <a href="" class="menu-button">
                                <i class="fa-solid fa-box menu-icon"></i>
                                <span class="menu-name">Đơn hàng của bạn</span>
                            </a>
                        </li>
                        <li class="menu-item products">
                            <a href="" class="menu-button">
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
                                <img src="../img/<?php echo $Image; ?>" alt="">
                                <div class="dropdown">
                                    <div class="dropdown-container">
                                        <div class="image-name-container">
                                            <img class="image" src="../img/<?php echo $Image; ?>" alt="">
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

                <div class="table-container">
                    <div class="add-button-container"><a href="AddProduct.php" class="add-button"><span>Thêm sản phẩm</span></a></div>
                    <table>
                        <tr>
                            <th>Ảnh</th>
                            <th>ID</th>
                            <th>Tên sản phẩm</th>
                            <th>Giá</th>
                            <th>Mô tả</th>
                            <th></th>
                        </tr>
                        <?php
                            $result = mysqli_query($con, "select * from product where UserID = ".$_COOKIE['UserID']);
                            while($row = mysqli_fetch_array($result)){
                                echo '
                                    <tr>
                                        <td class="image"><img src="..\img\\'.$row['Image'].'" class="product-image"></td>
                                        <td class="id">'.$row['ProductID'].'</td>
                                        <td class="name">'.$row['Name'].'</td>
                                        <td class="price">'.number_format($row['Price'], 0, '', '.').'đ</td>
                                        <td class="description">'.$row['Description'].'</td>
                                        <td class="delete-edit">
                                            <div>
                                                <a href="UpdateProduct.php?ProductID='.$row['ProductID'].'" class="edit-product-button"><span>Sửa</span></a>
                                                <div class="delete-product-button" onclick="showConfirmDialog('.$row['ProductID'].')"><span>Xóa</span></div>
                                            </div>
                                        </td>
                                    </tr>
                                ';
                            }
                        ?>
                    </table>
                </div>
            </div>

            <div class="toast">
                <i class="fa-solid fa-xmark" onclick="closeToast()"></i>
                <div class="content">
                    <i class="fa-solid fa-check"></i>
                    <span>Xóa thành công</span>
                </div>
                <div class="process"></div>
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
                <button type="submit" class="update-profile-image-button">Cập nhật</button>
                <button class="cancel-update-profile-image-button" type="button" onclick="cancelUpdateImage()">Hủy</button>
            </div>
        </form>

        <div class="confirm-dialog">
            <div class="exclamation-container"><i class="fa-solid fa-exclamation"></i></div>
            <div id="head">Bạn có muốn xóa?</div>
            <p>Dữ liệu sản phẫm sẽ mất sau khi xóa, hãy cẩn thận!</p>
            <div class="sure-cancel-container">
                <button class="sure-button" onclick="sureConfirm(id)"><span>Xóa</span></button>
                <button class="cancel-button" onclick="cancelConfirm()"><span>Hủy</span></button>
            </div>
        </div>
    </div>
    
    <script src="../js/SideBar.js?v=<?php echo time(); ?>"></script>
    <script src="../js/LightDarkSwitch.js?v=<?php echo time(); ?>"></script>
    <script src="../js/DropDown.js?v=<?php echo time(); ?>"></script>
    <script src="../js/InputFile.js?v=<?php echo time(); ?>"></script>
    <script src="../js/ConfirmDialog.js?v=<?php echo time(); ?>"></script>
    <script src="../js/Toast.js?v=<?php echo time(); ?>"></script>
    <script>
        document.querySelector('.dropdown-container1').appendChild(document.querySelector('.fa-circle-exclamation'));
        document.querySelector('.dropdown-container1').appendChild(document.querySelector('.alert'));

        function openUpdateImageContainer(){
            document.querySelector('.black-curtain').style.display = 'flex';
            document.querySelector('.update-profile-image-container').style.display = 'flex';
        }

        function reloadPage(){
            location.reload();
        }
    </script>
        
</body>
</html>