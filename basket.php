<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Корзина</title>
    <link type="text/css" rel="stylesheet" href="app/assets/css/basket-styles.css">

</head>
<body>

<header>
    <div class="menu" id="IDmenu">
        <img class="menu__icon" src="app/assets/pictures/free-icon-bbq-grill-3828275.png" alt="">
        <nav class="menu__nav">
            <ul class="menu__list">
                <li class="menu__item">Home</li>
                <li class="menu__item">Product</li>
                <li class="menu__item">Pricing</li>
                <li class="menu__item">Articles</li>
                <li class="menu__item">Contact Us</li>
            </ul>
        </nav>
        <div class="dropdown">
            <img src="app/assets/pictures/man.png" alt=""/>
            <button onclick="myFunction()" class="dropbtn">
                Профиль
            </button>


            <div id="myDropdownNoneAuthorized" class="dropdown-content-none-authorized">
                <a href="registrationPage.html">Войти</a>
                <a href="registrationPage.html">Зарегистрироваться</a>
            </div>

            <div id="myDropdownAuthorized" class="dropdown-content-authorized">
                <a href="basket.php">Корзина</a>
                <a href="#" id="exit">Выйти</a>
            </div>



        </div>
    </div>
</header>
<div class="wrapper">
    <img src="http://nikoloenok/app/assets/pictures/fon.jpg" alt="">
    <table>
        <tr>
            <th></th>
            <th></th>
            <th>Стейк</th>
            <th>Количество</th>
            <th>Цена</th>
        </tr>
        <tr>
            <td>Ячейка 1</td>
            <td>Ячейка 2</td>
            <td>Ячейка 3</td>
            <td>Ячейка 4</td>
            <td>Ячейка 5</td>
        </tr>
        <tr>
            <td>Ячейка 1</td>
            <td>Ячейка 2</td>
            <td>Ячейка 3</td>
            <td>Ячейка 4</td>
            <td>Ячейка 5</td>
        </tr>
        <tr>
            <td>Ячейка 1</td>
            <td>Ячейка 2</td>
            <td>Ячейка 3</td>
            <td>Ячейка 4</td>
            <td>Ячейка 5</td>
        </tr>
        <tr>
            <td>Ячейка 1</td>
            <td>Ячейка 2</td>
            <td>Ячейка 3</td>
            <td>Ячейка 4</td>
            <td>Ячейка 5</td>
        </tr>
        <tr>
            <td>Ячейка 1</td>
            <td>Ячейка 2</td>
            <td>Ячейка 3</td>
            <td>Ячейка 4</td>
            <td>Ячейка 5</td>
        </tr>
    </table>
</div>

<script src="app/users/log-out.js"></script>
<script src="app/scripts/drop-down.js"></script>
</body>
</html>