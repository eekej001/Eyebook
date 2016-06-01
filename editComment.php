<?php  
	session_start();
	mysql_connect("localhost", "root", "") or die("Could not connect!");
	mysql_select_db("phplogin") or die("Couldn't find database");	
	
    if(isset($_POST['user'], $_POST['id'])) {
		$user = (int)$_POST['user'];
		$id = (int)$_POST['id'];
		$comment = $_POST['comment'];
		
		echo 'User: '.var_dump($user).'<br>';
		echo 'ID: '.var_dump($id).'<br>';
		echo 'Comment: '.var_dump($comment).'<br>';
		
			if ($user == $_SESSION['user_id']) {
		
				mysql_query("
					UPDATE comments
					SET comment = '$comment',
						edited = 'Yes'
						WHERE id = '$id'
						");

			}
	}	
	
	
?>



<?php  
	/*session_start();
	mysql_connect("localhost", "root", "") or die("Could not connect!");
	mysql_select_db("phplogin") or die("Couldn't find database");	
	
    if(isset($_GET['user'], $_GET['id'])) {
		$user = (int)$_GET['user'];
		$id = (int)$_GET['id'];
		$comment = $_GET['comment'];
		
		echo 'User: '.var_dump($user).'<br>';
		echo 'ID: '.var_dump($id).'<br>';
		echo 'Comment: '.var_dump($comment).'<br>';
		
			if ($user == $_SESSION['user_id']) {
		
				mysql_query("
					UPDATE comments
					SET comment = '$comment' 
						WHERE id = '$id'		
						");

			}
	}	*/
	
	//header('Location:member.php');
	
?>