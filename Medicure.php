<?php 
session_start();
error_reporting(0);
include("localconnect.php");
include("navbar.php");
 ?>
 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Medicure </title>
    <?php 
    if (!isset($_GET["mid"])) 
    {
        header("index.php");
    }
    $title="";
       if (isset($_GET["mid"])) 
            {
                $mid = $_GET["mid"];
                $sltmed = "SELECT * from medicine WHERE m_id='$mid'";
                $result2 = mysqli_query($localconnect,$sltmed);
                if ($row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC)) 
                {
                    $title=$row2["m_name"];
                }
                else
                {
                    echo mysqli_error($localconnect);
                }
            }
            else
            {
                // echo "mid not set";
            }
     ?>
 </head>
 <body>
    <!-- ------------------------------------------start medicine block----------------------------------------- -->
    <br><br>
<div class="container-fluid">
    <div class="row" style="">
        <div class="col-md-4 offset-md-1" style="background-color: white;min-height: 300px;">
                <?php 
            if (isset($_GET["mid"])) 
            {
                $mid = $_GET["mid"];
                $sltmed = "SELECT * from medicine WHERE m_id='$mid'";
                $result2 = mysqli_query($localconnect,$sltmed);
                if ($row2 = mysqli_fetch_array($result2,MYSQLI_ASSOC)) 
                {
                    echo "<img src='".$row2["image"]."' class='img-responsive' alt='image' width='350px' height='350px'>";
                    $title=$row2["m_name"];
                }
                else
                {
                    echo mysqli_error($localconnect);
                }
            }
            else
            {
                // echo "mid not set";
            }
         ?>
        </div>
        <div class="col-md-6 offset-md-1" style="min-height: 300px;">
            <h2 class="text-left"><?php echo strtoupper($row2["m_name"]) ; ?></h2>
            <hr>
        <?php 
            echo "<table class='table no-border'>";
            echo "<tr >";
                echo "<td><b><h3>Rs:</h3></td>";
                echo "<td><h3>".$row2["m_cost"]."</h3></b></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td><b>Description:</b></td>";
                echo "<td>".$row2["m_desc"]."</td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td></td>";
                echo "<td></td>";
            echo "</tr>";
            echo "<tr>";
                echo "<td><b>Composition:</b></td>";
                echo "<td>".$row2["m_comp"]."</td>";
            echo "</tr>";
            echo "</table>";   
            echo "<hr>";
            echo "<table class='table no-border'>";
            echo "<tr>";
                echo "<td><b>Quantity:</b></td>";
                echo "<form action='medicinecrt.php' method='GET'>";
                if ($row2["quentity"]<=0) 
                {
                    echo "<td><input type='number' value='0' class='col-md-2' disabled></td>";
                }
                else
                {
                    echo "<td><input type='number' value='1' class='col-md-2' name='itmqty'></td>";
                }

            echo "</tr>";
            echo "<tr>";
                echo "<td><b>Available quentity:</b></td>";
                if ($row2["quentity"]<=0) {
                echo "<td style='color:red;'>Item not available</td>";
                }
                else
                {
                    echo "<td style='color:green'>Item available</td>";
                }
            echo "</tr>";
            echo "<tr>";
                echo "<td><b><h3>Add to wish list</h3></b></td>";
                echo "<td></td>";
            echo "</tr>";
            echo "<tr>";
            echo "<input type='hidden' value='$mid' name='mid'>";
            echo "<input type='hidden' value='$table' name='table'>";
            if ($row2["quentity"]<=0) 
            {
                echo "<td colspan='2'><b>
                <input type='submit' class='btn btn-primary' style='width:200px;' disabled value='Item Unablable'></b></td>";
            }
            else
            {
                echo "<td colspan='2'><b>
                <input type='submit' class='btn btn-primary' name='submit' id='submit' style='width:200px;' value='Add to cart'></b></td>";
            }
            echo "</form>";
            echo "</tr>";
            echo "</table>";
            
         ?>
        </div>
    </div>
</div>
<br>
<hr>
<br>
<?php 
    
 ?>
 	<!-- ------------------------------------------footer block start----------------------------------------- -->
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
    td
    {
        padding: 0px;
    }
    .table.no-border tr td, .table.no-border tr th 
    {
        border-width: 0;
    }
</style>
 </body>
 </html>
