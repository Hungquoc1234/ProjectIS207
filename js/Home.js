const UserImageContainer = document.querySelector('.B'),
    ImageNameContainer = document.querySelector('.A'),
    ContentContainer = document.querySelector('.content-container');

function getBody(){
    var xhr = new XMLHttpRequest();

    console.log('da chay ham');
    
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);

            console.log(response);

            load(response);
        }
    };

    xhr.open('GET', 'php/DoHome.php', true);

    xhr.send();
}

function load(response) {
    console.log('da chay handleResponse');
    UserImageContainer.innerHTML = '';
    ImageNameContainer.innerHTML = '';
    ContentContainer.innerHTML = '';

    UserImageContainer.innerHTML += response.UserImage1;
    ImageNameContainer.insertAdjacentHTML('afterbegin', response.UserName);
    ImageNameContainer.insertAdjacentHTML('afterbegin', response.UserImage2);
    
    ContentContainer.innerHTML = response.ProductList;
}

getBody();

// phần cập nhật ảnh đại diện
const FileInput = document.querySelector('#input-file');

function updateImageFormSubmit(){
    var xhr = new XMLHttpRequest();
    var formData = new FormData();
    formData.append('image', FileInput.files[0]);

    console.log('da submit');

    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;
            console.log('da kiem tra response');
            console.log(response);
            handleResponse();
        }
        else{
            console.log(xhr.status);
        }
    }

    xhr.open('POST', 'php/DoUpdateProfileImage.php', true);

    xhr.send(formData);
}

function handleResponse(){
    getBody();
}