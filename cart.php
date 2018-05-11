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
 	<title>Medicure | Cart</title>
 </head>
 <body>
    <!-- ------------------------------------------cart table block start----------------------------------------- -->
    <?php 
        $username = $_SESSION["username"];                                      //username
        $sltcrt = "SELECT * FROM medi_register WHERE email='$username'";
        $result = mysqli_query($localconnect,$sltcrt);
        $row = mysqli_fetch_array($result);
        $cart = $row["cart_nm"];                                                //cart name
        $ordertbl = $row["order_table"];
        $sltcrt2 = "SELECT * FROM $cart";
        $result2 = mysqli_query($localconnect,$sltcrt2);

     ?>
    <div class="container" style="background-color: white;min-height: 435px;">
        <div class="row">
            <div class="col-md-12">
                <h1>Cart</h1>
                <table class="table text-center table-hover">
                    <tbody>
                            <?php
                                $rowcount = mysqli_num_rows($result2);
                                if ($rowcount==0)
                                {
                                    ?>
                                    <div>
                                        <h3 class="text-center">Your cart is empty</h3>
                                    </div>
                                    <?php 
                                }
                                else
                                {
                                    while ($row2 = mysqli_fetch_array($result2)) 
                                    {
                                        $mid = $row2["cartid"];
                                        echo "<tr>";
                                        echo "<td><a href='medicure.php?mid=$mid'>".$row2["iname"]."</a></td>";
                                        echo "<td>".$row2["IPRICE"]."</td>";
                                        echo "<td><a href='cart.php?iid=$mid'>Delete item</a></td>";
                                        echo "<td>
                                        <form action='cart.php' method='GET'>
                                        <input class='col-md-2 ' type='number' name='qty' value='".$row2["QTY"]."'>
                                        <button type='submit' value='$mid' name='submit' class='btn btn-primary'>Add</button>
                                        </form>
                                        </td>";
                                        echo "</tr>";
                                    }
                                }
                                    
                                
                             ?>
                    </tbody>
                </table>
                <hr>
                <?php 
                $order = uniqid();
                echo "<a href='c_address.php?order=".$order."'><button class='btn btn-success'>Place Order</button></a>";
                 ?>
            </div>
        </div>
    </div>
    <?php 
        if (isset($_GET["iid"])) 
        {
            $iid = $_GET["iid"];
            $dltcrt = "DELETE FROM $cart WHERE cartid = '$iid'";
            if ($localconnect->query($dltcrt)) 
            {
                echo "<script>alert('Item deleted');</script>";
                echo "<script>window.location.href='cart.php';</script>";
            }
            else
            {
                echo mysqli_error($localconnect);
            }
        }
        if (isset($_GET["submit"])) 
        {
            // echo "<script>alert('Updated');</script>";
            $mid = $_GET["submit"];
            $quentity = $_GET["qty"];
            $sltmedi = "SELECT * FROM medicine WHERE m_id = '$mid'";
            if ($result3 = $localconnect->query($sltmedi)) 
            {
                $row3 = mysqli_fetch_array($result3);
                $cost = $row3["m_cost"];
                $total = $cost*$quentity;
                $updtcrt = "UPDATE $cart SET QTY = '$quentity',IPRICE = '$total' WHERE cartid = '$mid'";
                if ($localconnect->query($updtcrt)) 
                {
                    echo "<script>alert('item Updated');</script>";
                    echo "<script>window.location.href='cart.php';</script>";

                }
                else
                {
                    echo mysqli_error($localconnect);
                }
            }
        }
     ?>
<hr>
<div class="container-fluid">
<h2 style="color:green;">YOUR PRESCRIPTION'S</h2>
<div class="container">
<div class="row">
<div class="col-md-10">
<table class="table">
<?php 
$sltpres = "SELECT * FROM prescription WHERE u_id = '$username'";
if ($result4 =  $localconnect->query($sltpres)) 
{
    $i=1;
    while ($row4 = mysqli_fetch_array($result4)) 
    {

        echo "<tr>";
        echo "<td>".$i."<img src=".$row4["p_file"]." alt='' class='col-md-3'></td>";
        echo "<td>".$row4["p_status"]."</td>";
        echo "<td><a href=".$row4["p_file"].">View</a></td>";
        echo "</tr>"; 
        $i++;  
    }
}
 ?>
</table>
</div>
</div>
</div>
</div>
<hr>
<div class="container-fluid">
    <table class="table">
        <h3 style="color:green; ">ORDER TABLE</h3>
        <?php 
            $sltodr = "SELECT * FROM $ordertbl";
            if ($result3 = mysqli_query($localconnect,$sltodr)) 
            {
                echo "<tr>";
                echo "<th>NAME</th>";
                echo "<th>QUENTITY</th>";
                echo "<th>PRICE</th>";
                echo "<th>STATUS</th>";
                echo "<th>RETURN DATE</th>";
                echo "<th>DELIVERED DATE</th>";
                echo "<th>EDIT ORDER</th>";
                echo "</tr>";
                while($row3 = mysqli_fetch_array($result3)) 
                {
                    echo "<tr>";
                    $c_id = $row3["serialid"];
                    echo "<td>".$row3["iname"]."</td>";
                    echo "<td>".$row3["QTY"]."</td>";
                    echo "<td>".$row3["IPRICE"]."</td>";
                    echo "<td>".$row3["status"]."</td>";
                    // echo "<td>".$row3["d_date"]."</td>";
                    // echo "<td>".$row3["r_date"]."</td>";
                    if ($row3["status"]=='delivered') 
                    {
                        
                        echo "<td></td>";
                        echo "<td>".$row3["d_date"]."</td>";
                        echo "<td><a href='cart?r_id=".$c_id."'>Return</a></td>";
                    }
                    else if ($row3["status"]=='return') 
                    {
                        echo "<td>".$row3["r_date"]."</td>";
                        echo "<td>".$row3["d_date"]."</td>";
                        echo "<td>Item returned</td>";
                    }
                    else
                    {
                        echo "<td></td>";
                        echo "<td></td>";
                        echo "<td><a href='cart?c_id=".$c_id."'>Cancel</a></td>";
                    }
                    echo "</tr>";
                }
            }
        if (isset($_GET["r_id"])) 
        {
            // echo "<script>alert('Item returned successfully');</script>";
            $serial = $_GET["r_id"];
            $date = date("y/m/d");
            $updodr = "UPDATE $ordertbl SET status='return', r_date='$date' WHERE serialid = '$serial'";
            if (mysqli_query($localconnect,$updodr)) 
            {
                echo "<script>alert('Item returned successfully');</script>";
                echo "<script>window.location.href='cart.php';</script>";
            }
            else
            {
                mysqli_error($localconnect);
            }
        }
        if (isset($_GET["c_id"])) 
        {
            $cnid = $_GET["c_id"];
            $cnodr = "DELETE FROM $ordertbl WHERE serialid = '$cnid'";
            if(mysqli_query($localconnect,$cnodr));
            {
                echo "<script>alert('order canceled');</script>";
                echo "<script>window.location.href='cart.php';</script>";
            }
        }
         ?>

    </table>
</div>
    <!-- ------------------------------------------cart table end----------------------------------------- -->
 	<!-- ------------------------------------------footer block start----------------------------------------- -->
    <div class="container-fluid" style="background:#1B4F72;color: white; ">
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
        <p>@ 2018 Copyright Text</p>
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