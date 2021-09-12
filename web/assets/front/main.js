$(function(){
    $('.open-popup-link').magnificPopup({
        type:'inline',
        midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
    });

    $('select[name=sort]').on('change', function(){
        $(this).closest('form').submit();
    })
})