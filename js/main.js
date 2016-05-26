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
    });
    
    // effects by scrolling
    var offset = 250;
    var duration = 300;
    $(window).scroll(function() {
        // back-to-top button
        // https://getflywheel.com/layout/add-sticky-back-top-button-website/
        var scroll = $(window).scrollTop();
        if (scroll > offset) {
            $('.back-to-top').fadeIn(duration);
        } else {
            $('.back-to-top').fadeOut(duration);
        }
    });
    $('.back-to-top').click(function() {
        $('html, body').animate({scrollTop : 0},duration);
        return false;
    });
    // animations by scrolling
    $('#news-circolari .card').waypoint(function(){
       $(this.element).addClass('animated fadeInUp');
    },
    {
        offset: '95%'
    });
    $('#indirizzi .indirizzo').waypoint(function(){
       $(this.element).addClass('animated fadeInUp');
    },
    {
        offset: '85%'
    });
    $('#downloads .phone').waypoint(function(){
       $('#downloads .phone').addClass('animated fadeInRight');
    },
    {
        offset: '65%'
    });
    $('#downloads .download-links').waypoint(function(){
       $('#downloads .download-links').addClass('animated fadeInUp');
    },
    {
        offset: '50%'
    });
    // scrollspy
    $('body').scrollspy({ 
        target: '.navbar',
        offset: 100 
    });
    // nav-bar collapsing
    $('.nav a').on('click', function(){
        $('.navbar-toggle').click() //bootstrap 3.x by Richard
    });
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