<?php
    require_once('KetNoiCSDL.php');

    if(isset($_POST['Name']) and isset($_POST['Price']) and isset($_FILES['image'])){
        $Name = $_POST['Name'];
        $Price = $_POST['Price'];
        $Description = $_POST['Description'];
        $Image = $_FILES['image']['name'];

        $Description = str_replace("'", "`", $Description);
    
        mysqli_query($con, "insert into product values('', ".$_COOKIE['UserID'].", '$Image', '', '$Name', '$Price', '$Description')");

        move_uploaded_file($_FILES['image']['tmp_name'], "../img/".$Image);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="..\css\AddProduct.css?v=<?php echo time(); ?>">
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
                <form class="container" method="post" enctype="multipart/form-data">
                    <label for="image">Image:</label>
                    <input type="file" name="image" id="input-file" onchange="inputFile()"><br>
                    <img src="" class="profile-image"><br>

                    <label for="name">Name:</label>
                    <input type="text" name="Name"><br>

                    <label for="price">Price:</label>
                    <input type="number" name="Price" ><br>

                    <label for="description">Description:</label>
                    <textarea name="Description"></textarea><br>
                    <div class="save-cancel-button">
                        <input type="submit" value="Save" class="save-button" onclick="storeToast()">
                        <a href="ProductManagement.php" class="cancel-button"><span>Cancel</span></a>
                    </div>
                </form>
            </div>

            <div class="toast">
                <i class="fa-solid fa-xmark" onclick="closeToast()"></i>
                <div class="content">
                    <i class="fa-solid fa-check"></i>
                    <span>Thêm sản phẩm thành công</span>
                </div>
                <div class="process"></div>
            </div>
        </div>

        
    </div>

    <script src="../js/SideBar.js?v=<?php echo time(); ?>"></script>
    <script src="../js/LightDarkSwitch.js?v=<?php echo time(); ?>"></script>
    <script src="../js/InputFile.js?v=<?php echo time(); ?>"></script>
    <script src="../js/Toast.js?v=<?php echo time(); ?>"></script>
</body>
</html>