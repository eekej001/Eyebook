<?php
	session_start();
	$originalCommentUser = $_SESSION['originalCommentUser'];
	$originalCommentId = $_SESSION['originalCommentId'];
	$originalPostIndex = $_SESSION['originalPostIndex'];

?>



<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src='ajax2.js'></script>
<link rel='stylesheet' href='style.css'/>

	<div class='replyPartial'>
		<form class='replyPartialForm' action='replyAdd.php' method='POST'>
			<input type='hidden' name='originalCommentUser' value="<?php echo $originalCommentUser; ?>">
			<input type='hidden' name='originalCommentId' value="<?php echo $originalCommentId; ?>">
			<input type='hidden' name='originalPostIndex' value="<?php echo $originalPostIndex; ?>">
			<input type='hidden' name='type' value='reply'>
			<input type='text' name='reply' class='replyPartialBox'>
			<p class='editPartialButtons'>
				<button type='Button' class='replySubmit'>Submit</button>
				<button type='Button' class='replyCancel'>Cancel</button>
			</p>
		</form>
	<div>


</html>