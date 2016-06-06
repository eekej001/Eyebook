<!doctype html>
<?php 
	session_start(); 
	$connect4 = mysql_connect("localhost", "root", "") or die("Could not connect!");
			mysql_select_db("phplogin") or die("Couldn't find database");
	
	$x = $_SESSION['username'];
	$logUser = mysql_query("SELECT * FROM users WHERE username ='$x' ");
	$row3 = mysql_fetch_object($logUser);

	
	$_SESSION['user_id'] = (int)$row3->id;		
	  
			$commentsQuery = mysql_query("
				SELECT
					posts.id,
					posts.post,
					comments.postIndex,
					comments.time,
					comments.comment,
					comments.id,
					comments.user,
					comments.edited,
					users.username,
					replies.time AS rtime,
					
					
				COUNT(DISTINCT comments.id) AS comments,
				COUNT(DISTINCT comment_likes.id) AS comment_likes,
				GROUP_CONCAT(DISTINCT user_like_clone.username SEPARATOR '|') AS liked_by,
				GROUP_CONCAT(DISTINCT replies.comment SEPARATOR '|') AS replies_list,
				GROUP_CONCAT(DISTINCT replies.time SEPARATOR '|') AS replies_time
				
				FROM posts
				
				LEFT JOIN comments
				ON posts.id = comments.postIndex
				
				LEFT JOIN users
				ON comments.user = users.id
				
				LEFT JOIN comment_likes
				ON comments.id = comment_likes.commentId
				
				LEFT JOIN users AS user_like_clone
				ON comment_likes.user = user_like_clone.id
				
				LEFT JOIN replies
				ON comment_likes.commentId = replies.originalCommentId
				
				GROUP BY comments.id
			"); 
			
			
			
			$commentsQuery2 = mysql_query("
				SELECT
					
					(SELECT COUNT(*) FROM comments)+
					(SELECT COUNT(*) FROM replies)
				AS
					sumComments
				
			");
			
			$repliesQuery = mysql_query("
				SELECT
					comments.id,
					users.username,
					replies.originalCommentId,
					replies.comment,
					replies.time,
					replies.id,
					replies.edited,
					replies.replyUser,
					
				COUNT(reply_likes.id) AS reply_likes,
				GROUP_CONCAT(replyUser_like_clone.username SEPARATOR '|') AS liked_by

				FROM comments
				
				LEFT JOIN replies
				ON comments.id = replies.originalCommentId
				
				LEFT JOIN users
				ON replies.replyUser = users.id
				
				LEFT JOIN reply_likes
				ON replies.id = reply_likes.replyId
				
				LEFT JOIN users AS replyUser_like_clone
				ON reply_likes.user = replyUser_like_clone.id
				
				GROUP BY replies.id
			"); 
			
			
			
			

			while($row4 = mysql_fetch_object($commentsQuery)) {
				$row4->liked_by = $row4->liked_by ? explode('|', $row4->liked_by ) : [];
				$row4->replies_list = $row4->replies_list ? explode('|', $row4->replies_list ) : [];
				$row4->replies_time = $row4->replies_time ? explode('|', $row4->replies_time ) : [];
				$comments[] = $row4;
			} 			
			
			while($row5 = mysql_fetch_object($commentsQuery2)) {
				$comments2[] = $row5;
			} 
			
			while($row6 = mysql_fetch_object($repliesQuery)) {
				$row6->liked_by = $row6->liked_by ? explode('|', $row6->liked_by ) : [];
				$replies[] = $row6;
			}   
				
	
	
?>

<html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src='ajax2.js'></script>
<link rel='stylesheet' href='style.css'/>
	<div class='commentBack'>
	<h3 class='commentHeader'><?php echo $comments[0]->post; ?></h3>
	  <?php if($comments2[0]->sumComments == 1): ?>
				<p> <?php echo $comments2[0]->sumComments; ?> comment.</p>
			<?php else: ?>
				<p> <?php echo $comments2[0]->sumComments; ?> comments.</p>
			<?php endif; ?>
	  
	  <?php foreach($comments as $comment): ?>
		<div class='commentSpecific'>	
		   <div class='commentSpecificContent' data-id="<?php echo $comment->id ?>" data-user="<?php echo $comment->user ?>" data-comment="<?php echo $comment->comment ?>">	
			<p><div class='commentUname'><?php echo $comment->username; ?>
				<?php if (($comment->edited) !=='Yes'): ?>
				<?php else: ?>
					<span class='editMark'>*</span>
				<?php endif; ?>	
				</div>
			<div class='commentTime'><?php echo $comment->time; ?></div></p>
			
			
			<p><div class='commentText'><?php echo $comment->comment; ?></div>
			
			
			
			
		 	
			<form class='subLikeForm' action='subLike.php' data-id="<?php echo $comment->id ?>" method='POST'>
				<input type='hidden' name='type' value='comment'>
				<input type='hidden' name='id' value="<?php echo $comment->id ?>">
				<img src='images/like.png' class='subLikeI' data-id="<?php echo $comment->id ?>"/>
			</form>
			<?php if(($comment->comment_likes) > 0): ?>
				<div class='subLikeCount'><?php echo $comment->comment_likes; ?></div>
			<?php else: ?>
				<div class='subLikeCountHidden'><?php echo '.'; ?></div>
			<?php endif; ?>
			<?php if(!empty($comment->liked_by)): ?>
			   <div class='hiddenUserList' data-id="<?php echo $comment->id ?>">	
				<ul class='userList'>
					<?php foreach($comment->liked_by as $user): ?>
						<li><?php echo $user; ?></li>
					<?php endforeach; ?>
			   </div> 		
				</ul>
			<?php endif; ?>	

			<?php if($comment->user == $_SESSION['user_id']): ?>
			<form class='editForm' action='editCall.php' data-id="<?php echo $comment->id ?>" method='POST'>
				<input type='hidden' name='user' value="<?php echo $comment->user ?>">
				<input type='hidden' name='username' value="<?php echo $comment->username ?>">
				<input type='hidden' name='id' value="<?php echo $comment->id ?>">
				<input type='hidden' name='comment' value="<?php echo $comment->comment ?>">
				<a title='Edit'><img src='images/edit.png' class='editI' data-id="<?php echo $comment->id ?>"/></a>
			</form>	
			
			<!-- <a href="editForm.php?user=<?php// echo $comment->user ?>&id=<?php// echo $comment->id ?>&comment=<?php// echo $comment->comment ?>" class='edit' title='Edit'><img src='images/edit.png' class='editI'/></a> -->
			<form class='deleteForm' action='delete.php' data-id="<?php echo $comment->id ?>" method='POST'>
				<input type='hidden' name='user' value="<?php echo $comment->user ?>">
				<input type='hidden' name='id' value="<?php echo $comment->id ?>">
				<a title='Delete'><img src='images/delete.png' class='deleteI' data-id="<?php echo $comment->id ?>"/></a>
			</form>	
			</p>
			
			<?php else: ?>
			</p>
			<?php endif; ?>
			<form class='replyForm' action='replyCall.php' data-id="<?php echo $comment->id ?>" method='POST'>
				<input type='hidden' name='user' value="<?php echo $comment->user ?>">
				<input type='hidden' name='id' value="<?php echo $comment->id ?>">
				<input type='hidden' name='postIndex' value="<?php echo $comment->postIndex ?>">
				<span class='reply' data-id="<?php echo $comment->id ?>">Reply</span>
			</form>	
		   </div>	
		</div>  
		
			<?php foreach($replies as $reply): ?>
				<?php if($reply->originalCommentId == $comment->id): ?>
					<div class='replyDiv' data-id="<?php echo $reply->id ?>">
						<div class='commentUname'><img src='images/upArrow.png' class='upArrow'/><?php echo ' '.$reply->username; ?>
							<?php if (($reply->edited) !=='Yes'): ?>
							<?php else: ?>
							<span class='replyEditMark'>*</span>
							<?php endif; ?>	
						</div>
						<div class='replyTime'><?php echo $reply->time; ?><br>
						</div>
						<div class='replyText'><?php echo $reply->comment; ?><br>
						</div>
				<!---------------------------------------------------------------------->


						<form class='replyLikeForm' action='replyLike.php' data-id="<?php echo $reply->id ?>" method='POST'>
							<input type='hidden' name='type' value='comment'>
							<input type='hidden' name='id' value="<?php echo $reply->id ?>">
							<input type='hidden' name='originalCommentId' value="<?php echo $comment->id ?>">
							<img src='images/like.png' class='replyLikeI' data-id="<?php echo $reply->id ?>"/>
						</form>
						<?php if(($reply->reply_likes) > 0): ?>
							<div class='replyLikeCount'><?php echo $reply->reply_likes; ?></div>
						<?php else: ?>
							<div class='replyLikeCountHidden'><?php echo '.'; ?></div>
						<?php endif; ?>
						<?php if(!empty($reply->liked_by)): ?>
							<div class='replyHiddenUserList' data-id="<?php echo $reply->id ?>">	
							<ul class='replyUserList'>
						<?php foreach($reply->liked_by as $user): ?>
							<li><?php echo $user; ?></li>
						<?php endforeach; ?>
							</div> 		
							</ul>
						<?php endif; ?>	

						<?php if($reply->replyUser == $_SESSION['user_id']): ?>
						<form class='replyEditForm' action='replyEditCall.php' data-id="<?php echo $reply->id ?>" method='POST'>
							<input type='hidden' name='user' value="<?php echo $reply->replyUser ?>">
							<input type='hidden' name='username' value="<?php echo $reply->username ?>">
							<input type='hidden' name='id' value="<?php echo $reply->id ?>">
							<input type='hidden' name='comment' value="<?php echo $reply->comment ?>">
							<a title='Edit'><img src='images/edit.png' class='replyEditI' data-id="<?php echo $reply->id ?>"/></a>
						</form>	
			
			
						<form class='replyDeleteForm' action='replyDelete.php' data-id="<?php echo $reply->id ?>" method='POST'>
							<input type='hidden' name='user' value="<?php echo $reply->replyUser ?>">
							<input type='hidden' name='id' value="<?php echo $reply->id ?>">
							<a title='Delete'><img src='images/delete.png' class='replyDeleteI' data-id="<?php echo $reply->id ?>"/></a>
						</form>
						<?php endif; ?>







				<!----------------------------------------------------------------------->
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
						
					</div>	
				<?php endif; ?>
			<?php endforeach; ?>	
		
		
			<!--<?php// if(!empty($comment->replies_list)): ?>
			   <div class='repliesList' data-id="<?php// echo $comment->id ?>">	
				<ul class='repliesList'>
					<?php// foreach($comment->replies_list as $reply): ?>
						<?php// echo $reply; ?><br><br>
					<?php// endforeach; ?>
			   </div> 		
				</ul>
			<?php// endif; ?>	
			

			
			<?php// if(!empty($comment->replies_time)): ?>
			   <div class='repliesTime' data-id="<?php// echo $comment->id ?>">	
				<ul class='repliesTist'>
					<?php// foreach($comment->replies_time as $replyTime): ?>
						<?php// echo $replyTime; ?><br><br>
					<?php// endforeach; ?>
			   </div> 		
				</ul>
			<?php// endif; ?>	-->
			
	
	  <?php endforeach; ?>
	  </div>
	  
	  
	  <form action='comments.php' class='commentForm' method='POST'>
		<input type='hidden' name='type'  value='comment'/>
		<input type='hidden' name='id'  value='1'/>
		<input type='text' name='comment'  class='commentWindow' placeholder='Say something.  Anything.  Please...' maxlength='200'/>
		<p class='pButton'><button type='Button' class='commentSubmit'>Post</button></p>
		<!--<input type='text' name='comment'  class='commentWindow' placeholder='Say something.  Anything.  Please...' maxlength='200'/>
		<p class='pButton'><input type='submit' name='submit' value='Post'/></p> -->
	  </form>	
	  
</html>