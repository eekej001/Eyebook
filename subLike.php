<?php  
	
	session_start();
	$connect1 = mysql_connect("localhost", "root", "") or die("Could not connect!");
	mysql_select_db("phplogin") or die("Couldn't find database");	
	
    if(isset($_POST['type'], $_POST['id'])) {
		$type = $_POST['type'];
		$id = (int)$_POST['id'];
		
		switch($type) {
			case 'comment':
				mysql_query("
					INSERT INTO comment_likes (user, commentId)
						SELECT {$_SESSION['user_id']}, {$id}
						FROM comments
						WHERE EXISTS (
							SELECT id
							FROM comments
							WHERE id = {$id})
						AND NOT EXISTS (
							SELECT id
							FROM comment_likes
							WHERE user={$_SESSION['user_id']}
							AND commentId = {$id})
						LIMIT 1
						
								
						");
					echo "Successfully Inserted";	
			break;	
		}
	}	
	
?>