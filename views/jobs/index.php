<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Вакансии</title>
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
<!--    stylesheets-->
    <link rel="stylesheet" href="/template/stylesheet/all.css">
    <link rel="stylesheet" href="/template/stylesheet/scrollBar.css">
    <link rel="stylesheet" href="/template/stylesheet/fonts.css">
    <link rel="stylesheet" href="/template/stylesheet/default.css">
    <link rel="stylesheet" href="/template/stylesheet/menuCSS.css">
    <link rel="stylesheet" href="/template/stylesheet/mobilMenu.css">
    <link rel="stylesheet" href="/template/stylesheet/job.css">
    <link rel="stylesheet" href="/template/stylesheet/checkboxStyle.css">
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
<section id="job">
    <div class="information-about-job">
        <?php foreach ($jobsList as $jobs): ?>
        <div class="work" id="item-<?php echo $jobs['id']; ?>">
            <h2><?php echo $jobs['name']; ?></h2>
            <h3>Чем предстоит заниматься</h3>
            <li><?php echo $jobs['what_to_do']; ?></li>
            <h3>Требоавания к кандидату</h3>
            <li><?php echo $jobs['requirements']; ?></li>
        </div>
        <?php endforeach; ?>
    </div>
    <div class="job-wrap">
        <form action="#" method="post">
            <div class="vacancy" id="menu">
                <h2>Устройство на работу</h2>
                <label for="vacancy-to-job">Вакансия<span>*</span></label>
                <select name="vacancy-to-job" id="vacancy-to-job">
                    <?php foreach ($jobsList as $job): ?>
                        <option href="#item-<?php echo $job['id']; ?>"
                            <?php if ($job['id'] == 1) echo 'selected'; ?>
                                value="<?php echo $job['name']; ?>"><?php echo $job['name']; ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <br>
            </div>
            <div class="summary">
                <div class="to-work">
                    <label for="">Фамилия Имя Отчество<span>*</span></label> <br>
                    <input type="text" class="FIO" name="FIO"> <br>
                </div>
                <div class="job-info">
                    <div class="nationality">
                        <label for="">Гражданство<span>*</span></label> <br>
                        <input type="text" class="nationality_" name="citizenship">
                    </div>
                    <div class="birth-date">
                        <label  for="">Дата рождения<span>*</span></label> <br>
                        <input type="text" name="birth-date_" class="birth-date_">
                    </div>
                </div>
                <div class="live-place">
                    <br>
                    <label for="">Адрес проживания</label> <br>
                    <textarea name="address" id=""></textarea>
                </div>
                <div class="job-info">
                    <div class="nationality">
                        <br>
                        <label class="phone_" for="">Телефон для связи<span>*</span></label> <br>
                        <input type="text" id="phone" name="phone">
                    </div>
                    <div class="birth-date">
                        <br>
                        <label for="">Удобное время звонка</label> <br>
                        <input type="text" name="time_to_call">
                    </div>
                </div>
                <div class="job-info">
                    <div class="nationality">
                        <br>
                        <label class="email" for="">Ваш E-mail<span>*</span></label> <br>
                        <input class="email_" type="text" name="email">
                    </div>
                    <div class="birth-date">
                        <br>
                        <label  for="">Образование<span>*</span></label> <br>
                        <input class="education_" type="text" name="education">
                    </div>
                </div>
                <div class="job-info">
                    <div class="nationality">
                        <br>
                        <label class="specialty" for="">Специальность</label> <br>
                        <input type="text" name="specialty">
                    </div>
                    <div class="birth-date">
                        <br>
                        <label for="">Годы обучения в ВУЗе</label> <br>
                        <input type="text" name="years_of_education">
                    </div>
                </div>
                <div class="live-place">
                    <br>
                    <label for="">Трудовая деятельность(укажите название организации, период работы, должность, функциональные обязанности)<span>*</span></label> <br>
                    <textarea name="labor_activity" id=""></textarea>
                </div>
                <div class="live-place">
                    <br>
                    <label for="">Личные качества</label> <br>
                    <textarea name="personal_qualities" id=""></textarea>
                </div>
                <div class="job-info">
                    <div class="birth-date">
                        <br>
                        <label class="go_work" for="">Могу приступить к работе с</label> <br>
                        <input type="text" name="start_date" class="start_date_">
                        <br>
                    </div>
                </div>
                <div><input type="checkbox" class="i_agree" id="cb3"> <label for="cb3">Я соглесен на обработку моих персональных данных<span>*</span></label></div>
                <br>
                <button class="send-profile" name="submit" type="submit">Отправить</button>
            </div>
        </form>
    </div>
</section>
<!--scripts-->
<script src="/template/scripts/animationMobilMenu.js"></script>
<script src="/template/scripts/scrollToAnchor.js"></script>
<script src="/template/scripts/masks.js"></script>
<script src="/template/scripts/loader.js"></script>
<script src="/template/scripts/jobs.js"></script>
</body>
</html>