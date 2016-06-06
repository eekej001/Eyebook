<?php  
	
	session_start();
	$connect1 = mysql_connect("localhost", "root", "") or die("Could not connect!");
	mysql_select_db("phplogin") or die("Couldn't find database");	
	
	if(isset($_POST['type'], $_POST['id'])) {
		$type = $_POST['type'];
		$id = (int)$_POST['id'];
		$originalCommentId = (int)$_POST['originalCommentId'];
		
		switch($type) {
			case 'comment':
				mysql_query("
					INSERT INTO reply_likes (user, replyId, originalCommentId)
						SELECT {$_SESSION['user_id']}, {$id}, {$originalCommentId}
						FROM replies
						WHERE EXISTS (
							SELECT id
							FROM replies
							WHERE id = {$id})
						AND NOT EXISTS (
							SELECT id
							FROM reply_likes
							WHERE user={$_SESSION['user_id']}
							AND replyId = {$id}
							AND originalCommentId = {$originalCommentId})
						LIMIT 1
						
								
						");	
			break;	
		}
	}	
	
?>