<footer id="footer"><!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <p class="pull-left">Илья чОрт</p>
                <p class="pull-right">Илья чОрт</p>
            </div>
        </div>
    </div>
</footer><!--/Footer-->


<script src="/template/default/js/jquery.js"></script>
<script src="/template/default/js/bootstrap.min.js"></script>
<script src="/template/default/js/jquery.scrollUp.min.js"></script>
<script src="/template/default/js/price-range.js"></script>
<script src="/template/default/js/jquery.prettyPhoto.js"></script>
<script src="/template/default/js/main.js"></script>
<script>
    $(document).ready(function () { // Код должен быть выполнен только после загрузки документа
        $(".add-to-cart").click(function () { // Отвечает за нажатие на кнопку "В корзину"
            var id = $(this).attr("data-id"); // Получаем id билета из атрибута кнопки
            // Формируем асинхронный запрос
            // 1. Тип запроса и адрес (post("/cart/add/"+id)
            // 2. {} - параметры
            // 3. function (data) обрабатывает ответ
            $.post("/cart/add/"+id, {}, function (data) { // В data попадает id билета
                // Возвращаем ответ
                $("#cart-count").html(data);
            });
            return false;
        });
    });
</script>
</body>
</html>
