console.log("LightDarkSwitch.js sẵn sàng");

const bodyWeb = document.querySelector('body'),
    lightDarkSwitch = document.querySelector('.fa-solid.fa-sun');

lightDarkSwitch.addEventListener("click", function(e){
    bodyWeb.classList.toggle('dark-theme');
    lightDarkSwitch.classList.toggle('animated');

    storeDarkLightMode(bodyWeb.classList.contains('dark-theme'));

    if(bodyWeb.classList.contains('dark-theme')){
        lightDarkSwitch.classList.remove('fa-sun');
        lightDarkSwitch.classList.toggle('fa-moon');
        document.querySelector('.theme-mode-name').textContent = 'Dark';
    } else{
        lightDarkSwitch.classList.remove('fa-moon');
        lightDarkSwitch.classList.toggle('fa-sun');
        document.querySelector('.theme-mode-name').textContent = 'Light';
    }

    

    setTimeout(function(e){
        lightDarkSwitch.classList.remove('animated');
    }, 300)
})

function storeDarkLightMode(value){
    localStorage.setItem('darkmode', value);
}

function load(){
    // tai nen toi sang
    if(!localStorage.getItem('darkmode')){
        storeDarkLightMode(false);
        lightDarkSwitch.classList.toggle('fa-sun');
    } else if(localStorage.getItem('darkmode') == 'true'){
        bodyWeb.classList.toggle('dark-theme');
        lightDarkSwitch.classList.toggle('fa-moon');
        lightDarkSwitch.classList.remove('fa-sun');
    }
}

load();