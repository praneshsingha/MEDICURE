<?php 
session_start();
include ("localconnect.php");
if (isset($_POST["submit"])) 
{
	$email = $_POST["text"];
	$pass = $_POST["pass"];
	$md5pass=md5($pass);
	$sha1pass=sha1($md5pass);
	$cryptpass=crypt($sha1pass,'pk');
	$sltadmin = "SELECT * FROM admin";
	if ($localconnect->query($sltadmin)) 
	{
		$sltrow = mysqli_fetch_array($localconnect->query($sltadmin));
		$remail = $sltrow["username"];
		$rpass = $sltrow["password"];
		if (($remail === $email ) and ($rpass === $cryptpass)) 
		{
			$_SESSION["admin"] = $sltrow["username"];
			// $_SESSION["username"] = $row["email"];
			// header("location:admin_manage.php");
			echo "<script>window.location.href='admin_manage.php';</script>";
		}
		else
		{
			echo "<script>alert('Invalid username and password')</script>";
			// echo "<script>window.location.herf='admin.html'</script>";
			echo "<script>window.location.href='admin.html';</script>";
		}
		// echo "<script>window.location.href='admin_manage.php'<script>";
	}
}
 ?>