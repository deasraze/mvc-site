<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li class="active">Управление билетами</li>
                </ol>
            </div>

            <a href="/admin/ticket/create/" class="btn btn-default back"><i class="fa fa-plus"></i> Добавить билет</a>
            <div class="form-group">
                <input type="text" class="form-control pull-right" id="search" placeholder="Поиск по таблице">
            </div>
            <h4>Список билетов</h4>

            <br/>

            <table class="table-bordered table-striped table" id="mytable">
                <thead>
                <tr>
                    <th>ID билета</th>
                    <th>Артикул</th>
                    <th>Название</th>
                    <th>Цена</th>
                    <th></th>
                    <th></th>
                </tr>
                </thead>
                <?php foreach ($ticketList as $ticket): ?>
                <tbody>
                    <tr>
                        <td><?php echo $ticket['id']; ?></td>
                        <td><?php echo $ticket['code']; ?></td>
                        <td><?php echo $ticket['name']; ?></td>
                        <td><?php echo $ticket['price']; ?></td>
                        <td><a href="/admin/ticket/update/<?php echo $ticket['id']; ?>" title="Редактировать"><i class="fa fa-pencil-square-o"></i></a></td>
                        <td><a href="/admin/ticket/delete/<?php echo $ticket['id']; ?>" title="Удалить"><i class="fa fa-times"></i></a></td>
                    </tr>
                </tbody>
                <?php endforeach; ?>
            </table>

        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer_admin.php'; ?>

