<!DOCTYPE html>
<html>
<head>
	<title> Download New Weight </title>
  <link rel="stylesheet" type="text/css" href="nav_css.css">
  <style type="text/css">
    form, .content {
  width: 97%;
  margin: 0px auto;
  padding: 20px;
  text-align: center;

  background: #1c8adb;
  
  border-radius: 0px 0px 10px 10px;
}

h1{
  text-align: center;
}
.header2 {
    text-align: center;
    width: 99%;
    margin-top: 30px;
    font-size: 20px;
    margin-bottom: 30px;
    color: white;
    background: #1c8adb;
    text-align: center;
    border: 1px solid #B0C4DE;
    border-bottom: none;
    border-radius: 10px 10px 10px 10px;
    padding: 5px;
}

  </style>
</head>
<body>
<?php
  
  $dbhost="13.232.5.131";
  $dbuser="root";
  $dbpass="Root@111000";
  $con=mysqli_connect($dbhost,$dbuser,$dbpass);

$link = "";
$flag = '';
if($con){
	//echo("connection sucessfully<br>");
}
else
{
	echo("not sucessfull<br>");
}


$db=mysqli_select_db($con,'weights');


//Insert the image name and image content in image_table

$sel = "SELECT * FROM weight_download WHERE STORE_ID='shivshankar'";

$query=mysqli_query($con,$sel);

while($data = mysqli_fetch_array($query)){

  $link = $data['LINK'];
  $flag = $data['flag'];
}
?>

<div class="topnav">
  <a href="home.php">BILL DESK</a>
  <a href="newWeight.php">TRAINING CONSOLE</a>
  <div style="text-align: right;">
  <a href="logout.php" >LOGOUT</a>
  </div>
</div>

<?php 

if($flag == 1)
{
  echo("  <div style='text-align:right; margin-bottom:15px;margin-top:15px;'>
      <a href='$link' ><button name='download' >Download MODEL</button></a>
    </div>");
}else{
  echo("
   <div style='text-align:right; margin-bottom:15px;margin-top:15px;'>
      <a href='$link' ><button name='download' disabled='true'>Download MODEL</button></a>
    </div>");
}


?>
 <form class="header" action="newWeight1.php" method="POST" enctype="multipart/form-data">
     <div style="font-size: 25px">
       <label style="color:white"> ITEM NAME :</label>
      <input type="text" name="item-name"  placeholder="ID" required = "true"><br><br>
     </div> 
      <div style="font-size: 25px"><label style="color:white">ITEM PICTURE</label>
     
  	  <input type="file" name="myimage">
  	  </div ><br><br><br>

      
      <div style="font-size: 25px">
        <label style="color:white">ITEM DETAILS</label>
	
    <textarea
	    id="text" 
      	cols="40" 
      	rows="4" 
      	name="image_text" 
      	placeholder="Say something about this image..."
        required="true"
		></textarea>
  </div>
	  <div><br><br>
      		<button type="submit" name="upload">UPLOAD</button>
  	</div>
    
     </form>
  <br><br>
   



</body>
</html>