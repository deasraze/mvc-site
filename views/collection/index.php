<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Коллекции</title>
    <!--styles-->
    <link rel="stylesheet" href="/template/stylesheet/all.css">
    <link rel="stylesheet" href="/template/stylesheet/scrollBar.css">
    <link rel="stylesheet" href="/template/stylesheet/animate.css">
    <link rel="stylesheet" href="/template/stylesheet/animation.css">
    <link rel="stylesheet" href="/template/stylesheet/default.css">
    <link rel="stylesheet" href="/template/stylesheet/arts.css">
    <link rel="stylesheet" href="/template/stylesheet/checkboxStyle.css">
    <link rel="stylesheet" href="/template/stylesheet/photobox.css">
    <link rel="stylesheet" href="/template/stylesheet/footer.css">
    <link rel="stylesheet" href="/template/stylesheet/menuCSS.css">
    <link rel="stylesheet" href="/template/stylesheet/mobilMenu.css">
    <link rel="stylesheet" href="/template/stylesheet/media.css">
    <link rel="stylesheet" href="/template/stylesheet/fonts.css">
    <link rel="stylesheet" href="/template/stylesheet/nprogress.css">
    <!--scripts-->
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
    <div class="video-and-title">
        <div class="big-container">
            <div class="title-header-block">
                <h1>Коллекции</h1>
            </div>
        </div>
        <div class="video-information">
            <img src="/template/museums_pictures/Galleryhd.jpg" alt="Картины">
        </div>
    </div>
</header>
<section id="all-arts">
    <div class="search-art" id="close_">
        <div class="mini-container">
            <input placeholder="Поиск" type="text">
            <button><i class="fas fa-search"></i></button>
        </div>

        <div class="mini-container sorting-all-arts">
            <div class="header-search">
                <h3>Категории</h3>
            </div>
            <div class="body-search">
                <?php foreach ($categories as $categoryItem): ?>
                <div><a href="/category/<?php echo $categoryItem['id']; ?>"><?php echo $categoryItem['name'];?> (45)</a></div>
                <?php endforeach; ?>
            </div>
        </div>

        <button class="open-sort-menu" onclick="transformation_search_btn()">
            <i class="fas fa-angle-double-right"></i>
        </button>
    </div>
    <div class="main-container-two">
        <div class="grid">
            <div class="grid-sizer"></div>
            <?php foreach ($latestCollection as $collection): ?>
            <div class="
            <?php
            if ($collection['display_block'] == 1):
                echo 'grid-item grid-item--width2 grid-item--height2';
            elseif ($collection['display_block'] == 2):
                echo 'grid-item grid-item--width3 grid-item--height3';
            elseif ($collection['display_block'] == 3):
                echo 'grid-item grid-item--width4 grid-item--height4';
            else:
                echo 'grid-item grid-item--width2 grid-item--height2';
            endif; ?>">
                <div class="photobox photobox_type8">
                    <div class="photobox__previewbox">
                        <img src="<?php echo Collection::getImage($collection['id']); ?>" class="photobox__preview" alt="Preview">
                        <span class="photobox__label">
                            <a href="/collection/<?php echo $collection['id']; ?>"><?php echo $collection['name']; ?></a>
                            <p><?php echo $collection['author']; ?></p>
                        </span>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
        <?php echo $pagination->get(); ?>
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
<<!--scripts-->
<script>
    var grid = document.querySelector('.grid');
    var msnry = new Masonry( grid, {
        itemSelector: '.grid-item',
        columnWidth: '.grid-sizer',
        gutter: 5,
        percentPosition: true
    });
</script>
<script src="/template/scripts/animationMobilMenu.js"></script>
<script src="/template/scripts/loader.js"></script>
</body>
</html>