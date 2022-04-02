<?php
//$origin = new DateTime('2021-02-10 09:46:32');
//$target = new DateTime('2021-02-11 11:46:32');
//$interval = $origin->diff($target);
//$test= (($interval->format('%d')*24) + $interval->format('%h'))*60; //1440 (difference in minutes)
//echo $test;
//echo "<br>";
?>
<?php
//if($test <=1440)
//{
//$test1=$test+$test;
//echo $test1;
//}
//else
//{
//}
?>
<?php
$time = new DateTime("10-07-2021 13:00:22");
$diff = $time->diff(new DateTime());
$minutes = ($diff->days * 24 * 60) +
           ($diff->h * 60) + $diff->i;

echo $minutes;
?>
