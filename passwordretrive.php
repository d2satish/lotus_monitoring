<!DOCTYPE html>
<html>
<head>
	<title>:: Lotus Login ::</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta charset="utf-8" />
    <link rel="stylesheet" href="font.css" />
    <link rel="stylesheet" href="lost.css" />
    <script type="text/javascript" src="time.js"></script>
</head>
<body>
 
 <table id="upperbelt">
 	<tr>
 		<td>
 			<img id="logo" src="http://www.lotusbroadband.com/assets/img/logo.png">
 		</td>
 	</tr>
 </table>

<div id="timeContainer2">
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

<table id="table" border="0">
	<tr>
		<td width="30%">
			<div class="container">
  <section id="content">
    <form action="" method="">
      <h1>Your password !!</h1></br>
      <div>
<?php
session_start();
include("connection.php");

$pwdretrive = $_SESSION['mail'];
if(!$pwdretrive)
{
header("location:lost.php");
}
else
{
$pwdquery = "select password from monitor_users where email='$pwdretrive'";
$pwdqueryResult = $conn->query($pwdquery);
echo "<table border=0 style='margin-left:auto; margin-right:auto; width:100%;'>";
while ($pwdqueryRow = $pwdqueryResult->fetch_row()) {
    echo "<tr>";
    for($i = 0; $i < $pwdqueryResult->field_count; $i++){
        echo "<td style='width:auto;text-align:right;'><h6>Your password is </h6></td>";
        echo "<td style='width:auto;text-align:left;'><font style='color:green; font-weight:bold;font-size: 30px;'>$pwdqueryRow[$i]</font></td>";
    }
    echo "</tr>";
}
echo "</table>";
echo "<a href='http://lotusbroadband.com/monitoring/login.html'><h5 style='margin-left:-300%'>Login here!!</h5></a>";

}
session_unset();
$conn->close();



//echo "YOur passowrd is ".$pwd_query_exe_rows;

?>












        <!--<input type="text" placeholder="Username" required="" name="username" id="username" />-->
      </div>
</br></br></br</br></br>
    </form><!-- form -->

  </section><!-- content -->
</div><!-- container -->

		</td>
	</tr>
</table>
</body>
</html>

