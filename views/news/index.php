<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Новости</title>
    <!--styles-->
    <link rel="stylesheet" href="/template/stylesheet/all.css">
    <link rel="stylesheet" href="/template/stylesheet/footer.css">
    <link rel="stylesheet" href="/template/stylesheet/scrollBar.css">
    <link rel="stylesheet" href="/template/stylesheet/nprogress.css">
    <link rel="stylesheet" href="/template/stylesheet/default.css">
    <link rel="stylesheet" href="/template/stylesheet/fonts.css">
    <link rel="stylesheet" href="/template/stylesheet/menuCSS.css">
    <link rel="stylesheet" href="/template/stylesheet/mobilMenu.css">
    <link rel="stylesheet" href="/template/stylesheet/news.css">
    <link rel="stylesheet" href="/template/stylesheet/slider.css">
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
                <li><a href="/about/">О нас </a></li>
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
<section id="news">
    <div class="main-container-two">
        <div class="header-text">
            <h3>Новости </h3>
            <hr class="long">
            <hr class="medium">
            <hr class="short">
        </div>
        <div class="slider">
            <div class="slider-arrow">
                <button class="arrow arrow-left"><i class="fas fa-chevron-left"></i></button>
                <button class="arrow arrow-right"><i class="fas fa-chevron-right"></i></button>
            </div>
            <div class="slider-wrap">
                <a class="slider-item-check" href="#">
                    <div class="slider-item slider-item-1">
                        <img src="/template/museums_pictures/slider1.jpg" alt="">
                        <div class="slider-title">
                            <h3><i class="fas fa-newspaper"></i> Татарстан наш общий дом</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, commodi deleniti dignissimos dolor dolore et illum ipsam minima, natus quis similique veniam vero voluptate? Accusamus debitis eius exercitationem expedita totam.</p>
                        </div>
                    </div>
                </a>
                <a class="slider-item-check" href="#">
                    <div class="slider-item slider-item-2">
                        <div></div>
                        <img src="/template/museums_pictures/slider2.jpg" alt="">
                        <div class="slider-title">
                            <h3><i class="fas fa-newspaper"></i> "Стихия революции: 1917 год в России"</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, commodi deleniti dignissimos dolor dolore et illum ipsam minima, natus quis similique veniam vero voluptate? Accusamus debitis eius exercitationem expedita totam.</p>
                        </div>
                    </div>
                </a>
                <a class="slider-item-check" href="#">
                    <div class="slider-item slider-item-3">
                        <img src="/template/museums_pictures/slide3.jpg" alt="">
                        <div class="slider-title">
                            <h3><i class="fas fa-newspaper"></i> Татарстан наш общий дом</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, commodi deleniti dignissimos dolor dolore et illum ipsam minima, natus quis similique veniam vero voluptate? Accusamus debitis eius exercitationem expedita totam.</p>
                        </div>
                    </div>
                </a>
                <a class="slider-item-check" href="#">
                    <div class="slider-item slider-item-4">
                        <img src="/template/museums_pictures/slide6.jpg" alt="">
                        <div class="slider-title">
                            <h3><i class="fas fa-newspaper"></i> Татарстан наш общий дом</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, commodi deleniti dignissimos dolor dolore et illum ipsam minima, natus quis similique veniam vero voluptate? Accusamus debitis eius exercitationem expedita totam.</p>
                        </div>
                    </div>
                </a>
                <a class="slider-item-check slide-item-check-5" href="#">
                    <div class="slider-item slider-item-5">
                        <img src="/template/museums_pictures/slide5.jpg" alt="">
                        <div class="slider-title">
                            <h3><i class="fas fa-newspaper"></i> Татарстан наш общий дом</h3>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Blanditiis, commodi deleniti dignissimos dolor dolore et illum ipsam minima, natus quis similique veniam vero voluptate? Accusamus debitis eius exercitationem expedita totam.</p>
                        </div>
                    </div>
                </a>
            </div>
        </div>
        <div class="header-text">
            <hr class="medium">
            <hr class="short">
            <hr class="medium">
        </div>
        <div class="news-wrap">
            <?php foreach ($newsList as $news): ?>
            <div class="news-item">
                <a href="/news/<?php echo $news['id']; ?>"><img src="/template/museums_pictures/slide3.jpg" alt=""></a>
                <h3><?php echo $news['title']; ?></h3>
                <p><?php echo $news['short_content']; ?></p>
            </div>
            <?php endforeach; ?>
        </div>
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
<script src="/template/scripts/animationMobilMenu.js"></script>
<script src="/template/scripts/loader.js"></script>
<script src="/template/scripts/slider.js"></script>
</body>
</html>