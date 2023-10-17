function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {

        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}


var createAccButton = document.querySelector(".login-form .message a");

createAccButton.addEventListener("click", function() {
    logForm = document.getElementById("log-formID");
    regForm = document.getElementById("reg-formID");


    logForm.style.display = "none";
    regForm.style.display = "block";

});

var logAccButton = document.querySelector(".register-form .message a");
logAccButton.addEventListener("click", function() {
    logForm = document.getElementById("log-formID");
    regForm = document.getElementById("reg-formID");


    regForm.style.display = "none";
    logForm.style.display = "block";
});
