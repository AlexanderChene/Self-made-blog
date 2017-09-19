<html>

<head>
<font size="5" color="blue">Create a Post</font>
</head>

<?php //uploadprocess.php?username=<?php echo $_COOKIE['username'];?>
<body>
<form enctype="multipart/form-data" method = "post" action="uploadprocess.php?username=<?php echo $_COOKIE['username'];?>">

<table>

<!--  <tr><td><input type="text" name="username" value= readonly="readonly"></td></tr>-->
<tr><textarea name="discription"  id="discription" rows="10" cols="80" placeholder="What's on your mind now?"></textarea></td></tr>
<tr><td>Upload a picture: <input type="file" name ="myfile" id="file"></td></tr>
<tr><td><input type="submit"  value="Post" "></td></tr>

</table>
</form>

</body>


</html>
<script>
function check(){
	valid=true;
	
	if($("#file").val()==''){
		valid=false;
	}
	
	return valid;
}

</script>