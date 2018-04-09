<html> 
<head><title>Mandi | Add</title></head> 
<body> 
<form action="/lsapp/public/create" method="post"> 
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
<table> 
 <tr> 
  <td>Mandi Name</td> 
  <td><input type='text' name='stud_name' /></td> 
 </tr> 
 <tr> 
  <td colspan='2'><input type='submit' value="Add Mandi" /></td> 
 </tr> 
</table> 
</form> 
</body>  
</html>