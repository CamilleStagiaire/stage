(function ($) {
    // changement des couleurs via le dashboard
    wp.customize('header_background', function (value) {
        value.bind(function (newVal) {
            $('.navbar, #footer').attr('style','background:'+ newVal + '!important')
        })
    })

    wp.customize('body_background', function (value) {
        value.bind(function (newVal) {
            $('#propos, #form').attr('style','background:'+ newVal + '!important')
        })
    })

})(jQuery)


