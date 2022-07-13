(function ($) {

    // durée des slides
    var myCarousel = document.querySelector('#slider-01')
    var carousel = new bootstrap.Carousel(myCarousel, {
        interval: 5000,
    })

    // animation du logo
    $("#propos").mouseenter(function () {
        $("#logo").addClass("logo");
    });
    $("#propos").mouseleave(function () {
        $("#logo").removeClass("logo");
    });

    //animation de la photo de contact
    $("#contact").mouseenter(function () {
        $("#contact1").addClass("contact1");
        $("#contact2").addClass("contact2");
        $("#contact3").addClass("contact3");
    });
    $("#contact").mouseleave(function () {
        $("#contact1").removeClass("contact1");
        $("#contact2").removeClass("contact2");
        $("#contact3").removeClass("contact3");
    });

})(jQuery)