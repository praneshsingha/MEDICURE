<?php 
session_start();
error_reporting(0);
include("localconnect.php");
include("navbar.php");
if (isset($_SESSION["username"])) 
{
	if (isset($_GET["order"])) {

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Enter your delivery address</title>
</head>
<body style="background-color: #E5E7E9;">
<div class="container" style="background-color: #FDFEFE;margin-top: 10px;box-shadow: 0px 0px 50px 0px black;">
	<div class="row">
		<div class="col-md-12">
			<h3>Enter Address</h3><br>
			<form action="payment.php" method="GET">
				<table class="table">
					<tr>
						<td><b><h5>NAME</h5></b><input type="text" name="d_name" class="form-control col-md-12" required></td>
					</tr>
					<tr>
						<td><b><h5>ADDRESS</h5></b><input type="text" name="address" class="form-control" required></td>
					</tr>
					<tr>
						<td><b><h5>CITY</h5></b><input type="text" name="city" class="form-control" required></td>
					</tr>
					<tr>
						<td><b><h5>STATE</h5></b><input type="text" name="state" class="form-control" required></td>
					</tr>
					<tr>
						<td><b><h5>PINCODE</h5></b><input type="text" name="pincode" class="form-control" required></td>
					</tr>
					<tr>
						<td><b><h5>EMAIL<sup style="color:red;">*</sup></h5></b><input type="text" name="email" class="form-control" required></td>
					</tr>
					<tr>
						<td><b><h5>PHONE</h5></b><input type="text" name="phone" class="form-control" required></td>
					</tr>
					<tr>
						<td><input type="submit" value="submit" name="submit" class="btn btn-success" required></td>
					</tr>
				</table>
			</form>
		</div>
	</div>
</div>
<br>
</body>
</html>
<?php 
	}
	else
	{
		header("location:cart.php");
	}
}
else
{
	header("location:cart.php");
}
?>