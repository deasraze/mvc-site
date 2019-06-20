<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Вход</title>
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
    <!--stylesheet-->
    <link rel="stylesheet" href="/template/stylesheet/all.css">
    <link rel="stylesheet" href="/template/stylesheet/scrollBar.css">
    <link rel="stylesheet" href="/template/stylesheet/animate.css">
    <link rel="stylesheet" href="/template/stylesheet/animation.css">
    <link rel="stylesheet" href="/template/stylesheet/bootstrap.min.css">
    <link rel="stylesheet" href="/template/stylesheet/default.css">
    <link rel="stylesheet" href="/template/stylesheet/login.css">
    <link rel="stylesheet" href="/template/stylesheet/fonts.css">
    <link rel="stylesheet" href="/template/stylesheet/media.css">
    <link rel="stylesheet" href="/template/stylesheet/nprogress.css">
    <!--scripts-->
    <script src="/template/scripts/jq.min.js"></script>
    <script src="/template/scripts/masonry-docs.min.js"></script>
    <script src="/template/scripts/viewportchecker.js"></script>
    <script src="/template/scripts/nprogress.js"></script>
</head>
<body>
<section id="login">
    <div class="main-container">
        <div class="form-admin-login">
            <div class="login-or-sign">
                <h2>Панель администратора</h2>
            </div>
            <?php if (isset($errors) && is_array($errors)): ?>
                <ul class="error-message">
                    <?php foreach ($errors as $error): ?>
                        <li class="list-group-item list-group-item-danger"> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>
            <form action="#" method="post" class="login-form">
                <input placeholder="Логин" type="text" name="login"> <br>
                <input placeholder="Пароль" type="password" name="password"> <br>
                <button type="submit" name="submit">Вход</button>
            </form>
        </div>
    </div>
</section>
<!--scripts-->
<script src="/template/scripts/loader.js"></script>
</body>
</html>