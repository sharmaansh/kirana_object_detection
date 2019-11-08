<?php
$name="";


session_start();

 
  $dbhost="13.232.5.131";
  $dbuser="root";
  $dbpass="Root@111000";
  $con=mysqli_connect($dbhost,$dbuser,$dbpass);

$link = "";
$flag = 0;
$text = "";

if($con){
	echo("connection sucessfully<br>");
}
else
{
	echo("not sucessfull<br>");
}

$db=mysqli_select_db($con,'weights');

if ($_SERVER["REQUEST_METHOD"]=="POST") 
{
  $name = $_POST['item-name'];
  $text = $_POST['image_text'];
  
}
$imagename=$_FILES["myimage"]["name"]; 

//Get the content of the image and then add slashes to it 
$imagetmp=addslashes (file_get_contents($_FILES['myimage']['tmp_name']));


$insert_image="INSERT INTO ITEM_DETAILS(ITEM_NAME,ITEM_PICTURE,ITEM_DETAILS) VALUES('$name','$imagetmp','$text')";

$result = mysqli_query($con,$insert_image);

if($result){

	echo "Inserted sucessfull";
	header("location:newWeight.php");

}else{

	echo "Not Inserted";
}


?>