<?php
$location = 'localhost';
$db_user_name = 'root';
$db_pass_word = 'Lotus4vij$support@My$ql';
$db_name = 'studentdb';




$conn = mysqli_connect($location, $db_user_name, $db_pass_word, $db_name);
if (!$conn) {
    die('Could not connect: ' . mysql_error());
}
//echo 'Connected successfully';
//mysql_close($conn);
?>
