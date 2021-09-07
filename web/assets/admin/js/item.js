$(function(){
    $('#add_cross').on('click', function(e){
        e.preventDefault();
        let th = $(this);
        let selectedCross = [];
        $.each($('form').serializeArray(), function(i, item){
            if (item.name !== 'ItemCross[]') return  1;
            selectedCross.push(item.value);
        })
        console.log(selectedCross);
        $.ajax({
            type: 'get',
            url: '/admin/ajax/add-cross-item',
            data: {
                selectedCross: JSON.stringify(selectedCross)
            },
            success: function(response){
                th.after(response);
            }
        })
    })
    $(document).on('click', '.icon-close', function(){
        $(this).closest('div').remove();
    })
})