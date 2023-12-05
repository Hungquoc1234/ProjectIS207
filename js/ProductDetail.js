const ProductQuantity = document.querySelector('.quantity'),
    InputHidden = document.querySelector('#input-hidden'),
    A = document.querySelector('.A'),
    B = document.querySelector('.B'),
    DescriptionContainer = document.querySelector('.description-container');

function getBody(){
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            const response = JSON.parse(xhr.responseText);

            console.log(response);
            
            load(response);
        }
    };

    xhr.open('POST', 'php/DoProductDetail.php', true);

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.send('product-id=' + InputHidden.value);
}

function load(response){
    A.innerHTML = response.Image;
    B.innerHTML = response.Detail;
    DescriptionContainer.innerHTML += response.Description;
}

getBody();

function submitFormAndRedirect(){
    var xhr = new XMLHttpRequest();

    console.log('da submit');
    
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            handleResponse();
        }
    };

    xhr.open('POST', 'php/CartSession.php', true);

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.send('product-id=' + InputHidden.value + '&quantity=' + ProductQuantity.value);
}

function handleResponse(){
    location.href = 'Checkout.php';
}