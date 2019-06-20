<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Корзина</title>
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
    <link rel="stylesheet" href="/template/stylesheet/animate.css">
    <link rel="stylesheet" href="/template/stylesheet/scrollBar.css">
    <link rel="stylesheet" href="/template/stylesheet/default.css">
    <link rel="stylesheet" href="/template/stylesheet/menuCSS.css">
    <link rel="stylesheet" href="/template/stylesheet/mobilMenu.css">
    <link rel="stylesheet" href="/template/stylesheet/cart.css">
    <link rel="stylesheet" href="/template/stylesheet/nprogress.css">
    <link rel="stylesheet" href="/template/stylesheet/media.css">
    <!--    scripts-->
    <script src="/template/scripts/jq.min.js"></script>
    <script src="/template/scripts/masonry-docs.min.js"></script>
    <script src="/template/scripts/viewportchecker.js"></script>
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
            <div class="user-avatar" id="close__" onclick="openUserProfil()">
                <img src="<?php echo User::getImage($idUser); ?>" alt="user-avatar">
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
                        <?php elseif (User::checkRole($idUser)): ?>
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
<section id="cart-main">
    <div class="main-container-two">
        <?php if ($ticketsInCart): ?>
            <div class="cart-wrap">
                <div class="header-text">
                    <h3>Корзина</h3>
                    <hr class="long">
                    <hr class="medium">
                    <hr class="short">
                </div>
                <div class="cart">
                    <?php foreach ($tickets as $ticket): ?>
                        <div id="cart-offer-<?php echo $ticket['id'] ?>" class="cart-offer">
                            <div class="wrap-cart-offer">
                                <div class="cart-offer-navigation">
                                    <p class="id-cart">Артикул</p>
                                    <p class="name-cart">Название</p>
                                    <p class="amount-cart">Кол-во,шт</p>
                                    <div class="print-cart">
                                        <p>Печать</p>
                                    </div>
                                    <p class="cost-cart">Стоимость, Р</p>
                                </div>
                                <div class="line-cart">
                                </div>
                                <div class="my-cart">
                                    <div class="id-cart"><?php echo $ticket['code']; ?></div>
                                    <div class="name-cart"><?php echo $ticket['name']; ?></div>
                                    <div class="amount-cart amount-cart-<?php echo $ticket['id'] ?>">
                                        <button class="delete-amount-cart delete-amount-cart-<?php echo $ticket['id'] ?>" onclick="deleteItem(<?php echo $ticket['id'] ?>)">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <span class="amount-cart-span-<?php echo $ticket['id'] ?>"><?php echo $ticketsInCart[$ticket['id']]; ?> </span>
                                        <button class="add-amount-cart add-amount-cart-<?php echo $ticket['id'] ?>" onclick="addItem(<?php echo $ticket['id'] ?>)">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                    <div class="print-cart">
                                        <img src="/template/museums_pictures/pachat.png" alt="Печать">
                                    </div>
                                    <div class="cost-cart" id="cost-cart-<?php echo $ticket['id'] ?>"><?php echo $ticket['price']; ?></div>
                                </div>
                                <div class="line-cart">
                                </div>
                                <div class="button-cart">
                                    <div class="director-sign">
                                        <p>Подпись Директора:</p>
                                        <img src="/template/museums_pictures/pushkin.png" alt="Роспись">
                                    </div>
                                    <button onclick="btnDeleteTicketClick(<?php echo $ticket['id']; ?>)"
                                            class="delete-offer-from-cart" id="delete-offer-from-cart-1" value="1">
                                        Убрать из корзины
                                    </button>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="header-text">
                    <hr class="short">
                    <hr class="medium">
                    <hr class="long">
                </div>
                <div class="total-amount">
                    <div class="total-amount-wrap">
                        <p>Итоговая стоимость: <span class="amount-sum"><?php echo $totalPrice; ?></span><span>р.</span></p>
                        <button onclick="location.href= '/cart/checkout/'" class="place-your-order">Оформить заказ</button>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="cart-wrap">
                <div class="header-text">
                    <h3>Ваша корзина пуста</h3>
                    <hr class="long">
                    <hr class="medium">
                    <hr class="short">
                </div>
                <div class="cart">
                    <h3>Корзина пуста, <a href="/tickets/">купить билет</a>.</h3>
                    <div class="header-text">
                        <hr class="short">
                        <hr class="medium">
                        <hr class="long">
                    </div>
                </div>
            </div>
        <?php endif; ?>
</section>
<!--scripts-->
<script src="/template/scripts/animationMobilMenu.js"></script>
<script src="/template/scripts/deleteCart.js"></script>
<script src="/template/scripts/loader.js"></script>
</body>
</html>
