<?php include ROOT . '/views/layouts/header.php'; ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">

                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items"><!--features_items-->
                        <h2 class="title text-center">Последние билеты</h2>

                        <?php foreach ($ticketList as $ticket): ?>
                            <div class="col-sm-4">
                                <div class="product-image-wrapper">
                                    <div class="single-products">
                                        <div class="productinfo text-center">
                                            <img src="<?php echo Tickets::getImage($ticket['id']);?>" alt=""/>
                                            <h2><?php echo $ticket['price']; ?> Р</h2>
                                            <p>
                                                <a href="/tickets/<?php echo $ticket['id']; ?>">
                                                    <?php echo $ticket['name']; ?>
                                                </a>
                                            </p>
                                            <a href="#" data-id="<?php echo $ticket['id']; ?>" class="btn btn-default add-to-cart"><i
                                                        class="fa fa-shopping-cart"></i>В корзину</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div><!--features_items-->
                </div>
            </div>
        </div>
    </section>

<?php include ROOT . '/views/layouts/footer.php'; ?>