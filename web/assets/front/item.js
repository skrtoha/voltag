$(document).ready(function() {
    $('#item .gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        tLoading: 'Загружаю изображение #%curr%...',
        mainClass: 'mfp-img-mobile',
        gallery: {
            enabled: true,
            navigateByImgClick: true,
            preload: [0,1] // Will preload 0 - before current, and 1 after the current image
        },
        image: {
            tError: '<a href="%url%">Изображение #%curr%</a> не может быть загружено.'
        }
    });
});