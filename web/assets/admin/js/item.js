function add_cross_car(obj, name, action){
    let th = $(obj);
    let selected = [];
    $.each($('form').serializeArray(), function(i, item){
        if (item.name !== name + '[]') return  1;
        selected.push(item.value);
    })
    $.ajax({
        type: 'get',
        url: '/admin/ajax/' + action,
        data: {
            selected: JSON.stringify(selected)
        },
        success: function(response){
            th.after(response);
        }
    })
}
$(function(){
    $('#add_cross').on('click', function(e){
        e.preventDefault();
        add_cross_car(this, 'ItemCross', 'add-cross-item');
    })
    $('#add_car').on('click', function(e){
        e.preventDefault();
        add_cross_car(this, 'ItemCar', 'add-car-item');
    })
    $(document).on('click', '.icon-close', function(){
        $(this).closest('div').remove();
    })
})