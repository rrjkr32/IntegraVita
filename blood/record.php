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

		<section class="width" style="height:500px">
			<aside id="sidebar" class="column-left" style="background-color:crimson">
			<header>
				<img src="images/profile.png" alt="Profile Icon" style="width:70%;height:70%;">
				<a href="../index1.php" class="button2">Sign Out</a>
				<a href="#" class="button2">Change Pic</a>	
				<h2><a href="#">Blood-bank Name</a></h2><!-- Name of the pharmacy using database-->
				<h2>Mr. User Name</h2><!-- Name of the shopkeeper using database-->
			</header>
				
			<nav id="mainnav">
  											<ul>
                            		<li ><a href="index.php">Profile</a></li>
																<li class="selected-item"><a href="record.php">Record</a></li>
                           		  </ul>
			</nav>
			</aside>
	
			
			<section id="content" class="column-right">
                		
				<h1 align="center">
					Update Stock
				</h1>
	    <article>
				
				

							<div class="form-group jumbotron">
								<div class="row">
									<div class="col-sm-6">
				<label for="medname">Blood-group:</label>
				<input type="text" class="form-control" id="medname">
									</div>
									
									<div class="col-sm-3">
										
								
				<label for="Quan">Quantity:</label>
				<input type="number" class="form-control" id="Quan">
										</div>
									<div class="col-sm-3">
										<br>
										<button type="submit" id="Add" class="btn btn-default" onclick="mfunction()">Add</button>
										<button type="submit" id ="delete" class="btn btn-default" onclick="mfunction2()">Delete</button>
									</div>
									
									</div>
								
								<br
								<div id="updation"  style="visibility:hidden ">
								
									<span id="Nunits">
									</span>
										
									<span id="Mname">
									</span>
									<span id="upd">
									</span>
									
								</div>
							
					</div>
		</article>

			
			<div class="footer">
				
				
				<p>&copy; 2015 sitename. <a href="http://zypopwebtemplates.com/">Free CSS Templates</a> by ZyPOP</p>
				</div>
				
				
		</section>

		<div class="clear"></div>

	</section>
	

</body>
</html>
