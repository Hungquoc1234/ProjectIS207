<?php
require_once('DatabaseConnection.php');

$UserImage1 = '';
$UserImage2 = '';
$UserName = '';
$ProductList = '';

$result1 = mysqli_query($con, 'select ProfileImage, UserName from user where UserID = '.$_COOKIE['UserID']);

if(mysqli_num_rows($result1) > 0){
    $row1 = mysqli_fetch_array($result1);
    
    $UserImage1 = '<img src="img/'.$row1['ProfileImage'].'" alt="">';
    $UserImage2 = '<img class="image" src="img/'.$row1['ProfileImage'].'" alt="">';
    $UserName = '<h2>'.$row1['UserName'].'</h2>';
}
    
$result = mysqli_query($con, "select * from product where UserID = ".$_COOKIE['UserID']);

while($row = mysqli_fetch_array($result)){
    $ProductList .= '
        <tr>
            <td class="image"><img src="img/'.$row['Image'].'" class="product-image"></td>
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

echo json_encode(
    [
        'UserImage1' => $UserImage1,
        'UserImage2' => $UserImage2,
        'UserName' => $UserName,
        'ProductList' => $ProductList
    ]
);

mysqli_close($con);