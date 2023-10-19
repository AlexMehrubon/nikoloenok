function myFunction() {
    fetch('http://nikoloenok/api/user/isAuthorized.php')
        .then(function (response) {
            if (!response.ok) {
                throw new Error('Пользователь не авторизован');
            }
            return response.json();
        })
        .then(function (is_authorized) {

            if(is_authorized){
                document.getElementById("myDropdownNoneAuthorized").classList.remove("show");
               document.getElementById("myDropdownAuthorized").classList.toggle("show");
            }
            else{

               document.getElementById("myDropdownNoneAuthorized").classList.toggle("show");
                document.getElementById("myDropdownAuthorized").classList.remove("show");
            }
        }).catch(function (error) {

        console.error('Ошибка:', error);
    });
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function (event) {
    if (!event.target.matches('.dropbtn')) {
        const dropdowns = document.getElementsByClassName("dropdown-content-none-authorized");
        for (let i = 0; i < dropdowns.length; i++) {
            const openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}