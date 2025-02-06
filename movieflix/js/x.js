const wrapper = document.querySelector('.wrapper');
const loginLink = document.querySelector('.login-link');
const registerLink = document.querySelector('.register-link');
const btnPopup = document.querySelector('.btnlogin');
const iconClose = document.querySelector('.icon-close');
const usernameInput = document.getElementById('username');
const emailInput = document.getElementById('current-email');
const passwordInput = document.getElementById('register-password');
const passwordinput = document.getElementById('regist-password');
const emailIn = document.getElementById('email');
const passwordIn = document.getElementById('login-password');

registerLink.addEventListener('click', () => {
    wrapper.classList.add('active');
});

loginLink.addEventListener('click', () => {
    wrapper.classList.remove('active');
});
btnPopup.addEventListener('click', () => {
    wrapper.classList.add('active-popup');
    wrapper.classList.remove('active');
});
iconClose.addEventListener('click', () => {
    // Remove active classes
    wrapper.classList.remove('active-popup');

    // Clear input values
    usernameInput.value = '';
    emailInput.value = '';
    passwordInput.value = '';
    passwordinput.value = '';
    emailIn.value = '';
    passwordIn.value = '';

    // Reset icon colors
    document.querySelector(".ic-login i").style.color = "#fff";
    document.querySelector(".ic-register i").style.color = "#fff";
    document.querySelector(".ic-regist i").style.color = "#fff";

    // Reset password input types
    document.getElementById("login-password").type = "password";
    document.getElementById("register-password").type = "password";
    document.getElementById("regist-password").type = "password";
});

function show(formType) {
    var passwordField;
    if (formType === 'login') {
        passwordField = document.getElementById("login-password");
    } else if (formType === 'register') {
        passwordField = document.getElementById("register-password");
    } else if (formType === 'regist') {
        passwordField = document.getElementById("regist-password");
    }
    var ic = document.querySelector(".ic-" + formType + " i");
    if (passwordField.type === "password") {
        passwordField.type = "text";
        ic.style.color = "#ff5733";
    } else {
        passwordField.type = "password";
        ic.style.color = "#fff";
    }
}

  
  