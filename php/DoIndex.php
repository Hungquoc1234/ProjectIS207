<?php
require_once('DatabaseConnection.php');

$ProductList = '';
    
$result2 = mysqli_query($con, 'select * from product join user on product.UserID = user.UserID order by ProductID desc');

while($row2 = mysqli_fetch_array($result2)){
    $ProductList .= '
        <div class="product-container">
            <a href="ProductDetail.php?product-id='.$row2['ProductID'].'" class="product">
                <img src="img/'.$row2['Image'].'" class="product-image">
                <div class="name-price-container">
                    <h3 class="product-name">'.$row2['Name'].'</h3>
                    <h5 class="user-name">'.$row2['UserName'].'<h5>
                </div>
                <div class="price-profileImage-container">
                    <h3 class="product-price">'.number_format($row2['Price'], 0, '', '.').'đ</h3>
                    <img src="img/'.$row2['ProfileImage'].'" class="profile-image">
                </div>
            
            </a>
        </div>
    ';
}

echo $ProductList;

mysqli_close($con);