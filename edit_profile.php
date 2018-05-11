<?php 
session_start();
error_reporting(0);
include("localconnect.php");
include("navbar.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>MEDICURE | Profile</title>
</head>
 <body>
 	<?php 
 		if (!isset($_SESSION["username"])) 
 		{
 			echo "<script>alert('Please login');</script>";
 			echo "<script>window.location.href='index.php'</script>";
 		}
 	 ?>
 	
 	<!-- ---------------------------------------------------profile edit block-------------------------------------------- -->
 	<div class="container">
 		<form>
 			<h2><label for="profile">Edit Profile</label></h2>
 			<div class="container" >
						<?php 
							$sltreg="SELECT * from medi_register where email='".$_SESSION["username"]."'";
							$result = mysqli_query($localconnect,$sltreg);
							$row1 = mysqli_fetch_array($result);
							if ($row1["gender"]=='male') 
							{
								?>
									<center><img src="image/man.png" class="img-responsive" alt="profile pic" height="20%" width="20%"><br>
										<br>
								<?php 
							}
							else
							{
								?>
									<center><img src="image/woman.png" class="img-responsive" alt="profile pic" height="20%" width="20%"><br>
	           						<br>
								<?php 
							}
						 ?>
						<!-- <center><img src="image/man.png" class="img-responsive" alt="profile pic" height="20%" width="20%"><br>
           				<h3><?php echo "Profile: ".$_SESSION["username"]; ?></h3> -->
           				<!-- <?php echo $row1["gender"]; ?> -->
						</center>
					</div>

	<div class="form-group">
     <label for="name">Name</label>
     <?php 
     echo "<input type='text' class='form-control' id='exampleInputEmail1' aria-describedby='enameHelp' value='".$row1["name"]."'>";
      ?>
  	</div>
  <div class="form-group">
    <label for="name">Email address</label>
    <?php 
    echo "<input type='email' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp' value='".$row1["email"]."'>";
     ?>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  </div>
  <div class="form-group">
    <label for="gender">Gender</label>
    <?php 
    echo "<input type='text' class='form-control' id='gender' value='".$row1["gender"]."'>";
     ?>
  </div>
  <div class="form-group">
    <label for="contact">Contact</label>
    <?php 
    echo "<input type='text' class='form-control' id='contact' value='".$row1["contact"]."'>";
     ?>
  </div>
  <div class="form-group">
    <label for="dob">Date Of Birth</label>
    <?php 
    echo "<input type='date' class='form-control' id='dob' value='".$row1["dob"]."'>";
     ?>
  </div>
  <!-- <div class="form-group">
    <label for="Password">Old Password</label>
    <input type="password" class="form-control" id="oldPassword" placeholder="Old Password">
  </div>
  <div class="form-group">
    <label for="newPassword">New Password</label>
    <input type="password" class="form-control" id="newPassword" placeholder="New Password">
  </div>
  <div class="form-group">
    <label for="confirmPassword">Confirm Password</label>
    <input type="password" class="form-control" id="cnfPassword" placeholder="Confirm Password">
  </div>
  <button type="submit" class="btn btn-primary">Submit</button> -->
</form>	
<br>
 	</div>
<!-- ------------foter block start------------ -->
    <!-- ------------------------------------footer------------------------------------------ -->
    <div class="container-fluid " style="background:#1B4F72;color: white; ">
        <br><br>
        <div class="container">
                <footer class="text-left text-justify">
            <div class="row ">
                <div class="col-md-3 myCols">
                    <ul>
                    <li><h5><strong>Get started</strong></h5></li>
                        <li><a href="#">Home</a></li>
                        <li><a href="#">Sign up</a></li>
                        <li><a href="#">Downloads</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 myCols">
                    <ul>
                    <li><h5><strong>About us</strong></h5></li>
                        <li><a href="#">Company Information</a></li>
                        <li><a href="contactus.php">Contact us</a></li>
                        <li><a href="#">Reviews</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 myCols">
                    <ul>
                    <li><h5><strong>Support</strong></h5></li>
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Help desk</a></li>
                        <li><a href="#">Forums</a></li>
                    </ul>
                </div>
                <div class="col-sm-3 myCols">
                    <ul>
                    <li><h5><strong>Legal</strong></h5></li>
                        <li><a href="#">Terms of Service</a></li>
                        <li><a href="#">Terms of Use</a></li>
                        <li><a href="#">Privacy Policy</a></li>
                    </ul>
                </div>
            </div>
            <br><br>
        </footer>       
        </div>
    </div>
    <div class="container-fluid text-center text-justify" style="background: #212F3C;padding: 5px;color: white;">
        <p >@ 2018 Copyright Text</p>
    </div>
<!-- -----------------------------------------tooter end------------------------------------- -->
<style>
    .fontlang
    {
        font-family: Verdana,sans-serif;
    }
    ul{
        list-style-type: none;
    }
</style>
<!-- ------------foter block end------------ -->
 </body>
 </html>