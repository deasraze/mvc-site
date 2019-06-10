let amount = $(".amount-sum");
let cart = $("#cart-count");


function checkCartTickets() {
    let cart_offer = $(".cart-offer").length;
    if (cart_offer <= 1) {
        setTimeout(function () {
            let zero = '<h3>Корзина пуста, <a href=\"/tickets/\">купить билет</a>.</h3>';
            $(".cart").html(zero);
        },500)
    }
}

async function addItem(id) {
    let delition = await fetch("/cart/add/"+id);
    increaseCart(id);
}

async function deleteItem(id) {
    let count = $('.amount-cart-span-'+id);
    if (+count.text() > 1) {
        let delition = await fetch("/cart/delamount/"+id);
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
    console.log("Обработало")
    if (value === "increase") {
        let amount_one_item  = $("#cost-cart-" + id).text();
        let sum = +amount.text() + + amount_one_item;
        amount.text(sum);
    }else if (value === "full") {
        let count = $('.amount-cart-span-'+id);
        let cost_cart = $("#cost-cart-"+id);
        let amountt = $(".amount-sum");
        amount.text((+amountt.text() - ( +count.text() * +cost_cart.text() ) ) );

        let sum_cart = +cart.text() - +count.text();
        cart.text(sum_cart);

    }else {
        let amount_one_item  = $("#cost-cart-" + id).text();
        let sum = +amount.text() - + amount_one_item;
        amount.text(sum);
    }
}

async function btnDeleteTicketClick(id) {
    $("#cart-offer-" + id).slideToggle();
    $("#cart-offer-" + id + " " + "img").css({"opacity": "0", "transition": "0.2s ease-in-out"});
    checkCartTickets(id);
    countingTheAmount(id,"full")
    setTimeout(function () {
        $("#cart-offer-"+id).remove();
    },500);
    let delition = await fetch("/cart/delete/"+id);

    return delition;
}

