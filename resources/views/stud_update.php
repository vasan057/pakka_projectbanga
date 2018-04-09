<html> 
<head><title>Mandi Update | Edit</title></head> 
<body> 
<form action="/lsapp/public/edit/<?php echo $mandi_name[0]->id; ?>" method="post"> 
<input type="hidden" name="_token" value="<?php echo csrf_token(); ?>"> 
<table> 
 <tr> 
  <td>Name</td> 
  <td><input type='text' name='stud_name' value='<?php echo $mandi_name[0]->mandi_name; ?>' /></td> 
  </tr> 
 <tr> 
  <td colspan='2'><input type='submit' value="Update Mandi" /></td> 
 </tr> 
</table> 
</form> 
</body> 
</html>