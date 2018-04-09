function SetAll(url,that){
    var setall_price = $('#setall_price').val();
    $.ajax({
        type:'post',
        url:url,
        data : {setall_price:setall_price},
        success:function(res){
            if(res.error){
                var err = "";
                var counter = 0;
                var fieldname = "";
                $.each(res.error,function(k,v){
                    if(counter==0)
                    {
                        fieldname = k;
                    }
                    err += v+"\n";
                    counter++;
                });
                alert(err);
                if(fieldname!=0)
                {
                    $("select[name='"+fieldname+"']").focus();
                    $("input[name='"+fieldname+"']").focus();
                }
                return false;
            }else if(res.success){
                console.log(res.success);
                location.reload();
            }
        }
    })
}
$(function(){

    $.ajax({
        type:'post',
        url:'alert',
        data : {data:'alert'},
        success:function(res){
           console.log(res);
        }
    })




    $('.set-price').click(function(){
        var id = $(this).attr('id');
        var url = $(this).attr('data-url');
        var price = $('.'+id+'_cls').val();

            $.ajax({
                type:'post',
                url:url,
                data : {setall_price:price,id:id},
                success:function(res){
                    if(res.error){
                    var err = "";
                    $.each(res.error,function(k,v){
                        err += v+"\n";
                    });
                    alert(err);
                    $("input[name='ceiling']").focus();
                    return false;
                }else if(res.success){
                    console.log(res.success);
                    location.reload();
                }
            }
        })
    });
    $('.set-notify').click(function(){
        var id = $(this).attr('data-id');
        var url = $(this).attr('data-url');

            $.ajax({
                type:'post',
                url:url,
                data : {id:id},
                success:function(res){
                    if(res.error){
                    var err = "";
                    $.each(res.error,function(k,v){
                        err += v+"\n";
                    });
                    alert(err);
                    return false;
                }else if(res.success){
                    console.log(res.success);
                    location.reload();
                }
            }
        })
    });
});