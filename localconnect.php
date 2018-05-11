<?php 
$localconnect = mysqli_connect("localhost","root","","medicure");
if ($localconnect->connect_error) 
{
	die("Connection error".$localconnect->local_error);
}
 ?>