let createAccButton = document.querySelector(".login-form .message a");
createAccButton.addEventListener("click", function () {
    let logForm = document.getElementById("log-formID");
    let regForm = document.getElementById("reg-formID");
    logForm.style.display = "none";
    regForm.style.display = "block";

});

let logAccButton = document.querySelector(".register-form .message a");
logAccButton.addEventListener("click", function () {
    let logForm = document.getElementById("log-formID");
    let regForm = document.getElementById("reg-formID");


    regForm.style.display = "none";
    logForm.style.display = "block";
});
