<?php 
	$dbserver = "localhost";
	$dbuser = "root";
	$dbpwd = "";
	$dbname = "integravita";
	$oLink = new mysqli($dbserver, $dbuser, $dbpwd, $dbname);
	if(!$oLink)
	{
		die("Connection failed:".mysqli_connect_error());
	}
$current_quantity = mysql_real_escape_string($_GET['current_quantity']);
$med_name=mysql_real_escape_string($_GET['med_name']);
$num=(int)$current_quantity;
echo"jxaj";
echo $num;
echo "hb";
$sql2="update user3 set quantity = quantity - $num where medicine_name='$med_name'";
			$result2 = mysqli_query($oLink, $sql2);;
echo $sql2;


?>