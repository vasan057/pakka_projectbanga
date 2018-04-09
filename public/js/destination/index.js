$(function(){
    $('#dataTables-example').DataTable({
        responsive: false
    });
   
    $('#myModal').on('show.bs.modal',function(e){
        var btn = $(e.relatedTarget);
        var type = btn.data('type');
        if(type == 'edit'){
            var url = btn.data('url');
            //alert(url);
            var update = btn.data('update');
            var id = btn.data('id');
            $('#myModal form').attr('action',update);
            $('#myModal .modal-title').text("Delivery Details");
            $('#myModal #upddestination').val("Update Details");
            getMandi(url,id,function(){});
        }else if(type == 'insert'){
            var url = btn.data('url');
           // alert(url);
            var id = btn.data('id');
            $('#myModal form').attr('action',url);
            $('#myModal .modal-title').text("Delivery Details");
            $('#myModal #upddestination').val("Insert Details");
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
    $("#upddestination").click(function(){
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
                    $('#delivery_type').val(data.delivery_type);
                    $('#delivery_name').val(data.delivery_name);
                    $('#short_name').val(data.short_name);
                    $('#address_1').val(data.address_1);
                    $('#address_2').val(data.address_2);
                    $('#pincode').val(data.pincode);
                    $('#city').val(data.city);
                    $('#district').val(data.district);
                    $('#state').val(data.state);
                    $('#mobile_1').val(data.mobile_1);
                    $('#mobile_2').val(data.mobile_2);
                    $('#email_1').val(data.email_1);
                    $('#email_2').val(data.email_2);
                    $('#gstin').val(data.gstin);
                }
                cb();
            }
    });
}
   
