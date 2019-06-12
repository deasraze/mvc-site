<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Билеты</title>
    <!--styles-->
    <link rel="stylesheet" href="/template/stylesheet/all.css">
    <link rel="stylesheet" href="/template/stylesheet/footer.css">
    <link rel="stylesheet" href="/template/stylesheet/scrollBar.css">
    <link rel="stylesheet" href="/template/stylesheet/tooltip.css">
    <link rel="stylesheet" href="/template/stylesheet/nprogress.css">
    <link rel="stylesheet" href="/template/stylesheet/fonts.css">
    <link rel="stylesheet" href="/template/stylesheet/default.css">
    <link rel="stylesheet" href="/template/stylesheet/menuCSS.css">
    <link rel="stylesheet" href="/template/stylesheet/mobilMenu.css">
    <link rel="stylesheet" href="/template/stylesheet/animate.css">
    <link rel="stylesheet" href="/template/stylesheet/cashbox.css">
    <link rel="stylesheet" href="/template/stylesheet/media.css">
    <!--scripts-->
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
<section id="cashbox">
    <div class="container">
        <div class="cashbox-wrap">
            <?php foreach ($ticketList as $ticket): ?>
            <div class="cash">
                <div class="avatar children">
                    <img src="<?php echo Tickets::getImage($ticket['id']); ?>" alt="<?php echo $ticket['name']; ?>">
                </div>
                <div class="cash-text cash-item-<?php echo $ticket['id'] ?>">
                    <h3><?php echo $ticket['name']; ?></h3>
                    <p><span><?php echo $ticket['price']; ?> р.</span></p>
                </div>
                <div class="cash-buttons">
                    <button id="btn-tooltip" class="tooltip-btn" title="<?php echo $ticket['description']; ?>"><i class="fas fa-exclamation"></i></button>
                    <button id="add-to-cart"  class="add-to-cart-<?php echo $ticket['id']; ?> add-to-cart"   data-id="<?php echo $ticket['id']; ?>" onclick="addToCart(<?php echo $ticket['id']; ?>)">Добавить в корзину</button>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php echo $pagination->get(); ?>
    </div>
    <div class="popupInfo animated slideOutRight">
        <h3>Добавлено в <a href="/cart/">корзину!</a></h3>
    </div>
</section>
<footer id="footer">
    <div class="main-container-two">
        <div class="last-information-about-museum">
            <ul class="navs">
                <li><a href="">Help</a></li>
                <li><a href="">Contact</a></li>
                <li><a href="">Gift Cards</a></li>
                <li><a href="">Dealers</a></li>
                <li><a href="">Foundation</a></li>
            </ul>
        </div>
        <div class="last-social-network">
            <ul class="navs">
                <li><a href=""><i class="fab fa-vk vk"></i></a></li>
                <li><a href=""><i class="fab fa-instagram inst"></i></a></li>
                <li><a href=""><i class="fab fa-twitter twit"></i></a></li>
                <li><a href=""><i class="fas fa-rss rss"></i></a></li>
                <li><a href=""><i class="fab fa-twitch twitch"></i></a></li>
            </ul>
        </div>
        <div class="last-polity">
            <ul class="navs">
                <li><a href="">social compliance</a></li>
                <li><a href="">terms</a></li>
                <li><a href="">privacy policy</a></li>
            </ul>
        </div>
        <div class="info-about-creature">
            <p>Site by Chopper & Condecrom</p>
        </div>
    </div>
</footer>
<!--scripts-->
<script src="/template/scripts/bootstrap.bundle.min.js"></script>
<script src="/template/scripts/animationMobilMenu.js"></script>
<script src="/template/scripts/loader.js"></script>
<script src="/template/scripts/addToCart.js"></script>
<script src="/template/scripts/tooltip.js"></script>
<script>
    $(document).ready(function () { // Код должен быть выполнен только после загрузки документа
        $(".add-to-cart").click(function () { // Отвечает за нажатие на кнопку "В корзину"
            var id = $(this).attr("data-id"); // Получаем id билета из атрибута кнопки
            // Формируем асинхронный запрос
            // 1. Тип запроса и адрес (post("/cart/add/"+id)
            // 2. {} - параметры
            // 3. function (data) обрабатывает ответ
            $.post("/cart/add/" + id, {}, function (data) { // В data попадает id билета
                // Возвращаем ответ
                $("#cart-count").html(data);
            });
            return false;
        });
    });
</script>
</body>
</html>