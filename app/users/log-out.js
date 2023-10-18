document.getElementById('exit').addEventListener('click',function () {
    fetch('http://nikoloenok/api/user/log-out.php')
        .then(function (response) {
            if (!response.ok) {
                throw new Error('Не удалось log out');
            }
        })
        .then(function () {
            location.reload();
        }).catch(function (error) {

        console.error('Ошибка:', error);
    });
})
