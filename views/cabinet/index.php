<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Your profile</title>
    <link rel="stylesheet" href="/template/stylesheet/fonts.css">
    <link rel="stylesheet" href="/template/stylesheet/default.css">
    <link rel="stylesheet" href="/template/stylesheet/menuCSS.css">
    <link rel="stylesheet" href="/template/stylesheet/mobilMenu.css">
    <link rel="stylesheet" href="/template/stylesheet/profile.css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
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
            <div class="edit-picture-profile">
                <img src="museums_pictures/no_photo.png" alt="Аватар">
            </div>
            <div class="edit-profile-information">
                <div class="edit-my-offers">
                    <div class="header-text">
                        <h3>Активные билеты</h3>
                    </div>
                    <div class="offer-navigation">
                        <h3>Код товара</h3>
                        <h3>Название</h3>
                        <h3>Стоимость,Р</h3>
                        <h3>Кол-во,шт</h3>
                        <h3>Дата</h3>
                        <h3>Статус</h3>
                    </div>
                    <div class="my-offer">
                        <div class="offer">
                            <div class="id-item">23</div>
                            <div class="name-item">Взрослый билет</div>
                            <div class="cost-item">250</div>
                            <div class="amount-item">2</div>
                            <div class="data-item">26.05.19 19:30</div>
                            <div class="status-item" id="green">Оплачен</div>
                            <button class="delete-item-info"><i class="fas fa-trash-alt"></i></button>
                        </div>
                        <div class="offer">
                            <div class="id-item">27</div>
                            <div class="name-item">Детский билет</div>
                            <div class="cost-item">200</div>
                            <div class="amount-item">1</div>
                            <div class="data-item">23.05.19 19:30</div>
                            <div class="status-item" id="red">Не оплачен</div>
                            <button class="delete-item-info"><i class="fas fa-trash-alt"></i></button>
                        </div>
                        <div class="offer">
                            <div class="id-item">23</div>
                            <div class="name-item">Взрослый билет</div>
                            <div class="cost-item">250</div>
                            <div class="amount-item">2</div>
                            <div class="data-item">26.05.19 19:30</div>
                            <div class="status-item" id="green">Оплачен</div>
                            <button type="submit" class="delete-item-info"><i class="fas fa-trash-alt"></i></button>
                        </div>
                        <div class="offer">
                            <div class="id-item">27</div>
                            <div class="name-item">Детский билет</div>
                            <div class="cost-item">200</div>
                            <div class="amount-item">1</div>
                            <div class="data-item">23.05.19 19:30</div>
                            <div class="status-item" id="red">Не оплачен</div>
                            <button class="delete-item-info"><i class="fas fa-trash-alt"></i></button>
                        </div>
                    </div>
                </div>
                <div class="edit-my-commentaries">
                    <div class="header-text">
                        <h3>Мои комментарии</h3>
                    </div>
                    <div class="my-commentaries">
                        <div class="comment">

                        </div>
                    </div>
                </div>
                <div class="edit-my-profile-information">
                    <div class="header-text">
                        <h3>Настройки профиля</h3>
                    </div>
                    <div class="my-profile-information">
                        <form action="">
                            <input type="text" placeholder="Имя" value="Иванов Иван Иванович">
                            <input type="text" placeholder="Дата рождения" value="23.12.1980">
                            <input type="text" placeholder="Почта" value="ivan1980@gmailc.com">
                            <input type="password" placeholder="Старый пароль" value="">
                            <input type="password" placeholder="Новый пароль" value="">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="/template/scripts/animationMobilMenu.js"></script>
</body>
</html>