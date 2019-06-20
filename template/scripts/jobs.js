//variables
let fio = $(".FIO");
let nationality = $(".nationality_");
let bDate = $(".birth-date_");
let phone = $("#phone");
let mail = $(".email_");
let education = $(".education_");
let agree = $(".i_agree");
let btn = $(".send-profile");

//Switch off btn on start page
$("document").ready(function () {
    btn.css({"display": "none"});
    agree.css({"user-select": "none"});
});
//Fill check
function checkInputValue() {
    if (fio.val() !== "" && fio.val().split(" ").length >= 3) {
       fio.css({"border": "1px solid #ccc"});
       fio.css({"background": "transparent"})
    }else {
        fio.css({"border": "1px solid red"});
        fio.css({"background": "#f5252530"})
    }

    if (bDate.val() !== "") {
        bDate.css({"border": "1px solid #ccc"})
        bDate.css({"background": "transparent"})
    }else {
        bDate.css({"border": "1px solid red"})
        bDate.css({"background": "#f5252530"})
    }

    if (nationality.val() !== "") {
        nationality.css({"border": "1px solid #ccc"})
        nationality.css({"background": "transparent"})
    }else {
        nationality.css({"border": "1px solid red"})
        nationality.css({"background": "#f5252530"})
    }

    if (phone.val() !== "") {
        phone.css({"background": "transparent"})
        phone.css({"border": "1px solid #ccc"})
    }else {
        phone.css({"border": "1px solid red"})
        phone.css({"background": "#f5252530"})
    }

    if (mail.val() !== "") {
        if (validMail(mail.val()) === true) {
            mail.css({"background": "transparent"})
            mail.css({"border": "1px solid #ccc"})
        }else {
            mail.css({"border": "1px solid red"});
            mail.css({"background": "#f5252530"})
        }
    }else {
        mail.css({"border": "1px solid red"})
        mail.css({"background": "#f5252530"})
    }

    if (education.val() !== "") {
        education.css({"border": "1px solid #ccc"})
        education.css({"background": "transparent"})
    }else {
        education.css({"border": "1px solid red"})
        education.css({"background": "#f5252530"})
    }

    if (fio.val() !== "" && fio.val().split(" ").length >= 3 && bDate.val() !== "" && nationality.val() !== "" && phone.val() !== "" && mail.val() !== "" && validMail(mail.val()) === true && education.val() !== "") {
        return true;
    }else {
        return false;
    }
}

function validMail(email) {
    let validation = /^[\w-\.]+@[\w-]+\.[a-z]{2,4}$/i;
    let myMail = email;
    let valid = validation.test(myMail);
    if (valid) {
        return true;
    }
}

agree.click(function () {
    if (checkInputValue()) {
        btn.css({"display": "block"});
    }else {
        agree.prop("checked", false);
    }
});