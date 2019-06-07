<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin/">Админпанель</a></li>
                    <li><a href="/admin/user/">Управление пользователями</a></li>
                    <li class="active">Редактировать пользователя</li>
                </ol>
            </div>


            <h4>Редактировать пользователя <?php echo $user['name'] . ' ' . $user['surname']; ?></h4>

            <br/>

            <?php if (isset($errors) && is_array($errors)): ?>
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li> - <?php echo $error; ?></li>
                    <?php endforeach; ?>
                </ul>
            <?php endif; ?>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Имя</p>
                        <input type="text" name="name" placeholder="" value="<?php echo $user['name'];?>">

                        <p>Фамилия</p>
                        <input type="text" name="surname" placeholder="" value="<?php echo $user['surname'];?>">

                        <p>Почта</p>
                        <input type="email" name="email" placeholder="" value="<?php echo $user['email'];?>">

                        <p>Пароль</p>
                        <input type="password" name="password" placeholder="" value="">

                        <p>Изображение пользователя</p>
                        <img src="<?php echo User::getImage($user['id']); ?>" width="200" alt="" />
                        <br/><br/><br/>
                        <input type="file" name="image" placeholder="" value="">

                        <br/><br/>

                        <p>Роль</p>
                        <select name="role">
                            <option value="user" <?php if ($user['role'] == 'user') echo 'selected="selected"';?>>Пользователь</option>
                            <option value="editor" <?php if ($user['role'] == 'editor') echo 'selected="selected"';?>>Редактор</option>
                            <option value="admin" <?php if ($user['role'] == 'admin') echo 'selected="selected"';?>>Администратор</option>
                        </select>

                        <br/><br/>

                        <input type="submit" name="submit" class="btn btn-default" value="Сохранить">

                        <br/><br/>

                    </form>
                </div>
            </div>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

