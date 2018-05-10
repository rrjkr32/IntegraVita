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
	 $usr= $_SESSION['Service'];

	$sql = "SELECT owner_name,o_email,o_contact,shop_name,s_email,address,s_contact,lat,lng FROM pharmacy_info WHERE username='$usr'";
 	$result = $oLink->query($sql);
	$row = $result->fetch_assoc();
?>
<!doctype html>
<html> 
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Billing</title>

<link rel="stylesheet" href="styles.css" type="text/css" />

<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0" />
	<link rel='stylesheet' type='text/css' href='css/style.css' />
	<link rel='stylesheet' type='text/css' href='css/print.css' media="print" />
	<script type='text/javascript' src='js/jquery-1.3.2.min.js'></script>
	<script type='text/javascript' src='js/example.js'></script>
	
	<style type="text/css">

@media print {
  body * {
    visibility: hidden;
  }
  #rprint, #rprint * {
    visibility: visible;
  }
  #rprint {
    position: absolute;
    left: 0;
    top: 0;
  }
	}
    </style>
	

</head>

<body>
	<section>
			<aside id="sidebar" class="column-left" style="background-color:#80B763; border:3px black solid; height:700px">
			<header>
				<img src="images/profile.png" alt="Profile Icon" style="width:70%;height:70%;">
				
					
				
				<a href="../index1.php" class="button2">Sign Out</a>
				<a href="#" class="button2">Change Pic</a>	
				
				<h2><?php echo $row["shop_name"] ?></h2>
				<h2>Mr. <?php echo $row["owner_name"] ?></h2>
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
				
			
			<div id="rprint">
	<div id="page-wrap">
				

		<h1 align="center" style="background-color:black">INVOICE</h1>
		
		<div id="identity">
						<br>
            <textarea id="address"><?php echo $row['address'];?> 
						<?php echo $row['s_contact'];?>
						</textarea>
		</div>
		
		<div style="clear:both"></div>
		
		<div id="customer">


            <textarea id="customer-title"><?php echo $row['shop_name']?></textarea>
		</div>
		
		<table id="items">
		
		  <tr style="background-color:black;">
		      <th style="background-color:black;">Item</th>
		      <th style="background-color:black;">Unit Cost</th>
		      <th style="background-color:black;">Quantity</th>
		      <th style="background-color:black;">Price</th>
					<th style="background-color:black;">Options</th>

		  </tr>
	
		  <tr class="item-row">
		      <td class="item-name"><div class="delete-wpr"><textarea>Item Name</textarea><a class="delete" href="javascript:;" title="Remove row">X</a></div></td>
		      <td><textarea class="cost">INR0.0</textarea></td>
		      <td><textarea class="qty">0</textarea></td>
		      <td><span class="price">INR0</span></td>
				<td><input type="button" class="button2" value="Confirm" ></td>

		  </tr>
		  
		  <tr id="hiderow">
		    <td colspan="5"><a id="addrow" href="javascript:;" title="Add a row">Add a row</a></td>
		  </tr>
		  
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Subtotal</td>
		      <td class="total-value"><div id="subtotal">INR0.00</div></td>
		  </tr>
		  <tr>

		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Total</td>
		      <td class="total-value"><div id="total">INR0.00</div></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line">Amount Paid</td>

		      <td class="total-value"><textarea id="paid">INR0.00</textarea></td>
		  </tr>
		  <tr>
		      <td colspan="2" class="blank"> </td>
		      <td colspan="2" class="total-line balance">Balance Due</td>
		      <td class="total-value balance"><div class="due">INR0.00</div></td>
		  </tr>
		
		</table>
		
		<div id="terms">
		  <h5>Terms</h5>
		  <textarea>NET 30 Days. Finance Charge of 1.5% will be made on unpaid balances after 30 days.</textarea>
		</div>
	
	</div>
		</article>

			
		</section>

		<div class="clear"></div></div>

	</section>
	

</body>
</html>
