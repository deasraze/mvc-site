<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Оформление заказа</title>
<!--    styles-->
    <link rel="stylesheet" href="/template/stylesheet/all.css">
    <link rel="stylesheet" href="/template/stylesheet/fonts.css">
    <link rel="stylesheet" href="/template/stylesheet/nprogress.css">
    <link rel="stylesheet" href="/template/stylesheet/bootstrap.min.css">
    <link rel="stylesheet" href="/template/stylesheet/default.css">
    <link rel="stylesheet" href="/template/stylesheet/scrollBar.css">
    <link rel="stylesheet" href="/template/stylesheet/menuCSS.css">
    <link rel="stylesheet" href="/template/stylesheet/mobilMenu.css">
    <link rel="stylesheet" href="/template/stylesheet/checkout.css">
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
                <li><a href="/about/">О нас </a></li>
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
                            <li><a href="#">Настройки</a></li>
                            <li><a href="#">Помощь</a></li>
                            <li><a href="/user/logout/">Выход</a></li>
                        <?php else: ?>
                            <li><a href="/cart/">Моя корзина (<span id="cart-count"><?php echo Cart::countItems(); ?></span>)</a></li>
                            <li><a href="/cabinet/">Профиль</a></li>
                            <li><a href="#">Настройки</a></li>
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
                    <li><a href="/about/">О нас </a></li>
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
<section id="checkout">
    <div class="main-container-two">
        <div class="header-text">
            <h3>Оформление заказа</h3>
            <hr class="long">
            <hr class="medium">
            <hr class="short">
        </div>
        <div class="checkout-body">
            <?php if ($result): ?>
            <div class="successful">
                <p class="alert alert-success">Ваш заказ оформлен. Мы вам перезвоним.</p>
            </div>
            <?php else: ?>
                <?php if (isset($errors) && is_array($errors)): ?>
                <div class="error">
                    <?php foreach ($errors as $error): ?>
                        <li class="list-group-item list-group-item-danger" style="max-width: 450px"> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </div>
                <?php endif; ?>
                <form action="#" method="post">
                    <h3>Выбрано товаров: <span><?php echo $totalQuantity; ?></span>, на сумму:
                        <span><?php echo $totalPrice; ?></span><span> р.</span></h3>
                    <p>Для оформления заказа заполните форму. Наш менеджер свяжется с Вами.</p>
                    <input type="text" placeholder="Имя" name="userName">
                    <input type="text" placeholder="Фамилия" name="userSurname">
                    <input type="text" placeholder="Телефон" id="phone" name="userPhone">
                    <textarea placeholder="Комментарий к заказу" name="userComment"></textarea>
                    <button type="submit" name="submit">Оформить</button>
                </form>
            <?php endif; ?>
        </div>
    </div>
</section>
<!--scripts-->
<script src="/template/scripts/animationMobilMenu.js"></script>
<script src="/template/scripts/loader.js"></script>
<script src="/template/scripts/jquery.maskedinput.min.js"></script>
<script src="/template/scripts/masks.js"></script>
</body>
</html>