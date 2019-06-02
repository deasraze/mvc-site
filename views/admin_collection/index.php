<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление коллекциями</li>
                </ol>
            </div>

            <a href="/admin/collection/create/" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить произведение</a>
            <div class="form-group">
                <input type="text" class="form-control pull-right" id="search" placeholder="Поиск по таблице">
            </div>
            <h4>Список коллекций</h4>

            <br/>

            <table class="table-bordered table-striped table" id="mytable">
                <thead>
                <tr>
                    <th>ID коллекции</th>
                    <th>Название</th>
                    <th>Автор</th>
                    <th>Год</th>
                    <th>Категория</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <?php foreach ($collectionList as $collection): ?>
                <tbody>
                    <tr>
                        <td><?php echo $collection['id']; ?></td>
                        <td><?php echo $collection['name']; ?></td>
                        <td><?php echo $collection['author']; ?></td>
                        <td><?php echo $collection['year']; ?></td>
                        <td>
                            <?php
                                $category = Category::getCategoryById($collection['category_id']);
                                echo $category['name'];
                            ?>
                        </td>
                        <td><a href="/admin/collection/update/<?php echo $collection['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/collection/delete/<?php echo $collection['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

