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
	
		if(isset($_POST['submit'])){
		$A=$_POST['shop_name'];
		$B=$_POST['address'];
		$C=$_POST['s_contact'];
		$D=$_POST['o_contact'];
		$E=$_POST['s_email'];
		$F=$_POST['o_email'];
		$G=$_POST['owner_name'];
		$sql = "UPDATE pharmacy_info
						SET shop_name='$A', address='$B', s_contact='$C', o_contact='$D', s_email='$E', o_email='$F', owner_name='$G'
						WHERE username='$usr' OR username='NULL'";
		$result = $oLink->query($sql);
	}
	$sql1 = "SELECT owner_name,o_email,o_contact,shop_name,s_email,address,s_contact,lat,lng FROM pharmacy_info WHERE username='$usr'";
 	$result1 = $oLink->query($sql1);
	$row = $result1->fetch_assoc();
?>
<!doctype html>
<html> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Update Info</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<link rel="stylesheet" href="styles.css" type="text/css" />

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
	

</head>

<body>
	<section class="width" style="height:100%">
			<aside id="sidebar" class="column-left" style="background-color:#80B763">
			<header>
				<img src="images/profile.png" alt="Profile Icon" style="width:70%;height:70%;">
				<a href="#" class="button2">Sign Out</a>
				<a href="#" class="button2">Change Pic</a>	
				<h2><?php echo $row["shop_name"] ?></h2>
				<h2>Mr.<?php echo $row["owner_name"] ?></h2>
			</header>
				
			<nav id="mainnav">
  											<ul>
                            		<li><a href="index.php">Profile</a></li>
                           		 <li ><a href="Record.php">Record</a></li>
                           		 <li  class="selected-item"><a href="Billing.php">Billing</a></li>
                        	</ul>
			</nav>
			</aside>
		<section id="content" class="column-right">    		
	    <article>
			<h2>Profile Information</h2>
			<div class="article-info">General Information</a></div>
				<h4>Personnal Information</h4>
          <form id="form1" class="styledlist" action="update.php" method="post">
            <div class="input_group">
              <label>Owner Name:</label><input type="text" name="owner_name"  required><br>
              <label>Email:</label><input type="text" name="o_email"  required><br>
              <label>Contact:</label><input type="text" name="o_contact"  required><br>
              <label>Pharmacy Name:</label><input type="text" name="shop_name"  required><br>
              <label>Pharmacy Email:</label><input type="text" name="s_email"  required><br>
              <label>Pharmacy Address:</label><input type="text" name="address"  required><br>
              <label>Pharmacy Contact:</label><input type="text" name="s_contact"  required><br>
              <label>Latitude:</label><input type="text" name="lat" value=<?php echo $row['lat']?> disabled><br>
              <label>Longitude:</label><input type="text" name="lng" value=<?php echo $row['lng']?> disabled><br>
              <label>Location:</label><button  onclick="getLocation()">Find My location</button><br>
							<button type="submit" name="submit">SUBMIT</button>
            </div>
          </form>
        
		<a href="index.php" class="button_reversed">BACK</a>
		</article>
		</section>
		<div class="clear"></div>
	</section>
  <script>
  var x = document.getElementById("demo");
  function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else { 
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
  }
  function showPosition(position) {
    x.innerHTML = "Latitude: " + position.coords.latitude + 
    "Longitude: " + position.coords.longitude;
  }
</script>

  </body>
</html>
