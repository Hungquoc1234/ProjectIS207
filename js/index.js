const ContentContainer = document.querySelector('.content-container');

function getBody(){
    var xhr = new XMLHttpRequest();
    
    xhr.onreadystatechange = () => {
        if (xhr.readyState == 4 && xhr.status == 200) {
            var response = xhr.responseText;

            console.log(response);

            load(response);
        }
    };

    xhr.open('GET', 'php/DoIndex.php', true);

    xhr.send();
}

function load(response) {
    console.log('da chay handleResponse');
    
    ContentContainer.innerHTML = response;

    console.log(ContentContainer.innerHTML);
}

getBody();