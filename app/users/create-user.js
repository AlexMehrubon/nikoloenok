document.getElementById("reg-formID").addEventListener("submit", function (e) {
    e.preventDefault(); // Предотвращаем стандартное поведение формы (перезагрузку страницы)

    let json_data = {
        login: document.getElementById("loginRegField").value,
        password: document.getElementById("passwordRegField").value
    };

    let requestOptions = {
        method: 'POST',
        body: JSON.stringify(json_data), // Преобразуйте объект в JSON
        headers: {
            'Content-Type': 'application/json'
        }
    };

    fetch('http://nikoloenok/api/user/createUser.php', requestOptions)
        .then(response => {
            if (response.status === 201) {
                console.log("ok");
            } else {
                return response.text().then(errorText => {
                    console.log(response.status, errorText);
                });
            }
        })
        .catch(error => {
            console.log("Ошибка сети:", error);
        });
});