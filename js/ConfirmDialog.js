var ID;

function showConfirmDialog(id){
    document.querySelector('.black-curtain').style.display = 'flex';
    document.querySelector('.confirm-dialog').style.display = 'flex';
    ID = id;
}

function sureConfirm(){
    Delete(ID);
}

function cancelConfirm(){
    document.querySelector('.black-curtain').style.display = 'none';
    document.querySelector('.confirm-dialog').style.display = 'none';
}

function Delete(id){
    $.post('DeleteProduct.php', {
        'id': id
    }, () => {
        localStorage.setItem('showToast', 'active');
        location.reload();
    })
}