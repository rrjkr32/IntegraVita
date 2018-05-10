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
  $usr = $_SESSION['Service'];

	$sql = "SELECT owner_name,o_email,o_contact,shop_name,s_email,address,s_contact,lat,lng FROM pharmacy_info WHERE username='$usr'";
	$result =  mysqli_query($oLink,$sql);
  $row = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Pharmacy</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
			integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<link rel="stylesheet" href="styles.css" type="text/css" />
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
</head>
<body>
		<section id="body" class="width">
			<aside id="sidebar" class="column-left">
			<header>
				<img src="images/profile.png" alt="Profile Icon" style="width:70%;height:70%;">
				
				<a href="../index1.php" class="button2" name="sign_out">Sign Out</a>
				
					
				<a href="#" class="button2">Change Pic</a>	
				<h1 styel="color:#FFFFFF"><?php echo $row["shop_name"]?></h1><!-- Name of the pharmacy using database-->
				<h2>Mr.<?php echo $row["owner_name"]?></h2><!-- Name of the shopkeeper using database-->
			</header>
			<nav id="mainnav">
  											<ul>
                            		<li class="selected-item"><a href="index.php">Profile</a></li>
                           		 <li><a href="Record.php">Record</a></li>
                           		 <li><a href="Billing.php">Billing</a></li>
                        	</ul>
			</nav>
			</aside>
			<section id="content" class="column-right">    		
	    <article>
			<h2>Profile Information</h2>
			<div class="article-info">General Information</a></div>
				<h4>Personnal Information</h4>
            <ul class="styledlist">
                <li><strong>Owner Name: 	</strong><?php echo $row["owner_name"]?></li>
                <li><strong>Email: 	</strong><?php echo $row["o_email"]?></li>
 								<li><strong>Contact: 	</strong><?php echo $row["o_contact"]?></li>
            </ul>
				<h4>Store Information</h4>
            <ul class="styledlist">
                <li><strong>Name: 	</strong><?php echo $row["shop_name"]?></li>
                <li><strong>Email: 	</strong><?php echo $row["s_email"]?></li>
								<li><strong>Address: 	</strong><?php echo $row["address"]?></li>
 								<li><strong>Contact: 	</strong><?php echo $row["s_contact"]?></li>
								<li><strong>Latitude: 	</strong><?php echo $row["lat"]?></li>
								<li><strong>Longitude: 	</strong><?php echo $row["lng"]?></li>
            </ul>
		<a href="update.php" class="button_reversed">Update Info</a>
		</article>
		</section>
		<div class="clear"></div>
	</section>
	

</body>
</html>
