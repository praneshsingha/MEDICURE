<?php 
session_start();
error_reporting(0);
include("localconnect.php");
include("navbar.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<script src="javapage.js" type="text/javascript">
	</script>
	<title>MEDICURE | HOME</title>
</head>
<body>			
	<div id="home_img">
		<br>
		<div class="container-fluid">
			<h1 class="display-2" style="margin-left: 12px;"><b>MEDICURE</b></h1>
			<div class=""></div>
			<div class="container-fluid">
				<div class="row">
					<strong><p class="col-md-6 text-justify" style="color: #154360;background: red;">
						<!-- -------------------------Home text here--------------------------- -->
						<h1 class="display-4">SIMPLE AND EASY</h1>
						<h1 class="display-4">QUICK DELIVERY PROCESS</h1>
						<!-- -------------------------Home text end  here--------------------------- -->
						</strong>
						<br><br><br><br>
					</p>
					<div class="col-md-5 offset-md-1">
						
						<br><br><br><br><br><p ><h4 style="color:#154360;" class="text-justify">
							MADICURE.COM’S function, is user-friendly with the user, its very simple to use. User can search medicines from search bar and also from the menu bar where we have listed all the medicines types along with category, so the user can search medicines manually. They can also filter medicine from the search list as per tablet, liquid or injection. Even our ordering process is smooth. User can easily order any medicine only as per the prescription. We provide the brief details about the product, so the user can see the necessary details about the medicine, such as composition of medicine, expiry date of the medicine, price, mfg date, quantity etc.
						</h4></p>
					</div>
			
<!-- -----------------------------------------------login and reg div end--------------------------------------------- -->
				</div>
			</div>
		</div>
	</div>
	<br><br><br>
	<!-- -----------------------------------benifits of website block start----------------------- -->
	<div class="container-fluid" style="color: #21618C;">
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<img src="image/benifits.png" alt="benifits" class="img-responsive" style="">
				</div>
				<div class="col-md-7 offset-md-2">
					<br><br>
					<h2 style="font-size: 25px;font-family: Raleway,Arial,sans-serif"><label for="benifits">BENIFIT'S OF OUR WEBSITE</label></h2>
					<ul style="padding: 4px;background: ;">
						<li><strong>->EASY TO ORDER AND TRACK</strong></li>
						<ul>
							<li>Order and track your medicines in 3 simple steps</li>
						</ul>
						<li><strong>->FREE HOME DELIVERY FOR ALL ORDERS*</strong></li>
						<ul>
							<li>Normal delivery charges shall apply for orders below INR 100</li>
						</ul>
						<li><strong>->DELIVERY WITHIN 24 TO 48 HOURS*</strong></li>
						<ul>
							<li>Fastest delivery within 24 to 48 Hours</li>
						</ul>
						<li><strong>->ASSURED SAVINGS EVERY TIME</strong></li>
						<ul>
							<li>Assured discounts on all orders. Current discount of 20 % on first order and all subsequent orders.</li>
						</ul>
						<li><strong>->BEST-IN-CLASS EXPERIENCE</strong></li>
						<ul>
							<li>Medicines dispensed by qualified Pharmacists and delivered by highly trained delivery agents in a tamper proof aesthetically designed reusable box.</li>
						</ul>
					</ul>
				</div>
			</div>	
		</div>
	</div>
	<br>
	<hr>
	<br>
	<!-- ---------------------------------------------Benifits of website end block---------------------------------------------- -->
	<div class="container-fluid">
		<div class="row">
			 <div class="col-md-4">
			 	
			 </div>
		</div>	
	</div>
	<!-- ---------------------------------------------How does it works---------------------------------------------- -->
<div class="container-fluid" style="background: #ECF0F1;min-height: 400px;">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<br><br>
				<p style="font-size: 25px;" class="text-center">HOW DOES IT WORK'S</p>
				<div class="condivtainer">
					<div class="row">
						<div class="col-md-4">
							<img src="image/howdoes.png"  class="img-fluid img-responsive mx-auto d-block" alt="" width="50%" height="90%">
							<div>
							<p class="text-center">You upload the prescription image</p>
							</div>
						</div>
						<div class="col-md-4">
							<img src="image/prescription.png" class="img-fluid img-responsive mx-auto d-block" alt="" width="50%" height="80%">
							<div>
								<p class="text-center">We collect the prescription from your address (mandatory)</p>
							</div>
							
						</div>
						<div class="col-md-4">
							<img src="image/box.png" class="img-fluid img-responsive mx-auto d-block" alt="" width="50%" height="90%">
							<div>
								<p class="text-center">We deliver medicines along with your prescription</p>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<br><hr><br>
	<!-- ---------------------------------------------How does it worls block end---------------------------------------------- -->
<div class="container-fluid">
	<div class="row">
		<div class="col-md-8 text-center">
			<h3><p> Upload prescription to order</p></h3>
			<p>If you have a prescription, you can upload it to place your first order.</p>
			<form action="index.php" method="POST" enctype="multipart/form-data">
			<td><input type="file" name="image" id="image" class="btn btn-primary" required><br><br>
			<input type="submit" value="submit" name="p_submit" class="btn btn-secondary">
			</form>
			<?php 
				$username = $_SESSION["username"];
				if (isset($_POST["p_submit"])) 
				{
					if (isset($_SESSION["username"])) 
					{
						$f_name = $_FILES['image']['name'];
             			$f_temp = $_FILES['image']['tmp_name'];
              			$f_size = $_FILES['image']['size'];
              			$f_shaperate = explode('.',$f_name);
              			$f_extension = strtolower(end($f_shaperate));
              			$f_newfile = uniqid().'.'.$f_extension;
              			$f_store = "pres_images/".$f_newfile;
                    	
              			if (($f_extension =='jpg') || ($f_extension=='jpeg') || ($f_extension=='png')) 
              			{
                  			if($f_size>=5000000)
                  			{
                    			echo "file size overload";
                  			}
                  		
                  			else
                  			{
                    			if(move_uploaded_file($f_temp,$f_store))
                    			{
              						// echo "<script>alert('Image uploaded');</script>";
              						$p_id = uniqid();
						       		$inspres = "INSERT INTO prescription (p_id,u_id,p_file,p_status) 
						       		VALUES ('$p_id','$username','$f_store','verifying')";
						       		if ($localconnect->query($inspres)) 
						       		{
						       			echo "<script>alert('Your prescription has successfully uploded');</script>";
					       				echo "<script>window.location.href='index.php';</script>";
						        	}
						        	else
						        	{
							        	echo mysqli_error($localconnect);
							        }
                    			}
                    			else
                    			{
              						echo "<script>alert('Image did not uploaded');</script>";
                    			}
                    		}
                  		}
              		}
              		else
              		{
              			echo "<script>alert('please login');</script>";
	              		echo "<script>window.location.href='index.php';</script>";
              		}
		       		
	            }
	            else
	            {
	              	
	           	}
			?>
		</div>
		<div class="col-md-4">
			<img src="image/prescription2.png" alt="prescription" width="80%" height="100%">
		</div>
	</div>
</div>
<br>
<hr>
<br>
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
</body>
</html>