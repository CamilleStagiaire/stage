jQuery(document).ready(function ($) {
    if (document.getElementById("slider-01")) {

        var myCarousel = document.querySelector('#slider-01')
        var carousel = new bootstrap.Carousel(myCarousel, {
            interval: 2000,
            wrap: false
        })

        carousel.addEventListener('slide.bs.carousel', function (e) {
            var $animatingElemss = $(e.relatedTarget).find("[data-animation ^= 'animate__animated']");
           
           doAnimations($animatingElemss);
        });

        function doAnimations(elems) {
            var animEndEv = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';

            elems.each(function() {
  
                var $this = $(this);
                $animationType = $this.data('animation');
                //$h1 = $this[0];
               // console.log($h1);
                $this.addClass("$animationType").one(animEndEv, function () {
                    //$this.removeClass($animationType);
                });

            });
            
        }
    }
})