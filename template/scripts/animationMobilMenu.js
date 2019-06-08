const MAIN_BUTTON = document.getElementsByClassName('open-the-menu')[0];
const SEARCH_MENU_BTN = document.getElementsByClassName('open-sort-menu')[0];
let line1 = document.getElementsByClassName('line1')[0];
let line2 = document.getElementsByClassName('line2')[0];
let line3= document.getElementsByClassName('line3')[0];
let mobil_menu = document.getElementsByClassName('mobil_menu')[0];
let search_block = document.getElementsByClassName('search-art')[0];
function tranformation_btn() {
    if (document.getElementsByClassName('open-the-menu')[0].id === 'close') {
        line1.style.transition = '.2s ease-in-out';
        line3.style.transition = '.2s ease-in-out';
        line1.style.margin = '0';
        line3.style.margin = '0';
        line2.style.display = 'none';
        line1.style.transform = 'rotate(-45deg) translate(-2px,0px)';
        line3.style.transform = 'rotate(45deg) translate(-2px,0px)';
        mobil_menu.style.transition = '.2s ease-in-out';
        mobil_menu.style.height = '50vh';
        MAIN_BUTTON.id = 'open';
    }else {
        line1.style.transition = '.2s ease-in-out';
        line3.style.transition = '.2s ease-in-out';
        line1.style.margin = '3px 0 3px 0';
        line3.style.margin = '3px 0 3px 0';
        line2.style.display = 'block';
        line1.style.transform = 'rotate(0) translate(0px,0px)';
        line3.style.transform = 'rotate(0) translate(0px,0px)';
        mobil_menu.style.height = '0';
        MAIN_BUTTON.id = 'close';
    }
}
function transformation_search_btn() {
    if (search_block.id === 'close_') {
        search_block.style.transition = '.2s ease-in-out';
        search_block.style.minWidth = '70%';
        search_block.style.maxWidth = '70%';
        SEARCH_MENU_BTN.style.transition = '.2s ease-in-out';
        SEARCH_MENU_BTN.style.transform = 'rotate(180deg)';
        SEARCH_MENU_BTN.style.left = '70%';
        search_block.removeAttribute('id')
    }else {
        search_block.style.transition = '.2s ease-in-out';
        search_block.style.minWidth = '0px';
        search_block.style.maxWidth = '0px';
        search_block.id = 'close_';
        SEARCH_MENU_BTN.style.transition = '.2s ease-in-out';
        SEARCH_MENU_BTN.style.transform = 'rotate(360deg)';
        SEARCH_MENU_BTN.style.left = '0';
        search_block.id = 'close_'
    }
}
if (search_block !== undefined) {
    $(window).resize(function () {
        if ($(window).width() > 1200) {
            search_block.style.minWidth = '220px';
            search_block.style.maxWidth = '220px';
            search_block.style.transition = '.2s ease-in-out';
            search_block.id = 'close_';
            SEARCH_MENU_BTN.style.transition = '.2s ease-in-out';
            SEARCH_MENU_BTN.style.transform = 'rotate(360deg)';
            SEARCH_MENU_BTN.style.left = '0';
        }else {
            search_block.style.minWidth = '0';
            search_block.style.maxWidth = '0';
            SEARCH_MENU_BTN.style.transition = '.2s ease-in-out';
            SEARCH_MENU_BTN.style.transform = 'rotate(360deg)';
            SEARCH_MENU_BTN.style.left = '0';
            search_block.id = 'close_'
        }
    });
}


let userProfil = document.getElementsByClassName('user-avatar')[0];
let menuProfil = document.getElementsByClassName('menu-wrap')[0];
function openUserProfil() {
    if (userProfil.id === 'close__') {
        menuProfil.style.display = 'block';
        userProfil.id = 'open__';
    }else {
        menuProfil.style.display = 'none';
        userProfil.id = 'close__';
    }

}

function changeClassName() {
    console.log('test');
}
