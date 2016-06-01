<html>
<link rel='stylesheet' href='style.css'/>
<?php  
	session_start();
	mysql_connect("localhost", "root", "") or die("Could not connect!");
	mysql_select_db("phplogin") or die("Couldn't find database");	
	
    if(isset($_GET['user'], $_GET['id'])) {
		$user = (int)$_GET['user'];
		$id = (int)$_GET['id'];
		$comment = $_GET['comment'];
	}	
?>		
			<?php if ($user == $_SESSION['user_id']): ?>
				<h1 class='head3'><div class='head3T'>Eyebook</div> <?php echo "<div class='editGr'>Welcome, ".$_SESSION['username']. "!</div> <br><div class='editLinks'><a href='mainpage.php' class='editHome'>Home</a><a href='logout.php' class='editLogOut'>Logout</a></div>"?></h1>
				<h3 class='subhead3'>Edit Post:</h3>
				<div class='body3'>
				<form action='editComment.php' method='GET'>
					<input type='hidden' name='user'  value="<?php echo $user ?>"/>
					<input type='hidden' name='id'  value="<?php echo $id ?>"/>
					<input type='text' name='comment'  class='commentWindow' value="<?php echo $comment ?>" maxlength='200'/>
					<p><input type='submit' name='submit' value='Submit Change'/></p>
				</form> 
				<p><a href='member.php' class='cancelEdit'>Cancel</a></p>
				</div>
				
				<div class='footer3'>
					<a href='google.com'>About</a>
					<a href='google.com'>FAQs</a>
					<a href='google.com'>Affiliates</a>
					<a href='google.com'>Career</a>
					<a href='google.com'>Contact</a>
				</div>
			<?php else: ?>
				header('Location:member.php');
			<?php endif; ?>	
</html>