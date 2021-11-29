$(function(){
    $('#treeCategory').treeview({
        data: tree,
        enableLinks: true
    });
    $(".js-range-slider").ionRangeSlider({
        skin: "round"
    });
})