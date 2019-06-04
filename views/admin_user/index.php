<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin/">Админпанель</a></li>
                    <li class="active">Управление пользователями</li>
                </ol>
            </div>

            <a href="/admin/user/create/" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить пользователя</a>
            <div class="form-group">
                <input type="text" class="form-control pull-right" id="search" placeholder="Поиск по таблице">
            </div>
            <h4>Список пользователей</h4>

            <br/>

            <table class="table-bordered table-striped table" id="mytable">
                <thead>
                <tr>
                    <th>ID пользователя</th>
                    <th>Имя</th>
                    <th>Фамилия</th>
                    <th>Почта</th>
                    <th>Роль</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <?php foreach ($userList as $user): ?>
                <tbody>
                    <tr>
                        <td><?php echo $user['id']; ?></td>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['surname']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo User::getRoleText($user['role']); ?></td>
                        <td><a href="/admin/user/update/<?php echo $user['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/user/delete/<?php echo $user['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

