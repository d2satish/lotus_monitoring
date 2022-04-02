<?php
session_start();
include("connection.php");

if(isset($_POST['lost_submit']))
{
$username = $_POST['username'];
$mail = $_POST['email'];

$search_database = "select * from monitor_users where username='$username' and email='$mail'";
$search_databasse_exe = mysqli_query($conn, $search_database);
$search_database_exe_result = mysqli_num_rows($search_databasse_exe);
if($search_database_exe_result == 1)
{
//echo ' user matched';
$_SESSION['mail']=$mail;
//echo '<script type="text/javascript">window.location = "http://lotusbroadband.com/monitoring/home.php";</script>';
//$lost_password = "select password from monitor_users where email='$mail';
//$lost_password_exe = mysqli_query($conn, $lost_password);

header('location:passwordretrive.php');
//header('location:test.php');
}
else
{
//echo 'Please provide correct username & password';
echo '<script type="text/javascript">alert("Your details not matched. Please check again!");window.location = "http://lotusbroadband.com/monitoring/lost.php";</script>';

}
}



else
{
//echo 'Please login first';
echo '<script type="text/javascript">alert("Please Enter your details");window.location = "http://lotusbroadband.com/monitoring/lost.php";</script>';

}

?>
