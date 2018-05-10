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
  session_start();
	$usr=$_SESSION['Service'];
$num=$_GET['cur'];
$numb=(int)$num;
$name=$_GET['med'];
$sql = "select * from $usr where medicine_name='$name'";
$result = $oLink->query($sql);
$row = $result->fetch_assoc();
$xyz=$row['quantity']-$numb;
$sql1 = "update $usr set quantity=$xyz where medicine_name='$name'";
$result1 = $oLink->query($sql1);
?>