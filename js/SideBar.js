console.log("SideBar.js sẵn sàng");

const toggle = document.querySelector('.hamburger-bars'),
    sidebar = document.querySelector('.sidebar'),
    body = document.querySelector('.body'),
    search = document.querySelector('.search'),
    container = document.querySelector('.container');

function setWidthBody() {
    if (sidebar.classList.contains('close')) {
        console.log('true');
        body.style.width = 'calc(100vw - 97.5px)';
        body.style.marginLeft = '97.5px';
        search.style.width = 'calc(100vw - 97.5px - 96px - 66px)';
        container.style.width = 'calc(100vw - 97.5px - 42px)';
    } else {
        console.log('false');
        body.style.width = 'calc(100vw - 220px)';
        body.style.marginLeft = '220px';
        search.style.width = 'calc(100vw - 220px - 96px - 60px)';
        container.style.width = 'calc(100vw - 220px - 40px)';
    }
}

toggle.addEventListener('click', function(e){
    sidebar.classList.toggle('close');
    body.classList.toggle('expand');

    setWidthBody();

    storeToggle(sidebar.classList.contains('close'));
    storeBodyExpand(true);
})

function storeToggle(value){
    localStorage.setItem('close', value);
}

function storeBodyExpand(value)
{
    localStorage.setItem('expand', value);
}

function load(){
    if(!localStorage.getItem('close')){
        storeToggle(false);
        console.log("không có sidebar localStorage (mới vào web lần đầu)")
    } else if(localStorage.getItem('close') == 'true'){
        sidebar.classList.toggle('close');
        console.log("đã có sidebar localStorage và có giá trị true")
    }

    if(!localStorage.getItem('expand')){
        storeBodyExpand(false);
    } else if(localStorage.getItem('expand') == 'true'){
        body.classList.toggle('expand');
    }

    setWidthBody();
}

load();

