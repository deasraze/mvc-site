<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Редактирование профиля</title>
    <!--    favicon-->
    <link rel="apple-touch-icon" sizes="57x57" href="/template/icon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/template/icon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/template/icon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/template/icon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/template/icon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/template/icon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/template/icon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/template/icon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/template/icon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/template/icon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/template/icon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/template/icon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/template/icon/favicon-16x16.png">
    <link rel="manifest" href="/template/icon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/template/icon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!--    styles-->
    <link rel="stylesheet" href="/template/stylesheet/all.css">
    <link rel="stylesheet" href="/template/stylesheet/fonts.css">
    <link rel="stylesheet" href="/template/stylesheet/tooltip.css">
    <link rel="stylesheet" href="/template/stylesheet/bootstrap.min.css">
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
                <li><a href="/news/">Новости</a></li>
                <li><a href="/tickets/">Касса</a></li>
                <li><a href="/collection/">Произведения</a></li>
                <li><a href="/jobs/">Вакансии</a></li>
                <li><a href="/contacts/">Контакты</a></li>
            </ul>
            <div class="clear"></div>
        </div>
        <div class="user-menu">
            <div class="user-avatar" id="close__" onclick="openUserProfil()" >
                <img src="<?php echo User::getImage($user['id']); ?>" alt="user-avatar">
                <p><i class="fas fa-angle-down"></i></p>
            </div>
            <div class="menu-wrap">
                <div class="menu">
                    <ul class="user-menu-items">
                        <?php if (User::isGuest()): ?>
                            <li><a href="/cart/">Моя корзина (<span id="cart-count"><?php echo Cart::countItems(); ?></span>)</a></li>
                            <li><a href="#">Помощь</a></li>
                            <li><a href="/user/register/">Регистрация</a></li>
                            <li><a href="/user/login/">Вход</a></li>
                        <?php elseif (User::checkRole($user['id'])): ?>
                            <li><a href="/admin/">Админпанель</a></li>
                            <li><a href="/cart/">Моя корзина (<span id="cart-count"><?php echo Cart::countItems(); ?></span>)</a></li>
                            <li><a href="/cabinet/">Профиль</a></li>
                            <li><a href="/cabinet/edit/">Настройки</a></li>
                            <li><a href="#">Помощь</a></li>
                            <li><a href="/user/logout/">Выход</a></li>
                        <?php else: ?>
                            <li><a href="/cart/">Моя корзина (<span id="cart-count"><?php echo Cart::countItems(); ?></span>)</a></li>
                            <li><a href="/cabinet/">Профиль</a></li>
                            <li><a href="/cabinet/edit/">Настройки</a></li>
                            <li><a href="#">Помощь</a></li>
                            <li><a href="/user/logout/">Выход</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="mobil_menu">
        <div class="wrap-menu">
            <div class="nav-menu">
                <ul>
                    <li><a href="/">Главная</a></li>
                    <li><a href="/news/">Новости</a></li>
                    <li><a href="/tickets/">Касса</a></li>
                    <li><a href="/collection/">Произведения</a></li>
                    <li><a href="/jobs/">Вакансии</a></li>
                    <li><a href="/contacts/">Контакты</a></li>
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
<section id="profile-view">
    <div class="main-container-two">
        <div class="header-text">
            <h3>Профиль</h3>
            <hr class="long">
            <hr class="medium">
            <hr class="short">
        </div>
        <div class="profile">
            <div class="avatar">
                <img src="<?php echo User::getImage($user['id']); ?>" alt="">
            </div>
            <div class="info">
                <h3><?php echo $user['surname'] . ' ' . $user['name']; ?></h3>
                <div class="profile-button">
                    <button onclick="location.href='/cabinet/edit/'">Редактировать профиль</button>
                    <button onclick="location.href='/cabinet/editpassword/'">Сменить пароль</button>
                </div>
            </div>
        </div>
        <div class="history-offer">
            <label class="header-table" for=""><h3>История заказов</h3></label>
            <table class="table table-hover">
                <thead class="thead-light">
                <tr>
                    <th scope="col">№ заказа</th>
                    <th scope="col">Имя покупателя</th>
                    <th scope="col">Фамилия покупателя</th>
                    <th scope="col">Отчество покупателя</th>
                    <th scope="col">Телефон</th>
                    <th scope="col">Дата оформления</th>
                    <th scope="col">Статус</th>
                </tr>
                </thead>
                <?php foreach ($orderList as $order): ?>
                <tbody>
                <tr>
                    <th scope="row"><?php echo $order['id']; ?></th>
                    <td><?php echo $order['user_name']; ?></td>
                    <td><?php echo $order['user_surname']; ?></td>
                    <td><?php echo $order['user_patronymic']; ?></td>
                    <td><?php echo $order['user_phone']; ?></td>
                    <td><?php echo $order['date']; ?></td>
                    <td><?php echo Order::getStatusText($order['status']); ?></td>
                </tr>
                </tbody>
                <?php endforeach; ?>
            </table>
        </div>
    </div>
</section>

<script src="/template/scripts/animationMobilMenu.js"></script>
<script src="/template/scripts/loader.js"></script>
<script src="/template/scripts/bootstrap.bundle.min.js"></script>
<script src="/template/scripts/tooltip.js"></script>
</body>
</html>