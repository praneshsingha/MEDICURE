 <?php 
session_start();
error_reporting(0);
include("localconnect.php");
include("navbar.php");
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>MEDICURE | medicine</title>
</head>
<body>
 	<!-- ---------------------------------------------------------medicines start------------------------------------------ -->
				<!-- ---------------------------------medicine table-------------------------- -->
<div class="container" style="background-color: white;min-height: 350px;">
	<br><br>
	<div class="row text-center">
			<?php
            if (isset($_GET["sort"])) 
            {
                # code...
             $sort = $_GET["sort"];
                $sltmed = "SELECT * from medicine WHERE category = '$sort'";
                $result2 = mysqli_query($localconnect,$sltmed);
                $m_id;
                while ($row2 = mysqli_fetch_array($result2)) 
                {
                    echo "<div class='col-md-4' style='height:160%'>";
                    $m_id = $row2["m_id"];
                    $table = 'medicine';
                    echo "<img src='".$row2["image"]."' width='200px' height='200px'>";
                    echo "<br>";
                    echo "<a href='medicure.php?mid=$m_id' target='blank'>".strtoupper($row2["m_name"])."</a>";
                    echo "</div>";
                }
            }
			?>
	</div>
</div>
<br><br>
 	<!-- ------------------------------medicines table end-------------------------------------- -->

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
    a{
    	text-decoration:none;
    }
    a:hover{
    	text-decoration:none;
    }
</style>
</body>
</html>