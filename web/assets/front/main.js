$(function(){
    $('.open-popup-link').magnificPopup({
        type:'inline',
        preloader: true,
        callbacks: {
            open: function(){
                if (!$(this.currItem.el[0]).hasClass('basket')) return false;
                $.ajax({
                    type: 'get',
                    url: '/ajax/get-basket-content',
                    data: {},
                    success: function (items){
                        let totalPrice = 0;
                        if (!Object.keys(items).length) return false;
                        let html = `
                            <div id="basket_popup">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>Наименование</th>
                                            <th>Цена</th>
                                            <th>Количество</th>
                                            <th>Сумма</th>
                                        </tr>        
                                    </thead>
                                    <tbody>
                        `;
                        $.each(items, function(i, item){
                            totalPrice += item.count * item.itemInfo.price;
                            html += `
                                        <tr item_id="${item.itemInfo.id}">
                                            <td>${item.itemInfo.brend} ${item.itemInfo.article} ${item.itemInfo.title}</td>
                                            <td class="center">${item.itemInfo.price}</td>
                                            <td class="center">${item.count}</td>
                                            <td class="center">${item.count * item.itemInfo.price}</td>
                                        </tr>  
                            `;
                        })
                        html += `
                                        <tr>
                                            <td class="right" colspan="2">Итого:</td>
                                            <td class="center0" colspan="2">${totalPrice}</td>
                                        </tr>
                                   </tbody>
                               </table>
                           </div> 
                           <a href="/order" role="button">Оформить заказ</a>  
                           <button title="Close (Esc)" type="button" class="mfp-close">×</button> 
                        `;
                        $('#basket').html(html);
                    }
                })
            }
        },
        midClick: true
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
                alert('Успешно добавлено в корзину!');
            }
        })
    })
})