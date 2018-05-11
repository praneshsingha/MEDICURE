<?php 
session_start();
error_reporting(0);
include("localconnect.php");
include("navbar.php");
if (isset($_SESSION["username"])) 
{
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Payment</title>
<?php 
	$a_id = uniqid();
	$orderid = uniqid();
	$username = $_SESSION["username"];
if (isset($_GET["submit"])) 
{
	$d_name = $_GET["d_name"];
	$address = $_GET["address"];
	$city = $_GET["city"];
	$state = $_GET["state"];
	$pincode = $_GET["pincode"];
	$email = $_GET["email"];
	$a_Phone = $_GET["phone"];
	$phone = (int)$a_Phone;
	$insadd = "INSERT INTO address (a_id,o_id,u_id,name,address,city,state,pincode,email,phone) 
	VALUES('$a_id','$orderid','$username','$d_name','$address','$city','$state','$pincode','$email','$phone')";
	$chk_add = 0;
	if (mysqli_query($localconnect,$insadd)) 
	{
		// echo "<script>alert('address added');</script>";
		$chk_add = 1;
	}
	else
	{
		echo "address error";
		echo mysqli_error($localconnect);
	}
}
 ?>
</head>
<body>
	<h3 class="text-center">SELECT A PAYMENT METHOD</h3>
<?php 
$sltuser = "SELECT * FROM medi_register WHERE email = '$username'";
$total;
// echo 'Username: '.$username;
if($result = mysqli_query($localconnect,$sltuser))
{
	$row = mysqli_fetch_array($result);
	$cartname = $row["cart_nm"];
	$sltcart = "SELECT * FROM $cartname";
	// echo "Cart name: ".$cartname;
	if ($result2 = mysqli_query($localconnect,$sltcart)) 
	{
		while ($row2 = mysqli_fetch_array($result2)) 
		{
			$total +=$row2["IPRICE"];
		}
		echo "Amount to be paid:".$total;
	}
	else
	{
		echo mysqli_error($localconnect);
		// echo "<br>amount error";
	}
}
else
{
	echo mysqli_error($localconnect);
	echo "error 2";
}

 ?>
<div class="container-fluid">
	<div class="row">
		<div class="col-md-4">
			<h3>Credit Card</h3>
			<img src="images/mastercard.gif" width="100px" height="70px" alt="">
			<img src="images/visa.png" width="100px" height="70px" alt="">
			<form action="payment.php" method="POST">
			<h4>Select Bank</h4>
			<select name="bank" id="" class="form-control" required name="bank">
				<option value="SBI">SBI</option>
				<option value="AXIS">AXIX</option>
				<option value="city bank">City Bank</option>
				<option value="HDFC">HDFC</option>
				<option value="canara">Canara</option>
				<option value="SBI">SBI</option>
			</select>
			<h4>Name on the card</h4>
			<input type="text" class="form-control" name="name">
			<h4>Card number</h4>
			<input type="text" class="form-control" name="card">
			<h4>Exp Date</h4>
			<input type="date" class="form-control" name="expDate">
			<h4>CVV</h4>
			<input type="text" class="form-control" name="cvv">
			<h4>PIN</h4>
			<input type="text" class="form-control" name="pin">
			<?php 
			echo "<input type='hidden' value='$total' name='amount'>";
			 ?>
			<br>
			<input type="submit" class="btn btn-success" name="c_submit" value="submit">
			</form>
		</div>
		<div class="col-md-4">
			<h3>Debit Card</h3>
			<br><br><br>
			<form action="payment.php" method="POST">
			<h4>Select Bank</h4>
			<select name="bank" id="" class="form-control" required name="bank">
				<option value="SBI">SBI</option>
				<option value="AXIS">AXIX</option>
				<option value="city bank">City Bank</option>
				<option value="HDFC">HDFC</option>
				<option value="canara">Canara</option>
				<option value="SBI">SBI</option>
			</select>
			<h4>Name on the card</h4>
			<input type="text" class="form-control" name="name">
			<h4>Card number</h4>
			<input type="text" class="form-control" name="card">
			<h4>Exp Date</h4>
			<input type="date" class="form-control" name="expdate">
			<h4>CVV</h4>
			<input type="text" class="form-control" name="cvv">
			<h4>PIN</h4>
			<input type="text" class="form-control" name="pin">
			<?php 
			echo "<input type='hidden' value='$total' name='amount'>";
			 ?>
			<br>
			<input type="submit" class="btn btn-success" name="d_submit" value="submit">
			</form>
		</div>

		<div class="col-md-4" >
			<h3>CASH ON DELIVERY</h3>
			<a href="payment.php?cod='yes'" ><button class="btn btn-success" style="margin-top: 110px;">ORDER NOW</button></a>
			
		</div>
	</div>
</div>
</body>
</html>
<?php 
}
if (isset($_GET["cod"])) 
{
	$chk_ac = 1;
	$pid = uniqid();
	
	$tran_id = uniqid();
	$inspay = "INSERT INTO payment (pid,orderid,user,tran_id,amount,order_by) VALUES ('$pid','$orderid','$username','$tran_id','$total','COD')";
	if (mysqli_query($localconnect,$inspay))
	{
		echo "<script>alert('Payment done');</script>";
		echo "<script>window.location.href='bill.php?orderid=".$orderid."';</script>";
		break;
	}
	else
	{
		echo "payment error";
		echo mysqli_error($localconnect);
	}
}
if(isset($_POST["c_submit"])) 
{
	$bank = $_POST["bank"];
	$card = $_POST["card"];
	$a_name = $_POST["name"];
	$name = strtoupper($a_name);
	$expDate = $_POST["expDate"];
	$cvv = $_POST["cvv"];
	$pin = $_POST["pin"];
	$chk_ac = 0;
	$sltbank = "SELECT * FROM bank";
	if ($result3 = mysqli_query($localconnect,$sltbank)) 
	{
		while($row3 = mysqli_fetch_array($result3))
		{
			$c_bank = $row3["bankName"];
			$c_card = $row3["cardNumber"];
			$c_name = $row3["cardName"];
			$c_expDate = $row3["expDate"];
			$c_cvv = $row3["cvv"];
			$c_pin = $row3["pinCode"];
			$amount = $row3["amount"];

			if (($bank==$c_bank) AND ($card==$c_card) AND ($name == $c_name) AND ($expDate==$c_expDate) AND ($cvv==$c_cvv) AND ($pin==$c_pin)
				AND ($total<=$amount)) 
			{
				$chk_ac = 1;
				$pid = uniqid();
				
				$tran_id = uniqid();
				$inspay = "INSERT INTO payment (pid,orderid,user,tran_id,amount,order_by) 
				VALUES ('$pid','$orderid','$username','$tran_id','$total','CARD')";
				echo "Total:".$total.'<br>';
				if (mysqli_query($localconnect,$inspay))
				{
					echo "<script>alert('Payment done');</script>";
					echo "<script>window.location.href='bill.php?orderid=".$orderid."';</script>";
					break;
				}
				else
				{
					echo "payment error";
					echo mysqli_error($localconnect);
				}
			}
		}

		if($chk_ac==0)
		{
			echo "<script>alert('Invalid entry or Amount not found');</script>";
			// echo "<script>window.location.href='payment.php?submit=submit&d_name=".$d_name."';</script>";
			echo "<script>window.location.href='c_address.php?order=hjskduiwvhw';</script>";
		}
	}
}
if(isset($_POST["d_submit"])) 
{
	$bank = $_POST["bank"];
	$card = $_POST["card"];
	$a_name = $_POST["name"];
	$name = strtoupper($a_name);
	$expDate = $_POST["expDate"];
	$cvv = $_POST["cvv"];
	$pin = $_POST["pin"];
	$chk_ac = 0;
	$sltbank = "SELECT * FROM bank";
	if ($result3 = mysqli_query($localconnect,$sltbank)) 
	{
		while($row3 = mysqli_fetch_array($result3))
		{
			$c_bank = $row3["bankName"];
			$c_card = $row3["cardNumber"];
			$c_name = $row3["cardName"];
			$c_expDate = $row3["expDate"];
			$c_cvv = $row3["cvv"];
			$c_pin = $row3["pinCode"];
			$amount = $row3["amount"];

			if (($bank==$c_bank) AND ($card==$c_card) AND ($name == $c_name) AND ($expDate==$c_expDate) AND ($cvv==$c_cvv) AND ($pin==$c_pin)
				AND ($total<=$amount)) 
			{
				$chk_ac = 1;
				$pid = uniqid();
				
				$tran_id = uniqid();
				$inspay = "INSERT INTO payment (pid,orderid,user,tran_id,amount) VALUES ('$pid','$orderid','$username','$tran_id','$total')";
				if (mysqli_query($localconnect,$inspay))
				{

					echo "<script>alert('Payment done');</script>";
					echo "<script>window.location.href='bill.php?orderid=".$orderid."';</script>";
					break;
				}
				else
				{
					echo "payment error";
					echo mysqli_error($localconnect);
				}
			}
		}

		if($chk_ac==0)
		{
			echo "<script>alert('Invalid entry or Amount not found');</script>";
			// echo "<script>window.location.href='payment.php?submit=submit&d_name=".$d_name."';</script>";
			echo "<script>window.location.href='c_address.php?order=hjskduiwvhw';</script>";
		}
	}
}

 ?>