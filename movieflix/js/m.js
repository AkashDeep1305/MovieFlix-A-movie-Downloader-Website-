const iconClose = document.querySelector(".back");
const username = document.getElementById("username");
const email = document.getElementById("email");
const o_password = document.getElementById("o-password");
const n_password = document.getElementById("n-password");
const c_password = document.getElementById("c-password");
const profile = document.getElementById("profile_image");

iconClose.addEventListener('click', () => {

    // Clear input values
    username.value = '';
    email.value = '';
    o_password.value = '';
    n_password.value = '';
    c_password.value = '';
    profile.value = '';

    // Reset icon colors
    document.querySelector(".ic-o i").style.color = "#fff";
    document.querySelector(".ic-n i").style.color = "#fff";
    document.querySelector(".ic-c i").style.color = "#fff";

    // Reset password input types
    document.getElementById("o-password").type = "password";
    document.getElementById("n-password").type = "password";
    document.getElementById("c-password").type = "password";
});

function show(formType) {
    var passwordField;
    if (formType === 'o') {
        passwordField = document.getElementById("o-password");
    } else if (formType === 'n') {
        passwordField = document.getElementById("n-password");
    } else if (formType === 'c') {
        passwordField = document.getElementById("c-password");
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

// Set the "Go Back" link based on the referrer
document.addEventListener('DOMContentLoaded', function () {
    const urlParams = new URLSearchParams(window.location.search);
    const ref = urlParams.get('ref');
    const goBackLink = document.getElementById('go-back');
    if (ref) {
        goBackLink.href = '../' + ref;
    } else {
        goBackLink.href = 'manage.php'; 
    }
});