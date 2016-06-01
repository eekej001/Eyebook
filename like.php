<?php  
	
	session_start();
	$connect1 = mysql_connect("localhost", "root", "") or die("Could not connect!");
	mysql_select_db("phplogin") or die("Couldn't find database");	
	
    if(isset($_POST['type'], $_POST['id'])) {
		$type = $_POST['type'];
		$id = (int)$_POST['id'];
		
		switch($type) {
			case 'page':
				mysql_query("
					INSERT INTO page_likes (user, page)
						SELECT {$_SESSION['user_id']}, {$id}
						FROM pages
						WHERE EXISTS (
							SELECT id
							FROM pages
							WHERE id = {$id})
						AND NOT EXISTS (
							SELECT id
							FROM page_likes
							WHERE user={$_SESSION['user_id']}
							AND page = {$id})
						LIMIT 1
						
								
						");
					echo "Successfully Inserted";	
			break;	
		}
	}	
	
	//header('Location:mainpage.php');
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	
	/*session_start();
	$connect1 = mysql_connect("localhost", "root", "") or die("Could not connect!");
	mysql_select_db("phplogin") or die("Couldn't find database");	
	
    if(isset($_GET['type'], $_GET['id'])) {
		$type = $_GET['type'];
		$id = (int)$_GET['id'];
		
		switch($type) {
			case 'page':
				mysql_query("
					INSERT INTO page_likes (user, page)
						SELECT {$_SESSION['user_id']}, {$id}
						FROM pages
						WHERE EXISTS (
							SELECT id
							FROM pages
							WHERE id = {$id})
						AND NOT EXISTS (
							SELECT id
							FROM page_likes
							WHERE user={$_SESSION['user_id']}
							AND page = {$id})
						LIMIT 1
						
								
						");
			break;	
		}
	}	
	
	header('Location:mainpage.php'); */
	
?>