const user = document.querySelector('.user'),
    dropdownUser = document.querySelector('.dropdown'),
    cart = document.querySelector('.fa-cart-shopping'),
    dropdownCart = document.querySelector('.cart-container');

user.addEventListener('click', (e) => {
    user.classList.toggle('active');
})

dropdownUser.addEventListener('click', (e) => {
    e.stopPropagation();
})

cart.addEventListener('click', (e) => {
    cart.classList.toggle('active');
})

dropdownCart.addEventListener('click', (e) => {
    e.stopPropagation();
})

function changeToLoginForm(){
    document.querySelector('.dropdown-container').style.display = 'none';
    document.querySelector('.form').style.display = 'block';
}

function backToAccountInfo(){
    document.querySelector('.dropdown-container').style.display = 'flex';
    document.querySelector('.form').style.display = 'none';
}
// categories.forEach(category => {
//     category.addEventListener('click', function(e){
//         category.classList.toggle('active');
//     })
// })

// filter.addEventListener("click", function(e){
//     filter.classList.toggle('active');
// })

// dropdown.addEventListener("click", function(e){
//     e.stopPropagation();
// })