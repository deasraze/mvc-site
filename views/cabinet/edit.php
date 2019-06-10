<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Редактирование профиля</title>
    <link rel="stylesheet" href="/template/stylesheet/all.css">
    <link rel="stylesheet" href="/template/stylesheet/fonts.css">
    <link rel="stylesheet" href="/template/stylesheet/default.css">
    <link rel="stylesheet" href="/template/stylesheet/scrollBar.css">
    <link rel="stylesheet" href="/template/stylesheet/menuCSS.css">
    <link rel="stylesheet" href="/template/stylesheet/mobilMenu.css">
    <link rel="stylesheet" href="/template/stylesheet/profile.css">
    <link rel="stylesheet" href="/template/stylesheet/nprogress.css">
    <link rel="stylesheet" href="/template/stylesheet/media.css">

    <script src="/template/scripts/jq.min.js"></script>
    <script src="/template/scripts/nprogress.js"></script>

</head>
<body>
    <header id="header">
    <div class="nav-container f-nav">
        <div class="nav">
            <ul>
                <li><a href="/">Главная</a></li>
                <li><a href="/cart">Касса</a></li>
                <li><a href="./arts.html">Произведения</a></li>
                <li><a href="">Персонал</a></li>
                <li><a href="/about">О нас </a></li>
                <li><a href="./signin.html">Регистрация</a></li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="user-menu">
            <div class="user-avatar" id="close__" onclick="openUserProfil()" >
                <img src="museums_pictures/User.png" alt="user-avatar">
                <p><i class="fas fa-angle-down"></i></p>
            </div>
            <div class="menu-wrap">
                <div class="menu">
                    <ul class="user-menu-items">
                        <li><a href="cart.html">Моя корзина</a></li>
                        <li><a href="#">Настройки</a></li>
                        <li><a href="#">Помощь</a></li>
                        <li><a href="#">Выход</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="no-user-menu">
            <a href="login.html">Войти</a>
        </div>
    </div>
    <div class="mobil_menu">
        <div class="wrap-menu">
            <div class="nav-menu">
                <ul>
                    <li><a href="/">Главная</a></li>
                    <li><a href="/cart">Касса</a></li>
                    <li><a href="./arts.html">Произведения</a></li>
                    <li><a href="">Персонал</a></li>
                    <li><a href="/about">О нас</a></li>
                    <li><a href="./signin.html">Регистрация</a></li>
                </ul>
            </div>
            <button class="open-the-menu" id="close" onclick="tranformation_btn()">
                <div class="line line1"></div>
                <div class="line line2"></div>
                <div class="line line3"></div>
            </button>
        </div>
    </div>
</header>
    <section id="profile-edit">
        <div class="main-container-two">
            <div class="header-text">
                <h3>Редактирование профиля</h3>
                <hr class="long">
                <hr class="medium">
                <hr class="short">
            </div>
            <div class="user-edit">
                <form action="">
                    <div class="user-avatar">
                        <h3>Изображение пользователя</h3>
                        <img src="/template/museums_pictures/User.png" alt="Картинка пользователя">
                        <input name="file" type="file" id="file" class="inputfile">
                        <label for="file"><i class="fas fa-upload"></i> Загружить новое изображение</label>
                    </div>
                    <div class="user-data">
                        <h3>Данные пользователя</h3>
                        <input type="text" placeholder="Имя">
                        <input type="text" placeholder="Фамиля">
                        <input type="text" placeholder="Отчество">
                        <input type="text" placeholder="Дата рождения">
                        <input type="text" placeholder="E-mail">
                        <input type="text" placeholder="Старый пароль">
                        <input type="text" placeholder="Новый пароль">
                        <button>Сохранить</button>
                    </div>

                </form>
            </div>
        </div>
    </section>

    <script src="/template/scripts/animationMobilMenu.js"></script>
    <script src="/template/scripts/loader.js"></script>
</body>
</html>