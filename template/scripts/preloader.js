setTimeout(function () {
    $(document).ready(function () {
        $(".loader").css({"transition": "1s","opacity": "0"})
        setTimeout(function () {
            $(".loader").css({"display": "none"})
        },1000)
    });
},2000);