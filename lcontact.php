<!DOCTYPE html>
<html>
<head>
	<title>:: Lotus Login ::</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="font.css" />
    <link rel="stylesheet" href="lcontact.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <script type="text/javascript" src="time.js"></script>
</head>
<body>
 
 <table id="upperbelt" border="0" height="14%">
 	<tr>
 		<td width="43%">
 			<img id="logo" src="http://www.lotusbroadband.com/assets/img/logo.png">
 		</td>
	<td><h3 id="session">

<?php
session_start();
include("connection.php");

echo "welcome Mr. ".$_SESSION['username'];
$user_validate = $_SESSION['username'];
$search_database = "select * from monitor_users where username='$user_validate'";
$search_databasse_exe = mysqli_query($conn, $search_database);
$search_database_exe_result = mysqli_num_rows($search_databasse_exe);


if($search_database_exe_result == 1)
{
//echo ' user matched';
//echo '<script type="text/javascript">window.location = "http://lotusbroadband.com/monitoring/home.php";</script>';
}
else
{
//echo 'Please provide correct username & password';
echo '<script type="text/javascript">alert("Need access then login first!!");window.location = "http://lotusbroadband.com/monitoring/login.html";</script>';
}





?>









</h3>

<a id="session1" href="logout.php">Logout</a>
</td>
    <td width="33%">
<div id="timeContainer2" align="right">
	<div id="timeContainer1">
   		<span id="h-m-container">
       		<span class="inline-block" id="h"></span>
       		<span class="inline-block" id="m"></span>
        </span>
        <span id="s-ap-container">
       		<span class="block" id="s"></span>
       		<span class="block" id="am-pm"></span>
      	</span>
      	<span id="date"></span>
    </div>
</div>
</td>
</tr>
</table>

<nav class="nav">
  <a href="http://lotusbroadband.com/monitoring/home.php" class="nav-item" active-color="orange">Dashboard</a>
  <a href="http://lotusbroadband.com/monitoring/pstatus.php" class="nav-item" active-color="green">Ping status</a>
  <a href="http://lotusbroadband.com/monitoring/lcontact.php" class="nav-item is-active" active-color="blue">Location Contact</a>
  <!--//<a href="#" class="nav-item" active-color="red">About</a>
  <a href="#" class="nav-item" active-color="rebeccapurple">Testmonials</a>-->
  <span class="nav-indicator"></span>
</nav>
<script src="snake.js"> </script>


<table border="0" width="90%" height="auto" style='margin-top: 30px;margin-left: 80px; /*background-color: lightblue;*/'>
<tr>
<th></th>
<td></td>
</tr>
<tr>
<th></th>
<td></td>

</tr>
</table>



</body>
</html>
