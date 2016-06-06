<?php
	session_start();
	$replyEditUser = $_SESSION['replyEditUser'];
	$replyEditUsername = $_SESSION['replyEditUsername'];
	$replyEditId = $_SESSION['replyEditId'];
	$replyEditComment = $_SESSION['replyEditComment'];

?>



<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src='ajax2.js'></script>
<link rel='stylesheet' href='style.css'/>

	<div class='replyEditPartial'>
		<p><div class='commentUname'><img src='images/upArrow.png' class='upArrow'/><?php echo ' '.$replyEditUsername; ?></div></p>
		<form class='replyEditPartialForm' action='replyEditComment.php' method='POST'>
			<input type='hidden' name='user' value="<?php echo $replyEditUser; ?>">
			<input type='hidden' name='id' value="<?php echo $replyEditId; ?>">
			<input type='text' name='comment' value="<?php echo $replyEditComment; ?>" class='editPartialBox'>
			<p class='editPartialButtons'>
				<button type='Button' class='replyEditSubmit'>Submit</button>
				<button type='Button' class='replyEditCancel'>Cancel</button>
			</p>
		</form>
	</div>


</html>