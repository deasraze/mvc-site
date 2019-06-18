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
                    <th scope="col">ID заказа</th>
                    <th scope="col">Имя покупателя</th>
                    <th scope="col">Фамилия покупателя</th>
                    <th scope="col">Телефон</th>
                    <th scope="col">Дата оформления</th>
                    <th scope="col">Статус</th>
                    <th scope="col">Действия</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <th scope="row">15</th>
                    <td>Chopper</td>
                    <td>Chopper</td>
                    <td>+1(111)111-11-11</td>
                    <td>2019-06-15 23:00:04</td>
                    <td>Новый заказ</td>
                    <td>
                        <button id="btn-tooltip colletction-15" data-toggle="modal" data-target=".bd-example-modal-sm" class="tooltip-btn" title="" onclick="deleletBtn(15,5)" data-original-title="Удалить">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                </tbody>
                <tbody>
                <tr>
                    <th scope="row">14</th>
                    <td>Chopper</td>
                    <td>Chopper</td>
                    <td>+1(111)111-11-11</td>
                    <td>2019-06-15 22:54:27</td>
                    <td>Новый заказ</td>
                    <td>
                        <button id="btn-tooltip colletction-14" data-toggle="modal" data-target=".bd-example-modal-sm" class="tooltip-btn" title="" onclick="deleletBtn(14,5)" data-original-title="Удалить">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                </tbody>
                <tbody>
                <tr>
                    <th scope="row">13</th>
                    <td>Jesss</td>
                    <td>Jesss</td>
                    <td>+8(999)955-65-66</td>
                    <td>2019-06-12 23:43:55</td>
                    <td>Новый заказ</td>
                    <td>
                        <button id="btn-tooltip colletction-13" data-toggle="modal" data-target=".bd-example-modal-sm" class="tooltip-btn" title="" onclick="deleletBtn(13,5)" data-original-title="Удалить">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                </tbody>
                <tbody>
                <tr>
                    <th scope="row">12</th>
                    <td>Jesss</td>
                    <td>Jesss</td>
                    <td>+8(965)581-29-75</td>
                    <td>2019-06-11 23:33:42</td>
                    <td>Новый заказ</td>
                    <td>
                        <button id="btn-tooltip colletction-12" data-toggle="modal" data-target=".bd-example-modal-sm" class="tooltip-btn" title="" onclick="deleletBtn(12,5)" data-original-title="Удалить">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                </tbody>
                <tbody>
                <tr>
                    <th scope="row">11</th>
                    <td>Ваываыв</td>
                    <td>Аывавыавы</td>
                    <td>+8(965)581-29-75</td>
                    <td>2019-06-11 23:29:35</td>
                    <td>Новый заказ</td>
                    <td>
                        <button id="btn-tooltip colletction-11" data-toggle="modal" data-target=".bd-example-modal-sm" class="tooltip-btn" title="" onclick="deleletBtn(11,5)" data-original-title="Удалить">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                </tbody>
                <tbody>
                <tr>
                    <th scope="row">10</th>
                    <td>Ваываыв</td>
                    <td>Аывавыавы</td>
                    <td>+8(999)955-65-66</td>
                    <td>2019-06-11 23:25:59</td>
                    <td>Новый заказ</td>
                    <td>
                        <button id="btn-tooltip colletction-10" data-toggle="modal" data-target=".bd-example-modal-sm" class="tooltip-btn" title="" onclick="deleletBtn(10,5)" data-original-title="Удалить">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                </tbody>
                <tbody>
                <tr>
                    <th scope="row">9</th>
                    <td>Ваываывq</td>
                    <td>Аывавыавыq</td>
                    <td>+8(999)955-65-55</td>
                    <td>2019-06-10 16:01:20</td>
                    <td>В обработке</td>
                    <td>
                        <button id="btn-tooltip colletction-9" data-toggle="modal" data-target=".bd-example-modal-sm" class="tooltip-btn" title="" onclick="deleletBtn(9,5)" data-original-title="Удалить">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                </tbody>
                <tbody>
                <tr>
                    <th scope="row">8</th>
                    <td>Jess</td>
                    <td>Jess</td>
                    <td>+8(999)955-65-66</td>
                    <td>2019-06-06 23:23:01</td>
                    <td>Новый заказ</td>
                    <td>
                        <button id="btn-tooltip colletction-8" data-toggle="modal" data-target=".bd-example-modal-sm" class="tooltip-btn" title="" onclick="deleletBtn(8,5)" data-original-title="Удалить">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                </tbody>
                <tbody>
                <tr>
                    <th scope="row">7</th>
                    <td>Jess</td>
                    <td>Dsdsds</td>
                    <td>+8(999)955-65-66</td>
                    <td>2019-06-04 20:42:13</td>
                    <td>Новый заказ</td>
                    <td>
                        <button id="btn-tooltip colletction-7" data-toggle="modal" data-target=".bd-example-modal-sm" class="tooltip-btn" title="" onclick="deleletBtn(7,5)" data-original-title="Удалить">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                </tbody>
                <tbody>
                <tr>
                    <th scope="row">6</th>
                    <td>Jess</td>
                    <td>Аывавыавы</td>
                    <td>+8(999)955-65-43</td>
                    <td>2019-06-03 23:59:39</td>
                    <td>Новый заказ</td>
                    <td>
                        <button id="btn-tooltip colletction-6" data-toggle="modal" data-target=".bd-example-modal-sm" class="tooltip-btn" title="" onclick="deleletBtn(6,5)" data-original-title="Удалить">
                            <i class="fas fa-trash-alt"></i>
                        </button>
                    </td>
                </tr>
                </tbody>
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