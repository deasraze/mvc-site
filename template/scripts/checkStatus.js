let deleteBtn_ = $(".delete-btn");

function deleletBtn(id,type) {
    //deleteBtn_.attr("onclick", "window.location.href='delete/"+id + "'");
    deleteBtn_.attr("onclick", "deletePromise("+id+","+type+")");
}

async function deletePromise(id,number) {
    switch (number) {
        case 1:
            let data = await fetch("http://mvc-site/admin/collection/delete/" + id);
            setTimeout(function () {
                location.reload();
            }, 300);
            break;
        case 2:
            let data2 = await fetch("http://mvc-site/admin/category/delete/"+id);
            setTimeout(function () {
                location.reload();
            },300);
            break;
        case 3:
            let data3 = await fetch("http://mvc-site/admin/ticket/delete/"+id);
            setTimeout(function () {
                location.reload();
            },300);
            break;
        case 4:
            let data4 = await fetch("http://mvc-site/admin/user/delete/"+id);
            setTimeout(function () {
                location.reload();
            },300);
            break;
        case 5:
            let data5 = await fetch("http://mvc-site/admin/order/delete/"+id);
            setTimeout(function () {
                location.reload();
            },300);
            break;
    }
}