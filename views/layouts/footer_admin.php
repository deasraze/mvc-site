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
<script src="/template/default/js/jquery.tablesorter.js"></script>


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
            load_data();
            function load_data(query)
            {
                $.ajax({
                    url:"/admin/search",
                    method:"post",
                    data:{query:query},
                    success:function(data)
                    {
                        $('#result').html(data);
                    }
                });
            }

            $('#search_text').keyup(function(){
                var search = $(this).val();
                if(search != '')
                {
                    load_data(search);
                }
                else
                {
                    load_data();
                }
            });
        });
    </script>
</body>
</html>