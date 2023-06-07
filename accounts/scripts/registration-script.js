// Script for toggling the password visibility button 

let password = document.getElementById("password");
let togglePassword = document.getElementById('toggle');

// function logic for toggling the image and password type
function showHide() {
    if (password.type === "password") {
        password.setAttribute('type', 'text');
        togglePassword.classList.add('hide');
    } else {
        password.setAttribute('type', 'password');
        togglePassword.classList.remove('hide');
    }
}
