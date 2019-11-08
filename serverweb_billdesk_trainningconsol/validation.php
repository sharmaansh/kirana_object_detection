<?php
$name="";
$pas="";
session_start();


//header('location:registration.php');

 $dbhost="13.232.5.131";
  $dbuser="root";
  $dbpass="Root@111000";
  $con=mysqli_connect($dbhost,$dbuser,$dbpass);

if($con){
	//echo("connection sucessfully<br>");
}
else
{
	echo("not sucessfull<br>");
}
$db=mysqli_select_db($con,'marketi');
if(isset($_POST['submit'])){
	$name=$_POST['user'];
	$pas=$_POST['password'];
	
	

	 $sql="select * from registration where user='$name' && password='$pas'";
	 $query=mysqli_query($con,$sql);
	 $row=mysqli_num_rows($query);
		 if($row == 1){
			 echo("login sucessfull<br>");
			 $_SESSION['user']=$name;
			 header('location:home.php');
		 }
		 else{
			 echo("login fail");
			 header('location:login.php');
			 
		 }
	 
}

?>
