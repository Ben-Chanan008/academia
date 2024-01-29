/**---------------------------- SELECTOR FUNCTIONS -------------------------------*/
const $select = (selector) => document.querySelector(selector);
const $all = (selector) => document.querySelectorAll(selector);

/**--------------------------------- SELECTORS ------------------------------------*/
const navBar = $select('.a-navbar');
const documentBody = $select('body');
const searchBtn = $select('.small');
const searchCancel = $select('#search-cancel');
const smallSearch = $select('.small-search');
const section = $select('.section');
const dropBtn = $select('.user-img');
const sidebarLinks = $all('.sidebar a');
const sidebarSize = $select('.sidebar').getBoundingClientRect();
let pageSize = documentBody.getBoundingClientRect();

/**------------------------------ PAGE LOGIC ----------------------------------*/
console.log(documentBody)
if(pageSize.width <= 576) {
    searchBtn.addEventListener('click', (e) => {
        smallSearch.style.display = 'flex';
    });


    if (searchCancel) {
        searchCancel.addEventListener('click', (e) => {
            smallSearch.style.display = 'none';
            smallSearch.querySelector('input').value = '';
        });
    }

    window.onload = () =>
    {if(section){
        // section.style.marginLeft = `${sidebarSize.width}px`;
        section.style.maxWidth = `100vw`;
        section.style.top = `${navBar.getBoundingClientRect().height}px`
        console.log(sidebarSize.width)
    }}
}

window.onload = () =>
{if(section){
    section.style.top = `${navBar.getBoundingClientRect().height}px`
}};


/**------------------------------ PRORESS BARS --------------------------------*/
let progressCircle = $all('.progress-circular'),
    progressValue = $all('.progress-value'),
    speed = 20,
    progressStartValue = 0;
    progressEndValue = 50;

let progress = setInterval(() => {
    progressStartValue++;

    progressValue.forEach(value => value.textContent = `${progressStartValue}%`);
    progressCircle.forEach(circle => circle.style.background = `conic-gradient(var(--pink) ${progressStartValue * 3.6}deg, var(--primary) 0deg)`);

    if (progressStartValue === progressEndValue) {
        clearInterval(progress);
    }

}, speed);

/**---------------------------------------- DROPDOWN CODE ------------------------------------------*/
if (dropBtn) {

    let keyFrames = [
        {
            transform: 'translateY(20%)',
        },
        {
            transform: 'translateY(10%)',
        }
    ];

    let timing = {
        duration: 100
    }

    let dropDownContent = document.querySelector('.user-links');
    dropBtn.addEventListener('click', (e) => {
        console.log(dropDownContent)

        dropDownContent.animate(keyFrames, timing).finished.then(() => setTimeout(() => {
            dropDownContent.style.transform = 'translateY(10%)';
        }, 10))

    });

    document.addEventListener('click', (e) => {
        let isDroppedDown = e.target.matches('.btn-drop');

        if (!isDroppedDown && e.target.closest('.dropdown-container') === null) {
            dropDownContent.style.display = 'none';
        } else {
            dropDownContent.style.display = 'block';
        }
    });
}

/**------------------------------------- TO BE WORKED ON --------------------------------------------------*/
/*
if(sidebarLinks){
    sidebarLinks.forEach((links) => {
       links.addEventListener('click', (e) => {
           e.preventDefault();
           let currentLink = e.currentTarget;

           localStorage.setItem('current_link', currentLink)
           location.href = localStorage.getItem('current_link');
           currentLink.classList.toggle('active');
       });
    });
}*/

/**
 * ------------------------------ OWL CAROUSEL -----------------------
 */

$('document').ready(() => {
    $(document).ready(() => {
        $('.owl-carousel').owlCarousel({
            items: 1,
            margin: 100,
            loop: true,
            autoplay: false,
            autoplayTimeout: 3000,
            autoplaySpeed: 1000
        });
    })
});

//------------------------------------- CARD SELECTION -------------------------------------//
