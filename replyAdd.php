<?php  
	session_start();
	mysql_connect("localhost", "root", "") or die("Could not connect!");
	mysql_select_db("phplogin") or die("Couldn't find database");	
	date_default_timezone_set('America/Los_Angeles');
	
	$reply = $_POST['reply'];
	$originalPostIndex = (int)$_POST['originalPostIndex'];
	$originalUser = (int)$_POST['originalCommentUser'];
	$originalId = (int)$_POST['originalCommentId'];
	$edited = 'No';
	

    if(isset($_POST['type'], $_POST['originalCommentId'])) {
		$type = $_POST['type'];
		$time = date("Y-m-d h:i:s");
		
		if(strlen($reply) > 0) {
			echo "Success In";
		  
		    switch($type) {
			  case 'reply':
				  mysql_query("
					  INSERT INTO replies (id, originalUser, replyUser, postIndex, originalCommentId, time, comment, edited)
						  VALUES ('', '{$originalUser}', '{$_SESSION['user_id']}', '{$originalPostIndex}', '{$originalId}', '{$time}', '{$reply}', '{$edited}')
						
								
						  ");
			  break;	
		    }
		}  
		  
	
		
	}	
	
?>
