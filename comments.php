<?php  
	session_start();
	mysql_connect("localhost", "root", "") or die("Could not connect!");
	mysql_select_db("phplogin") or die("Couldn't find database");	
	date_default_timezone_set('America/Los_Angeles');
	
	$_SESSION['comment'] = $_POST['comment'];
	//echo "Comment: ".$_SESSION['comment']."<br>";
    //echo $_SESSION['user_id'];
	
	/*$id = (int)$_GET['id'];	
		echo "ID: ".$id."<br>";
		
	$type = $_GET['type'];	
		echo "Type: ".$type."<br>";
		
	$time = date('Y-m-d H:i:s');
	//  $time = date("Y-m-d");
		echo "Date: ".$time."<br>"; */
		
		$id = (int)$_POST['id'];
		
		//echo var_dump($_GET['type']). '<br>';
	    //echo var_dump($id);
	
    if(isset($_POST['type'], $_POST['id'])) {
		$type = $_POST['type'];
		//$id = (int)$_GET['id'];
		$time = date("Y-m-d h:i:s");
		
		
		//echo $id;
		//echo $_SESSION['comment'];
		if(strlen($_SESSION['comment']) > 0) {
		  
		    switch($type) {
			  case 'comment':
				  mysql_query("
					  INSERT INTO comments (id, user, postIndex, time, comment)
						  VALUES ('', '{$_SESSION['user_id']}', '{$id}', '{$time}', '{$_SESSION['comment']}')
						
								
						  ");
			  break;	
		    }
		}  
		  
		  
		  
		  
		  
		/*switch($type) {
			case 'comment':
				mysql_query("
					INSERT INTO comments (user, postIndex, time, comment)
						SELECT {$_SESSION['user_id']}, {$id}, {$time}, {$_SESSION['comment']}
						FROM posts
						WHERE EXISTS (
							SELECT id
							FROM posts
							WHERE id = {$id})
						
								
						");
			break;	
		}*/
		
		
		
		
		
		
	}	
	
	//header('Location:member.php');
	
	
	//NOTES FOR EDIT COMMENT FUNCTION
	//Add a class to each comment in the foreach loop based on the comment.id
	//Update the innerhtml of that comment specific class on edit button click with DIV with form with value set to the current comment content
	//Make separate php file for update the database of the specific comment
	
?>
