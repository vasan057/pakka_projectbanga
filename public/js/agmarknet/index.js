var i=0;
   $(document).ready(function() {
    var start = moment();
    var end = moment();
    var from = getQueryStringValue("from");
    var to = getQueryStringValue("to");
    if(from) {
        start = moment(from,["DD-MM-YYYY"]);
    }
    if(to){
        end = moment(to,["DD-MM-YYYY"]);
    }

    function cb(start, end) {
        $('#reportrange span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        var from = start.format('DD-MM-YYYY');
        var to = end.format('DD-MM-YYYY');
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
        
        $('#submit-record').click(function(){ UpdateSubmit($(this).attr('data-url')); });
        // check what type of modal
        $('#myModal').on('show.bs.modal',function(e){
            var that = $(e.relatedTarget);
            var type = that.data('type');
            var url = that.data('url');
            
            $('#myModal form').attr(that.data('url'));
            if(type == 'edit'){
                $('#myModal form').attr('action',url);
                $('#myModal form').append("<input type='hidden' name='_method' value='put'>");
                $('#myModal .modal-title').html('Update Mandi price Details');
                $('#myModal #updlocation').val('Update Details');
                getMandiPrice(url);
            }else if(type == 'insert'){
                $('#myModal form').attr('action',url);
                $("#myModal form input[name='_method']").remove();
                $('#myModal .modal-title').html('Insert Mandi price Details');
                $('#myModal #updlocation').val('Insert Details');
            }
        });


        $('#updlocation').click(function(){
            console.log('test');
            var data = $('#myform').serializeArray();
            var url = $('#myform').attr('action');
            $.ajax({
                type : 'post',
                data : data,
                url : url,
                success : function(res){
                    if(res.error){
                        var err = "";
                        var counter = 0;
                        var fieldname = "";
                        $.each(res.error,function(k,v)
                        {
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
            });
        });
      
    });

    function getMandiPrice(url){
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
                    var d = res.success;
                    if(d.mandi) $('#mandi_id').val(d.mandi.id);
                    $('#min_price').val(d.min);
                    $('#max_price').val(d.max);
                    $('#quantity').val(d.quantity);
                }
            }
        });
    }

    function UpdateSubmit(url){
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
      