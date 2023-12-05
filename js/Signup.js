const UsernameInput = document.querySelector('#username-input'),
    EmailInput = document.querySelector('#email-input'),
    PhonenumberInput = document.querySelector('#phonenumber-input'),
    PasswordInput = document.querySelector('#password-input'),
    ConfirmPasswordInput = document.querySelector('#cpassword-input'),
    MessageContainer = document.querySelector('.message-container'),
    ListMessage = document.querySelector('.message-container li');

function submitForm(){
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);
            console.log(response);
            handleResponse(response);
        }
    };

    xhr.open('POST', 'php/DoSignup.php', true);

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.send('username=' + UsernameInput.value + '&email=' + EmailInput.value + '&phonenumber=' + PhonenumberInput.value + '&password=' + PasswordInput.value + '&confirmpassword=' + ConfirmPasswordInput.value);
}

function handleResponse(response){
    if(response.SignupSuccess == true){
        ListMessage.textContent = 'Đăng ký thành công, bạn có thể đăng nhập được rồi';
        MessageContainer.classList.remove('active-error');
        MessageContainer.classList.add('active-success');
    }
    else{
        response.ErrorMessage.forEach((message) => {
        ListMessage.textContent = message;
            MessageContainer.classList.remove('active-success');
            MessageContainer.classList.add('active-error');
        });
    }
}