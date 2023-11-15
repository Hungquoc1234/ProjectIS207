const ProfileImage = document.querySelector('.profile-image'),
    InputFile = document.querySelector('#input-file'),
    BlackCurtain = document.querySelector('.black-curtain');

function inputFile(){
    ProfileImage.src = URL.createObjectURL(InputFile.files[0]);
    console.log(URL.createObjectURL(InputFile.files[0]));
}

function cancelUpdateImage(){
    BlackCurtain.style.display = 'none';
}