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
    <link rel="stylesheet" href="css/ProductDetail.css?v=<?php echo time(); ?>">
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
                    <div class="upper-menu">
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
                    
                    <div class="lower-menu">
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
                <div class="image-and-basic-information">
                    <div class="A"></div>
                    
                    <div class="basic-info">
                        <div class="B"></div>
                        
                        <div class="form">
                            <div class="adjust-quantity-container">
                                <input type="hidden" id="input-hidden" value="<?php echo $_GET['product-id']; ?>">
                                <span class="minus" onclick="decreaseQuantity()">-</span>
                                <input class="quantity" type="number" name="quantity" min="1" value="1">
                                <span class="add" onclick="increaseQuantity()">+</span>
                            </div>
                            <div class="buy-button-container">
                                <button class="buy-button" onclick="submitFormAndRedirect()">Mua ngay</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="description-container">
                    <h2 class="description-title">Mô tả</h2>
                    
                </div>
            </div>
        </div>  
    </div>

    <script src="js/SideBar.js?v=<?php echo time(); ?>"></script>
    <script src="js/LightDarkSwitch.js?v=<?php echo time(); ?>"></script>
    <script src="js/ProductDetail.js?v=<?php echo time(); ?>"></script>

    <script>
        const quantity = document.querySelector('.quantity');

        function decreaseQuantity(){
            if(quantity.value > 1){
                quantity.value--;
            }
        }

        function increaseQuantity(){
            quantity.value++;
        }
    </script>
</body>