async function btnDeleteTicketClick(id) {
    let delition = await fetch("http://mvc-site/cart/delete/"+id);
    console.log(id);
    $("#cart-offer-1").slideToggle();
    $("#cart-offer-1" + " " + "img").css({"opacity": "0", "transition": "0.2s ease-in-out"});
    setTimeout(function () {
        $("#cart-offer-"+id).remove();
    },1500);
    return delition
}