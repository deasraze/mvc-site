<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Вакансии</title>
<!--    stylesheets-->
    <link rel="stylesheet" href="/template/stylesheet/all.css">
    <link rel="stylesheet" href="/template/stylesheet/scrollBar.css">
    <link rel="stylesheet" href="/template/stylesheet/fonts.css">
    <link rel="stylesheet" href="/template/stylesheet/default.css">
    <link rel="stylesheet" href="/template/stylesheet/menuCSS.css">
    <link rel="stylesheet" href="/template/stylesheet/mobilMenu.css">
    <link rel="stylesheet" href="/template/stylesheet/job.css">
    <link rel="stylesheet" href="/template/stylesheet/checkboxStyle.css">
    <link rel="stylesheet" href="/template/stylesheet/media.css">
    <link rel="stylesheet" href="/template/stylesheet/nprogress.css">
    <link rel="stylesheet" href="/template/stylesheet/media.css">
<!--    scripts-->
    <script src="/template/scripts/jq.min.js"></script>
    <script src="/template/scripts/jquery.maskedinput.min.js"></script>
    <script src="/template/scripts/masonry-docs.min.js"></script>
    <script src="/template/scripts/viewportchecker.js"></script>
    <script src="/template/scripts/nprogress.js"></script>
</head>
<body>
<header id="header">
    <div class="nav-container f-nav">
        <div class="nav">
            <ul>
                <li><a href="./mainPage.html">Главная</a></li>
                <li><a href="./news.html">Новости</a></li>
                <li><a href="./cashbox.html">Касса</a></li>
                <li><a href="./arts.html">Произведения</a></li>
                <li><a href="./job.html">Вакансии</a></li>
                <li><a href="./about.html">О нас </a></li>
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
                    <li><a href="./mainPage.html">Главная</a></li>
                    <li><a href="./news.html">Новости</a></li>
                    <li><a href="./cashbox.html">Касса</a></li>
                    <li><a href="./arts.html">Произведения</a></li>
                    <li><a href="./job.html">Вакансии</a></li>
                    <li><a href="./about.html">О нас </a></li>
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
<section id="job">
    <div class="information-about-job">
        <div class="work" id="item-1">
            <h2>Экскурсовод</h2>
            <h3>Чем предстоит заниматься</h3>
            <li>Это экспереаментальный тест созданный для просмотра как он будет выглядеть на странице.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <h3>Требоавания к кандидату</h3>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
        </div>
        <div class="work" id="item-2">
            <h2>Консультант</h2>
            <h3>Чем предстоит заниматься</h3>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <h3>Требоавания к кандидату</h3>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
        </div>
        <div class="work" id="item-3">
            <h2>Музейный смотритель</h2>
            <h3>Чем предстоит заниматься</h3>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <h3>Требоавания к кандидату</h3>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
        </div>
        <div class="work" id="item-4">
            <h2>Методист</h2>
            <h3>Чем предстоит заниматься</h3>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <h3>Требоавания к кандидату</h3>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
        </div>
        <div class="work" id="item-5">
            <h2>Слесарь-сантехник</h2>
            <h3>Чем предстоит заниматься</h3>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <h3>Требоавания к кандидату</h3>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
            <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cum, deleniti dignissimos dolore.</li>
        </div>
    </div>
    <div class="job-wrap">
        <form action="">
            <div class="vacancy" id="menu">
                <h2>Устройство на работу</h2>
                <label for="vacancy-to-job">Вакансия<span>*</span></label>
                <select name="vacancy-to-job" id="vacancy-to-job">
                    <option href="#item-1"  selected  value="Экскурсовод">Экскурсовод</option>
                    <option href="#item-2" value="Консультант">Консультант</option>
                    <option href="#item-3" value="Музейный смотритель">Музейный смотритель</option>
                    <option href="#item-4" value="Методист">Методист</option>
                    <option href="#item-5" value="Слесарь-сантехник">Слесарь-сантехник</option>
                </select>
                <br>
            </div>
            <div class="summary">
                <div class="to-work">
                    <label for="">Фамилия Имя Отчество<span>*</span></label> <br>
                    <input type="text" class="FIO"> <br>
                </div>
                <div class="job-info">
                    <div class="nationality">
                        <label for="">Гражданство<span>*</span></label> <br>
                        <input type="text">
                    </div>
                    <div class="birth-date">
                        <label for="">Дата рождения<span>*</span></label> <br>
                        <input type="date">
                    </div>
                </div>
                <div class="live-place">
                    <br>
                    <label for="">Адрес проживания</label> <br>
                    <textarea name="" id=""></textarea>
                </div>
                <div class="job-info">
                    <div class="nationality">
                        <br>
                        <label for="">Телефон для связи<span>*</span></label> <br>
                        <input type="text" id="phone">
                    </div>
                    <div class="birth-date">
                        <br>
                        <label for="">Удобное время звонка</label> <br>
                        <input type="text">
                    </div>
                </div>
                <div class="job-info">
                    <div class="nationality">
                        <br>
                        <label for="">Ващ e-mail<span>*</span></label> <br>
                        <input type="text">
                    </div>
                    <div class="birth-date">
                        <br>
                        <label for="">Образование<span>*</span></label> <br>
                        <input type="text">
                    </div>
                </div>
                <div class="job-info">
                    <div class="nationality">
                        <br>
                        <label for="">Специальность<span>*</span></label> <br>
                        <input type="text">
                    </div>
                    <div class="birth-date">
                        <br>
                        <label for="">Годы обучения в ВУЗе<span>*</span></label> <br>
                        <input type="text">
                    </div>
                </div>
                <div class="live-place">
                    <br>
                    <label for="">Трудовая деятельность(укажите название организации,период работы,должность,функциональные обязанности)<span>*</span></label> <br>
                    <textarea name="" id=""></textarea>
                </div>
                <div class="live-place">
                    <br>
                    <label for="">Личные качества</label> <br>
                    <textarea name="" id=""></textarea>
                </div>
                <div class="job-info">
                    <div class="birth-date">
                        <br>
                        <label for="">Могу приступить к работе с<span>*</span></label> <br>
                        <input type="date">
                        <br>
                    </div>
                </div>
                <div><input type="checkbox" id="cb3"> <label for="cb3">Я соглесен на обработку моих персональных данных<span>*</span></label></div>
                <br>
                <button class="send-profile">Отправить</button>
            </div>
        </form>
    </div>
</section>
<!--scripts-->
<script src="/template/scripts/animationMobilMenu.js"></script>
<script src="/template/scripts/scrollToAnchor.js"></script>
<script src="/template/scripts/masks.js"></script>
<script src="/template/scripts/loader.js"></script>
</body>
</html>