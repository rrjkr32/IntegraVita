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

	$sql = "SELECT dia_name,address,contact FROM diagnosis WHERE username='$usr'";
	$result =  mysqli_query($oLink,$sql);
  $row = mysqli_fetch_assoc($result);
?>
<!doctype html>
<html>
<head>
  
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Diagnostics</title>
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
				<h1 styel="color:#FFFFFF"><?php echo $row["dia_name"]?></h1><!-- Name of the pharmacy using database-->
				<h2><?php echo $row["contact"]?></h2><!-- Name of the shopkeeper using database-->
			</header>
			<nav id="mainnav">
  											<ul>
                            		<li class="selected-item"><a href="index.php">Profile</a></li>
                           
                        	</ul>
			</nav>
			</aside>
  </section>
			<section id="content" class="column-right">    		
	    <article>
			<h2>Profile Information</h2>
			<div class="article-info">General Information</a></div>
				<h4>Personnal Information</h4>
            <ul class="styledlist">
                <li><strong>Center Name: 	</strong><?php echo $row["dia_name"]?></li>
                <li><strong>Contact: 	</strong><?php echo $row["contact"]?></li>
 								<li><strong>Address: 	</strong><?php echo $row["address"]?></li>
            </ul>
		<a href="update.php" class="button_reversed">Update Info</a>
		</article>
	
  
	
    <h1 style="background-color:black; text-align:center">
      Facilities provided by us:<br>
    </h1>
    
     <div class="floating-box" style="text-align:center; background-color:lightblue"><h1>CT-Scan</div>
<div class="floating-box" style="text-align:center; background-color:lightblue"><h1>X-ray</h1></div>
<div class="floating-box" style="text-align:center; background-color:lightblue"><h1>MRI</h1></div>
<div class="floating-box" style="text-align:center; background-color:lightblue"><h1>Ultrasound</h1></div>
<div class="floating-box" style="text-align:center; background-color:lightblue"><h1>Cancer</h1></div>
<div class="floating-box" style="text-align:center; background-color:lightblue"><h1>TB</h1></div>
<div class="floating-box" style="text-align:center; background-color:lightblue"><h1>Malaria</h1></div>
  <div class="floating-box" style="text-align:center; background-color:lightblue"><h1>Dengue</h1></div>
   
  
		<div class="clear"></div>
	</section>


</body>
</html>
