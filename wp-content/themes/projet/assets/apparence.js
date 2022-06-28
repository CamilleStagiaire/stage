
(function ($) {

    wp.customize('header_background', function (value) {
        value.bind(function (newVal) {
            $('.navbar').attr('style','background:'+ newVal + '!important')
        })
    })

    wp.customize('body_background', function (value) {
        value.bind(function (newVal) {
            $('body').attr('style','background:'+ newVal + '!important')
        })
    })


})(jQuery)