const Cart = document.querySelector('.cart');

function getCart(){
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = JSON.parse(xhr.responseText);

            load(response);
        }
    };

    xhr.open('GET', 'php/DoCheckout.php', true);

    xhr.send();
}

function load(response){
    Cart.innerHTML = '';

    response.forEach(cart => {
        // Tạo div chính
        var productContainer = document.createElement('div');
        productContainer.classList.add('product-container');

        // Tạo div chứa nút thay đổi số lượng
        var adjustQuantityContainer = document.createElement('div');
        adjustQuantityContainer.classList.add('adjust-quantity-container');

        // Tạo div nút giảm số lượng
        var minus = document.createElement('div');
        minus.textContent = '-';
        minus.classList.add('minus');
        minus.addEventListener('click', () => {
            if(numberInput.value > 1){
                numberInput.value--;
                var totalPrice = cart.ProductPrice * numberInput.value;
                h3.textContent = totalPrice.toLocaleString('vi-VN') + 'đ';    
                inputHidden2.value = totalPrice;
            }
        })

        // Tạo input số lượng
        var numberInput = document.createElement('input');
        numberInput.classList.add('number');
        numberInput.type = 'number';
        numberInput.min = '1';
        numberInput.value = cart.Quantity;
        numberInput.addEventListener('input', () => {
            h3.textContent = cart.ProductPrice * numberInput.value + 'đ';
        })

        //Tạo input hidden
        var inputHidden = document.createElement('input');
        inputHidden.classList.add('hidden');
        inputHidden.type = 'hidden';
        inputHidden.value = cart.ProductID;

        // Tạo div nút tăng số lượng
        var add = document.createElement('div');
        add.textContent = '+';
        add.classList.add('add');
        add.addEventListener('click', () => {
            numberInput.value++;
            var totalPrice = cart.ProductPrice * numberInput.value;
            h3.textContent = totalPrice.toLocaleString('vi-VN') + 'đ'; 
            inputHidden2.value = totalPrice;
        })

        // Tạo thẻ i
        var icon = document.createElement('i');
        icon.classList.add('fa-solid', 'fa-xmark');
        icon.addEventListener('click', () => {
            deleteProduct(cart.ProductID);
        })

        // Tạo div chứa sản phẩm
        var productDiv = document.createElement('div');
        productDiv.classList.add('product');

        // Tạo thẻ a
        var anchor = document.createElement('a');
        anchor.href = 'ProductDetail.php?product-id=' + cart.ProductID;

        // Tạo thẻ img
        var image = document.createElement('img');
        image.src = 'img/' + cart.ProductImage;

        // Thêm img vào thẻ a
        anchor.appendChild(image);

        // Tạo div chứa tên và giá
        var namePriceContainer = document.createElement('div');
        namePriceContainer.classList.add('name-price-container');

        // Tạo h2
        var h2 = document.createElement('h2');
        h2.textContent = cart.ProductName;

        // Tạo h3
        var h3 = document.createElement('h3');
        var totalPrice = cart.ProductPrice * numberInput.value;
        h3.textContent = totalPrice.toLocaleString('vi-VN') + 'đ'; 

        //Tạo input hidden
        var inputHidden2 = document.createElement('input');
        inputHidden2.classList.add('hidden2');
        inputHidden2.type = 'hidden';
        inputHidden2.value = totalPrice;

        // Thêm h2 và h3 vào div chứa tên và giá
        namePriceContainer.appendChild(h2);
        namePriceContainer.appendChild(h3);

        // Thêm nút giảm, input và nút tăng vào div chứa nút thay đổi số lượng
        adjustQuantityContainer.appendChild(minus);
        adjustQuantityContainer.appendChild(numberInput);
        adjustQuantityContainer.appendChild(add);
        adjustQuantityContainer.appendChild(inputHidden);
        adjustQuantityContainer.appendChild(inputHidden2);

        // Thêm tất cả các thẻ con vào div chính
        productDiv.appendChild(anchor);
        productDiv.appendChild(namePriceContainer);
        productDiv.appendChild(adjustQuantityContainer);

        // Thêm icon và div chứa sản phẩm vào div chính
        productContainer.appendChild(icon);
        productContainer.appendChild(productDiv);

        Cart.appendChild(productContainer);
    });
    

}

getCart();

//xóa sản phẩm khỏi session
function deleteProduct(id){
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            handleResponse();
        }
    };

    xhr.open('POST', 'php/CartSession.php', true);

    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhr.send('id=' + id);
}

function handleResponse(){
    getCart();
}

//submit form
const InputName = document.querySelector('#input-name'),
    InputEmail = document.querySelector('#input-email'),
    InputPhone = document.querySelector('#input-phone'),
    InputAddress = document.querySelector('#input-address'),
    MessageContainer = document.querySelector('.message-container'),
    BLackCurtain = document.querySelector('.black-curtain');

function submitForm(){ 
    if(InputName.value == '' && InputEmail.value == '' && InputPhone.value == '' && InputAddress.value == ''){
        MessageContainer.classList.add('active');
    }
    else{
        var xhr = new XMLHttpRequest(),
        numberInputs = document.querySelectorAll('.number'),
        inputHiddens = document.querySelectorAll('.hidden'),
        productPrices = document.querySelectorAll('.hidden2');
        ProductArray = [];

        for(var i = 0; i < inputHiddens.length; i++){
            var Product = {
                ProductID: inputHiddens[i].value,
                Quantity: numberInputs[i].value,
                TotalPrice: productPrices[i].value
            };

            ProductArray.push(Product);
        }

        var jsonData = JSON.stringify(ProductArray);

        var formData = new FormData();
        formData.append('jsonData', jsonData);
        formData.append('Name', InputName.value);
        formData.append('Email', InputEmail.value);
        formData.append('Phone', InputPhone.value);
        formData.append('Address', InputAddress.value);
        
        xhr.onreadystatechange = () => {
            if (xhr.readyState == 4 && xhr.status == 200) {
                var response = xhr.responseText;

                console.log(response);

                notifySuccess();
            }
        };

        xhr.open('POST', 'php/CreateInvoice.php', true);

        xhr.send(formData);
    }
}

function notifySuccess(){
    BLackCurtain.style.display = 'flex';
}