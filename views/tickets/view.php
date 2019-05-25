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
                                <img src="images/product-details/new.jpg" class="newarrival" alt=""/>
                                <h2><?php echo $ticket['name']; ?></h2>
                                <p>Код товара: <?php echo $ticket['code']; ?></p>
                                <form action="#" method="post">
                                    <span><?php echo $ticket['price']; ?> Р</span>
                                    <label>Количество:</label>
                                    <input type="text" value="1" name="amount"/><br>
                                    <input type="submit" name="submit" class="btn btn-default" value="Отправить"/>
                                    <button type="button" name="btnCart" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        В корзину
                                    </button>
                                </form>
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