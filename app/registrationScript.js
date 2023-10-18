function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {

        const dropdowns = document.getElementsByClassName("dropdown-content");

        for (let i = 0; i < dropdowns.length; i++) {
            const openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}



let createAccButton = document.querySelector(".login-form .message a");

createAccButton.addEventListener("click", function() {
    let logForm = document.getElementById("log-formID");
    let regForm = document.getElementById("reg-formID");


    logForm.style.display = "none";
    regForm.style.display = "block";

});

let logAccButton = document.querySelector(".register-form .message a");
logAccButton.addEventListener("click", function() {
    let logForm = document.getElementById("log-formID");
    let regForm = document.getElementById("reg-formID");


    regForm.style.display = "none";
    logForm.style.display = "block";
});
