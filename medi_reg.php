<?php 
session_start();
error_reporting(0);
if (isset($_POST["r_submit"])) 
{
	$cryptpass = 0;
	$name = $_POST["r_name"];
	$email = $_POST["r_email"];
	$gender = $_POST["r_gender"];
	$contact = $_POST["r_contact"];
	$dob = $_POST["r_dob"];
	$password = $_POST["r_password"];
	$repassword = $_POST["r_repassword"];

	$localconnect = new mysqli("localhost", "root", "", "medicure");
	if($localconnect->connect_error)
	{
		die("connection failed". $localconnect->connect_error);		
	}
	if(empty($name) and empty($email) and empty($gender) and empty($contact) and empty($dob) and empty($password) and empty($repassword))
	{
		echo "Empty fields";
		die();
	}
	if($password !== $repassword)
	{
		echo "<script>alert('Please check the password');</script>";
		echo "<script>window.location.href='index.php'</cript>";
	}
	$md5pass = md5($password);
	$sha1pass = sha1($md5pass);
	$cryptpass = crypt($sha1pass,'pk');
	$cartid = uniqid();
	$orderif = uniqid();
	$reg_insrt = "INSERT INTO medi_register (name , email , gender , contact , dob , password, cart_nm,order_table) 
				values ('$name','$email','$gender','$contact','$dob','$cryptpass','$cartid','$orderif')";
	$reg_crt = "CREATE TABLE $cartid (cartid varchar(100) PRIMARY KEY , iid varchar(100), iname varchar(100), QTY int DEFAULT '1', IPRICE int)";
	$order_crt = "CREATE TABLE $orderif (serialid varchar(100) PRIMARY KEY, orderid varchar(100), iid varchar(100), iname varchar(100), QTY int(20) DEFAULT '1', IPRICE int, username varchar(100), status varchar(20) DEFAULT 'prepare for dispatch')";
	$reg_slt = "SELECT * FROM medi_register WHERE email = '$email' and password = '$cryptpass'";
	$sltrow1 = mysqli_fetch_array($localconnect->query($reg_slt));
	echo $sltrow1["email"];
	// $reg_updt = "UPDATE medi_register SET 'cart_nm' = '$cartid' WHERE email = '$email' ";
	if ($localconnect->query($reg_insrt))
	{
		if ($localconnect->query($reg_crt) === TRUE)
		{
			if ($localconnect->query($order_crt)) 
			{
				$_SESSION["username"] = $sltrow1["email"];
				echo "<script>window.location.href='index.php'</script>";
			}
			
		}
		else
		{
			echo "alert('Have some table creation problem');";
			echo "<script>window.location.href='index.php'</script>";
		}
	}
	else
	{
		// echo mysqli_error($localconnect);
		echo "<script>alert('Email ID already registered.')</script>";
		echo "<script>window.location.href='index.php'</script>";
		die();
	}
}
$localconnect->close();
?>