<?php include ROOT . '/views/layouts/header.php'; ?>
    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">

                </div>
            </div>

            <div class="col-sm-9 padding-right">
                <div class="product-details"><!--product-details-->
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="view-product">
                                <img src="/template/default/images/product-details/1.jpg" alt=""/>
                            </div>
                        </div>
                        <div class="col-sm-7">
                            <div class="product-information"><!--/product-information-->
                                <h2><?php echo $ticket['name']; ?></h2>
                                <p>Код товара: <?php echo $ticket['code']; ?></p>
                                <span>
                                    <span><?php echo $ticket['price']; ?> Р</span>
                                    <a href="#" data-id="<?php echo $ticket['id']; ?>" class="btn btn-default add-to-cart">
                                        <i class="fa fa-shopping-cart"></i>В корзину</a>
                                </span>
                            </div><!--/product-information-->
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <h5>Описание билета</h5>
                            <p><?php echo $ticket['description']; ?></p>
                        </div>
                    </div>
                </div><!--/product-details-->

            </div>
        </div>
        </div>
    </section>


    <br/>
    <br/>

<?php include ROOT . '/views/layouts/footer.php'; ?>