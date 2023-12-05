const Toast = document.querySelector('.toast'),
    Process = document.querySelector('.process'),
    BlackCurtain = document.querySelector('.black-curtain');

var ID;

function showConfirmDialog(id){
    document.querySelector('.black-curtain').style.display = 'flex';
    document.querySelector('.confirm-dialog').style.display = 'flex';
    ID = id;
}

function sureConfirm(){
    console.log('da xoa');
    Delete(ID);
}

function cancelConfirm(){
    document.querySelector('.black-curtain').style.display = 'none';
    document.querySelector('.confirm-dialog').style.display = 'none';
}

function Delete(id){
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            const response = xhr.responseText;

            console.log('id san pham da xoa:' + response);
            showToast();
        }
    };

    xhr.open('POST', 'php/DeleteProduct.php', true);

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.send('product-id=' + id);
}

function showToast(){
    console.log('da chay handleResponse');
    BlackCurtain.style.display = 'none';
    Toast.classList.toggle('active');
    Process.classList.toggle('active');
    setTimeout(function(){
        Toast.classList.remove('active');
    }, 5000);
}