let deleteBtn_ = $(".delete-btn");

function deleletBtn(id,type) {
    //deleteBtn_.attr("onclick", "window.location.href='delete/"+id + "'");
    deleteBtn_.attr("onclick", "deletePromise("+id+","+type+")");
}

async function deleteOneItem(id) {
    let del = await fetch("/admin/collection/delete/" + id);
    document.location.href = "/admin/collection/";
}

async function deletePromise(id,number) {
    switch (number) {
        case 1:
            let data = await fetch("/admin/collection/delete/" + id);
            setTimeout(function () {
                location.reload();
            }, 300);
            break;
        case 2:
            let data2 = await fetch("/admin/category/delete/"+id);
            setTimeout(function () {
                location.reload();
            },300);
            break;
        case 3:
            let data3 = await fetch("/admin/ticket/delete/"+id);
            setTimeout(function () {
                location.reload();
            },300);
            break;
        case 4:
            let data4 = await fetch("/admin/user/delete/"+id);
            setTimeout(function () {
                location.reload();
            },300);
            break;
        case 5:
            let data5 = await fetch("/admin/order/delete/"+id);
            setTimeout(function () {
                location.reload();
            },300);
            break;
        case 11:
            let data11 = await fetch("/admin/jobs/delete/"+id);
            setTimeout(function () {
                location.reload();
            },300);
            break;


        case 6:
            let data6 = await fetch("/admin/collection/delete/"+id);
            setTimeout(function () {
                document.location.href = "/admin/collection/";
            },300);
            break;
        case 7:
            let data7 = await fetch("/admin/category/delete/"+id);
            setTimeout(function () {
                document.location.href = "/admin/category/";
            },300);
            break;
        case 8:
            let data8 = await fetch("/admin/ticket/delete/"+id);
            setTimeout(function () {
                document.location.href = "/admin/ticket/";
            },300);
            break;
        case 9:
            let data9 = await fetch("/admin/user/delete/"+id);
            setTimeout(function () {
                document.location.href = "/admin/user/";
            },300);
            break;
        case 10:
            let data10 = await fetch("/admin/order/delete/"+id);
            setTimeout(function () {
                document.location.href = "/admin/order/";
            },300);
            break;
        case 12:
            let data12 = await fetch("/admin/jobs/delete/"+id);
            setTimeout(function () {
                document.location.href = "/admin/jobs/";
            },300);
            break;
    }
}