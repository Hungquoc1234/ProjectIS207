const ImageInput = document.querySelector('#input-file'),
    ProductNameInput = document.querySelector('#input-name'),
    ProductPriceInput = document.querySelector('#input-price'),
    DescriptionInput = document.querySelector('#description'),
    Toast = document.querySelector('.toast'),
    Process = document.querySelector('.process'),
    MessageContainer = document.querySelector('.message-container'),
    ListMessage = document.querySelector('.message-container li');

function submitForm(){
    var xhr = new XMLHttpRequest();
    
    var formData = new FormData();
    formData.append('image', ImageInput.files[0]);
    formData.append('product-name', ProductNameInput.value);
    formData.append('product-price', ProductPriceInput.value);
    formData.append('description', DescriptionInput.value);
    
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            const response = JSON.parse(xhr.responseText);

            console.log(response);

            handleResponse(response);
        }
    };

    xhr.open('POST', 'php/DoAddProduct.php', true);

    xhr.send(formData);
}

function handleResponse(response){
    if(response.ValidFormat == true){
        MessageContainer.classList.remove('active');
        Toast.classList.toggle('active');
        Process.classList.toggle('active');
        setTimeout(function(){
            Toast.classList.remove('active');
        }, 5000);
    }

    else{
        ListMessage.textContent = response.ErrorMessage;
        MessageContainer.classList.add('active');
    }
}