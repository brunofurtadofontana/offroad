<?php
	//$con = mysql_connect("localhost","root","")or die(mysql_error());
	//$cx = mysql_select_db('materiais',$con)or die(mysql_error());



	
$con = mysqli_connect("localhost","root","","sgm");

// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

?>