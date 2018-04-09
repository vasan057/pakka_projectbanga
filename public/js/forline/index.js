$(function(){
    $('#dataTables-example').DataTable({
        responsive: false
    });
            //$( "#valid_from" ).datepicker();
            $( "#valid_from" ).datepicker({ dateFormat: "dd-mm-yy" }).val();
            $( "#valid_to" ).datepicker({ dateFormat: "dd-mm-yy" }).val();
            //$( "#valid_to" ).datepicker();
    $('#myModal').on('show.bs.modal',function(e){
        var btn = $(e.relatedTarget);
        var type = btn.data('type');
        if(type == 'edit'){
            var url = btn.data('url');
            var update = btn.data('update');
            var id = btn.data('id');
            $('#myModal form').attr('action',update);
            $('#myModal .modal-title').text("For Line details");
            $('#myModal #updrole').val("Update details");
            getMandi(url,id,function(){});
        }else if(type == 'insert'){
            var url = btn.data('url');
            var id = btn.data('id');
            $('#myModal form').attr('action',url);
            $('#myModal .modal-title').text("For Line details");
            $('#myModal #updrole').val("Insert details");
           getMandi(url,id,function(){});
       }
    });

    $("#modal").click(function(){
        //alert("hi");
        //For User ID
        var url = $(this).attr('data-url');
        var url1 = $(this).attr('data-url1');
        var url2 = $(this).attr('data-url2');
        var url3 = $(this).attr('data-url3');
        var url4 = $(this).attr('data-url4');
        var url5 = $(this).attr('data-url5');
      
    });
    $("#updrole").click(function(){
        var url = $('#myform').attr('action');
        var data = $('#myform').serializeArray();
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
                    $.each(res.error,function(k,v){
                        err += v+"\n";
                    });
                    alert(err);
                    return false;
                }else if(res.success){
                    location.reload();
                }
            } 
        }); 
    });
});



    function getMandi(url,id,cb){
        $.ajax({
            headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type:'GET', 
            url:url, 
            success:function(res){
                if(res.success){
                    var data = res.success;
                    $('#parameter').val(data.parameter);
                    $('#sequence').val(data.sequence);
                    $('#valid_from').val(data.valid_from);
                    $('#valid_to').val(data.valid_to);
                    $('#value').val(data.value);
                    $('#base').val(data.base_type);
                    $('#data_types').val(data.data_type);
                    $('#group').val(data.group);
                }
                cb();
            }
    });
}
   
