<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01//EN"
"http://www.w3.org/TR/html4/strict.dtd">
<html>
<head>
        <title>:: Lotus Login ::</title>
        <!--<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <meta charset="utf-8" />-->
    <link rel="stylesheet" href="font.css" />
    <link rel="stylesheet" href="home.css" />
    <link rel="stylesheet" href="normalize.css" />
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed&display=swap" rel="stylesheet">
    <script type="text/javascript" src="time.js"></script>
</head>
<body>
<table id="upperbelt" border="0" height="14%" width="100%">
	<tr>
 	   <td width="43%" height="14%">
 	   <img id="logo" src="http://www.lotusbroadband.com/assets/img/logo.png">
 	   </td>
	   <td width="24%" height="14%">
	   <h3 id="session">
	        <?php
	           session_start();
		   include('connection.php');
	           header("refresh:10");
		   echo "welcome Mr. ".$_SESSION['username'];
		   $user_validate = $_SESSION['username'];
		   $search_database = "select * from monitor_users where username='$user_validate'";
		   $search_databasse_exe = mysqli_query($conn, $search_database);
		   $search_database_exe_result = mysqli_num_rows($search_databasse_exe);
		     if($search_database_exe_result == 1)
		       {
		       }
		     else
		       {
		          echo '<script type="text/javascript">alert("Need access then login first!!");window.location = "http://lotusbroadband.com/monitoring/login.html";</script>';
		       }
		 ?>
	    </h3>
	    <a id="session1" href="logout.php">Logout</a>
	</td>
    	<td width="33%" height="14%">
	   <div id="timeContainer2" align="right">
	   <div id="timeContainer">
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
  <a href="http://lotusbroadband.com/monitoring/home.php" class="nav-item is-active" active-color="orange">Dashboard</a>
  <a href="http://lotusbroadband.com/monitoring/pstatus.php" class="nav-item" active-color="green">Ping status</a>
  <a href="http://lotusbroadband.com/monitoring/lcontact.php" class="nav-item" active-color="blue">Location Contact</a>
  <!--//<a href="#" class="nav-item" active-color="red">About</a>
  <a href="#" class="nav-item" active-color="rebeccapurple">Testmonials</a>-->
  <span class="nav-indicator"></span>
    <script src="snake.js"> </script>
</nav>

<?php 
include('connection.php');
$sql = "select count(*) as number, state from monitor_ip_state where s_no in (select sno from (select max(s_no) as sno ,ip_address from monitor_ip_state group by ip_address) satish) group by state";
$sqlexe = mysqli_query($conn, $sql);
$sqlexenum = mysqli_num_rows($sqlexe);
if($sqlexenum > 0)
  {
    echo '<table style="margin-left:45%; margin-top:20px;">';
    while($roww = $sqlexe -> fetch_assoc())
     {
        $dstate = $roww["state"];
        $count = $roww["number"];
        echo '<tr>
	    <td style="padding: 10px; text-align: left;background-color:green;border-radius:10px;">
	        <font style="color:white;letter-spacing: 3px;font-weight: bolder;font-size: large;align:right;">'.$dstate.'
                </font>
            </td>
	    <td style="padding: 10px; text-align: left; background-color:grey;border-radius:10px;">
	        <font style="color:white;letter-spacing: 3px;font-weight: bolder;font-size:large;align:right;">'.$count.'
                </font>
            </td>
           </tr>';
     }
   echo '</table>';
  }
?>
<!--<table border="0" style="width:100%; margin-top:8px;">
<tr><td>-->
<?php
include ('connection.php');
//$onlinesql = "select * from (select t1.s_no, t1.ip_address, coalesce(date_format(t3.up_down_time,'%d %b %Y %h:%i %p'),'- nA -') as uptime, t1.state as current_state, coalesce(date_format(t1.up_down_time,'%d %b %Y %h:%i %p'),'- nA -') as last_downtime, coalesce(TIMESTAMPDIFF(MINUTE,t3.up_down_time,t1.up_down_time), 'no up time') as t_down_time from monitor_ip_state as t1 inner join (select max(s_no) as sno, ip_address from monitor_ip_state group by ip_address) as t2 on t1.s_no = t2.sno and t1.state = 'Offline' left join (select a1.* from monitor_ip_state as a1, (select max(s_no) as sno,  ip_address from monitor_ip_state where state = 'Online' group by ip_address) as a2 where a1.s_no = a2.sno) as t3 on t2.ip_address = t3.ip_address union  select t1.s_no, t1.ip_address, coalesce(date_format(t1.up_down_time,'%d %b %Y %h:%i %p'),'- nA -') as uptime, t1.state as current_state, coalesce(date_format(t3.up_down_time, '%d %b %Y %h:%i %p'),'- nA -') as last_downtime, coalesce(TIMESTAMPDIFF(MINUTE,t3.up_down_time,t1.up_down_time),'no down time') as t_down_time from monitor_ip_state as t1 inner join (select max(s_no)as sno, ip_address from monitor_ip_state group by ip_address) as t2 on t1.s_no = t2.sno and t1.state = 'Online' left join (select a1.* from monitor_ip_state as a1, (select max(s_no) as sno,  ip_address from monitor_ip_state where state = 'Offline' group by ip_address) as a2 where a1.s_no = a2.sno) as t3 on t2.ip_address = t3.ip_address)qq order by current_state asc";
$onlinesql = "select * from (select t1.s_no, t1.ip_address, t1.iplocation, coalesce(date_format(t3.up_down_time,'%d %b %Y %h:%i %p'),'- nA -') as uptime, t1.state as current_state, coalesce(date_format(t1.up_down_time,'%d %b %Y %h:%i %p'),'- nA -') as last_downtime, coalesce(TIMESTAMPDIFF(MINUTE,t3.up_down_time,t1.up_down_time), 'no up time') as t_down_time from monitor_ip_state as t1 inner join (select max(s_no) as sno, ip_address from monitor_ip_state group by ip_address) as t2 on t1.s_no = t2.sno and t1.state = 'Offline' left join (select a1.* from monitor_ip_state as a1, (select max(s_no) as sno,  ip_address from monitor_ip_state where state = 'Online' group by ip_address) as a2 where a1.s_no = a2.sno) as t3 on t2.ip_address = t3.ip_address union  select t1.s_no, t1.ip_address, t1.iplocation, coalesce(date_format(t1.up_down_time,'%d %b %Y %h:%i %p'),'- nA -') as uptime, t1.state as current_state, coalesce(date_format(t3.up_down_time, '%d %b %Y %h:%i %p'),'- nA -') as last_downtime, coalesce(TIMESTAMPDIFF(MINUTE,t3.up_down_time,t1.up_down_time),'no down time') as t_down_time from monitor_ip_state as t1 inner join (select max(s_no)as sno, ip_address from monitor_ip_state group by ip_address) as t2 on t1.s_no = t2.sno and t1.state = 'Online' left join (select a1.* from monitor_ip_state as a1, (select max(s_no) as sno,  ip_address from monitor_ip_state where state = 'Offline' group by ip_address) as a2 where a1.s_no = a2.sno) as t3 on t2.ip_address = t3.ip_address)qq order by current_state asc";

$onlinesqlexe = mysqli_query($conn, $onlinesql);
$onlinesqlnum = mysqli_num_rows($onlinesqlexe);
echo '<table class="online">
	<tr >
	   <th style="text-align:center;">s.no</th>
	   <th style="text-align:center;">ip address</th>
	   <th style="text-align:center;">ip location</th>
	   <th style="text-align:center;">up time</th>
	   <th style="text-align:center;">down time</th>
	   <th style="text-align:center;white-space:nowrap;">last down time in minutes</th>
	   <th style="text-align:center;white-space:nowrap;">last downtime %</th>
	   <th style="text-align:center;white-space:nowrap;">Current state</th>
	</tr>';
if($onlinesqlnum > 0)
{
$i = '0';
while ($onlineloop = $onlinesqlexe -> fetch_assoc())
{
$i = $i+1;
$ip = $onlineloop["ip_address"];
$iplocation = $onlineloop["iplocation"];
$luptime = $onlineloop["uptime"];
$dtime = $onlineloop["last_downtime"];
$onstate = $onlineloop["current_state"];
$t_down_time = $onlineloop["t_down_time"];
$t_down_per = $t_down_time/((($t_down_time/1440)+1)*24*60)*100;
// this is for uptime calculation only $t_down_per = ((1440-$t_down_time)/1440)*100;
$rnd = round($t_down_per,2);
if($t_down_time <= 1440)
{
$today = 0;
}


if($onstate == 'Online')
{

echo '<tr>
        <td>'.$i.'</td>
        <td>'.$ip.'</td>
        <td style="white-space:nowrap;text-transform:uppercase;">'.$iplocation.'</td>
        <td style="white-space:nowrap;">'.$luptime.'</td>
        <td style="white-space:nowrap;">'.$dtime.'</td>
        <td><font style="font-weight: bolder; white-space:nowrap;">'.$t_down_time.'</font></td>
        <td>'.$rnd.'</td>
        <td style="background-color:green;"><font style="color:white;font-weight: bolder;">'.$onstate.'</font></td>
</tr>';
}
else
{
//$t_online_time = $t_down_time+$t_down_time;
echo '<tr>
        <td>'.$i.'</td>
        <td>'.$ip.'</td>
        <td style="white-space:nowrap;text-transform: uppercase;">'.$iplocation.'</td>
        <td style="white-space:nowrap;">'.$luptime.'</td>
        <td style="white-space:nowrap;">'.$dtime.'</td>
        <td><font style="font-weight: bolder; white-space:nowrap;">'.$t_down_time.'</font></td>
        <td>'.$rnd.'</td>
        <td style="background-color:red;"><font class="offline_blink" style="color:white;font-weight: bolder;">'.$onstate.'</font></td>
</tr>';
}
}
}
echo "</table>";
?>
<!--</td>
</tr>
</table>-->
</body>
</html>
