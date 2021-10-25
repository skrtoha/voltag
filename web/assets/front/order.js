function applyCountSumm($input, action){
    let data = {};
    let $currentSumm = $input.closest('tr').find('.td-summ span.summ');
    data.currentSumm = + $currentSumm.html();

    data.currentPrice = + $input.closest('tr').find('.item-price-td span.item-price').html();

    let $totalSummSelector = $('#order-total-summ');
    data.totalSumm = + $totalSummSelector.html();

    data.currentQuan = + $input.val();

    $currentTotalQuan = $('#total_count__basket');
    data.currentTotalQuan = + $currentTotalQuan.html();

    switch(action){
        case 'up':
            data.currentSumm += data.currentPrice;
            data.totalSumm += data.currentPrice;
            data.currentQuan++;
            data.currentTotalQuan++;
            break;
        case 'down':
            data.currentSumm -= data.currentPrice;
            data.totalSumm -= data.currentPrice;
            data.currentQuan--;
            data.currentTotalQuan--;
            break;
    }

    if (data.currentQuan === 0) return;

    $currentSumm.html(data.currentSumm);
    $totalSummSelector.html(data.totalSumm);
    $input.val(data.currentQuan);
    $currentTotalQuan.html(data.currentTotalQuan);

    data.item_id = $input.closest('tr').attr('item_id');
    ajaxApplyOrder(data);
}

function ajaxApplyOrder(data){
    $.ajax({
        url: '/ajax/change-basket',
        data: data,
        success: function(){}
    });
}

$(function(){
    $('.order-counter button').on('click', function(e){
        e.preventDefault();
        const th = $(this);
        applyCountSumm(th.closest('.order-counter').find('input'), th.attr('class'));
    })

    $('.icon-bin').on('click', function(){
        if (!confirm('Действительно удалить?')) return;
        let $th = $(this).closest('tr');
        let price = + $th.find('input[name="items[price][]"]').val();
        let count = $th.find('input[name="items[quan][]"').val();
        let $orderTotalSumm = $('#order-total-summ');
        let totalCount = + $orderTotalSumm.html();
        totalCount -= price * count;
        $orderTotalSumm.html(totalCount);

        $th.closest('tr').remove();

        ajaxApplyOrder({
            item_id: $th.closest('tr').attr('item_id'),
            currentQuan: 0
        });
    })

    $('select[name=delivery]').on('change', function(){
        let $addressee = $('div.addressee');
        if ($('select[name="delivery"]').val() === 'Доставка по России') $addressee.show();
        else $addressee.hide();
    })
})