$(function(){
    $('.open-popup-link').magnificPopup({
        type:'inline',
        midClick: true // Allow opening popup on middle mouse click. Always set it to true if you don't provide alternative source in href.
    });

    $('select[name=sort]').on('change', function(){
        $(this).closest('form').submit();
    })
    $('div[data-key] a.wrap').on('click', function(e){
        const th = $(this);
    })
    $('div[data-key] .add_to_stock').on('click', function(e){
        e.preventDefault();
        const th = $(this);
        const item_id = th.closest('[data-key]').attr('data-key');
        $.ajax({
            url: '/ajax/add-to-stock',
            type: 'get',
            data: {
                item_id: item_id
            },
            success: function(response){
                $('#total_count__basket').remove();
                $('a.basket').append(`
                    <i id="total_count__basket">${response}</i>
                `);
            }
        })
    })
})