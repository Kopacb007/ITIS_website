$(document).ready(function() {

        //initialize swiper when document ready 
        // http://www.idangero.us/swiper/get-started/ 
        var swiper = new Swiper('.swiper-container', {

            pagination: '.swiper-pagination',
            nextButton: '.swiper-button-next',
            prevButton: '.swiper-button-prev',
            paginationClickable: true,
            centeredSlides: true,
            speed: 800,
            autoplay: 2500,
            autoplayDisableOnInteraction: false,
            loop: true

        })
    });