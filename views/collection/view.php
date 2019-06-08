<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!--styles-->
    <link rel="stylesheet" href="/template/stylesheet/art.css">
    <link rel="stylesheet" href="/template/stylesheet/scrollBar.css">
    <link rel="stylesheet" href="/template/stylesheet/default.css">
    <link rel="stylesheet" href="/template/stylesheet/animate.css">
    <link rel="stylesheet" href="/template/stylesheet/animation.css">
    <link rel="stylesheet" href="/template/stylesheet/fonts.css">
    <link rel="stylesheet" href="/template/stylesheet/footer.css">
    <link rel="stylesheet" href="/template/stylesheet/menuCSS.css">
    <link rel="stylesheet" href="/template/stylesheet/mobilMenu.css">
    <link rel="stylesheet" href="/template/stylesheet/media.css">
    <link rel="stylesheet" href="/template/stylesheet/all.css">
    <!--scripts-->
    <script src="/template/scripts/jq.min.js"></script>
    <script src="/template/scripts/viewportchecker.js"></script>
    <script src="/template/scripts/nprogress.js"></script>
    <link rel="stylesheet" href="/template/stylesheet/nprogress.css">
    <title><?php echo $collection['name']; ?></title>
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
<section id="all-information-about-art">
    <div class="main-container">
        <div class="picture-block post">
            <img src="<?php echo Collection::getImage($collection['id']); ?>" alt="<?php echo $collection['name']; ?>">
        </div>
        <div class="text-block-about-art post-left">
            <p><span>Название:</span> <?php echo $collection['name']; ?></p>
            <p><span>Автор:</span> <?php echo $collection['author']; ?></p>
            <p><span>Годы:</span> <?php echo $collection['year']; ?></p>
            <p><span>Материал:</span> <?php echo $collection['material']; ?></p>
            <p><span>Размер:</span> <?php echo $collection['size']; ?></p>
            <p><span>Описание:</span> <?php echo $collection['description']; ?></p>
        </div>
    </div>
</section>
<div class="post">
    <div class="main-container">
        <img width="100%" src="/template/museums_pictures/vintage.png" alt="Разделитель">
    </div>
</div>
<section id="all-commentaries">
    <div class="main-container">
        <div class="write-your-comment post-right">
            <form action="">
                <div class="profile-image">
                    <img src="/template/museums_pictures/User.png" alt="Пользователь">
                </div>
                <div class="from-comment">
                    <label for="">Имя
                        <br>
                        <input type="text">
                    </label>
                    <label for="">
                        Комментарий
                        <br>
                        <textarea name="" id="" cols="15" rows="4"></textarea>
                    </label>
                    <button type="submit">Отправить</button>
                </div>
            </form>
        </div>
        <div class="all-commentaries-about-art post">
            <h2>Комментарии <i class="far fa-comment"><span>23</span></i></h2>
            <hr>
            <div class="comment">
                <div class="profile-image-comment">
                    <img src="/template/museums_pictures/User.png" alt="Пользователь">
                </div>
                <div class="information-about-comment">
                    <h3>Имя пользователя <span>18 ноябра 2019 , 18:32</span></h3>
                    <p>Вер шаг рек тут Сем Зрю. Милосердью Не Но прославить милосердие та не Ко бы со Поработают Во. . Честность Державину возможешь тревожном. . Гордости праведна Сожженна хваленье воцарить. . Бег мою дух они нам.
                    </p>
                </div>
            </div>
            <div class="comment">
                <div class="profile-image-comment">
                    <img src="/template/museums_pictures/User.png" alt="Пользователь">
                </div>
                <div class="information-about-comment">
                    <h3>Имя пользователя <span>18 ноябра 2019 , 18:32</span></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime odit quaerat qui. Asperiores cupiditate dicta porro quisquam quos! Cupiditate eius eos et exercitationem ipsum, iusto modi praesentium quos repellendus sunt.</p>
                </div>
            </div>
            <div class="comment">
                <div class="profile-image-comment">
                    <img src="/template/museums_pictures/User.png" alt="Пользователь">
                </div>
                <div class="information-about-comment">
                    <h3>Имя пользователя <span>18 ноябра 2019 , 18:32</span></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime odit quaerat qui. Asperiores cupiditate dicta porro quisquam quos! Cupiditate eius eos et exercitationem ipsum, iusto modi praesentium quos repellendus sunt.</p>
                </div>
            </div>
            <div class="comment">
                <div class="profile-image-comment">
                    <img src="/template/museums_pictures/User.png" alt="Пользователь">
                </div>
                <div class="information-about-comment">
                    <h3>Имя пользователя <span>18 ноябра 2019 , 18:32</span></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Maxime odit quaerat qui. Asperiores cupiditate dicta porro quisquam quos! Cupiditate eius eos et exercitationem ipsum, iusto modi praesentium quos repellendus sunt.</p>
                </div>
            </div>
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
</footer>/template/
<script src="/template/scripts/animationMobilMenu.js"></script>
<script src="/template/scripts/loader.js"></script>
</body>
</html>