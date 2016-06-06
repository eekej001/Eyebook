<?php
//session_start();
?>


<html class='regPage'>

<?php
session_start();
mysql_connect("localhost", "root", "") or die("Could not connect!");
mysql_select_db("phplogin") or die("Couldn't find database");
?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
 <script src='ajax.js'></script>
  <link rel='stylesheet' href='style.css'/>
  
<title>Eyebook</title>
<h1>Eyebook </h1> 
	<a href='mainpage.php' class='regHomePage'>Home</a>
<h3>Register<h3>
<div class='registerSection'> 
<form class='registerForm' action='registerAdd.php'  method='POST'>
	<table>
	  <tr>
		<td>
			First Name:
		</td>
		
		<td>
			<input type='text' name='fname'>
		</td>
		
		<td>
		    Last Name:
		</td>

		<td>
			<input type='text' name='lname'>
		</td>
	  
	  </tr>
	  
	  
	  <tr>
		<td>
			Username:
		</td>
		
		<td>
			<input type='text' name='username'>
		</td>
	  </tr>
	  
	  
	  <tr>
		<td>
			Password:
		</td>
		
		<td>
			<input type='password' name='password'>
		</td>
	  </tr>
	  
	  <tr>
		<td>
			Repeat Password:
		</td>
		
		<td>
			<input type='password' name='rpassword'>
			<input type='hidden' name='submit' value='submit'>
		</td>
	  </tr>
	  
	
	</table>
	<p><button type='Button' class='registerSubmit'>Register</button></p>

  </form>
 </div> 

</html>