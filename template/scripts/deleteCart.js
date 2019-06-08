function btnDeleteTicketClick(id) {
    $("#cart-offer-"+id).slideToggle();
    $("#cart-offer-"+id + " " + "img").css({"opacity": "0", "transition": "0.2s ease-in-out"});
    setTimeout(function () {
        $("#cart-offer-"+id).remove();
    },1500);
}