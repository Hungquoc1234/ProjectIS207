function closeToast(){
    document.querySelector('.toast').classList.remove('active');
}

function storeToast(){
    localStorage.setItem('showToast', 'active');
}

window.addEventListener('load', () => {
    if(localStorage.getItem('showToast')){
        document.querySelector('.toast').classList.toggle('active');
        document.querySelector('.process').classList.toggle('active');
        setTimeout(function(){
            document.querySelector('.toast').classList.remove('active');
        }, 5000);

        localStorage.removeItem('showToast');
    }
})