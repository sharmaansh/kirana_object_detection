
<?php
session_start();
if(!isset($_SESSION['user']))
{
	header('location:login.php');
}
?>


<html>
<head>
<title>
</title>
<style>

table {
   width: 100%;
    margin-top: 30px;
    font-size: 20px;
    margin-bottom: 30px;
    color: white;
    background: #1c8adb;
    text-align: center;
   border-bottom: none;
    border-radius: 10px 10px 10px 10px;
    padding: 0px;
  
}
table, td {  
  border: none;
  text-align: center;

}
 td{
  padding: 15px;
}
tr{
   color:white;
}

.header {
    width: 20%;
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
.button {
  background-color: #1c8adb;
  border: none;
  padding: 16px 32px;
  text-align: center;
  color: white;
  opacity: 1;
  font-size: 16px;
  margin: 4px 2px;
  transition: 0.3s;
  display: inline-block;
  cursor: pointer;
  border-radius: 150px;
}
form{
width:1000px;
;

}
.search-box{
  width:70%;
  padding:15px;
  font-size:13px;
}
.submit
{
  width: 10%;
    margin-top: 30px;
    margin-bottom: 30px;
    color: white;
    background: #1c8adb;
    text-align: center;
    border: 1px solid #B0C4DE;
    border-bottom: none;
    border-radius: 10px 10px 10px 10px;
    padding: 7px;
}
.submit:hover
{
	cursor:pointer;
    background:#39dc79;
    color:#000;
}
.h1{
  color:#1c8adb;
  text-align: center;
}
.cs{
  color:green;
}

.table_css{

  position: relative;
  width: 100%;

}
.{
  width: 500px;
}


</style>
<link rel="stylesheet" href="nav_css.css">
</head>
<body>
<div class="topnav">
  <a  href="home.php">BILL DESK</a>
  <a href="newWeight.php">TRAINING CONSOLE</a>
  <div style="text-align: right;">
  <a href="logout.php" >LOGOUT</a>
  </div>
</div>

<div class="search-box">
<form action="home.php" method="post">
<input  class="search" type="text" name="search" placeholder="Search for tables's records">
<input type="submit"  class="submit" value="search">
</div>


</form>

<?php

  //print("$output "); 
?>
<br>

</div>
</body>
</HTML>


<?php
$output="";
$id="";
$name="";
$price="";
$quantity="";
$total="";
//include_once('validation.php');
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
$db=mysqli_select_db($con,'kiranadb');
//
$sql = mysqli_query($con,"SHOW TABLES "); 
echo"<h3 class='h1'><u>Bill IDs : </u></h3>";
while($table = mysqli_fetch_array($sql)) {
echo"<div align='center' width=500px;>";	
echo"<table  border=3 ><col width='130'>";
echo"<tr><td >";
echo($table[0] . "<BR>");
echo"</td></td>";
echo"</table>";	
echo"</div>";
}
echo"<hr>";
if(isset($_POST['search'])){
$searchq=$_POST['search'];
$searchq=preg_replace("#[^0-9a-z]#i","",$searchq);	
	$result=mysqli_query($con,"SELECT * FROM  $searchq");
	
	if(mysqli_num_rows($result) == 0)
	{
		$output='<h4> class="h1">sorry :( this table does not exist </h4>';
	}
	else
	{
		echo"<h2 class='h1'><B>Searched Data Of Bill  :  $searchq </B></h2>";
		
			echo "<table border='1' class='table_css'>
				<tr>

					<th>itemid</th>

					<th>name</th>
					<th>price</th>
					<th>quantity</th>
					<th>total</th>
</tr>";
		while($row=mysqli_fetch_array($result))
		{
			$id=$row['itemid'];
			$name=$row['name'];
			$price=$row['price'];
			$quantity=$row['quantity'];
			$total=$row['total'];
			//$output .='<div>'.$name.' '.$pas.'</div>';
	
			 echo"<tr><td>";
			 echo $row['itemid'];
			 echo"</td>";
			  echo"<td>";
			 echo $row['name'];
			 echo"</td>";
			  echo"<td>";
			 echo $row['price'];
			 echo"</td>";
			  echo"<td>";
			 echo $row['quantity'];
			 echo"</td>";
			  echo"<td>";
			 echo $row['total'];
			 echo"</td></tr>";
			  
			
		}
		 echo"</table>";
    }
                                 }
?>
<html>
<body>
<br>
<br>
</body>
</html>
