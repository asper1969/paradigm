import {slick} from 'slick-carousel';
import {lettering} from 'letteringjs';

$(document).ready(function(){
    $('.main-menu li.menu-item-has-children>a').click(function(){
        $(this).toggleClass('active');
        $(this).parent().find('ul').slideToggle(300);

        return false;
    });

    var $status = '<li class="paging-info"></li>';
    var $mainSlider = $('.slider .wrapper');
    var projectSlider = $('body.not-front .images');

    if($('.slider .wrapper .slide').length > 1){

        $mainSlider.on('init', function(event, slick, currentSlide, nextSlide){
            $mainSlider.find('.slick-dots').append($status);
            $status = $('.paging-info');
            var i = (currentSlide ? currentSlide : 0) + 1;
            $status.html('<strong>0' + i + '</strong>' + '/0' + slick.slideCount);
        });
        $mainSlider.on('reInit afterChange', function(event, slick, currentSlide, nextSlide){
            //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
            $status = $('.paging-info');
            var i = (currentSlide ? currentSlide : 0) + 1;
            $status.html('<strong>0' + i + '</strong>' + '/0' + slick.slideCount);
        });
    }

    $('.lettering h2.title').lettering();

    $mainSlider.slick({
        slidesToShow: 1,
        dots: true,
        adaptiveHeight: true,
        fade: true
    });

    $('.partners .container ul').slick({
        slidesToShow: 5,
        variableWidth: true,
        focusOnSelect: true
    });

    $('.nav-elements .btn-menu').click((e)=>{
        e.stopPropagation();
        $('.main-menu').addClass('active');
    });

    $('.main-menu .close-btn, body').click(()=>{
        $('.main-menu').removeClass('active');
    });
});