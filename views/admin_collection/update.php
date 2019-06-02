<?php include ROOT . '/views/layouts/header_admin.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <br/>

            <div class="breadcrumbs">
                <ol class="breadcrumb">
                    <li><a href="/admin">Админпанель</a></li>
                    <li><a href="/admin/product">Управление коллекциями</a></li>
                    <li class="active">Редактировать произведение</li>
                </ol>
            </div>


            <h4>Редактировать произведение <?php echo $collection['name']; ?></h4>

            <br/>

            <div class="col-lg-4">
                <div class="login-form">
                    <form action="#" method="post" enctype="multipart/form-data">

                        <p>Название произведения</p>
                        <input type="text" name="name" placeholder="" value="<?php echo $collection['name']; ?>">

                        <p>Автор</p>
                        <input type="text" name="author" placeholder="" value="<?php echo $collection['author']; ?>">

                        <p>Год создания</p>
                        <input type="text" name="year" placeholder="" value="<?php echo $collection['year']; ?>">

                        <p>Категория</p>
                        <select name="category_id">
                            <?php if (is_array($categoriesList)): ?>
                                <?php foreach ($categoriesList as $category): ?>
                                    <option value="<?php echo $category['id']; ?>" 
                                        <?php if ($collection['category_id'] == $category['id']) echo ' selected="selected"'; ?>>
                                        <?php echo $category['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            <?php endif; ?>
                        </select>
                        
                        <br/><br/>

                        <p>Изображение товара</p>
                        <img src="<?php echo Collection::getImage($collection['id']); ?>" width="200" alt="" />
                        <input type="file" name="image" placeholder="" value="<?php echo $collection['image']; ?>">

                        <p>Детальное описание</p>
                        <textarea name="description"><?php echo $collection['description']; ?></textarea>

                        <br/><br/>

                        <p>Статус</p>
                        <select name="status">
                            <option value="1" <?php if ($collection['status'] == 1) echo ' selected="selected"'; ?>>Отображается</option>
                            <option value="0" <?php if ($collection['status'] == 0) echo ' selected="selected"'; ?>>Скрыт</option>
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

