<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Вход</title>
    <!--stylesheet-->
    <link rel="stylesheet" href="/template/stylesheet/all.css">
    <link rel="stylesheet" href="/template/stylesheet/scrollBar.css">
    <link rel="stylesheet" href="/template/stylesheet/animate.css">
    <link rel="stylesheet" href="/template/stylesheet/animation.css">
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
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
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