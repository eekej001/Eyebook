<?php

session_start();

$username = strtolower($_POST['username']);
$password = $_POST['password'];

if ($username&&$password)
	{
	  $connect = mysql_connect("localhost", "root", "") or die("Could not connect!");
	  mysql_select_db("phplogin") or die("Couldn't find database");

	  $query = mysql_query("SELECT * FROM users WHERE username = '$username' ");
	  $numrows = mysql_num_rows($query);
	  //echo $numrows;
		
		if ($numrows != 0) {
			while ($row = mysql_fetch_assoc($query))
			  {
				  $dataBusername = $row['username'];
				  $dataBpassword = $row['password'];
			  }
		
		if ($username==$dataBusername&&md5($password)==$dataBpassword) {
			//echo "You're in! Click <a href='member.php'>here</a> to access member page";
			$_SESSION['username']=$dataBusername;
			header('Location:member.php');
			
		}
		else
			echo "Incorrect password";

		
		}
		else
			die("That user doesn't exist.");
		
	}

else 
	die("Please enter username and password.")


?>