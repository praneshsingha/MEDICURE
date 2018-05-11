<?php 
session_start();
error_reporting(0);
include("localconnect.php");
// include("navbar.php");
$username = $_SESSION["username"];
if (isset($_SESSION["username"])) 
{
$sltreg = "SELECT * FROM medi_register WHERE email='$username'";
if ($result = mysqli_query($localconnect,$sltreg)) 
{
	$row = mysqli_fetch_array($result);
		$carttbl = $row["cart_nm"];
		$ordertbl = $row["order_table"];
		// echo "<br>".$carttbl."<br>";
		// echo $ordertbl."<br>";
		// echo $orderid."<br>";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bill</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="style.css">
	<link rel="shortcut icon" type="image/x-icon" href="icon/hospital.png" />
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
<?php 
// $sltcrt = "SELECT * FROM $carttbl";
// echo "hello world";
// if ($result3 = mysqli_query($localconnect,$sltcrt)) 
// {
// 	echo "<table>";
// 	while ($row3 = mysqli_fetch_array($result3)) 
// 	{
// 		echo "<tr>";
// 		echo "<td>".$row3["iid"]."</td>";
// 		echo "<td>".$row3["iname"]."</td>";
// 		echo "<td>".$row3["QTY"]."</td>";
// 		echo "<td>".$row3["IPRICE"]."</td>";
// 		echo "</tr>";
// 	}
// 	echo "</table>";
// }
// else
// {
// 	echo mysqli_error($localconnect);
// }
$cho_ord = 0;
	if (isset($_GET["orderid"])) 
	{
		
		$orderid = $_GET["orderid"];
		$sltreg = "SELECT * FROM medi_register WHERE email='$username'";
		if ($result = mysqli_query($localconnect,$sltreg)) 
		{
			$row = mysqli_fetch_array($result);
			$carttbl = $row["cart_nm"];
			$ordertbl = $row["order_table"];
			echo "<br>".$carttbl."<br>";
			// echo $ordertbl."<br>";
			// echo $orderid."<br>";
			$sltcart = "SELECT * FROM $carttbl";
			if ($result2 = mysqli_query($localconnect,$sltcart)) 
			{
				while($row2 = mysqli_fetch_array($result2))
				{
					$serialid = uniqid();
					$iid = $row2["cartid"];
					$iname = $row2["iname"];
					$qty = $row2["QTY"];
					$price = $row2["IPRICE"];
					$status = 'preparing';
					$insord = "INSERT INTO $ordertbl (serialid,orderid,iid,iname,QTY,IPRICE,username,status)
					VALUES ('$serialid','$orderid','$iid','$iname','$qty','$price','$username','$status')";
					if (mysqli_query($localconnect,$insord)) 
					{
						$chk_ord++;
						// echo "<script>alert('Order table executed');</script>";
					}
					else
					{
						echo mysqli_error($localconnect);
					}
				}
				if($chk_ord>=0)
				{
					echo "<script>window.location.href='bill.php';</script>";
				}
			}
			else
			{
				echo mysqli_error($localconnect);
			}
		}
		else
		{
			echo mysqli_error($localconnect);
		}
	}
	else
	{
		echo mysqli_error($localconnect);
	}
}
$sltcrt = "SELECT * FROM $carttbl";
// echo $carttbl;
if ($result3 = mysqli_query($localconnect,$sltcrt)) 
{
$total;
	echo "<center>";
	echo "<h3>MEDICURE BILLING</h3>";
	echo "<table border='1' class='table' style='solid black;margin-top:50px;'>";
	echo "<tr>";
	echo "<th>ITEM NAME</td>";
	echo "<th>QUENTITY</td>";
	echo "<th>PRICE</td>";
	echo "</tr>";
	while ($row3 = mysqli_fetch_array($result3)) 
	{
		echo "<tr>";
		echo "<td>".$row3["iname"]."</td>";
		echo "<td>".$row3["QTY"]."</td>";
		echo "<td>".$row3["IPRICE"]."</td>";
		echo "</tr>";
		$total +=$row3["IPRICE"];
	}
	echo "<tr>";
	echo "<td colspan='3' class='text-right'>TOTAL PRICE: ".$total."</td>";
	echo "</tr>";
	echo "</table>";
	echo "</center>";
}
else
{
	echo "<br>error<br>";
	echo mysqli_error($localconnect);
}
 ?>
 <a href="index.php" target="_blank"><button class="btn btn-success">Continue...</button></a>
</body>
</html>