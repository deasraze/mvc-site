$(document).ready(function() {
    $("select").change(function (event) {
        event.preventDefault();
        let id = $("select option:selected").attr('href'),top = $(id).offset().top;
        $('body,html').animate({scrollTop: top}, 1000);
        console.log(id);
    })
});