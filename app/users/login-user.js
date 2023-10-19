document.getElementById("log-formID").addEventListener("submit", function (e) {
    e.preventDefault();

    let json_data  = {
        login: document.getElementById('loginLogField').value,
        password: document.getElementById('passwordLogField').value
    };

    let requestOptions = {
        method: 'POST',
        body: JSON.stringify(json_data),
        headers: {
            'Content-Type': 'application/json'
        }
    };

    fetch('http://nikoloenok/api/user/loginUser.php',requestOptions)
        .then(response =>{
            if(response.status === 203){
                window.location.assign('index.php');
            }else{

                return response.text().then(errorText => {
                    console.log(response.status, errorText);
                });
            }
        })
        .catch(error => {
            console.log("Ошибка сети:", error);
        });
})