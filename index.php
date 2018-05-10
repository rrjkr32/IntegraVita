<?php
	include 'Map/config.php';
	
	//connect to db
  	$con = new mysqli($host, $user, $pswd,$db);// or die("Can't connect to MySQL server!");
	//mysql_select_db($db) or die("Can't select database!");
	
	if(!$con)
	{
		die("Connection failed:".mysqli_connect_error());
	}
	$flag=0;
	$flag1=0;
?>
<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>IntegraVita Health Care</title>


    <!-- --------------------Bootstrap File CSS ------------------------ -->
    <link rel='stylesheet' id='regina-bootstrap-style-css' href='https://demos.machothemes.com/wp-content/themes/regina-pro/assets/css/bootstrap/bootstrap.min.css'type='text/css' media='all' />
    <!-- --------------------CSS for the Page   ------------------------ -->
    <link rel='stylesheet' id='regina-main-style-css' href='https://mk0machothemesd4sa77.kinstacdn.com/wp-content/themes/regina-pro/assets/css/styles.min.css'type='text/css' media='all' />
    <!-- --------------------CSS for the item at the begining of the page ----- -->
    <link rel='stylesheet' id='pace-center-atom-css-css' href='https://mk0machothemesd4sa77.kinstacdn.com/wp-content/themes/regina-pro/assets/css/pace/pace-center-atom.css'type='text/css' media='all' />
    <!-- -------------------- CSS for the fading transition in the begining of loading of the page ------ -->
    <link rel='stylesheet' id='regina-style-css' href='https://mk0machothemesd4sa77.kinstacdn.com/wp-content/themes/regina-pro/style.css'type='text/css' media='all' />
    <!------- jquery.js file ---- -->
    <script type='text/javascript' src='https://mk0machothemesd4sa77.kinstacdn.com/wp-includes/js/jquery/jquery.js'></script>

    <!-- ================================================================================= -->
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
		<link rel="stylesheet" href="assets/css/form-elements.css">
        <link rel="stylesheet" href="assets/css/style.css">

    <!-- ================================================================================= -->
<style>
	#signup {text-decoration: none;}
    #signup:hover {text-decoration: underline;}
	#signup {text-align:center;cursor:pointer};
	</style>
</head>
<body >
								<!----------------------php for login-------------------------------------------------------------->
				<?php
						if($_SERVER["REQUEST_METHOD"]=="POST"){
							if( isset( $_POST['usr'] ) ){
									$usr=$_POST['usr'];
									$passwd=$_POST['passwd'];
								//do query and find if there is any data whose username ==$usr and password== $passwd and do flag =1 if found
									$sql = "SELECT username, password,type FROM login WHERE username = '$usr'";
									$result = mysqli_query($con,$sql);
									$rows =mysqli_fetch_assoc($result);
								
									if($rows!=null && $rows["password"]==$passwd) {
											$flag=1; 
											$stype= $rows["type"];
										
											echo "Successful Logged in!";
									}
								else if	($rows["username"]==$usr) 
											echo "<br> Please enter correct password!";
								else 
											echo "<br> User not registered! <br> Please SignUp to our database! ";
								//echo "<br>";
								//echo json_encode($rows);

								
								if($flag==1){
									session_start();
									$_SESSION['Service'] = $usr;
									if($stype == 'pharmacy_info' )
										header("Location: Medical/index.php");
									else if($stype == 'blood_bank' )
										header("Location: blood/index.php");
									else if($stype == 'doctor' )
										header("Location: Doctor/index.php");
									else if($stype == 'diagonsis' )
										header("Location: Diagnostic/index.php");
									//enter the else condition for Pharmacy!!!!
								}
								else{
									$flag=2;
								}
							}
							//<!-- ================ Sign Up ============= -->
							if( isset( $_POST['new_usr'] ) ){
									 $new_usr=$_POST['new_usr'];
									 $new_passwd=$_POST['new_passwd'];
									 $stype=$_POST['stype'];
								
								   if($stype == 'Medicine' )
										   $stype = 'pharmacy_info';
									 else if($stype == 'Blood Bank' )
										   $stype = 'blood_band';
									 else if($stype == 'Doctor' )
										   $stype = 'doctor';
									 else if($stype == 'Pharmacy' )
									   	 $stype = 'pharmacy'	;
								
								//sql query to check if username exists or not----
									$sql1 = "SELECT username FROM login WHERE username = '$new_usr'";
									$result1 = mysqli_query($con,$sql1);
									$rows1 =mysqli_fetch_assoc($result1);
								
									if($rows1==null) {
											$flag1=1; 
											//sql query to add user to pharmacy_info....
										$sql2 = "INSERT INTO login (username, password, type) VALUES ('$new_usr', '$new_passwd', '$stype')";

										if (mysqli_query($con, $sql2)) {
   										 echo  "You have Successfully Signed Up! <br> Please Login Now to continue";
										}	

											//sql query to create table with name $new_usr...
										if($stype=="pharmacy_info"){
											$sql3 = "CREATE TABLE $new_usr (medicine_name varchar(255), quantity int, price float)";
										 	if (mysqli_query($con, $sql3)) {
    										//	echo "<br> 2.Table $new_usr created successfully!";
											} 
											else {
    										//echo "2.Error creating table: " . mysqli_error($con);
											}
										}
									}
									else 
											echo "User already exits! <br> Please use another username!";
								//echo "<br>";
								//echo json_encode($rows);

								/*
								if($flag1==1){
									session_start();
									$_SESSION['NewSevice'] = $new_usr;
									if($stype == 'pharmacy_info' )
										header("Location: Medical/index.php");
									else if($stype == 'blood_bank' )
										header("Location: blood/index.php");
									else if($stype == 'doctor' )
										header("Location: Doctor/index.php");
									//enter the else condition for Pharmacy!!!!
								}
								else{
									$flag1=2;
								}*/
							}
						}
					?>


<!-- Site Preloader -->
<div id="page-loader">
	<div class="page-loader-inner">
		<div class="loader">
			
		</div>
	</div>
</div>
<!-- END Site Preloader -->

<header id="header" style="min-height: 10px;">
	<div class="container" style="line-height: 65px;">
		<div class="row">

			<div class="col-lg-3 col-sm-12">
				<div id="logo">
					<!--<a href="#"><img src="http://thyblackman.com/wp-content/uploads/2018/02/healthcare.png" width="174" alt="IntegraVita"></a> -->
					<h1 style="color:#08cae8;font-family:Impact;font-size:50px;text-shadow:2px 2px Pale-Blue;font-style:bold;">IntegraVita</h1>
				</div>
			</div>

			<div class="col-lg-9 col-sm-12">
				<nav id="navigation">
					<ul class="main-menu" style="line-height: 65px;">
						<li><a href="#home" ><strong >Home</strong></a></li>
						<li><a href="#about"><strong>About</strong></a></li>
						<li><a href="#services"><strong>Services</strong></a></li>
						<li><a href="#contact"><strong>Contact</strong></a></li>
						<li><a href="#" class=" launch-modal" data-modal-id="modal-login" ><span class="nc-icon-glyph users_single-01 "></span><strong>Seller Login</strong></a></li>	
					</ul>
				</nav><!--#navigation-->
			</div><!--.col-lg-9-->
		</div><!--.row-->
	</div><!--.container-->
</header><!--#header-->


	<section class="homepage-section">
        <!-- Images  Background Slider ----- -->
		<div id="home-slider" class="clear">
            <ul class="bxslider clear"> 
                <li><img src="https://mk0machothemesd4sa77.kinstacdn.com/wp-content/uploads/sites/9/2016/08/computer-1149148_1920.jpg" alt=""></li>
                <li><img src="http://aitcofficial.org/wp-content/uploads/2015/03/Blood-Bank.jpg" alt=""></li>
                <li><img src="https://i.ytimg.com/vi/nYeNPZHtb4A/maxresdefault.jpg" alt=""></li>
            </ul>
            <div class="clear">   
            </div>
        </div>
        <!--#home-slider Ends-->
        <!-- The Blue Intro Box ----- -->
		<div class="container" id="about">
				<div class="row">
					<div class="col-lg-8 col-md-12 col-lg-offset-2">
						<div id="call-out" class="clear">
								<h1>We help people, like you.</h1>
								<div>
									IntegraVita on its own can be elaborated to Integral Vitality,In times when you need us ,we would be happy to assist you with our services. Getting the right information about where to go 
									in case of medical emergencies be it the awareness about the nearby medical stores to Doctors available near you, we provide all at IntegraVita<br>
						   <br>
						</div><!--#call-out-->
					</div><!--.col-md-8-->
				</div>
            </div>
	</section>


    <!-- large icons section   -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <div class="section-info">
                        <h2>Why choose us?</h2><hr>
                        <p>We offer four services for healthcare assistance       </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div id="services-block" class="text-center home content-block">
                    <div class="col-lg-3 col-sm-6">
                        <div class="service launch-modal" data-modal-id="modal-service1">
                            <div class="icon  launch-modal" data-modal-id="modal-service1">
                                <a href="#" class="link"><span class="nc-icon-outline health_pill-container-47"></span></a> 
                            </div> 
                            <h3>MEDICINES</h3>
                            <p>Find the near by stores from where you can buy the medicine you need</p><br>
                            <a href="#" class="link small">Search <span class="nc-icon-glyph arrows-1_bold-right"></span></a>
                        </div><!--.service-->
                    </div><!--.col-lg-3-->
            
                    <div class="col-lg-3 col-sm-6">
                        <div class="service launch-modal" data-modal-id="modal-service2">
                            <div class="icon launch-modal" data-modal-id="modal-service2">
                                <a href="#" class="link"><span class="nc-icon-outline ui-1_drop"></span></a> 
                            </div> 
                            <h3>BLOOD </h3>
                            <p>Find the blood bank that immediately provides you with blood in case of emergency</p><br>
                            <a href="#" class="link small">Search <span class="nc-icon-glyph arrows-1_bold-right"></span></a>
                        </div><!--.service-->
                    </div><!--.col-lg-3-->
                    <div class="col-lg-3 col-sm-6">
                        <div class="service launch-modal" data-modal-id="modal-service3">
                            <div class="icon launch-modal" data-modal-id="modal-service3">
                                <a href="#" class="link"><span class="nc-icon-outline health_doctor"></span></a> 
                            </div> 
                            <h3>DOCTOR </h3>
													<p>Find and fix an appointment with a doctor based on the speciality you need</p><br> <a href="#" class="link small">Search<span class="nc-icon-glyph arrows-1_bold-right"></span></a>
                        </div><!--.service-->
                    </div><!--.col-lg-3-->
                    <div class="col-lg-3 col-sm-6">
                        <div class="service launch-modal" data-modal-id="modal-service4">
                            <div class="icon launch-modal" data-modal-id="modal-service4">
                                <a href="#" class="link"><span class="nc-icon-outline health_heartbeat-16"></span></a> 
                            </div> 
                            <h3>DIAGNOSTICS</h3>
                            <p>Find the diagnotics center near you to undergo the adviced diagnostics tests</p><br>
                            <a href="#" class="link small">Search<span class="nc-icon-glyph arrows-1_bold-right"></span></a>
                        </div><!--.service-->
                    </div><!--.col-lg-3-->
                    <div class="clear">
                    </div>
                </div>
            </div>
        </div>
    </section>
     <!-- ============================================Form for each services============================================ -->
             
     <!-- ===============Service 1============== -->
		<div id="services">
     <div class="modal fade" id="modal-service1">
            <div class="modal-dialog">
                <div >
                    
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>
                        <h3 class="modal-title" id="modal-register-label">MEDICINE SEARCH</h3>
                        <p style="width: 529px;">Form for medicines</p>
                    </div>
                    
                    <div class="modal-body">
                        
                        <form role="form" action="./Map/StoreLocator.php" method="post" class="registration-form">
                            <div class="form-group">
                                <label class="sr-only" >Your Name</label>
                                <input type="text" name="name" placeholder="Name..." class=" form-control" id="name" required>
                            </div>
													<div class="form-group">
                                <label class="sr-only" >Your Adress</label>
                                <input type="text" name="add" placeholder="Your Address..." class=" form-control" id="add" required>
                            </div>
                            
                            <div class="form-group">
                                    <label class="sr-only">Medicine Name</label>
                                    <input type="text" name="med_name" placeholder="Medicine Name..." class=" form-control" id="med_name" required>
                            </div>
                            <div class="form-group">
                                <label class="sr-only">Quantity Required</label>
                                <input type="number" name="quantity" placeholder="Quantity..." class=" form-control" id="quantity" required>

                            </div>
                            <button type="submit" class="btn">Find Medicine Shops Near ME!</button>
                        </form>
                        
                    </div>
                    
                </div>
            </div>
        </div>

        <!-- ===============Service 2============== -->
        <div class="modal fade" id="modal-service2">
                <div class="modal-dialog">
                    <div >
                        
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                            </button>
                            <h3 class="modal-title" id="modal-register-label">BLOOD GROUP SEARCH</h3>
                            <p style="width: 529px;">Form for Blood Group</p>
                        </div>
                        
                        <div class="modal-body">
                            
                            <form role="form" action="./Map/BBLocator.php" method="post" class="registration-form">
                                <div class="form-group">
                                    <label class="sr-only">Your Name</label>
                                    <input type="text" name="name" placeholder="Name..." class="form-control" id="name" required>
                                </div>
															<div class="form-group">
                                <label class="sr-only" >Your Adress</label>
                                <input type="text" name="add" placeholder="Your Address..." class=" form-control" id="add" required>
                            </div>
                            
                                <div class="form-group">
                                    <label >Blood Group</label>
																		<!--<input type="text" name="bg" placeholder="Required Blood Group..." class=" form-control" id="bg" required>
                        -->           <select  name="bg" class="form-control" id="bg" required>
																			<option value="Ap">A+</option>
																			<option value="An">A-</option>
																			<option value="ABp">AB+</option>
																			<option value="ABn">AB-</option>
																			<option value="Op">O+</option>
																			<option value="On">O-</option>
																			<option value="Bp">B+</option>
																			<option value="Bn">B-</option>
																		</select>
                                </div>
                                <div class="form-group">
                                        <label class="sr-only">Unit Needed</label>
                                        <input type="number" name="unit" placeholder="Amount of Unit needed" class="form-control" id="unit" required>
                                </div>
                                
                                <button type="submit" class="btn">Search the Blood group near me!!!</button>
                            </form>
                            
                        </div>
                        
                    </div>
                </div>
            </div>

        <!-- =============================Service 3================= -->
        <div class="modal fade" id="modal-service3">
                <div class="modal-dialog">
                    <div >
                        
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                            </button>
                            <h3 class="modal-title" id="modal-register-label">DOCTOR SEARCH</h3>
                            <p style="width: 529px;">Form for Doctor</p>
                        </div>
                        
                        <div class="modal-body">
                            
                                <form role="form" action="./Map/DDLocator.php" method="post" class="registration-form">
                                    <div class="form-group">
                                        <label class="sr-only">Your Name</label>
                                        <input type="text" name="name" placeholder="Name..." class="form-control" id="name" required>
                                    </div>
																	<div class="form-group">
                                <label class="sr-only" >Your Address</label>
                                <input type="text" name="add" placeholder="Your Address..." class=" form-control" id="add" required>
                            </div>
                            
                                    <div class="form-group">
                                    <label >Speciality</label>
                                    <select  name="speciality" class="form-control" id="speciality" required>
																			<option value="Surgeon">Surgeon</option>
																			<option value="Cardiologist">Cardiologist</option>
																			<option value="Physician">Physician</option>
																			<option value="Neurologist">Neurologist</option>
																			<option value="Dentist">Dentist</option>
																		</select>
                                </div>
                                    <div class="form-group">
                                            <label class="sr-only">Problem Description</label>
                                            <textarea name="prob" placeholder="Describe the health problem you are facing..." 
                                                        class="form-control" id="prob"></textarea>
                                        </div>
                                    <button type="submit" class="btn">Find Doctor!!!</button>
                                </form>
                                
                        </div>
                        
                    </div>
                </div>
            </div> 
            
        <!-- =============================Service 4================= -->
        <div class="modal fade" id="modal-service4">
                <div class="modal-dialog">
                    <div >
                        
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">
                                <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                            </button>
                            <h3 class="modal-title" id="modal-register-label">DIAGNOSTIC SEARCH</h3>
                            <p style="width: 529px;">Form for Diagnostic</p>
                        </div>
                        
                        <div class="modal-body">
                            
                                <form role="form" action="./Map/DILocator.php" method="post" class="registration-form">
                                    <div class="form-group">
                                        <label class="sr-only">Your Name</label>
                                        <input type="text" name="name" placeholder="Name..." class="form-control" id="name" required>
                                    </div>
																	<div class="form-group">
                                <label class="sr-only" >Your Address</label>
                                <input type="text" name="add" placeholder="Your Address..." class=" form-control" id="add" required>
                            </div>
                            
                                   <div class="form-group">
																			<label >Diagnistic Test type</label>
																			<select  name="test" class="form-control" id="test" required>
																			<option value="urine test">Urine Test</option>
																			<option value="blood test">Blood Test</option>
																			<option value="x-ray">X-Ray</option>
																			<option value="CT scan">CT Scan</option>
																			<option value="ultrasound">Ultrasound</option>
																			</select>
                                </div>
                                    <button type="submit" class="btn">Find the needed Diagnostic Service near me!!!</button>
                                </form>
                                
                            </div>
                        
                    </div>
                </div>
            </div> 
		</div>
					<!-- ======================== Login =========================== -->
						<div class="modal fade" id="modal-login">
            <div class="modal-dialog">
                <div >
                    
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>
                        <h3 class="modal-title" id="modal-register-label">Seller Login</h3>
                        <p style="width: 529px;">Login to Your Online Inventory</p>
                    </div>
                    
                    <div class="modal-body">
                        
                        <form role="form" action="" method="post" class="registration-form">
                            <div class="form-group">
                                <label class="sr-only" >Username</label>
                                <input type="text" name="usr" placeholder="Username" class=" form-control" id="usr" required>
                            </div>
                            
                            <div class="form-group">
                                    <label class="sr-only">Password</label>
                                    <input type="password"placeholder="Password" name="passwd" class=" form-control" id="passwd" required>
                            </div>
                            
                            <button type="submit" class="btn">Seller Login</button>
													<div class="form-group">
													<a id ="signup" class="launch-modal" data-modal-id="modal-signup">
														Or SignUp With Us!
													</a>
													</div>
                        </form>
                        
                    </div>
                    
                </div>
            </div>
        </div>
	<!-- ======================== Signup =========================== -->
	
						<div class="modal fade" id="modal-signup">
            <div class="modal-dialog">
                <div >
                    
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">
                            <span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
                        </button>
                        <h3 class="modal-title" id="modal-register-label">Sign UP With Us</h3>
                        <p style="width: 529px;">SignUp to Create Your Online Inventory</p>
                    </div>
                    
                    <div class="modal-body">
                        
                        <form role="form" action="" method="post" class="registration-form">
                            <div class="form-group">
                                <label class="sr-only" >Username</label>
                                <input type="text" name="new_usr" placeholder="Username" class=" form-control" id="usr" required>
                            </div>
                            
                            <div class="form-group">
                                    <label class="sr-only">Password</label>
                                    <input type="password"placeholder="Password" name="new_passwd" class=" form-control" id="passwd" required>
                            </div>
													 <div class="form-group">
																			<label >Service Type</label>
																			<select  name="stype" class="form-control" id="stype" required>
																				<option>Medicine</option>
																				<option>Blood Bank</option>
																				<option>Doctor</option>
																				<option>Diagnostic</option>
																			</select>
                            </div>
                            
                            <button type="submit" class="btn">Click To SignUp with Us!</button>
                        </form>
                        
                    </div>
                    
                </div>
            </div>
        </div>
		<div class="footer" id="contact">
			<footer>
				<h4>Contact Us:</h4>
				<p>IntegraVita </p>
				<p>+919876542133</p>
				<p><a href="#">www.integravita.co.in/FAQ</p>
			</footer>
		</div>


<script type='text/javascript' src='https://mk0machothemesd4sa77.kinstacdn.com/wp-content/themes/regina-pro/assets/js/plugins/bxslider/bxslider.min.js'></script>
<script type='text/javascript' src='https://mk0machothemesd4sa77.kinstacdn.com/wp-content/themes/regina-pro/assets/js/pace/pace.min.js'></script>
<script type='text/javascript' src='https://mk0machothemesd4sa77.kinstacdn.com/wp-content/themes/regina-pro/assets/js/preloader.min.js'></script>
<script type='text/javascript'>var regina = {"ajax_url":"https:\/\/www.demos.machothemes.com\/regina-pro\/wp-admin\/admin-ajax.php","autoplay":"","speed":"500","pause":"4000"};</script>
<script type='text/javascript' src='https://mk0machothemesd4sa77.kinstacdn.com/wp-content/themes/regina-pro/assets/js/custom.min.js'></script>

<!-- Javascript -->
<script src="assets/js/jquery-1.11.1.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/jquery.backstretch.min.js"></script>
<script src="assets/js/scripts.js"></script>
</body>
</html>
