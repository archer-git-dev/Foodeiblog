/*  ---------------------------------------------------
    Template Name: FoodKing Blog
    Description:  FoodKing Blog Blog HTML Template
    Author: Colorlib
    Author URI: https://colorlib.com
    Version: 1.0
    Created: Colorlib
---------------------------------------------------------  */

'use strict';

(function ($) {

    /*------------------
        Preloader
    --------------------*/
    $(window).on('load', function () {
        $(".loader").fadeOut();
        $("#preloder").delay(200).fadeOut("slow");
    });

    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function () {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });

    //Humberger Menu
    $(".humberger__open").on('click', function () {
        $(".humberger__menu__wrapper").addClass("show__humberger__menu__wrapper");
        $(".humberger__menu__overlay").addClass("active");
    });

    $(".humberger__menu__overlay").on('click', function () {
        $(".humberger__menu__wrapper").removeClass("show__humberger__menu__wrapper");
        $(".humberger__menu__overlay").removeClass("active");
    });

    //Search Switch
    $('.search-switch').on('click',function() {
        $('.search-model').fadeIn(400);
    });

    $('.search-close-switch').on('click',function() {
        $('.search-model').fadeOut(400,function() {
            $('#search-input').val('');
        });
    });

    /*------------------
		Navigation
	--------------------*/
    $(".mobile-menu").slicknav({
        prependTo: '#mobile-menu-wrap',
        allowParentLinks: true
    });

    /*------------------
        Carousel Slider
    --------------------*/
    var hero_s = $(".hero__slider");
    hero_s.owlCarousel({
        loop: true,
        margin: 0,
        items: 1,
        dots: false,
        nav: true,
        navText: ["<span class='arrow_carrot-left'><span/>", "<span class='arrow_carrot-right'><span/>"],
        animateOut: 'fadeOut',
        animateIn: 'fadeIn',
        smartSpeed: 1200,
        autoHeight: false,
        autoplay: true
    });

})(jQuery);


// Sticky Sidebar

const contentArea = document.querySelector('.content-area');
const sideBar = document.querySelector('.sidebar__item');

window.onload = () => controlSideBarFloating();
window.onscroll = () => controlSideBarFloating();
window.onresize = () => controlSideBarFloating();

let topSpace = 10;
let breakPoint = 992;
let stickyClass = 'sticky-sidebar';
let bottomFixedClass = 'bottom-fixed-sidebar';

function controlSideBarFloating() {
    let rectL = contentArea.getBoundingClientRect();
    let rectR = sideBar.getBoundingClientRect();

    if (window.innerWidth >= breakPoint) {
        if (rectL.top - topSpace + (rectL.height - rectR.height) >= 0 && rectL.top-topSpace <= 0) {

            sideBar.classList.add(stickyClass);
            sideBar.classList.remove(bottomFixedClass);

        }else if (rectL.top - topSpace + (rectL.height - rectR.height) <= 0) {

            sideBar.classList.remove(stickyClass);
            sideBar.classList.add(bottomFixedClass);

        }else  {

            sideBar.classList.remove(stickyClass);
            sideBar.classList.remove(bottomFixedClass);

        }
    }else  {
        sideBar.classList.remove(stickyClass);
        sideBar.classList.remove(bottomFixedClass);
    }
}

// Format Date

const dateBlocks = document.querySelectorAll('.post__meta');
const months = {
    '01': 'Янв',
    '02': 'Февр',
    '03': 'Марта',
    '04': 'Апр',
    '05': 'Мая',
    '06': 'Июня',
    '07': 'Июля',
    '08': 'Авг',
    '09': 'Сент',
    '10': 'Окт',
    '11': 'Нояб',
    '12': 'Дек',
};


dateBlocks.forEach(dateBlock => {

    let monthNum = '';

    if (dateBlock.querySelector('h4') != null) {
        monthNum = dateBlock.querySelector('span');
    }else {
        monthNum = dateBlock.querySelector('p');
    }


    monthNum.textContent = months[monthNum.textContent];

} )


// Склонение комментариев


const commentNums = document.querySelectorAll('.comment_num');

function declOfNum(number, words) {
    return words[(number % 100 > 4 && number % 100 < 20) ? 2 : [2, 0, 1, 1, 1, 2][(number % 10 < 5) ? Math.abs(number) % 10 : 5]];
}

let words = ['комментарий', 'комментария', 'комментариев'];

commentNums.forEach(commentNum => {
    commentNum.parentElement.textContent = commentNum.textContent + ' ' + declOfNum(Number(commentNum.textContent), words);
})
