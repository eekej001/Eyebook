<?php  
	session_start();
	mysql_connect("localhost", "root", "") or die("Could not connect!");
	mysql_select_db("phplogin") or die("Couldn't find database");	
	
    if(isset($_POST['user'], $_POST['id'])) {
		$user = (int)$_POST['user'];
		$id = (int)$_POST['id'];
		
			if ($user == $_SESSION['user_id']) {
		
				mysql_query("
					DELETE FROM comments
						WHERE comments.id = $id		
						");
						
				mysql_query("
					DELETE FROM replies
						WHERE replies.originalCommentId = $id		
						");
				
				mysql_query("
					DELETE FROM comment_likes
						WHERE comment_likes.commentId = $id		
						");
				
				mysql_query("
					DELETE FROM reply_likes
						WHERE reply_likes.originalCommentId = $id		
						");

			}
	}
	
	
	
	/*if(isset($_GET['user'], $_GET['id'])) {
		$user = (int)$_GET['user'];
		$id = (int)$_GET['id'];
		
			if ($user == $_SESSION['user_id']) {
		
				mysql_query("
					DELETE FROM comments
						WHERE comments.id = $id		
						");

			}
	}*/	
	
	//header('Location:member.php');
	
?>