$(document).ready(function() {
    $('.bxslider').bxSlider({
        auto: 'true',
        minSlides: 1,
        maxSlides: 4,
        slideWidth: 273,
        slideMargin: 25,
        moveSlides: 2
    });

    $('.bxslider-deco').bxSlider({
        auto: 'true',
        controls: false,
        minSlides: 1,
        maxSlides: 3,
        slideWidth: 273,
        slideMargin: 25,
        moveSlides: 2
    });

    $('.bxslider-home').bxSlider({});

    $('.bxslider-2').bxSlider({
        auto: ''
    });

    $('.bxslider-product-home').bxSlider({
        auto: '',
        pager: false,
        minSlides: 1,
        maxSlides: 5,
        slideWidth: 213,
        slideMargin: 25,
        moveSlides: 1,
        infiniteLoop: false
    });

    $("#menu-btn").click(function() {
        $("#menu-div").toggleClass("active");
        $(".menu-div-black").toggleClass("active");
    });

    $(".menu-div-black").click(function() {
        $("#menu-div").toggleClass("active");
        $(this).toggleClass("active");
    });


    $(".dropi-btn").click(function() {
        $(".dropi-btn").removeClass("active");
        $(this).addClass("active");
    });

    $(window).load(function() {
        $('#myModal-form-home-1').modal('show');
    });

    $('.paiement-1').change(function() {
        if ($(this).is(":checked")) {
            $('#paiement-1').addClass('active');
            $('#paiement-2').removeClass('active');
        } else {
            $('#paiement-1').removeClass('active');
        }
    });

    $('.paiement-2').change(function() {
        if ($(this).is(":checked")) {
            $('#paiement-2').addClass('active');
            $('#paiement-1').removeClass('active');
        } else {
            $('#paiement-2').removeClass('active');
        }
    });

});
