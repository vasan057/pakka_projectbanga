<html> 
<head><title>View Mandi Records</title>

<meta name="csrf-token" content="<?php echo csrf_token() ?>" />    
  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js">
  </script>

  <script type="text/javascript">
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
        });
  </script>
</head> 
<body> 
<!--<form action="/lsapp/public/edit/<?php //echo $mandi_name[0]->id; ?>" method="post">
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> -->
<table border="1"> 
<tr> 
 <td>ID</td> 
 <td>Name</td> 
 <td>Edit</td> 
</tr> 
@foreach ($mandi_name as $user) 
 <tr> 
     <?php
     $id= $user->id ; ?>
  <td contentEditable='true' onClick="showEdit(this);" onBlur="saveToDatabase(this,'id','<?php echo $id; ?>')">{{ $user->id }}</td> 
  <td contentEditable='true' onClick="showEdit(this);" onBlur="saveToDatabase(this,'mandi_name','<?php echo $id; ?>')">{{ $user->mandi_name }}</td> 
  <td><a href='/lsapp/public/edit/{{ $user->id }}'>Edit</a></td> 
  
 </tr> 
 
@endforeach 
</table> 
<div id="ajaxResponse"><div>
<!--</form>-->
</body>

<script>

		function showEdit(editableObj) {
			$(editableObj).css("background","#FFF");
		} 
		
		function saveToDatabase(editableObj,column,id) {
            var id = id;
            var column = column;
            var changed_val = editableObj.innerHTML;
           // alert(changed_val);
                $.ajax({
                type:'POST', 
                url:'/lsapp/public/getupd', 
                //data:'_token=<?php //echo csrf_token() ?>',
                data:{id:id,column:column,changed_val:changed_val,"_token": "{{ csrf_token() }}"},
                success:function(response){ 
                //$("#ajaxResponse").html(data.msg); 
               //if(response == "success")
                    //alert(response);
                    location.reload();
                } 
            
            }); 
		}
		</script>  
</html>