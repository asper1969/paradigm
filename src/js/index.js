import {slick} from 'slick-carousel';

$(document).ready(function(){
    $('.slider').slick({
        slidesToShow: 1,
        dots: true,
        adaptiveHeight: true
    });

    $('.partners .container ul').slick({
        slidesToShow: 5
    });

    $('.nav-elements .btn-menu').click((e)=>{
        e.stopPropagation();
        $('.main-menu').addClass('active');
    });

    $('.main-menu .close-btn, body').click(()=>{
        $('.main-menu').removeClass('active');
    });
});