jQuery( document ).ready(function($) {

    $("#categories_list").tablesorter({
        headers: {
            5: {sorter: false},
            6: {sorter: false}
        }
    });

    $("#products_list").tablesorter({
        headers: {
            1: {sorter: false},
            8: {sorter: false},
            9: {sorter: false}
        }
    });

    $( ".category_item .del_btn" ).on( "click", function() {
        if (confirm("Are you sure?")) {
            var this_item = $(this).parent().parent();
            var id = $(this).attr('cat_id');
            if(id){
                $.ajax({
                    url: "/dashboard/categories/delete/"+id,
                    type: "POST",
                    data:{
                        id: id
                    },
                    dataType: "json",
                    success: function(data){
                        if(data.response){
                            this_item.remove();
                        }else{
                            alert('Error.')
                        }
                    }
                });
            }
        }
    });

    $( ".product_item .del_btn" ).on( "click", function() {
        if (confirm("Are you sure?")) {
            var this_item = $(this).parent().parent();
            var id = $(this).attr('product_id');
            if(id){
                $.ajax({
                    url: "/dashboard/products/delete/"+id,
                    type: "POST",
                    data:{
                        id: id
                    },
                    dataType: "json",
                    success: function(data){
                        if(data.response){
                            this_item.remove();
                        }else{
                            alert('Error.')
                        }
                    }
                });
            }
        }
    });

});