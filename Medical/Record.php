
<?php
// define variables and set to empty values
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "integravita";
$medname = $quantity = $price = $flag="";
$conn = mysqli_connect($servername, $username, $password, $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

		session_start();
	 $usr= $_SESSION['Service'];
		$psql = "SELECT owner_name,o_email,o_contact,shop_name,s_email,address,s_contact,lat,lng FROM pharmacy_info WHERE username='$usr'";
 		$presult = $conn->query($psql);
		$prow = $presult->fetch_assoc();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $medname = $_POST['medname'];
  $quantity = $_POST['Quan'];
  $price= $_POST['Price'];

if (isset($_POST['add'])) {
        $flag=1;
    }
    elseif (isset($_POST['delete'])) {
        $flag=2;
    }


	

				
				


// Create connection


;

//echo $medname;
$sql = "SELECT medicine_name FROM $usr where medicine_name = '$medname'";

	//echo $sql;

$result = mysqli_query($conn, $sql);
$row=mysqli_fetch_assoc($result);
	$num=(int)$quantity;
	//echo gettype($num);
				
		if($row!=NULL){
			//echo "found";
				if ($flag==1)
				{
				$sql2="update $usr set quantity = quantity + $num where medicine_name='$medname'";
			$result2 = mysqli_query($conn, $sql2);
				//	echo $num,"units of ",$medname," added";
				}
			else if ($flag==2)
			{
				$sql2="update $usr set quantity = quantity - $num where medicine_name='$medname'";
			$result2 = mysqli_query($conn, $sql2);
				//echo $num,"units of ",$medname," deleted";
			}
		}
	else
	{
		//echo "not found";
		if ($flag==1)
				{
				$sql2="insert into $usr (medicine_name,quantity,price) values( '$medname',$num ,$price)";
			$result2 = mysqli_query($conn, $sql2);
		//	echo $num,"units of ",$medname," added";
				}
			else if ($flag==2)
			{
			//	echo "not found";
			}
	}


}



?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Record</title>
<link rel="stylesheet" href="styles.css" type="text/css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
				integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
		<script>
							function mfunction() {								
									console.log( document.getElementById("Quan").value);
									document.getElementById("Nunits").innerHTML = document.getElementById("Quan").value+" of ";
								document.getElementById("Mname").innerHTML = document.getElementById("medname").value;
									document.getElementById("upd").innerHTML = "added";
								var x = document.getElementById("updation");
    if (x.style.visibility === "hidden") {
        x.style.visibility = "visible";
							}
							}
							function mfunction2() {
									console.log( document.getElementById("Quan").value);
									document.getElementById("Nunits").innerHTML = document.getElementById("Quan").value+" of ";
									document.getElementById("Mname").innerHTML = document.getElementById("medname").value;
									document.getElementById("upd").innerHTML = "deleted";
								   if (x.style.visibility === "hidden") {
        x.style.visibility = "visible";
							}
							}
							
							</script>
</head>

<body>

		<section class="width" style="height:100%">
			<aside id="sidebar" class="column-left" style="background-color:#80B763">
			<header>
				<img src="images/profile.png" alt="Profile Icon" style="width:70%;height:70%;">
				<a href="../index1.php" class="button2">Sign Out</a>
				<a href="#" class="button2">Change Pic</a>	
				<h2><?php echo $prow["shop_name"] ?></h2>
				<h2>Mr. <?php echo $prow["owner_name"] ?></h2>
			</header>
				
			<nav id="mainnav">
  											<ul>
                            		<li ><a href="index.php">Profile</a></li>
																<li class="selected-item"><a href="Record.php">Record</a></li>
                           		  <li><a href="Billing.php">Billing</a></li>
                        	</ul>
			</nav>
			</aside>
	
			
			<section id="content" class="column-right">
      <article>     		
				<h1 align="center">
					Update Stock
				</h1>
					

						
						<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
							<div class="form-group jumbotron">
								<div class="row">
									<div class="col-sm-5">
				<label for="medname">Medicine Name:</label>
				<input type="text" class="form-control" id="medname" name="medname">
									</div>		
									<div class="col-sm-2">
										
								
				<label for="Quan">Quantity:</label>
				<input type="number" class="form-control" id="Quan" name="Quan">
										</div>
											<div class="col-sm-2">
										<label for="Price">Price:</label>
				<input type="number" class="form-control" id="Price" name="Price">
										</div>
									<div class="col-sm-3">
										<br>
										<button type="submit" id="add" name="add" class="btn btn-default" onclick="mfunction()">Add</button>
										<button type="submit" id ="delete" name="delete" class="btn btn-default" onclick="mfunction2()">Delete</button>
									</div>
									
									</div>
								
								<br>
								<div id="updation"  style="visibility:hidden ">
								
									<span id="Nunits">
									</span>
										
									<span id="Mname">
									</span>
									<span id="upd">
									</span>
									
								</div>
							
					</div>
				</form>
		</article>

		<div class="clear"></div>

	</section>
	

</body>
</html>
