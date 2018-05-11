<?php 
session_start();
include("localconnect.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" type="image/x-icon" href="icon/hospital.png" />
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<!-- footer -->	
	<!-- footer end -->
	<script src="javapage.js" type="text/javascript">
	</script>

	<title>MEDICURE | HOME</title>
</head>
<body>
	<!-- ----------------------------------------------------log and reg div start--------------------------------------- -->
	

					<div class="col-md-6 loginblock" style="margin-top: 0%;">
						<br>
						  	<ul class="nav nav-tabs" role="tablist">    <!-- #089de3 -->
						    <li class="nav-item" >
						      <a class="nav-link active" data-toggle="tab" href="#home">Login</a>
						    </li>
						    <li class="nav-item">
						      <a class="nav-link" data-toggle="tab" href="#menu1">Register</a>
						    </li>
						    <li class="nav-item">
						      <a class="nav-link" href="index.php">Home</a>
						    </li>
						  </ul>
						  <!-- Tab panes -->
						  <div class="tab-content">
						    <div id="home" class="container tab-pane active"><br>
						      <div class="w3-card-4">
								  <div class="w3-container" style="background: #0C479D; color: white;">
								    <h2>Login </h2>
								  </div>
								  <!-- login form -->
								  <form class="w3-container" action="login.php" method="POST">
								    <p>  
								    <br>    
								    <!-- <label class="w3-text-black"><b>Email</b></label> -->
								    <input class="w3-input" name="log_email" placeholder="Email" type="email" required></p>
								    <p>
								    <!-- <label class="w3-text-black"><b>Password</b></label> -->
								    <input class="w3-input" placeholder="Password" name="log_pass" type="password" required></p>
								    <p>	
								    	<br>
								    <button class="w3-btn" type="submit" id="log_submit" name="log_submit" style="background: #0C479D; color: white">Login</button></p>
								  </form>
								</div>
						    </div>
						    <div id="menu1" class="container tab-pane fade" style="min-height: 600px;"><br>
						      <!-- Registration form -->
						        <div class="w3-card-4">
							    <div class="w3-container" style="background: #0C479D; color: white;">
							      <h2>Registraion</h2>
							    </div>
							    
<!-- -----------------------------------------------------register block-------------------------- -->

							    <form class="w3-container" action="medi_reg.php" method="POST" >
							    	<br>
							<input class="w3-input" name="r_name" id="r_name" type="text" placeholder="Your Name" required>
							   	<br>
							<input class="w3-input" name="r_email" id="r_email" type="email" placeholder="Email" required>
							    <br>
							<select name="r_gender" id="r_gender" class="w3-input">
								<option value="male">Male</option>
								<option value="female">Female</option>
								<option value="other">Other</option>
							</select>
							<br>
							<input class="w3-input" name="r_contact" id="r_contact"  type="text" placeholder="Contact" required maxlength="10" minlength="10">
														    <br>
							<input class="w3-input" name="r_dob" type="date" id="r_dob" placeholder="DOB" required>
														    <br>
								<input class="w3-input" name="r_password" type="password" id="r_password" placeholder="Password" required>
														    <br>						    
					<input class="w3-input" name="r_repassword" type="password" id="r_repassword" placeholder="Re-Enter Password" required>
														    <br>
							<button class="w3-btn" style="background: #0C479D; color: white" id="r_submit" name="r_submit" type="submit">Register</button></p>
							    </form>
							  </div>
							<!-- ------------------------------registration form end--------------------------------- -->
						    </div>  
						  </div>
						</div>
					</div>

</body>
</html>
<style>
body
{
	min-width: 100px;
    min-height: 650px; 
    background-image: url("image/loginview3.jpg");
    background-position: center;
    background-repeat: no-repeat;
    background-size: cover;
    background-attachment: fixed;
    left: 0;
  	right: 0;
  	z-index: 1;
}
</style>