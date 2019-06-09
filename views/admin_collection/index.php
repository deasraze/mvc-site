<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Список коллекций</title>
    <link rel="stylesheet" href="/template/stylesheet/all.css">
    <link rel="stylesheet" href="/template/stylesheet/scrollBar.css">
    <link rel="stylesheet" href="/template/stylesheet/bootstrap.min.css">
    <link rel="stylesheet" href="/template/stylesheet/animation.css">
    <link rel="stylesheet" href="/template/stylesheet/fonts.css">
    <link rel="stylesheet" href="/template/stylesheet/default.css">
    <link rel="stylesheet" href="/template/stylesheet/menuCSS.css">
    <link rel="stylesheet" href="/template/stylesheet/mobilMenu.css">
    <link rel="stylesheet" href="/template/stylesheet/admin.css">
    <link rel="stylesheet" href="/template/stylesheet/tooltip.css">
    <link rel="stylesheet" href="/template/stylesheet/media.css">
    <link rel="stylesheet" href="/template/stylesheet/nprogress.css">
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
                <li><a href="#"><div class="img_n"><img src="/template/img/gradient@2x/folder.png"></div><span>Коллекции</span></a>
                    <ul>
                        <li><a href="/admin/collection/create/">Добавить</a></li>
                        <li><a href="/admin/collection/">Посмотреть</a></li>
                    </ul>
                </li>

                <li><a href="#"><div class="img_n"><img src="/template/img/gradient@2x/pencil.png"></div><span>Категории</span></a>
                    <ul>
                        <li><a href="/admin/category/create/">Добавить</a></li>
                        <li><a href="/admin/category/">Посмотреть</a></li>
                    </ul>
                </li>

                <li><a href="#"><div class="img_n"><img src="/template/img/gradient@2x/printer.png"></div><span>Билеты</span></a>
                    <ul>
                        <li><a href="/admin/ticket/create/">Добавить</a></li>
                        <li><a href="/admin/ticket/">Посмотреть</a></li>
                    </ul>
                </li>

                <li><a href="#"><div class="img_n"><img src="/template/img/gradient@2x/bell.png"></div><span>Пользователи</span></a>
                    <ul>
                        <li><a href="/admin/user/create/">Добавить</a></li>
                        <li><a href="/admin/user/">Посмотреть</a></li>
                    </ul>
                </li>

                <li><a href="#"><div class="img_n"><img src="/template/img/gradient@2x/bell.png"></div><span>Заказы</span></a>
                    <ul>
                        <li><a href="/admin/order/">Посмотреть</a></li>
                    </ul>
                </li>

                <li><a href="/admin/logout/"><div class="img_n"><img src="/template/img/gradient@2x/tactics.png"></div><span>Выход</span></a></li>
            </ul>
        </nav>
        <div class="menu"><div class="footer">Copyright © 2019<br>
                powered by <a href="#"><font color="#9dacaa">Chopper & Condecrom</font></a>
            </div>
        </div>

    </div>
    <div class="info-panel">
        <div class="navigation-admin-panel">
            <ol>
                <li><a href="/admin/">Панель администратора</a></li>
                <li class="active">Управление коллекциями</li>
            </ol>
        </div>
        <div class="button-add">
            <button class="add_art" onclick="location.href='/admin/collection/create/'"><i class="fas fa-plus"></i> Добавить произведение</button>
        </div>
        <div class="search-in-table">
            <label for="search-in-table">Поиск по таблице</label> <br>
            <input type="text" placeholder="Введите что-нибудь чтобы начать поиск" name="search_text" id="search_text">
            <div id="result"></div>
        </div>
        <label class="header-table" for=""><h3>Список коллекций</h3></label>
        <table class="table table-hover">
            <thead class="thead-light">
            <tr>
                <th scope="col">ID произведения</th>
                <th scope="col">Название</th>
                <th scope="col">Автор</th>
                <th scope="col">Год</th>
                <th scope="col">Категория</th>
                <th scope="col">Статус</th>
                <th scope="col">Действия</th>
            </tr>
            </thead>
            <?php foreach ($collectionList as $collection): ?>
            <tbody>
            <tr>
                <th scope="row"><?php echo $collection['id']; ?></th>
                <td><?php echo $collection['name']; ?></td>
                <td><?php echo $collection['author']; ?></td>
                <td><?php echo $collection['year']; ?></td>
                <td>
                    <?php
                    $category = Category::getCategoryById($collection['category_id']);
                    echo $category['name'];
                    ?>
                </td>
                <td><?php echo Collection::getStatusText($collection['status']); ?></td>
                <td>
                    <button class="tooltip-btn" title="Редактировать"
                            onclick="location.href='/admin/collection/update/<?php echo $collection['id']; ?>'">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button id="btn-tooltip" class="tooltip-btn" title="Удалить"><i class="fas fa-trash-alt"></i></button>
                </td>
            </tr>
            </tbody>
            <?php endforeach;?>
        </table>
        <?php echo $pagination->get(); ?>
    </div>
</section>
<!--scripts-->
<script src="/template/scripts/checkStatus.js"></script>
<script src="/template/scripts/bootstrap.bundle.min.js"></script>
<script src="/template/scripts/loader.js"></script>
<script src="/template/scripts/tooltip.js"></script>
<script src="/template/scripts/animationMobilMenu.js"></script>
<script>
    $(document).ready(function () {
        load_data();

        function load_data(query) {
            $.ajax({
                url: "/admin/search",
                method: "post",
                data: {query: query},
                success: function (data) {
                    $('#result').html(data);
                }
            });
        }

        $('#search_text').keyup(function () {
            var search = $(this).val();
            if (search != '') {
                load_data(search);
            } else {
                load_data();
            }
        });
    });
</script>
</body>
</html>

