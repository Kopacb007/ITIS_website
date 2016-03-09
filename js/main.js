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
smoothScroll.init({
    // https://github.com/cferdinandi/smooth-scroll
    selector: '[data-scroll]', // Selector for links (must be a valid CSS selector)
    selectorHeader: '[data-scroll-header]', // Selector for fixed headers (must be a valid CSS selector)
    speed: 700, // Integer. How fast to complete the scroll in milliseconds
    easing: 'easeInOutCubic', // Easing pattern to use
    offset: 0, // Integer. How far to offset the scrolling anchor location in pixels
    updateURL: false, // Boolean. If true, update the URL hash on scroll
    callback: function ( anchor, toggle ) {} // Function to run after scrolling
});