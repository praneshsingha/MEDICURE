<?php 
session_start();
include("localconnect.php");
if (isset($_SESSION["username"])) 
{
	if (isset($_GET["submit"])) 
	{
		$mid = $_GET["mid"]; 													//item id
		$username = $_SESSION["username"];										//username
		// $table = $_GET["table"];
		$sltcrt = "SELECT * FROM medi_register WHERE email='$username'";
		$result = mysqli_query($localconnect,$sltcrt);
		$row = mysqli_fetch_array($result);
		$cart = $row["cart_nm"];
		//------------------------------------medicine table--------------------

		$sltmedi = "SELECT * FROM medicine WHERE m_id = '$mid'";
		$result2 = mysqli_query($localconnect,$sltmedi);
		$row2 = mysqli_fetch_array($result2);
		$iname = $row2["m_name"];
		$qty = $_GET["itmqty"];
		$price = $row2["m_cost"];
		$crtinsrt = "INSERT INTO $cart (cartid,iname,QTY,IPRICE) VALUES ('$mid','$iname','$qty','$price') ";
		if ($localconnect->query($crtinsrt)) 
		{
			// echo "Successfully inserted";
			echo "<script>alert('Item added to your cart');</script>";
			echo "<script>window.location.href='medicure.php?mid=$mid';</script>";
		}
		else
		{
			// echo mysqli_error($localconnect);
			// echo "<br>Having some problem";
			echo "<script>alert('Item already added');</script>";	
			echo "<script>window.location.href='medicure.php?mid=$mid';</script>";

		}
		// mysqli_query($localconnect,$crtinsrt);
	}
}
else
{
	echo "<script>alert('Please login.');</script>";
	echo "<script>window.location.href='index.php';</script>";
}
 ?>
