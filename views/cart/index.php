<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="container">
        <div class="row">

            <div class="col-sm-9 padding-right">
                <div class="features_items">
                    <h2 class="title text-center">Корзина</h2>
                    
                    <?php if ($ticketsInCart): ?>
                        <p>Вы выбрали такие товары:</p>
                        <table class="table-bordered table-striped table">
                            <tr>
                                <th>Код товара</th>
                                <th>Название</th>
                                <th>Стомость, р</th>
                                <th>Количество, шт</th>
                            </tr>
                            <?php foreach ($tickets as $ticket): ?>
                                <tr>
                                    <td><?php echo $ticket['code'];?></td>
                                    <td>
                                        <a href="/tickets/<?php echo $ticket['id'];?>">
                                            <?php echo $ticket['name'];?>
                                        </a>
                                    </td>
                                    <td><?php echo $ticket['price'];?></td>
                                    <td><?php echo $ticketsInCart[$ticket['id']];?></td>
                                </tr>
                            <?php endforeach; ?>
                                <tr>
                                    <td colspan="3">Общая стоимость:</td>
                                    <td><?php echo $totalPrice;?></td>
                                </tr>
                            
                        </table>
                    <?php else: ?>
                        <p>Корзина пуста</p>
                    <?php endif; ?>

                </div>

            </div>
        </div>
    </div>
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>