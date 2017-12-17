import {slick} from 'slick-carousel';
import {lettering} from 'letteringjs';

$(document).ready(function(){
    var $status = $('.paging-info');
    var $mainSlider = $('.slider .wrapper');

    if($('.slider .wrapper .slide').length > 1){

        $mainSlider.on('init reInit afterChange', function(event, slick, currentSlide, nextSlide){
            //currentSlide is undefined on init -- set it to 0 in this case (currentSlide is 0 based)
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