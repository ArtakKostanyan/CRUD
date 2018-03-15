$(document).ready(function(){
    $(".deleteItem").on('click', function(){
        var id=$(this).data('id');

         $.ajax({
            type:'POST',
            url: '/delete',             // указываем URL и
            data: {id:id},
            success: function (data) {
                if(!data){

                    alert('Error');
                }
                location.reload();
            },
            error:function (data) {
                alert(data);
            }


        });
    });
});

$(document).ready(function(){
    $(".updateItem").on('click', function(){
        var id=$(this).data('id');

        $.ajax({
            type:'POST',
            url: '/update',             // указываем URL и
            data: {id:id},
            success: function (data) {
                if(!data){

                    alert('Error');
                }
               // location.reload();
            },
            error:function (data) {
                alert(data);
            }


        });
    });
});