const user = document.querySelector('.user'),
    dropdown = document.querySelector('.dropdown');

user.addEventListener('click', (e) => {
    user.classList.toggle('active');
})

dropdown.addEventListener('click', (e) => {
    e.stopPropagation();
})

function changeToLoginForm(){
    document.querySelector('.dropdown-container').style.display = 'none';
    document.querySelector('.dropdown-container1').style.display = 'flex';
}

function backToAccountInfo(){
    document.querySelector('.dropdown-container').style.display = 'flex';
    document.querySelector('.dropdown-container1').style.display = 'none';
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