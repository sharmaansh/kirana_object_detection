<?php
$name="";
$pas="";

session_start();

  $dbhost="13.232.5.131";
  $dbuser="root";
  $dbpass="Root@111000";
  $con=mysqli_connect($dbhost,$dbuser,$dbpass);


if($con){
	echo("connection sucessfully<br>");
		 header('location:login.php');
}
else
{
	echo("not sucessfull<br>");
}
$db=mysqli_select_db($con,'marketi');
if(isset($_POST['submit'])){
	$name=$_POST['user'];
	$pas=$_POST['password'];
	$ins="INSERT INTO registration(user,password)VALUES('$name','$pas')";
$query=mysqli_query($con,$ins);
if($query){
	echo("inserted<br>");
	 header('location:login.php');
}
else
{
echo("not inserted<br>");
}
}
?>
