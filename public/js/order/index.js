var i=0;
$(function(){
    // date range picker'

    var start = moment().subtract(29, 'days');
    var end = moment();
    var from = $("#from-order").val();
    var to = $("#to-order").val();
    
    if(from) {
        start = moment(from,["YYYY-MM-DD"]);
    }
    if(to){
        from = moment(to,["YYYY-MM-DD"]);
    }
    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        var from = start.format('YYYY-M-D');
        var to = end.format('YYYY-M-D');
        var uri = window.location.href;
        var url =  updateQueryStringParameter( uri, 'from', from ) ;
        url =  updateQueryStringParameter( url, 'to', to ) ;
        // var query  = '?from='+from+'&to='+to;
        // var url = window.location.href.split('?')[0];
        if(i>0) window.location.href = url;
        i++;
    }

    $('#reportrange').daterangepicker({
        startDate: start,
        endDate: end,
        opens:'left',
        ranges: {
           'Today': [moment(), moment()],
           'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
           'Last 7 Days': [moment().subtract(6, 'days'), moment()],
           'Last 30 Days': [moment().subtract(29, 'days'), moment()],
           'This Month': [moment().startOf('month'), moment().endOf('month')],
           'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
        }
    }, cb);

    cb(start, end);
    // End date range picker
    //$( ".table thead th a" ).append( "&nbsp;&nbsp;&nbsp;<i class='fa fa-caret-down' style='color:white;'></i>" );
    $('#myModal').on('change','#mandi_id',function(){
        var id = $(this).val();
        var url = $(this).attr('data-url');
        var arthiya = $(this).attr('data-arthiya');
        setLocation(id,url,false,function(){});
        setArthiya(id,arthiya,false,function(){});
    });
    $('#updlocation').click(function(){
        transportData();
    });
    $('.submit-all').click(function(){
       var data = $("input[name='orders[]']:checked");
       var url = $(this).attr('data-url');
       if(data.length){
            var datas = [];
            $.each(data,function(k,v){
                datas.push({name:"orders[]",value:v.value});
            });
            DataSubmit(url,datas);
       }else{
           alert('Select atleast one from list');
       }
    });
    $('.individual-submit').click(function(){
        var url = $(this).attr('data-url');
        var id = $(this).attr('data-id');
        var datas = [{name:"orders[]",value:id}];
        DataSubmit(url,datas);
    });
    $('.individual-reject').click(function(){
        var url = $(this).attr('data-url');
        var id = $(this).attr('data-id');
        var datas = [{name:"orders[]",value:id}];
        DataSubmit(url,datas);
    });
    $('.checkall').click(function(){
       if($(this).is(':checked')){
           $("input[name='orders[]']").prop('checked',true);
       }else{
        $("input[name='orders[]']").attr('checked',false);
       }
    });

    $('#myModal').on('show.bs.modal',function(e){
        var that = $(e.relatedTarget);
        var type = that.data('type');
        var url = that.data('url');
        var location_url = that.data('location');
        // default value set
        var default_val = false;
        var mandiLength = $('#mandi_id option').length;
        if(mandiLength==2)
        {
            $("#mandi_id option:nth-child(2)").prop("selected", true);
            default_val = true;
        }
        
        $('#myModal form').attr(that.data('url'));
        if(type == 'edit'){
            $('#myModal form').attr('action',url);
            $('#myModal form').append("<input type='hidden' name='_method' value='put'>");
            $('#myModal .modal-title').html('Order Details');
            $('#myModal #updlocation').val('Update Details');
            getOrderDetails(url,location_url);
           
        }else if(type == 'insert'){
            $('#myModal form').attr('action',url);
            $("#myModal form input[name='_method']").remove();
            $('#myModal .modal-title').html('Order Details');
            $('#myModal #updlocation').val('Insert Details');
            $('#reference').val('');
            $('#quantity').val('');
            $('#price').val('');
            if(default_val){
                var id = $('#mandi_id').val();
                var url = $('#mandi_id').attr('data-url');
                var arthiya = $('#mandi_id').attr('data-arthiya');
                setLocation(id,url,false,function(){});
                setArthiya(id,arthiya,false,function(){});
            }
        }
    });
});
function setLocation(id,url,is_default,cb){
    $.ajax({
        type : 'get',
        url : url+'/'+id,
        success : function(res){
            var options = "<option value=''>Select Location</option>";
            var select = "";
            if(res.success){
                var data = res.success.length;
                $.each(res.success,function(k,v){
                    if(k == 0 && !is_default){
                        options +="<option value='"+v.id+"' selected>"+v.short_name+"</option>";
                    }else if(is_default && is_default == v.id){
                        options +="<option value='"+v.id+"' selected>"+v.short_name+"</option>";
                    }else{
                        options +="<option value='"+v.id+"' >"+v.short_name+"</option>";
                    }
                   
                });
            }
            $('#delivery_location').html(options);
        }
    });
    cb();
}
function setArthiya(id,url,is_default,cb){
    $.ajax({
        type : 'get',
        url : url+'/'+id,
        success : function(res){
            var options = "<option value=''>Select Pakka Arthiya</option>";
            var select = "";
            if(res.success){
                var data = res.success.length;
                $.each(res.success,function(k,v){
                    if(k == 0 && data == 1 && !is_default){
                        options +="<option value='"+v.id+"' selected>"+v.user_id+"</option>";
                    }
                    else if(is_default && is_default == v.id){
                        options +="<option value='"+v.id+"' selected>"+v.user_id+"</option>";
                    }else{
                        options +="<option value='"+v.id+"'>"+v.user_id+"</option>";
                    }
                });
            }
            $('#pakka_arthiya_id').html(options);
        }
    });
    cb();
}

function transportData(){
    var data = $('#myModal form').serializeArray();
    var url = $('#myModal form').attr('action');
    $.ajax({
        type : 'post',
        url : url,
        data:data,
        success : function(res){
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
}
function getOrderDetails(url,location_url){
    $.ajax({
        type : 'get',
        url : url,
        success : function(res){
            if(res.error){
                var err = "";
                $.each(res.error,function(k,v){
                    err += v+"\n";
                });
                alert(err);
                return false;
            }else if(res.success){
                var list= res.success;
                setLocation(list.mandi_id,location_url,list.destination_id,function(){ $('#delivery_location').val(list.delivery_loc); });
                $('#mandi_id').val(list.mandi_id);
                var arthiya = $('#mandi_id').attr('data-arthiya');
                setArthiya(list.mandi_id,arthiya,list.user_id,function(){  $('#pakka_arthiya_id').val(list.user_id); });
                $('#reference').val(list.ref_num);
                $('#quantity').val(list.order_quantity);
                $('#price').val(list.order_price);
            }
        }
});
}


function DataSubmit(url,data){
    $.ajax({
        type : 'post',
        url : url,
        data:data,
        success : function(res){
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
});
}

function getQueryStringValue (key) {  
    return decodeURIComponent(window.location.search.replace(new RegExp("^(?:.*[&\\?]" + encodeURIComponent(key).replace(/[\.\+\*]/g, "\\$&") + "(?:\\=([^&]*))?)?.*$", "i"), "$1"));  
  }  

  function updateQueryStringParameter(uri, key, value) {
    var re = new RegExp("([?&])" + key + "=.*?(&|#|$)", "i");
    if( value === undefined ) {
        if (uri.match(re)) {
          return uri.replace(re, '$1$2');
      } else {
          return uri;
      }
    } else {
        if (uri.match(re)) {
            return uri.replace(re, '$1' + key + "=" + value + '$2');
      } else {
      var hash =  '';
      if( uri.indexOf('#') !== -1 ){
          hash = uri.replace(/.*#/, '#');
          uri = uri.replace(/#.*/, '');
      }
      var separator = uri.indexOf('?') !== -1 ? "&" : "?";    
      return uri + separator + key + "=" + value + hash;
    }
    }  
  }