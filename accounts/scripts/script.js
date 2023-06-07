let password = document.getElementById("password");
let togglePassword = document.getElementById('toggle');

function showHide() {
    if (password.type === "password") {
        password.setAttribute('type', 'text');
        togglePassword.classList.add('hide');
    } else {
        password.setAttribute('type', 'password');
        togglePassword.classList.remove('hide');
    }
}

// OTP verification input boxes
const inputs = document.querySelectorAll(".otp-bx input");
inputs.forEach((input, index) => {
    input.dataset.index = index;
    input.addEventListener("paste", handleOtppaste);
    input.addEventListener("keyup", handleOtp);
});

function handleOtppaste(e) {
    const data = e.clipboardData.getData("text");
    const value = data.split("");
    if (value.length == inputs.length) {
        inputs.forEach((input, index) => (input.value = value[index]));
        // submit();
    }
}

function handleOtp(e) {
    const input = e.target;
    let value = input.value;
    input.value = "";
    input.value = value ? value[0] : "";

    let fieldIndex = input.dataset.index;
    if (value.length > 0 && fieldIndex < inputs.length - 1) {
        input.nextElementSibling.focus();
    }
    if (e.key === "Backspace" && fieldIndex > 0) {
        input.previousElementSibling.focus();
    }
    if (fieldIndex == inputs.length - 1) {
        // submit();
    }
}

// This function is helpful for testing purposes
function submit() {
    console.log("Submitting....!");
    let otp = "";
    inputs.forEach((input) => {
        otp += input.value;
        input.disabled = true;
        input.classList.add("disabled");
    });
    console.log(otp);
}

var currentUrl = decodeURIComponent(window.location.href);
var url = new URL(currentUrl);
var phone = url.searchParams.get('phone');
var email = url.searchParams.get('email');

if (phone && !phone.startsWith('+')) {
    phone = '+' + phone.replace(/\s/g, '');
}

var sentMsg = "A account activation mail has been sent to " + email + ".";
document.getElementById("sentMsg").textContent = sentMsg;

document.getElementById("emailField").value = email;

//FIREBASE CONFIGURATION
const firebaseConfig = {
    apiKey: "AIzaSyB6uwPM4d9zMZtAYgu8-tOYQEkylG5wLng",
    authDomain: "natoursverifier.firebaseapp.com",
    projectId: "natoursverifier",
    storageBucket: "natoursverifier.appspot.com",
    messagingSenderId: "398859388613",
    appId: "1:398859388613:web:7d46771d8118905ea652ac",
    measurementId: "G-EBZQ6Y1RZT"
};

firebase.initializeApp(firebaseConfig);
render();

function render() {
    window.recaptchaVerifier = new firebase.auth.RecaptchaVerifier('recaptcha-container');
    recaptchaVerifier.render();
}

function phoneAuth() {
    firebase.auth().signInWithPhoneNumber(phone, window.recaptchaVerifier).then(function (confirmationResult) {
        window.confirmationResult = confirmationResult;
        coderesult = confirmationResult;
        // alert("OTP sent");
        var message = "A 6-digit OTP message have been sent to " + phone + ".";
        document.getElementById("message").textContent = message;
    }).catch(function (error) {
        alert(error.message);
    });
}

function codeverify() {
    let otp = "";
    inputs.forEach((input) => {
        otp += input.value;
        input.disabled = true;
        input.classList.add("disabled");
    });
    coderesult.confirm(otp).then(function () {
        // alert("Phone Verified");
        var animation = document.getElementById("animation");
        animation.style.display = "block";

        var link = document.getElementById("link");

        setTimeout(function () {
            var currentUrl = window.location.href;
            var newUrl = currentUrl.replace("#verification", "#emailverification");
            window.location.href = newUrl;
        }, 3000);
    }).catch(function () {
        alert(error.message);
    });


}

var sentMsg = " " + email + "";
document.getElementById("sentMsg").textContent = sentMsg;

document.getElementById("emailField").value = email;

function changeContent() {
    var block = document.getElementById('sentMsgBlock');
    if (block.style.display === 'none') {
        block.style.display = 'block';
    }
}

var currentUrl = decodeURIComponent(window.location.href);
var url = new URL(currentUrl);
var sentMsg2 = url.searchParams.get('email');
document.getElementById("sentMsg2").textContent = sentMsg2;