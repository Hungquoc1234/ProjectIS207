<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="css/AddProduct.css?v=<?php echo time(); ?>">
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
                <div class="container" method="post" enctype="multipart/form-data">
                    <ul class="message-container">
                        <li>Đây là message</li>
                    </ul>

                    <input id="input-hidden" type="hidden" value="<?php echo $_GET['ProductID']; ?>">
                    
                    <label for="input-file">Ảnh:</label>
                    <input type="file" name="image" id="input-file" onchange="viewImage()"><br>
                    <img src="" class="product-image"><br>

                    <label for="input-name">Tên sản phẩm:</label>
                    <input type="text" id="input-name"><br>

                    <label for="input-price">Giá:</label>
                    <input type="number" id="input-price" ><br>

                    <label for="description">Mô tả:</label>
                    <textarea name="Description" id="description"></textarea><br>
                    <div class="save-cancel-button">
                        <input type="submit" value="Thêm sản phẩm" class="save-button" onclick="submitForm()">
                        <a href="ProductManagement.php" class="cancel-button"><span>Hủy</span></a>
                    </div>
                </div>

                
            </div>

            <div class="toast">
                <i class="fa-solid fa-xmark" onclick="closeToast()"></i>
                <div class="content">
                    <i class="fa-solid fa-check"></i>
                    <span>Cập nhật sản phẩm thành công</span>
                </div>
                <div class="process"></div>
            </div>
        </div>

        
    </div>

    <script src="js/SideBar.js?v=<?php echo time(); ?>"></script>
    <script src="js/LightDarkSwitch.js?v=<?php echo time(); ?>"></script>
    <script src="js/UpdateProduct.js?v=<?php echo time(); ?>"></script>

    <script>
        function viewImage(){
            document.querySelector('.product-image').src = URL.createObjectURL(document.querySelector('#input-file').files[0]);
        }
        function closeToast(){
            document.querySelector('.toast').classList.remove('active');
        }
    </script>
</body>
</html>