<!DOCTYPE html>
<html>
<head>
	<title>:: Lotus Login ::</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="font.css" />
    <link rel="stylesheet" href="pstatus.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <script type="text/javascript" src="time.js"></script>

<style>
#importdiv {
  width: 100%;
  padding: 50px 0;
display: none;
  text-align: center;
  margin-top: 20px;
}

</style>


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
  <a href="http://lotusbroadband.com/monitoring/pstatus.php" class="nav-item is-active" active-color="green">Ping status</a>
  <a href="http://lotusbroadband.com/monitoring/lcontact.php" class="nav-item" active-color="blue">Location Contact</a>
  <!--//<a href="#" class="nav-item" active-color="red">About</a>
  <a href="#" class="nav-item" active-color="rebeccapurple">Testmonials</a>-->
  <span class="nav-indicator"></span>
</nav>
<script src="snake.js"> </script>
<button style="margin-left:85%;height:5%;width:8%;border-radius:10px;margin-top:25px;" type="submit" onclick="importFunction()">Import</button>
  <section id="content">
    <form action="" method="POST">
      <div>
        <input type="text" placeholder="Enter IP" required="" name="ip" id="ip" />
        <input type="text" placeholder="Enter IP Location" required="" name="iplocation" id="iplocation" />
        <input type="text" placeholder="Enter IP Contact" required="" name="ipcontact" id="ipcontact" />
        <input type="text" placeholder="Enter IP Contact number" required="" name="ipcontactnumber" id="ipcontactnumber" />
        <input type="submit" value="Submit" name="submit" />
      </div>
    </form><!-- form -->
  </section><!-- content -->

<section id="content">
    <form action="" method="POST">
      <div>
        <input type="text" placeholder="Enter IP to Update *" required="" name="ip" id="ip" />
        <input type="text" placeholder="Enter new IP to update" required="" name="newip" id="newip" />
        <input type="text" placeholder="Enter Updated Location" required="" name="iplocation" id="iplocation" />
        <input type="text" placeholder="Enter Updated Contact" required="" name="ipcontact" id="ipcontact" />
        <input type="text" placeholder="Enter Updated Contact number" required="" name="ipcontactnumber" id="ipcontactnumber" />
        <input type="submit" value="Update" name="update" />
      </div>
    </form><!-- form -->
  </section><!-- content -->


<?php
include("connection.php");
if(isset($_POST['submit']))
{
$ip = $_POST['ip'];
$iplocation  = $_POST['iplocation'];
$ipcontact = $_POST['ipcontact'];
$ipcontactnumber = $_POST['ipcontactnumber'];

exec("sudo ping -f -c 5 -w 1 " . $ip, $output, $result);
if ($result == 0)
{
$state = 'Online';
}
else
{
$state = 'Offline';
}
$ipduplicate=mysqli_query($conn,"select * from monitor_ip_data where ip='$ip'");
if (mysqli_num_rows($ipduplicate)>0)
{
echo "<font style='color:red; font-weight: bold;'><h3 style='text-align:center;margin-top:-20px;'>Enter data already exists!!</h3></font>";
}
else
{
$sql = "INSERT INTO monitor_ip_data (s_no, ip, iplocation, ipcontact, ipcontactnumber) VALUES ('0','$ip','$iplocation','$ipcontact','$ipcontactnumber')";
$chilq = "insert into monitor_ip_state (s_no, iplocation, ip_address,  state) values ('0','$iplocation',  '$ip', '$state')";
$childqexe = mysqli_query($conn, $chilq);
//echo $state;
//echo $ip;
if(mysqli_query($conn, $sql))
{
////header("Location: pstatus.php?message=Data inserted successfully");
echo "<font style='color:green; font-weight: bold;'><h3 style='text-align:center;margin-top:-20px;'>Data inserted successfully</h3></font>";
//echo "Data inserted successfully";
}
else
{
echo "ERROR: Hush! Sorry $sql. ". mysqli_error($conn);
}
}
}
else
{
}
?>

<?php
include("connection.php");
if(isset($_POST['update']))
{
$old_ip = $_POST['ip'];
$new_ip = $_POST['newip'];
$up_ip_location  = $_POST['iplocation'];
$up_ip_contact = $_POST['ipcontact'];
$up_ip_contactnumber = $_POST['ipcontactnumber'];

$update_sql = "update monitor_ip_data set ip = '$new_ip', iplocation = '$up_ip_location', ipcontact = '$up_ip_contact', ipcontactnumber = $up_ip_contactnumber  where ip = '$old_ip'";
$update_sql_exe = mysqli_query($conn, $update_sql);
$update_sql_main = "update monitor_ip_state set iplocation = '$up_ip_location'  where ip_address = '$new_ip'";
if(mysqli_query($conn, $update_sql_main))
{
echo "<font style='color:green; font-weight: bold;'><h3 style='text-align:center;margin-top:-28px;'>Data updated successfully</h3></font>";
}
else
{
echo "ERROR: Hush! Sorry $sql. ". mysqli_error($conn);
}
}
?>








<div id="importdiv">
<form  action="import.php" method="post" name="upload_excel" enctype="multipart/form-data">
<input type="file" name="file" id="file" required="">
<button type="submit" id="submit" name="Import" data-loading-text="Loading...">Upload</button>
</form>
<div>


<script>
function importFunction() {
  var x = document.getElementById("importdiv");
  if (x.style.display === "block") {
    x.style.display = "none";
  } else {
    x.style.display = "block";
  }
}
</script>



</body>
</html>
