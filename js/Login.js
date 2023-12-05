const EmailInput = document.querySelector('#email-input'),
    PasswordInput = document.querySelector('#password-input'),
    MessageContainer = document.querySelector('.message-container'),
    ListMessage = document.querySelector('.message-container li');

function submitForm(){
    var xhr = new XMLHttpRequest();
    
    console.log('da submit');
    
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);
            console.log('da kiem tra response');
            console.log(response);
            handleResponse(response);
        }
    };

    xhr.open('POST', 'php/DoLogin.php', true);

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.send('email=' + EmailInput.value + '&password=' + PasswordInput.value);
}

function handleResponse(response){
    if(response.SignupSuccess == true){
        location.href = 'HomeUser.php';
    }
    else{
        response.ErrorMessage.forEach((message) => {
            ListMessage.textContent = message;
            MessageContainer.classList.add('active');
        });
    }
}