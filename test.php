<?php
//$host = "203.191.63.226";
//$handle = popen( "ping -c 5 {$host} 2>&1",  "r" );
// echo "<br>";
//while( $read = fread( $handle, 2000 ) )
//{
//    echo $read;
//    echo "<br>";
//}
//pclose( $handle );
//header("refresh: 3");

//echo exec("ping www.google.com");

$ip_address = '203.191.63.226'; // IP address you'd like to ping.
//$ip = "203.191.63.226"; // IP address you'd like to ping.

//exec("ping -c 5 " . $ip_address . " | head -n 9 | tail -n 1 | awk '{print $0}'", $ping_time);
//exec("ping -c 5 " . $ip_address . " | head -n 9 | tail -n 1 | awk '{print $1}'", $ping_time);
//exec("ping -c 5 " . $ip_address . " | head -n 9 | tail -n 1 | awk '{print $2}'", $ping_time);
//exec("ping -c 5 " . $ip_address . " | head -n 9 | tail -n 1 | awk '{print $3}'", $ping_time);
//exec("ping -c 5 " . $ip_address . " | head -n 9 | tail -n 1 | awk '{print $4}'", $ping_time);
//exec("ping -c 5 " . $ip_address . " | head -n 9 | tail -n 1 | awk '{print $5}'", $ping_time);
//exec("ping -c 5 " . $ip_address . " | head -n 9 | tail -n 1 | awk '{print $6}'", $ping_time);
//exec("ping -c 5 " . $ip_address . " | head -n 9 | tail -n 1 | awk '{print $7}'", $ping_time);
//exec("ping -c 5 " . $ip_address . " | head -n 9 | tail -n 1 | awk '{print $8}'", $ping_time);
//exec("ping -c 5 " . $ip_address . " | head -n 10 | tail -n 1 | awk '{print $4}'", $ping_time);
//exec("ping -c 5 " . $ip_address . " | head -n 10 | tail -n 1 | awk '{print $2}'", $ping_time);
//print $ping_time[1]; // First item in array, since exec returns an array.
//print $ping_time[2]; // First item in array, since exec returns an array.

//-----------------------------------------------------------------------------------------------
//sudo hping3 -c 10 --fast -S -p 80 203.191.63.226 | head -n 13 | tail -n 0
//------------------------------------------------------------------------------------------------

exec("sudo ping -f -c 10 " .$ip_address . " | head -n 3 | tail -n 1 | awk '{print $0}'", $stats);
print $stats[0];
echo "<br>";


exec("sudo ping -f -c 10 " .$ip_address . " | head -n 5 | tail -n 1 | awk '{print $1}'", $ping_time);
exec("sudo ping -f -c 10 " .$ip_address . " | head -n 5 | tail -n 1 | awk '{print $2}'", $ping_time);
exec("sudo ping -f -c 10 " .$ip_address . " | head -n 5 | tail -n 1 | awk '{print $3}'", $ping_time);
exec("sudo ping -f -c 10 " .$ip_address . " | head -n 5 | tail -n 1 | awk '{print $4}'", $ping_time);
exec("sudo ping -f -c 10 " .$ip_address . " | head -n 5 | tail -n 1 | awk '{print $5}'", $ping_time);
print $ping_time[1];
echo " ";
print $ping_time[2];
echo " ";
print $ping_time[3];
echo " ";
print $ping_time[4];
echo " ";
print $ping_time[5];
echo "<br>";;


exec("sudo ping -f -c 10 " .$ip_address . " | head -n 0 | tail -n 1 | awk '{print $0}'", $pingtime);


echo "<br> ";
print $pingtime[0]; // First item in array, since exec returns an array.
///print $pingtime[1]; // First item in array, since exec returns an array.
///echo " ";
///print $pingtime[2]; // First item in array, since exec returns an array.
///echo " ";
///print $pingtime[3]; // First item in array, since exec returns an array.
///echo " ";
///print $pingtime[4]; // First item in array, since exec returns an array.
///echo " ";
///print $pingtime[5]; // First item in array, since exec returns an array.
///echo " ";
///print $pingtime[6]; // First item in array, since exec returns an array.
///echo " ";
///print $pingtime[7]; // First item in array, since exec returns an array.
///echo " ";
///print $pingtime[8]; // First item in array, since exec returns an array.
///echo "<br>";









//------------------------------------------------------------------------------------------------
// by running below code i will get 0% packet loss

//exec("ping -c 5 " . $ip_address . " | head -q | tail -n 2 | awk '{print $0}'", $ping_time);
//exec("ping -c 5 " . $ip_address . " | head -q | tail -n 2 | awk '{print $6}'", $ping_time);
//exec("ping -c 5 " . $ip_address . " | head -q | tail -n 2 | awk '{print $7}'", $ping_time);
//exec("ping -c 5 " . $ip_address . " | head -q | tail -n 2 | awk '{print $8}'", $ping_time);
//print $ping_time[0]; echo "<br> "; // First item in array, since exec returns an array.
//print $ping_time[2];echo " "; // First item in array, since exec returns an array.
//print $ping_time[4];echo " "; // First item in array, since exec returns an array.
//print $ping_time[6]; // First item in array, since exec returns an array.

//----------------------------------------------------------------------------------------------------





?>
