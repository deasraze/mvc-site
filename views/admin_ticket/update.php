<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin/">Админпанель</a></li>
                    <li><a href="/admin/ticket/">Управление билетами</a></li>
                    <li class="active">Редактировать билет</li>
                </ol>
            </div>


            <h4>Редактировать <?php echo $ticket['name']; ?></h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Название</p>
                        <input type="text" name="name" placeholder="" value="<?php echo $ticket['name']; ?>">

                        <p>Артикул</p>
                        <input type="text" name="code" placeholder="" value="<?php echo $ticket['code']; ?>">

                        <p>Цена</p>
                        <input type="text" name="price" placeholder="" value="<?php echo $ticket['price']; ?>">

                        <p>Изображение билета</p>
                        <img src="<?php echo Tickets::getImage($ticket['id']); ?>" width="200" alt="" />
                        <input type="file" name="image" placeholder="" value="">

                        <p>Детальное описание</p>
                        <textarea name="description"><?php echo $ticket['description']; ?></textarea>

                        <br/><br/>

                        <p>Наличие</p>
                        <select name="availability">
                            <option value="1" <?php if ($ticket['availability'] == 1) echo ' selected="selected"'; ?>>В наличии</option>
                            <option value="0" <?php if ($ticket['availability'] == 0) echo ' selected="selected"'; ?>>Закончились</option>
                        </select>

                        <br/><br/>

                        <p>Статус</p>
                        <select name="status">
                            <option value="1" <?php if ($ticket['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                            <option value="0" <?php if ($ticket['status'] == 0) echo ' selected="selected"'; ?>>Скрыт</option>
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

