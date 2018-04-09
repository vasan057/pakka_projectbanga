$(function(){
    $('#dataTables-example').DataTable({
        responsive: false
    });
    var val = $('#select-device').val();
    $("select[id$='_view']").hide().attr('disabled',true);
    if(val) $('#'+val+'_view').show().attr('disabled',false);

    $('#select-device').change(function(){
        var val = $(this).val();
        $("select[id$='_view']").hide().attr('disabled',true);
        if(val) $('#'+val+'_view').show().attr('disabled',false);
    });
    $( ".table thead th a" ).append( "&nbsp;&nbsp;&nbsp;<i class='fa fa-caret-down' style='color:white;'></i>" );
    $('#myModal').on('show.bs.modal',function(e){
        var btn = $(e.relatedTarget);
        var type = btn.data('type');
        if(type == 'edit'){
            var url = btn.data('url');
            var update = btn.data('update');
            var id = btn.data('id');
            $('#myModal form').attr('action',update);
            $('#myModal .modal-title').text("User Role Mapping Details");
            $('#myModal #updrole').val("Update Details");
            getRoles(url,id,function(){});
        }else if(type == 'insert'){
            var url = btn.data('url');
            var id = btn.data('id');
            $('#myModal form').attr('action',url);
            $('#myModal .modal-title').text("User Role Mapping Details");
            $('#myModal #updrole').val("Insert Details");
           
       }
    });

    $("#updrole").click(function(){
        var data = $('#myform').serializeArray();
        var url  = $('#myform').attr('action');
        $.ajax({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'POST', 
            url:url, 
            data:data,
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
                    location.reload();
                }
            } 
        }); 
    });
});

function getRoles(url,id,cb){
    $.ajax({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        type:'GET', 
        url:url, 
        success:function(res){
            if(res.success){
                var data = res.success;
                $('#role').val(data.role_id);
                $('#select-device').val(data.device_type);
                $("select[id$='_view']").hide().attr('disabled',true);
                $('#'+data.device_type+'_view').val(data.menu).show().attr('disabled',false);
            }
            cb();
        }
    });
}
