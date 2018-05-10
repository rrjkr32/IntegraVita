<?php
	include 'config.php';
	
	//connect to db
  	$oLink = new mysqli($host, $user, $pswd,$db);// or die("Can't connect to MySQL server!");
	//mysql_select_db($db) or die("Can't select database!");
	
	if(!$oLink)
	{
		die("Connection failed:".mysqli_connect_error());
	}
	//echo "Connected Successfully";
	


	// Get parameters
	$mlat =$_POST["lat"];
	$mlng =$_POST["lng"];
	$bg =$_POST["bg"];
	$qty =$_POST["qty"];
	
  
	// Search the rows in the markers table
	//change 3959 to 6371 for distance in KM
	$sql = sprintf("SELECT *, ( 6371 * acos( cos( radians('%s') ) * cos( radians( lat ) ) * cos( radians( lng ) - radians('%s') ) 
	+ sin( radians('%s') ) * sin( radians( lat ) ) ) ) AS distance FROM blood_bank HAVING distance < 10 ORDER BY distance LIMIT 0 , 20",
	  mysqli_real_escape_string($oLink,$mlat),
	  mysqli_real_escape_string($oLink,$mlng),
	  mysqli_real_escape_string($oLink,$mlat));


$result = mysqli_query($oLink,$sql);

//echo "<script type='text/javascript'>alert(<?php echo "hello"; 
$num=(int)$qty;
$rows = array();
	while($r = mysqli_fetch_assoc($result)) {
		$var=$r[$bg];
		//echo $var;
		//$sql2="select medicine_name,quantity from $var where medicine_name='$bg' and quantity>=$num";
		//echo $sql2;
		//$result1 = mysqli_query($oLink,$sql2);
		//$row2= mysqli_fetch_assoc($result1);
		if ($var>=$qty)
			$rows[]=$r;
	}
		//	$rows[] = $r;
	mysqli_close($oLink); 
		
	echo json_encode($rows);
?>