function add_cross_car(obj, name, action){
    let th = $(obj);
    let selected = [];

    const item_id = $('input[name=item_id]').val();
    if (name === 'ItemComplect' && item_id) selected.push(item_id);
    if (name === 'ItemAggregate' && item_id) selected.push(item_id);

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
    $('#add_complect').on('click', function(e){
        e.preventDefault();
        add_cross_car(this, 'ItemComplect', 'add-complect-item');
    })
    $('#add_aggregate').on('click', function(e){
        e.preventDefault();
        add_cross_car(this, 'ItemAggregate', 'add-aggregate-item');
    })
    $(document).on('click', '.icon-close', function(){
        $(this).closest('div').remove();
    })
})