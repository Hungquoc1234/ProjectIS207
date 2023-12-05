const UserImageContainer = document.querySelector('.B'),
    ImageNameContainer = document.querySelector('.A'),
    tbody = document.querySelector('tbody');

function getBody(){
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);

            load(response);
        }
    };

    xhr.open('GET', 'php/DoProductManagement.php', true);

    xhr.send();
}

function load(response) {
    UserImageContainer.innerHTML = '';
    ImageNameContainer.innerHTML = '';
    tbody.innerHTML = '';

    UserImageContainer.innerHTML += response.UserImage1;
    ImageNameContainer.insertAdjacentHTML('afterbegin', response.UserName);
    ImageNameContainer.insertAdjacentHTML('afterbegin', response.UserImage2);
    
    tbody.innerHTML = response.ProductList;
}

getBody();

// phần cập nhật ảnh đại diện
const FileInput = document.querySelector('#input-file');

function updateImageFormSubmit(){
    var xhr = new XMLHttpRequest();
    var formData = new FormData();
    formData.append('image', FileInput.files[0]);

    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;

            handleResponse();
        }
    }

    xhr.open('POST', 'php/DoUpdateProfileImage.php', true);

    xhr.send(formData);
}

function handleResponse(){
    getBody();
}

// phần xóa sản phẩm
const Toast = document.querySelector('.toast'),
    Process = document.querySelector('.process'),
    BlackCurtain = document.querySelector('.black-curtain');

var ID;

function showConfirmDialog(id){
    document.querySelector('.black-curtain').style.display = 'flex';
    document.querySelector('.confirm-dialog').style.display = 'flex';
    ID = id;
}

function sureConfirm(){
    console.log('da xoa');
    Delete(ID);
}

function cancelConfirm(){
    document.querySelector('.black-curtain').style.display = 'none';
    document.querySelector('.confirm-dialog').style.display = 'none';
}

function Delete(id){
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            const response = xhr.responseText;

            console.log('id san pham da xoa:' + response);
            showToast();
        }
    };

    xhr.open('POST', 'php/DeleteProduct.php', true);

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.send('product-id=' + id);
}

function showToast(){
    getBody();

    BlackCurtain.style.display = 'none';
    Toast.classList.toggle('active');
    Process.classList.toggle('active');
    setTimeout(function(){
        Toast.classList.remove('active');
    }, 5000);
}