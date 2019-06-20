<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Просмотр заказа №<?php echo $order['id']; ?></title>
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
    <link rel="stylesheet" href="/template/stylesheet/bootstrap.min.css">
    <link rel="stylesheet" href="/template/stylesheet/fonts.css">
    <link rel="stylesheet" href="/template/stylesheet/default.css">
    <link rel="stylesheet" href="/template/stylesheet/menuCSS.css">
    <link rel="stylesheet" href="/template/stylesheet/mobilMenu.css">
    <link rel="stylesheet" href="/template/stylesheet/admin.css">
    <link rel="stylesheet" href="/template/stylesheet/tooltip.css">
    <link rel="stylesheet" href="/template/stylesheet/scrollBar.css">
    <link rel="stylesheet" href="/template/stylesheet/nprogress.css">
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
            <div class="user-avatar" id="close__" onclick="openUserProfil()">
                <img src="<?php echo User::getImage($idUser); ?>" alt="user-avatar">
                <p><i class="fas fa-angle-down"></i></p>
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
<section id="panel">
    <div class="admin-panel">
        <nav id="menuVertical">
            <ul>
                <?php if (AdminBase::checkAdmin()): ?>
                <li><a href="/admin/settings/"><div class="img_n"><img src="/template/img/gradient@2x/settings.png"></div><span>Настройки</span></a></li>
                <li><a href="#"><div class="img_n"><img src="/template/img/gradient@2x/news.png"></div><span>Новости</span></a>
                    <ul>
                        <li><a href="/admin/news/create/">Добавить</a></li>
                        <li><a href="/admin/news/">Посмотреть</a></li>
                    </ul>
                </li>
                <li><a href="#"><div class="img_n"><img src="/template/img/gradient@2x/collections.png"></div><span>Коллекции</span></a>
                    <ul>
                        <li><a href="/admin/collection/create/">Добавить</a></li>
                        <li><a href="/admin/collection/">Посмотреть</a></li>
                    </ul>
                </li>
                <li><a href="#"><div class="img_n"><img src="/template/img/gradient@2x/category.png"></div><span>Категории</span></a>
                    <ul>
                        <li><a href="/admin/category/create/">Добавить</a></li>
                        <li><a href="/admin/category/">Посмотреть</a></li>
                    </ul>
                </li>
                <li><a href="#"><div class="img_n"><img src="/template/img/gradient@2x/tickets.png"></div><span>Билеты</span></a>
                    <ul>
                        <li><a href="/admin/ticket/create/">Добавить</a></li>
                        <li><a href="/admin/ticket/">Посмотреть</a></li>
                    </ul>
                </li>
                <li><a href="#"><div class="img_n"><img src="/template/img/gradient@2x/users.png"></div><span>Пользователи</span></a>
                    <ul>
                        <li><a href="/admin/user/create/">Добавить</a></li>
                        <li><a href="/admin/user/">Посмотреть</a></li>
                    </ul>
                </li>
                <li><a href="#"><div class="img_n"><img src="/template/img/gradient@2x/orders.png"></div><span>Заказы</span></a>
                    <ul>
                        <li><a href="/admin/order/">Посмотреть</a></li>
                    </ul>
                </li>
                <li><a href="/admin/jobs/"><div class="img_n"><img src="/template/img/gradient@2x/jobs.png"></div><span>Вакансии</span></a>
                    <ul>
                        <li><a href="/admin/jobs/create/">Добавить</a></li>
                        <li><a href="/admin/jobs/">Посмотреть</a></li>
                    </ul>
                </li>
                <li><a href="/admin/logout/"><div class="img_n"><img src="/template/img/gradient@2x/tactics.png"></div><span>Выход</span></a></li>

                <?php elseif (AdminBase::checkEditor()): ?>
                <li><a href="#"><div class="img_n"><img src="/template/img/gradient@2x/news.png"></div><span>Новости</span></a>
                    <ul>
                        <li><a href="/admin/news/create/">Добавить</a></li>
                        <li><a href="/admin/news/">Посмотреть</a></li>
                    </ul>
                </li>
                <li><a href="#"><div class="img_n"><img src="/template/img/gradient@2x/collections.png"></div><span>Коллекции</span></a>
                    <ul>
                        <li><a href="/admin/collection/create/">Добавить</a></li>
                        <li><a href="/admin/collection/">Посмотреть</a></li>
                    </ul>
                </li>
                <li><a href="#"><div class="img_n"><img src="/template/img/gradient@2x/category.png"></div><span>Категории</span></a>
                    <ul>
                        <li><a href="/admin/category/create/">Добавить</a></li>
                        <li><a href="/admin/category/">Посмотреть</a></li>
                    </ul>
                </li>
                <li><a href="#"><div class="img_n"><img src="/template/img/gradient@2x/tickets.png"></div><span>Билеты</span></a>
                    <ul>
                        <li><a href="/admin/ticket/create/">Добавить</a></li>
                        <li><a href="/admin/ticket/">Посмотреть</a></li>
                    </ul>
                </li>
                <li><a href="#"><div class="img_n"><img src="/template/img/gradient@2x/orders.png"></div><span>Заказы</span></a>
                    <ul>
                        <li><a href="/admin/order/">Посмотреть</a></li>
                    </ul>
                </li>
                <li><a href="/admin/jobs/"><div class="img_n"><img src="/template/img/gradient@2x/jobs.png"></div><span>Вакансии</span></a>
                    <ul>
                        <li><a href="/admin/jobs/create/">Добавить</a></li>
                        <li><a href="/admin/jobs/">Посмотреть</a></li>
                    </ul>
                </li>
                <li><a href="/admin/logout/"><div class="img_n"><img src="/template/img/gradient@2x/tactics.png"></div><span>Выход</span></a></li>
                <?php endif; ?>
            </ul>
        </nav>
        <div class="menu">
            <div class="footer">Copyright © 2019<br>
                powered by <a href="#"><font color="#9dacaa">Chopper & Condecrom</font></a>
            </div>
        </div>
    </div>
    <div class="info-panel">
        <div class="navigation-admin-panel">
            <ol>
                <li><a href="/admin/">Панель администратора</a></li>
                <li><a href="/admin/order/">Управление заказами</a></li>
                <li class="active">Просмотр заказа</li>
            </ol>
        </div>
        <label class="header-table" for=""><h3>Просмотр заказа #<?php echo $order['id']; ?></h3></label>
        <table class="table table-hover">
            <thead class="thead-light">
            <tr>
                <th scope="col">Информация о заказе</th>
                <th scope="col">Данные</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <th>Номер заказа</th>
                <td><?php echo $order['id']; ?></td>
            </tr>
            <tr>
                <th>Имя клиента</th>
                <td><?php echo $order['user_name']; ?></td>
            </tr>
            <tr>
                <th>Фамилия клиента</th>
                <td><?php echo $order['user_surname']; ?></td>
            </tr>
            <tr>
                <th>Отчество клиента</th>
                <td><?php echo $order['user_patronymic']; ?></td>
            </tr>
            <tr>
                <th>Телефон клиента</th>
                <td><?php echo $order['user_phone']; ?></td>
            </tr>
            <tr>
                <th>Комментарий клиента</th>
                <td><?php echo $order['user_comment']; ?></td>
            </tr>
            <?php if ($order['user_id'] != 0): ?>
            <tr>
                <th>ID клиента</th>
                <td><?php echo $order['user_id'] . ' ' . '(' . $user['surname'] . ' ' . $user['name'] . ')'; ?></td>
            </tr>
            <?php endif; ?>
            <tr>
                <th scope="row">Статус заказа</th>
                <td><?php echo Order::getStatusText($order['status']); ?></td>
            </tr>
            <tr>
                <th scope="row">Дата заказа</th>
                <td><?php echo $order['date']; ?></td>
            </tr>
            <tr>
                <th scope="row">Итоговая стоимость</th>
                <td><?php echo $order['total_price']; ?></td>
            </tr>
            </tbody>
        </table>
        <label for=""><h3>Билеты в заказе</h3></label>
        <table class="table table-hover">
            <thead class="thead-light">
            <tr>
                <th scope="col">ID билета</th>
                <th scope="col">Артикул билета</th>
                <th scope="col">Название</th>
                <th scope="col">Цена</th>
                <th scope="col">Кол-во</th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($tickets as $ticket): ?>
            <tr>
                <th><?php echo $ticket['id']; ?></th>
                <td><?php echo $ticket['code']; ?></td>
                <td><?php echo $ticket['name']; ?></td>
                <td><?php echo $ticket['price']; ?></td>
                <td><?php echo $ticketsQuantity[$ticket['id']]; ?></td>
            </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</section>
<!--scripts-->
<script src="/template/scripts/checkStatus.js"></script>
<script src="/template/scripts/bootstrap.bundle.min.js"></script>
<script src="/template/scripts/loader.js"></script>
<script src="/template/scripts/tooltip.js"></script>
<script src="/template/scripts/animationMobilMenu.js"></script>
</body>
</html>

