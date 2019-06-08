//slider setting
//Constants
const ITEM_AMOUNT = $(".slider-item-check").length;
const SLIDER = $(".slider-wrap");
//default setting
let timer_interval;
//changeable  settings
//posX = 0; Please don't change
//animation = "ease-in-out"; type = string
//speed = "1000"(1s); type = number
//timer = 8000(8s);
let posX = 0;
let animation = "ease-in-out";
let speed = 1000;
let timer = 8000;

$(document).ready(function () {
    slideInterval();
});

//function slide slider
function slideInterval() {
    timer_interval = setInterval(function () {
        if (Math.abs(posX) >= Math.abs(ITEM_AMOUNT * -100) - 100) {
            posX = 0;
        }else {
            posX -= 100;
        }
        $(SLIDER).css({"margin-left": posX +"%","transition": speed / 1000 + "s" + " " + animation})
    },timer)
}

$(".arrow-right").click(function () {
    if (Math.abs(posX) >= Math.abs(ITEM_AMOUNT * -100) - 100) {
        posX = 0;
        console.log("why you can't move left? by Chopper")
    }else {
        posX = posX - 100;
    }
    clearInterval(timer_interval);
    slideInterval();
    $(SLIDER).css({"margin-left": posX +"%","transition": speed / 1000 + "s" + " " + animation})
});
$(".arrow-left").click(function () {
    if(Math.abs(posX) <= 0) {
        posX = (ITEM_AMOUNT * -100) + 100;
    }else {
        posX += 100;
    }
    clearInterval(timer_interval);
    slideInterval();
    $(SLIDER).css({"margin-left": posX + "%" , "transition": speed / 1000 + "s" + " " + animation})
});