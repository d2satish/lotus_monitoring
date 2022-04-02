<?php
$link = mysqli_connect('localhost', 'root', 'Lotus4vij$support@My$ql' , 'monitoring_database');
if (!$link) {
    die('Could not connect: ' . mysql_error());
}
//echo 'Connected successfully';
//mysql_close($link);
?>
