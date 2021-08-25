$(function(){
    console.log(tree);
    $('#treeCategory').treeview({
        data: tree,
        enableLinks: true
    });
})