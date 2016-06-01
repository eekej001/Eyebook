<?php 
session_start();

$submit = $_SESSION['submit'];
$fname = $_SESSION['fname'];
$lname = $_SESSION['lname'];
$username = $_SESSION['username'];
$password = $_SESSION['password'];
$rpassword = $_SESSION['rpassword'];
$date = $_SESSION['date'];

?>

<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>  
<script src='ajax.js'></script>



<?php if ($submit): ?>
	<?php $connect = mysql_connect("localhost","root","");
	mysql_select_db("phplogin");	
	$nameVerify = mysql_query("SELECT username FROM users WHERE username='$username'");
	$countNames = mysql_num_rows($nameVerify); ?>
	<?php if ($countNames!= 0): ?>
	  <form class='registerForm' action='registerAdd.php'  method='POST'>
		<table>
			<tr>
				<td>
					First Name:
				</td>
		
				<td>
					<input type='text' name='fname' value="<?php echo $fname ?>">
				</td>
		
				<td>
					Last Name:
				</td>

				<td>
					<input type='text' name='lname' value="<?php echo $lname ?>">
				</td>
	  
			</tr>
	  
	  
			<tr>
				<td>
					Username:
				</td>
		
				<td>
					<input type='text' name='username' value="<?php echo $username ?>">
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
	<p class='error2'>*This username has already been taken.</p>
	<?php else: ?> 
	
		<?php if ($fname&&$lname&&$username&&$password&&$rpassword): ?>

	   
	   
			<?php if ($password==$rpassword): ?>
					<?php if (strlen($username)>25||strlen($fname)>25||strlen($lname)>25): ?>
						<p class='error4'>*Username/First Name/Last Name must be less than 25 characters.</p>
						
						<form class='registerForm' action='registerAdd.php'  method='POST'>
								<table>
									<tr>
										<td>
											First Name:
										</td>
		
										<td>
											<input type='text' name='fname' value="<?php echo $fname ?>">
										</td>
		
										<td>
											Last Name:
										</td>

										<td>
											<input type='text' name='lname' value="<?php echo $lname ?>">
										</td>
	  
									</tr>
	  
	  
									<tr>
										<td>
											Username:
										</td>
		
										<td>
											<input type='text' name='username' value="<?php echo $username ?>">
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
						
						
						
						
						
						
						
						
						
						
						
						
						
						
					<?php else: ?>
						<?php if (strlen($password)>25||strlen($password)<6): ?>
							<form class='registerForm' action='registerAdd.php'  method='POST'>
								<table>
									<tr>
										<td>
											First Name:
										</td>
		
										<td>
											<input type='text' name='fname' value="<?php echo $fname ?>">
										</td>
		
										<td>
											Last Name:
										</td>

										<td>
											<input type='text' name='lname' value="<?php echo $lname ?>">
										</td>
	  
									</tr>
	  
	  
									<tr>
										<td>
											Username:
										</td>
		
										<td>
											<input type='text' name='username' value="<?php echo $username ?>">
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
						
						<p class='error3'>*Your password must be between 6 and 25 characters long.</p>
						
						<?php else: ?>
							   <?php $password = md5($password);
							         $rpassword = md5($rpassword);							
							         //register		
							         $queryreg = mysql_query("
							         INSERT INTO users VALUES ('','$fname','$lname','$username','$password','$date')
							         "); ?>
							        <p class='regCongrats'>Congratulations! You have been registered. <a href='mainpage.php' class='regCompleteReturn'>Return to main page.</a></p>
						<?php endif; ?>
					<?php endif; ?>
				
			
			<?php else: ?>
				<form class='registerForm' action='registerAdd.php'  method='POST'>
					<table>
						<tr>
							<td>
								First Name:
							</td>
		
							<td>
								<input type='text' name='fname' value="<?php echo $fname ?>">
							</td>
		
							<td>
								Last Name:
							</td>

							<td>
								<input type='text' name='lname' value="<?php echo $lname ?>">
							</td>
	  
						</tr>
	  
	  
						<tr>
							<td>
								Username:
							</td>
		
							<td>
								<input type='text' name='username' value="<?php echo $username ?>">
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
			<p class='error3'>*Your passwords do not match.</p>
			<?php endif; ?>
	   
	   
			
	   
	   
   
		<?php else: ?>
			<form class='registerForm' action='registerAdd.php'  method='POST'>
				<table>
					<tr>
						<td>
							First Name:
						</td>
		
						<td>
							<input type='text' name='fname' value="<?php echo $fname ?>">
						</td>
		
						<td>
							Last Name:
						</td>

						<td>
							<input type='text' name='lname' value="<?php echo $lname ?>">
						</td>
	  
					</tr>
	  
	  
					<tr>
						<td>
							Username:
						</td>
		
						<td>
							<input type='text' name='username' value="<?php echo $username ?>">
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
			<p class='error5'>*Please fill in <b>all</b> sections.</p>
		<?php endif; ?>
		
		
	<?php endif; ?>
<?php endif; ?>



<html>

















<?php /*

error_reporting(0);

$submit = strip_tags($_POST['submit']);
$fname = strip_tags($_POST['fname']);
$lname = strip_tags($_POST['lname']);
$username = strtolower(strip_tags($_POST['username']));
$password = strip_tags($_POST['password']);
$rpassword = strip_tags($_POST['rpassword']);
$date = date("Y-m-d");

if ($submit == 'submit') {
	echo "Yes";
  $connect = mysql_connect("localhost","root","");
  mysql_select_db("phplogin");	
  $nameVerify = mysql_query("SELECT username FROM users WHERE username='$username'");
  $countNames = mysql_num_rows($nameVerify);
  if ($countNames!= 0) {
	  die ("This username has already been taken.");
  }
  else {
	
   if ($fname&&$lname&&$username&&$password&&$rpassword){

	   
	   
			if ($password==$rpassword){
					if (strlen($username)>25||strlen($fname)>25||strlen($lname)>25) {
						echo "Username/First Name/Last Name must be less than 25 characters.";
					}
					else {
						if (strlen($password)>25||strlen($password)<6){
							echo "Your password must be between 6 and 25 characters long";
						}
						else {
							   $password = md5($password);
							   $rpassword = md5($rpassword);							
							//register
							echo "Congratulations!";			
							$queryreg = mysql_query("
							    INSERT INTO users VALUES ('','$fname','$lname','$username','$password','$date')
							");
							echo (" You have been registered. <a href='mainpage.php'>Return to main page.</a>");
						}
					}
				
			}
			else {
				echo "Your passwords do not match.";
			}
	   
	   
			
	   
	   
   }
   else {
	   echo "Please fill in <b>all</b> sections.";
   }
   
  }
}

//Copy entire thing and turn into a php if else statement */
?>


