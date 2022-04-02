<?php
header("refresh:60");
include ('connection.php');
//$rf_sql = "select t1.s_no, t1.ip_address, t1.state  from monitor_ip_state as t1 inner join (select max(s_no) as sno, ip_address from monitor_ip_state group by ip_address) as t2 on t1.s_no = t2.sno";
$rf_sql = "select t1.s_no, t1.iplocation, t1.ip_address, t1.state  from monitor_ip_state as t1 inner join (select max(s_no) as sno, ip_address from monitor_ip_state group by ip_address) as t2 on t1.s_no = t2.sno";
$rf_sqlexe = mysqli_query($conn, $rf_sql);
$rf_sqlnum = mysqli_num_rows($rf_sqlexe);
if($rf_sqlnum > 0 )
{
   while ($rf_loop = $rf_sqlexe -> fetch_assoc())
  {
        $rf_location = $rf_loop["iplocation"];
	$rf_ip = $rf_loop["ip_address"];
        $rf_state = $rf_loop["state"];
exec("sudo ping -f -c 5 -w 1 " .$rf_ip, $output, $onlineresult);
  if($rf_state == 'Online' && $onlineresult != 0)
    {
      $rf_status = "insert into monitor_ip_state (ip_address, iplocation, state) values ('$rf_ip','$rf_location', 'Offline')";
      $rf_status_exe = mysqli_query($conn, $rf_status);
    }
 else if($rf_state == 'Offline' && $onlineresult == 0)
    {
      $rf_status = "insert into monitor_ip_state (ip_address, iplocation, state) values ('$rf_ip','$rf_location', 'Online')";
      $rf_status_exe = mysqli_query($conn, $rf_status);
    }
  }
}
?>
