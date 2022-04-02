<?php
//$wait = 5; // wait Timeout In Seconds
//$host = '203.191.63.130';
//$ports = [
//    'http'  => 80,
//    'https' => 443,
//    'ftp'   => 21,
//    'ssh'   => 369,
//    'icmp'   => -1,
//];

//foreach ($ports as $key => $port) {
//    $fp = fsockopen($host, $port, $errCode, $errStr, $wait);
//    echo "Ping $host:$port ($key) ==> ";
//    if ($fp) {
//        echo 'SUCCESS';echo "<br>";
//        fclose($fp);
//    } else {
//        echo "ERROR: $errCode - $errStr";echo "<br>";
//    }
//    echo PHP_EOL;
//}
?>
<?php
$host = '202.65.140.190';
$port = 53;
$waitTimeoutInSeconds = 1;
if ($fp = fsockopen($host,$port,$errCode,$errStr,$waitTimeoutInSeconds)) {
  echo "It worked";
} else {
  echo" It didn't work";
}
fclose($fp);
?>
