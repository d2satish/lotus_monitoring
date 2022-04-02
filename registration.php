<?php
include('connection.php');

//if (mysqli_connect_error()){
//die('Connect Error ('. mysqli_connect_errno() .') '
//. mysqli_connect_error());

if(isset($_POST['signin']))
{
	$username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
		$duplicate=mysqli_query($conn,"select * from monitor_users where username='$username' or email='$email'");
			if (mysqli_num_rows($duplicate)>0)
			  {
			     //header("Location: index.php?message=User name or Email id already exists.");
				echo "duplicate record";
			  }
		else{


        // Performing insert query execution
        // here our table name is college
        $sql = "INSERT INTO monitor_users (s_no, username, password, email) VALUES ('0','$username','$password','$email')";
	

        if(mysqli_query($conn, $sql)){
		 echo '<script type="text/javascript">
                        alert("Your account is ready to login!!");
                        window.location = "http://lotusbroadband.com/monitoring/login.html";
                     </script>';

            //header("Location: http://lotusbroadband.com/monitoring/login.html");
          } else{
            echo "ERROR: Hush! Sorry $sql. " 
                . mysqli_error($conn);
        }
	}

}
else
{
echo '<script type="text/javascript">alert("Please register first!!");window.location = "http://lotusbroadband.com/monitoring/login.html";</script>';

}

        // Close connection
        mysqli_close($conn);




?>
