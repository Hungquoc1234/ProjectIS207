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
    getProductList()
    getBody();
}