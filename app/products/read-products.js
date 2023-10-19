let buttons = [];

import {createBasket} from "/app/basket/create-basket.js";

document.addEventListener("DOMContentLoaded", //showProducts
function () {

    class Product {
        constructor(id, name, price) {
            this.id = id;
            this.name = name;
            this.price = price;
        }
    }

    // Используем функцию fetch для загрузки JSON файла
    fetch('http://nikoloenok/api/product/readProduct.php')
        .then(function (response) {
            // Проверяем, успешно ли выполнен запрос
            if (!response.ok) {
                throw new Error('Ошибка загрузки JSON файла');
            }
            return response.json(); // Преобразуем ответ в JSON
        })
        .then(function (data) {
            // Данные успешно получены, отображаем их на странице
            if (!Array.isArray(data.records)) {
                throw new Error('Данные не являются массивом JSON');
            }


            data.records.forEach(item => {
                let li = document.createElement('li');
                li.className = "product-wrapper";


                let a = document.createElement('a');
                a.className = "product";
                a.id = item.id;

                let divTop = document.createElement('div');
                divTop.className = "product__top";

                let divImg = document.createElement('div');
                divImg.className = "product__photo";

                let divLabel = document.createElement('div');
                divLabel.className = "product__label";
                divLabel.innerText = "-10%";

                let img = document.createElement('img');
                img.src = item.photo_path;


                let divBottom = document.createElement("div");
                divBottom.className = "product__bottom";

                let divPrices = document.createElement('div');
                divPrices.className = "product__prices";

                let divPrice = document.createElement('div');
                divPrice.classList.add('product__price', 'product__price--common');
                divPrice.textContent = item.price;

                let pTitle = document.createElement('p');
                pTitle.classList.add('product__title');
                pTitle.textContent = item.name + ` ${item.weight}г.`;



                let buttonAdd = document.createElement('button');
                buttonAdd.className = 'product__add';
                buttonAdd.textContent = 'Заказать';
                buttonAdd.id = `${item.id}`
                buttonAdd.addEventListener("click", function (){
                    let isBusy = false;
                    buttons.forEach(function (button) {
                        if(button.disabled === true){
                            isBusy = true;
                        }
                    })

                    if(!isBusy) {
                        buttonAdd.disabled = true;
                        const checkmark = document.getElementById("checkmarkID");

                        checkmark.style.display = "flex";
                        checkmark.style.animation = "appear 0.5s forwards";
                        console.log("ADDED");

                        createBasket(buttonAdd.id);

                        setTimeout(function () {
                            checkmark.style.display = "none";
                            buttonAdd.disabled = false;
                        }, 1100);
                    }
                })

                buttons.push(buttonAdd);

                let p = document.createElement('p');
                p.className = "product__title";
                p.innerText = "первый второй третий четверый пятый десятый пятнаать";



                li.appendChild(a);
                a.appendChild(divTop);
                divTop.appendChild(divImg)
                divImg.appendChild(img);
                divTop.appendChild(divLabel);


                a.appendChild(divBottom);
                divBottom.appendChild(divPrices);
                divPrices.appendChild(divPrice);

                divBottom.appendChild(pTitle);
                divBottom.appendChild(buttonAdd);

                document.getElementById("IDproducts").appendChild(li);

            });

        })
        .catch(function (error) {
            // Обрабатываем возможные ошибки
            console.error('Ошибка:', error);
        });
});




