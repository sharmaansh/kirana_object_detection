<!DOCTYPE html>
<html>
<head>
  <title>registration page</title>
  <link rel="stylesheet" type="text/css" href="css.css">
  <style>
  span{
	color:red;  
  }
  </style>
</head>
<body>
<div class="login-box">
<img src="man.png" class="avatar">
     <h1 class="header">Registration</h1>
     <form action="validation1.php" onsubmit="return calll()" method="post">
      <p> Employee Id</p>
      <input type="text" name="user" id="i1"  placeholder="ID"><span id="d1"> </span>
      <p>Employee Password</p>
      <input type="text" name="password"  id="i2" placeholder="PASSWORD"><span id="d2"> </span><br>
	   <input type="submit" name="submit" id="i3" value="SignUp">
     <a href="login.php">Already a User! Login</a>
     </form>
	 
	
	 
<script>
function calll(){
var name =	document.getElementById('i1').value;
var pass =	document.getElementById('i2').value;
if(name=="")
{
document.getElementById('d1').innerHTML="*name is empty";
return false;	
	
}

  else if(pass=="")
  {
	document.getElementById('d2').innerHTML="*pass is empty";  
	return false;
  }
  
 return true;
}
  //<input type="submit" name="submit" id="i3" value="Login">
</script>

  </div>
</body>
</html>