const $ = (selector) => document.querySelector(selector);
const $all = (selector) => document.querySelectorAll(selector);

const navBar = $('.a-navbar');
const documentBody = $('body');
const searchBtn = $('.small');
const searchCancel = $('#search-cancel');
const smallSearch = $('.small-search');
const section = $('.section');
const sidebarSize = $('.sidebar').getBoundingClientRect();

let pageSize = documentBody.getBoundingClientRect();
console.log(documentBody)
if(pageSize.width <= 576){
    searchBtn.addEventListener('click', (e) => {
        smallSearch.style.display = 'flex';
    });

    if(searchCancel){
        searchCancel.addEventListener('click', (e) => {
            smallSearch.style.display = 'none';
        });
    }

    console.log('reached!!!');
}

if(section){
    section.style.marginLeft = `${sidebarSize.width}px`;
console.log(sidebarSize.width)
}

