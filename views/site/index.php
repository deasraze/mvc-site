<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Музей искусств</title>
    <!--    styles-->
    <link rel="stylesheet" href="/template/stylesheet/fullpage.css">
    <link rel="stylesheet" href="/template/stylesheet/fonts.css">
    <link rel="stylesheet" href="/template/stylesheet/menuCSS.css">
    <link rel="stylesheet" href="/template/stylesheet/mobilMenu.css">
    <link rel="stylesheet" href="/template/stylesheet/default.css">
    <link rel="stylesheet" href="/template/stylesheet/all.css">
    <link rel="stylesheet" href="/template/stylesheet/main_page.css">
    <link rel="stylesheet" href="/template/stylesheet/media.css">
    <!--    scripts-->
    <script src="/template/scripts/jq.min.js"></script>
    <script src="/template/vendors/easings.min.js"></script>
    <script src="/template/vendors/scrolloverflow.min.js"></script>
    <script src="/template/scripts/masonry-docs.min.js"></script>
    <script src="/template/scripts/viewportchecker.js"></script>
</head>
<body>
<header id="header">
    <div class="nav-container">
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
<div id="fullpage">
    <div class="section active" id="section0">
        <div class="video-and-title">
            <div class="title-header-block">
                <div class="title-info">
                    <h1>Музей исскуств</h1>
                    <p>С вами с <span style="color: #80c7ba;">1841</span> года</p>
                </div>
            </div>
            <div class="video-information">
                <video data-keepplaying autoPlay="autoplay" loop="loop" muted="muted">
                    <source src="/template/museums_pictures/museum_video.mp4" type="video/mp4">
                    <source src="/template/museums_pictures/museum_video.webm" type="video/webm">
                </video>
            </div>
        </div>
    </div>
    <div class="section" id="section1">
        <div class="two-boss">
            <div class="full-size-picture">
                <img src="/template/museums_pictures/boss3.jpg" alt="">
            </div>
            <div class="boos-answer">
                <h2>МЫ УВАЖАЕМ СВОЙ ТРУД</h2>
                <h3>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquam autem cumque dicta ducimus ea eum, ipsum itaque laborum magni nam nulla quia quibusdam quod voluptas voluptate! Exercitationem obcaecati sed similique?</h3>
                <hr>
                <p>Вадим Николаевич Задорожный <br> <span style="color: #80c7ba;text-transform: uppercase;">Директор музея</span></p>
            </div>
        </div>
    </div>
    <div class="section" id="section2">
        <div class="information-about-top-museum">
            <div class="full-size-picture">
                <img src="/template/museums_pictures/museum_picture.jpg" alt="">
            </div>
            <div class="main-container-two">
                <div class="top-info">
                    <h2>С <span>2009</span> года <br> входим в ТОП-10 лучших <br>музеев мира</h2>
                    <button class="default_button more-info-about-top">Узнать больше</button>
                </div>
            </div>
        </div>
    </div>
    <div class="section" id="section3">
        <div class="about-all-arts">
            <div class="full-size-picture">
                <img src="/template/museums_pictures/art2.jpg" alt="">
            </div>
            <div class="main-container-two">
                <div class="all-arts-info">
                    <h2><span>12</span> экскурсий ежедневно <br> <span>84</span> еженедельно <br> <span>90%</span> положительных отзывов </h2>
                    <button class="default_button">Сходить на экскурсию</button>
                </div>
            </div>
        </div>
    </div>
    <div class="section" id="section4">
        <div class="area-zona">
            <div class="main-fifty-container">
                <div class="fifty-container info-container-one">
                    <img src="/template/museums_pictures/art.jpg" alt="">
                    <div class="info-amount">
                        <h2><span>90</span> <br> картин</h2>
                    </div>
                </div>
                <div class="fifty-container info-container-two">
                    <img src="/template/museums_pictures/1.jpg" alt="">
                    <div class="info-amount">
                        <h2><span>60</span> <br> скульптур</h2>
                    </div>
                </div>
            </div>
            <div class="main-fifty-container info-container-one"></div>
        </div>
    </div>
    <div class="section" id="section5"><h1>test2</h1></div>
</div>
<!--scripts-->
<script src="/template/scripts/animationMobilMenu.js"></script>
<script src="/template/scripts/fullpage.js"></script>
<script src="/template/scripts/fullpage.extensions.min.js"></script>
<script>
    new fullpage('#fullpage', {
        //options here
        autoScrolling:true,
        scrollHorizontally: true,
        navigation: true,
        parallax: true,
        parallaxOptions: {type: 'reveal', percentage: 90, property: 'translate'},
    });
</script>
<script src="/template/scripts/jqScroll.js"></script>
</body>
</html>