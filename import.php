<?php
session_start();
include("connection.php");
echo "welcome Mr. ".$_SESSION['username'];
echo "<br>";
echo "Please wait while redirecting...";
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

if(isset($_POST["Import"]))
{
$filename=$_FILES["file"]["tmp_name"];
   if($_FILES["file"]["size"] > 0)
     {
       $file = fopen($filename, "r");
	$c = 0;
       while (($ipData = fgetcsv($file, 10000, ",")) !== FALSE)
         {
           $ip = $ipData[1];
           $iplocation = $ipData[2];
           $ipcontact = $ipData[3];
           $ipcontactnumber = $ipData[4];
           exec("sudo ping -f -c 5 -w 1 " . $ip, $output, $result);
           if($result == 0)
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
                echo "<script type=\"text/javascript\">
                                 alert(\"Entered data already exist in system. Please re-check!!!.\");
                                 window.location = \"pstatus.php\"
                   </script>";
              }
            else
              {
                        $ins_main_data = "INSERT INTO monitor_ip_data (s_no, ip, iplocation, ipcontact, ipcontactnumber) VALUES ('0','$ip','$iplocation','$ipcontact','$ipcontactnumber')";
                        $ins_secon_data = "insert into monitor_ip_state (s_no, ip_address, iplocation, state) values ('0', '$ip', '$iplocation', '$state')";
                        $ins_main_data_exe = mysqli_query($conn, $ins_main_data);

                        if(mysqli_query($conn, $ins_secon_data))
                                {
                                        echo "<script type=\"text/javascript\">
                                    alert(\"File uploaded successfully!!!.\");
                                    window.location = \"home.php\"
                             </script>";
                                }
                        else
                                {
                                        echo "ERROR: Hush! Sorry $sql. ". mysqli_error($conn);
                                }
                }
$c=$c+1;
}}}
fclose($file);
mysqli_close($conn);





?>
