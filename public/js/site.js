
$(document).ready(function () {
    $(".sidenav").sidenav();
    $(".dropdown-trigger").dropdown();
    
    $('.carousel.carousel-slider').carousel({
        fullWidth: true,
        indicators: true
    });
    $('.parallax').parallax();
    $('.materialboxed').materialbox();
    $('.target').pushpin({
        top: 0,
        bottom: 200
    });
    $('.modal').modal();
});