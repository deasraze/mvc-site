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
            <br>
            <div class="input-group">
                <span class="input-group-addon">Поиск</span>
                <input type="text" name="search_text" id="search_text" placeholder="Введите текст для поиска" class="form-control" />
            </div>
            <div id="result"></div>
        </div>
            <br>
            <h4>Список коллекций</h4>

            <br/>

            <table class="table-bordered table-striped table" id="grid">
                <thead>
                <tr>
                    <th>ID коллекции</th>
                    <th>Название</th>
                    <th>Автор</th>
                    <th>Год</th>
                    <th>Категория</th>
                    <th>Статус</th>
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
                        <td><?php echo Collection::getStatusText($collection['status']); ?></td>
                        <td><a href="/admin/collection/update/<?php echo $collection['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/collection/delete/<?php echo $collection['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
            </table>
        <?php echo $pagination->get(); ?>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

