export function createBasket(buttonID) {
    let json_data = {
        quantity: parseInt('1'),
        product_id: parseInt(buttonID)
    };

    let requestOptions = {
        method: 'POST',
        body: JSON.stringify(json_data), // Преобразуйте объект в JSON
        headers: {
            'Content-Type': 'application/json'
        }
    };

    fetch('http://nikoloenok/api/basket/createBasket.php', requestOptions)
        .then(response => {
            if (response.status === 201) {
                console.log("ADDED BASKET");
            } else {
                return response.text().then(errorText => {
                    console.log(response.status, errorText);
                });
            }
        })
        .catch(error => {
            console.log("Ошибка сети:", error);
        });
}

