$(document).ready(function(){
    $('.slider').slick({
        infinite: true,
        slidesToShow: 3,
        slidesToScroll: 3,
        // arrows: false,
        autoplaySpeed: 3000,
        autoplay: true,
        prevArrow: '<span class="prev-arrow"><i class="fas fa-chevron-circle-left fa-2x text-primary"></i></span>',
        nextArrow: '<span class="next-arrow"><i class="fas fa-chevron-circle-right fa-2x text-primary"></i></span>',
        // レスポンシブデザイン
        responsive: [{
            breakpoint:640,
            settings:{
                slidesToShow: 1,
                slidesToScroll: 1,
                arrows: false,
            }
        }]
    });

    $('.slider2').slick({
        infinite: true,
        slidesToShow: 4,
        slidesToScroll: 1,
        arrows: false,
        autoplaySpeed: 1000,
        autoplay: true,
        // レスポンシブデザイン
        responsive: [{
            breakpoint:640,
            settings:{
                slidesToShow: 1,
                slidesToScroll: 1,
            }
        }]
    });

});