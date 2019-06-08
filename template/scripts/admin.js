let menu = document.getElementsByClassName('openMenu')[0];
let menu2 = document.getElementsByClassName('openMenu2')[0];
let menu3 = document.getElementsByClassName('openMenu3')[0];
function openMenu() {
    if (menu.id === 'close') {
        menu.style.transition = '.2s ease-in-out';
        menu.style.height = '128px';
        menu.id = 'open';
    }else {
        menu.style.transition = '.2s ease-in-out';
        menu.style.height = '45px';
        menu.id = 'close';
    }
}
function openMenu2() {
    if (menu2.id === 'close') {
        menu2.style.transition = '.2s ease-in-out';
        menu2.style.height = '128px';
        menu2.id = 'open';
    }else {
        menu2.style.transition = '.2s ease-in-out';
        menu2.style.height = '45px';
        menu2.id = 'close';
    }
}
function openMenu3() {
    if (menu3.id === 'close') {
        menu3.style.transition = '.2s ease-in-out';
        menu3.style.height = '128px';
        menu3.id = 'open';
    }else {
        menu3.style.transition = '.2s ease-in-out';
        menu3.style.height = '45px';
        menu3.id = 'close';
    }
}
