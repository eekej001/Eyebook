<?php
	session_start();
	$editUser = $_SESSION['editUser'];
	$editUsername = $_SESSION['editUsername'];
	$editId = $_SESSION['editId'];
	$editComment = $_SESSION['editComment'];

?>



<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src='ajax2.js'></script>
<link rel='stylesheet' href='style.css'/>

	<div class='editPartial'>
		<p><div class='commentUname'><?php echo $editUsername; ?></div></p>
		<form class='editPartialForm' action='editComment.php' method='POST'>
			<input type='hidden' name='user' value="<?php echo $editUser; ?>">
			<input type='hidden' name='id' value="<?php echo $editId; ?>">
			<input type='text' name='comment' value="<?php echo $editComment; ?>" class='editPartialBox'>
			<p class='editPartialButtons'>
				<button type='Button' class='editSubmit'>Submit</button>
				<button type='Button' class='editCancel'>Cancel</button>
			</p>
		</form>
	</div>


</html>