$(document).ready(function() {
    $('#item .gallery-wrapper .gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Загружаю изображение #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true
        },
        image: {
            tError: '<a href="%url%">Изображение #%curr%</a> не может быть загружено.'
        }
    });
});