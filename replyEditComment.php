<?php  
	session_start();
	mysql_connect("localhost", "root", "") or die("Could not connect!");
	mysql_select_db("phplogin") or die("Couldn't find database");	
	
    if(isset($_POST['user'], $_POST['id'])) {
		$user = (int)$_POST['user'];
		$id = (int)$_POST['id'];
		$comment = $_POST['comment'];
		
			if ($user == $_SESSION['user_id']) {
		
				mysql_query("
					UPDATE replies
					SET comment = '$comment',
						edited = 'Yes'
						WHERE id = '$id'
						");

			}
	}	
	
	
?>