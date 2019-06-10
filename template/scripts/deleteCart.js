let amount = $(".amount-sum");
let cart = $("#cart-count");




async function addItem(id) {
    let delition = await fetch("http://mvc-site/cart/add/"+id);
    increaseCart(id);
}

async function deleteItem(id) {
    let count = $('.amount-cart-span-'+id);
    if (+count.text() > 1) {
        let delition = await fetch("http://mvc-site/cart/delete/"+id);
        decreaseCart(id);
    }
}

function increaseCart(id) {
    //Увеличения кол-ва билетов
    let count = $('.amount-cart-span-'+id);
    count.text(+count.text() + 1);


    //Увеличения числа в #cart-count(Моя корзина)
    let sum_cart = +cart.text() + 1;
    cart.text(sum_cart);

    //Подсчёт общей суммы заказа
    countingTheAmount(countingTheAmount(id,"increase"));
}

function decreaseCart(id) {
    //Уменьшение кол-ва билетов
    let count = $('.amount-cart-span-'+id);
    count.text(+count.text() - 1);

    //Уменьшение числа в #cart-count(Моя корзина)
    let sum_cart = +cart.text() - 1;
    cart.text(sum_cart);
    //Подсчёт общей суммы заказа
    countingTheAmount(countingTheAmount(id,""));
}

function countingTheAmount(id,value) {
    if (value === "increase") {
        let amount_one_item  = $("#cost-cart-" + id).text();
        let sum = +amount.text() + + amount_one_item;
        amount.text(sum);
    }else {
        let amount_one_item  = $("#cost-cart-" + id).text();
        let sum = +amount.text() - + amount_one_item;
        amount.text(sum);
        console.log("сработало")

    }
}

async function btnDeleteTicketClick(id) {
    //let $('.cart-offer-'+id + " " + "amount-cart").text();
    let cart_check = $(".amount-cart-"+id).text();

    if (+cart_check > 1) {
        let delition = await fetch("http://mvc-site/cart/delete/"+id);
        let amount_one_item  = $("#cost-cart-" + id).text();
        let sum = +amount.text() - + amount_one_item;
        let sum_cart = +cart.text() - 1;
        let sum_check = +cart_check - 1;
        amount.text(sum);
        cart.text(sum_cart);
        $('.amount-cart-'+id).text(sum_check);
        console.log(sum_check);
        return delition;
    }else {
        $("#cart-offer-" + id).slideToggle();
        $("#cart-offer-" + id + " " + "img").css({"opacity": "0", "transition": "0.2s ease-in-out"});
        setTimeout(function () {
            $("#cart-offer-"+id).remove();
        },1500);
        let delition = await fetch("http://mvc-site/cart/delete/"+id);
        return delition;
    }






}