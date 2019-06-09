
function addToCart(id) {
    let addBtn = $(".add-to-cart-" + id);
    addBtn.html("Добавлено");
    addBtn.attr("disabled", "true");
    console.log($('.cash-item-'+id + " h3").textContent);
    $(".popupInfo").attr("class" , "popupInfo animated slideInRight");
    setTimeout(function () {
        $(".popupInfo").attr("class" , "popupInfo animated slideOutRight")
    },3000);
}