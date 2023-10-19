<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width"/>
    <meta content="no-cache"/>

    <title>Flexbox в CSS3</title>
    <link rel="stylesheet" type="text/css" href="app/assets/css/styles.css">
    <link rel="stylesheet" type="text/css" href="app/assets/css/styleProduct.css">


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
    <div class="header_introduction">
        <div class="header_introduction__textblock">
            <div class="header_introduction__title">Feel the chill with our delicious barbecue.</div>
            <div class="header_introduction__common-text">We have so many tastes! Buy now and treat yourself these hot
                days.
                We’re sure you’ll love this yummy. Are you a wholesaler? Awesome!
                We’re having special conditions for you!
            </div>
        </div>
        <img class="header_introduction__img" src="app/assets/pictures/barbeku.png" alt="">
    </div>
</header>
<main class="background-container">
    <article class="menuTitle">
        <section class="wrapper">
            <div class="top">СТЕЙКИ</div>
            <div class="bottom" aria-hidden="true">СТЕЙКИ</div>
        </section>
    </article>

    <ul class="products" id="IDproducts">
        <li class="product-wrapper">
            <a class="product">
                <div class="product__top">
                    <div class="product__photo">
                        <img src='app/assets/pictures/barbeku.png' alt="">
                    </div>

                    <div class="product__label">-10%</div>
                </div>

                <div class="product__bottom">
                    <div class="product__prices">
                        <div class="product__price product__price--common">150</div>
                    </div>

                    <p class="product__title">
                        Стейк со свининой "По французки с перцемааааа" 400г.
                    </p>

                    <button class="product__add">Заказать</button>


                </div>
            </a>
        </li>

    </ul>


    <div id="checkmarkID" class="checkmark">
        <img src="app/assets/pictures/gal.png" alt="">
        <p>Заказ добавлен!</p>
    </div>
</main>

<footer class="footer">
    <div class="footer__addr">
        <h1 class="footer__logo">Something</h1>

        <h2>Contact</h2>

        <address>
            5534 Somewhere In. The World 22193-10212<br>

            <a class="footer__btn" href="mailto:example@gmail.com">Email Us</a>
        </address>
    </div>

    <ul class="footer__nav">
        <li class="nav__item">
            <h2 class="nav__title">Media</h2>

            <ul class="nav__ul">
                <li>
                    <a href="#">Online</a>
                </li>

                <li>
                    <a href="#">Print</a>
                </li>

                <li>
                    <a href="#">Alternative Ads</a>
                </li>
            </ul>
        </li>

        <li class="nav__item nav__item--extra">
            <h2 class="nav__title">Technology</h2>

            <ul class="nav__ul nav__ul--extra">
                <li>
                    <a href="#">Hardware Design</a>
                </li>

                <li>
                    <a href="#">Software Design</a>
                </li>

                <li>
                    <a href="#">Digital Signage</a>
                </li>

                <li>
                    <a href="#">Automation</a>
                </li>

                <li>
                    <a href="#">Artificial Intelligence</a>
                </li>

                <li>
                    <a href="#">IoT</a>
                </li>
            </ul>
        </li>

        <li class="nav__item">
            <h2 class="nav__title">Legal</h2>

            <ul class="nav__ul">
                <li>
                    <a href="#">Privacy Policy</a>
                </li>

                <li>
                    <a href="#">Terms of Use</a>
                </li>

                <li>
                    <a href="#">Sitemap</a>
                </li>
            </ul>
        </li>
    </ul>

    <div class="legal">
        <p>&copy; 2019 Something. All rights reserved.</p>

        <div class="legal__links">
            <span>Made with <span class="heart">♥</span> remotely from Anywhere</span>
        </div>
    </div>
</footer>



<script type="module" src="app/products/read-products.js"></script>
<script src="app/users/log-out.js"></script>
<script src="app/scripts/drop-down.js"></script>

</body>
</html>

