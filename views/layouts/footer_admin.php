    <div class="page-buffer"></div>
</div>

<footer id="footer" class="page-footer"><!--Footer-->
    <div class="footer-bottom">
        <div class="container">
            <div class="row">
            </div>
        </div>
    </div>
</footer><!--/Footer-->



<script src="/template/default/js/jquery.js"></script>
<script src="/template/default/js/jquery.maskedinput.min.js"></script>
<script src="/template/default/js/bootstrap.min.js"></script>
<script src="/template/default/js/jquery.scrollUp.min.js"></script>
<script src="/template/default/js/price-range.js"></script>
<script src="/template/default/js/jquery.prettyPhoto.js"></script>
<script src="/template/default/js/main.js"></script>


<script>
    $(document).ready(function(){
        $(".add-to-cart").click(function () {
            var id = $(this).attr("data-id");
            $.post("/cart/add/"+id, {}, function (data) {
                $("#cart-count").html(data);
            });
            return false;
        });
    });
</script>
    <script>
        $(document).ready(function(){
            $("#search").keyup(function(){
                _this = this;
                $.each($("#mytable tbody tr"), function() {
                    if($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1) {
                        $(this).hide();
                    } else {
                        $(this).show();
                    }
                });
            });
        });
    </script>
</body>
</html>