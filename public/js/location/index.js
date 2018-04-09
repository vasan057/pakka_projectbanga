$(function(){
    $('#dataTables-example').DataTable({
        responsive: false
    });
   
    $('#myModal').on('show.bs.modal',function(e){
        var btn = $(e.relatedTarget);
        var type = btn.data('type');
        if(type == 'edit'){
            var url = btn.data('url');
            var update = btn.data('update');
            var id = btn.data('id');
            $('#myModal form').attr('action',update);
            $('#myModal .modal-title').text("location details");
            $('#myModal #updrole').val("Update details");
            getMandi(url,id,function(){});
        }else if(type == 'insert'){
            var url = btn.data('url');
            var id = btn.data('id');
            $('#myModal form').attr('action',url);
            $('#myModal .modal-title').text("location details");
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
                    $('#State').val(data.State);
                    $('#District').val(data.District);
                    $('#Town_City').val(data.Town_City);
                    $('#is_active').val(data.is_active);
                    $('#edit_id').val(data.id);
                }
                cb();
            }
    });
}
   
