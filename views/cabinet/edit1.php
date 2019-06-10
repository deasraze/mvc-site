<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-4 col-sm-offset-4 padding-right">
                
                <?php if ($result): ?>
                    <p>Данные отредактированы!</p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>

                    <div class="signup-form"><!--sign up form-->
                        <h2>Редактирование данных</h2>
                        <form action="#" method="post">
                            <p>Имя:</p>
                            <input type="text" name="name" placeholder="Имя" value="<?php echo $name; ?>"/>

                            <p>Фамилия:</p>
                            <input type="text" name="surname" placeholder="Фамилия" value="<?php echo $surname; ?>"/>

                            <p>Старый пароль:</p>
                            <input type="password" name="old_password" placeholder="Старый пароль" value=""/>

                            <p>Новый пароль:</p>
                            <input type="password" name="password" placeholder="Новый пароль:" value=""/>

                            <p>Повторите новый пароль:</p>
                            <input type="password" name="re_password" placeholder="Повторите новый пароль:" value=""/>
                            <br/>
                            <input type="submit" name="submit" class="btn btn-default" value="Сохранить" />
                        </form>
                    </div><!--/sign up form-->
                
                <?php endif; ?>
                <br/>
                <br/>
            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>