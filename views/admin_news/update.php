<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Редактировать новость <?php echo mb_strtolower($news['title']); ?></title>

    <link rel="stylesheet" href="/template/stylesheet/all.css">
    <link rel="stylesheet" href="/template/stylesheet/fonts.css">
    <link rel="stylesheet" href="/template/stylesheet/scrollBar.css">
    <link rel="stylesheet" href="/template/stylesheet/tooltip.css">
    <link rel="stylesheet" href="/template/stylesheet/bootstrap.min.css">
    <link rel="stylesheet" href="/template/stylesheet/default.css">
    <link rel="stylesheet" href="/template/stylesheet/menuCSS.css">
    <link rel="stylesheet" href="/template/stylesheet/mobilMenu.css">
    <link rel="stylesheet" href="/template/stylesheet/admin.css">
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
                <li><a href="/admin/settings/"><div class="img_n"><img src="/template/img/gradient@2x/pencil.png"></div><span>Настройки</span></a></li>
                <li><a href="#"><div class="img_n"><img src="/template/img/gradient@2x/folder.png"></div><span>Новости</span></a>
                    <ul>
                        <li><a href="/admin/news/create/">Добавить</a></li>
                        <li><a href="/admin/news/">Посмотреть</a></li>
                    </ul>
                </li>
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
                <li><a href="/admin/jobs/"><div class="img_n"><img src="/template/img/gradient@2x/folder.png"></div><span>Вакансии</span></a>
                    <ul>
                        <li><a href="/admin/jobs/create/">Добавить</a></li>
                        <li><a href="/admin/jobs/">Посмотреть</a></li>
                    </ul>
                </li>
                <li><a href="/admin/logout/"><div class="img_n"><img src="/template/img/gradient@2x/tactics.png"></div><span>Выход</span></a></li>

                <?php elseif (AdminBase::checkEditor()): ?>
                <li><a href="#"><div class="img_n"><img src="/template/img/gradient@2x/folder.png"></div><span>Новости</span></a>
                    <ul>
                        <li><a href="/admin/news/create/">Добавить</a></li>
                        <li><a href="/admin/news/">Посмотреть</a></li>
                    </ul>
                </li>
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
                <li><a href="#"><div class="img_n"><img src="/template/img/gradient@2x/bell.png"></div><span>Заказы</span></a>
                    <ul>
                        <li><a href="/admin/order/">Посмотреть</a></li>
                    </ul>
                </li>
                <li><a href="/admin/jobs/"><div class="img_n"><img src="/template/img/gradient@2x/folder.png"></div><span>Вакансии</span></a>
                    <ul>
                        <li><a href="/admin/jobs/create/">Добавить</a></li>
                        <li><a href="/admin/jobs/">Посмотреть</a></li>
                    </ul>
                </li>
                <li><a href="/admin/logout/"><div class="img_n"><img src="/template/img/gradient@2x/tactics.png"></div><span>Выход</span></a></li>
                <?php endif; ?>
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
                <li><a href="/admin/news/">Управление новостями</a></li>
                <li class="active">Редактирование новости</li>
            </ol>
        </div>
        <?php if (isset($errors) && is_array($errors)): ?>
            <ul class="error-message-two">
                <?php foreach ($errors as $error): ?>
                    <li class="list-group-item list-group-item-danger"> - <?php echo $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <form action="#" method="post" enctype="multipart/form-data">
            <label class="header-table" for=""><h3>Редактировать <?php echo mb_strtolower($news['title']); ?></h3></label>
            <div class="all-info">
                <div>
                    <div>
                        <label for="name_of_art">Заголовок новости:</label>
                        <input type="text" name="title" value="<?php echo $news['title']; ?>">
                    </div>
                </div>
                <br>
                <label for="description">Короткое описание новости</label> <br>
                <textarea name="short_content"><?php echo $news['short_content']; ?></textarea><br>
                <br>
                <label for="description">Полное описание новости</label> <br>
                <textarea name="content"><?php echo $news['content']; ?></textarea><br>
                <br>
                <div>
                    <div>
                        <label for="">Загрузка изображения</label>
                        <img src="<?php echo News::getImage($news['id']); ?>" width="200" alt="" />
                        <input type="file" name="image">
                    </div>
                </div>
                <br>
                <div>
                    <div>
                        <label for="">Статус</label>
                        <select name="status">
                            <option value="1"<?php if ($news['status'] == 1) echo ' selected'; ?>>Отображается</option>
                            <option value="0"<?php if ($news['status'] == 0) echo ' selected'; ?>>Скрыт</option>
                        </select>
                    </div>
                </div>
                <br>
                <div class="button-choice">
                    <button type="submit" name="submit" class="save-btn">Сохранить</button>
                    <button type="button" id="btn-tooltip colletction-<?php echo $news['id']; ?>" data-toggle="modal" data-target=".bd-example-modal-sm" onclick="deleletBtn(<?php echo $news['id']; ?>,14)" class="delete-btn-admin">Удалить</button>
                </div>
            </div>
        </form>
    </div>
</section>
<div class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-sm modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="exampleModalLongTitle">Удаление</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Вы уверены что хотите удалить эту запись?</p>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-danger delete-btn">Удалить</button>
                <button type="button" class="btn btn-success" data-dismiss="modal">Отмена</button>
            </div>
        </div>
    </div>
</div>
<!--scripts-->
<script src="/template/scripts/loader.js"></script>
<script src="/template/scripts/animationMobilMenu.js"></script>
<script src="/template/scripts/checkStatus.js"></script>
<script src="/template/scripts/bootstrap.bundle.min.js"></script>
</body>
</html>

