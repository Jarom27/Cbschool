// Please see documentation at https://docs.microsoft.com/aspnet/core/client-side/bundling-and-minification
// for details on configuring this project to bundle and minify static web assets.

// Write your JavaScript code.

$(document).ready(function () {
    $(".btn").sidenav();
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
    $('#insertar').click(function(){
        var num= $("#num_imgs").val();
        var info = {
            "images_num": num
        }
        $.post("/cbweb/public/Notice/add",info,function(){
            alert("enviamos");
        });
        
    });
});