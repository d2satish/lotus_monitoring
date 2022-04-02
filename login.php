<?php
session_start();
include('connection.php');

if(isset($_POST['submit']))
{
$username = $_POST['username'];
$password = $_POST['password'];

$search_database = "select * from monitor_users where username='$username' and password='$password'";
$search_databasse_exe = mysqli_query($conn, $search_database);
$search_database_exe_result = mysqli_num_rows($search_databasse_exe);
if($search_database_exe_result == 1)
{
//echo ' user matched';
$_SESSION['username']=$username;
echo '<script type="text/javascript">window.location = "http://lotusbroadband.com/monitoring/home.php";</script>';
}
else
{
//echo 'Please provide correct username & password';
echo '<script type="text/javascript">alert("Invalid username & Password!");window.location = "http://lotusbroadband.com/monitoring/login.html";</script>';
}
}



else
{
//echo 'Please login first';
echo '<script type="text/javascript">alert("Please login first!!");window.location = "http://lotusbroadband.com/monitoring/login.html";</script>';

}

?>
