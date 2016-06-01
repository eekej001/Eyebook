<!doctype html>
<?php
	        mysql_connect("localhost", "root", "") or die("Could not connect!");
			mysql_select_db("phplogin") or die("Couldn't find database");
	

			$pagesQuery = mysql_query("
				SELECT 
					pages.id, 
					pages.title,
				
				COUNT(page_likes.id) AS likes,
				GROUP_CONCAT(users.username SEPARATOR '|') AS liked_by
				
				FROM pages
				
				LEFT JOIN page_likes
				ON pages.id = page_likes.page
				
				LEFT JOIN users
				ON page_likes.user = users.id
				
				GROUP BY pages.id
			");
			
			
			
			while($row2 = mysql_fetch_object($pagesQuery)) {
				$row2->liked_by = $row2->liked_by ? explode('|', $row2->liked_by ) : [];
				$pages[] = $row2;
			}


			$likeNum = 0;
			
?>

<html>

<!-- <script type='text/javascript'>
	var url1 = 'https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js';
	var url2 = 'ajax.js';
	//$.getScript(url1);
	//$.getScript(url2);
	$.getScript('https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js');
	$.getScript('ajax.js');

</script> -->


<!-- <script type='text/javascript'>
	$.ajaxPrefilter(function( options, originalOptions, jqXHR ) {
    options.async = true;
});
</script> -->

<!-- <script type='text/javascript'>
	$('body').append("<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js'></script>");
	$('body').append("<script src='ajax.js'></script>");
</script> -->

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script> 
<script src='ajax.js'></script>
	
	<?php foreach($pages as $page): ?>
			<?php $likeNum += 1; ?>
			<h3> <?php echo $page->title; ?></h3>
			<form class='likeForm' action='like.php'  data-id="<?php echo $page->id ?>" method='POST'>
				<input type='hidden' name='type' value='page'>
				<input type='hidden' name='id' value="<?php echo $page->id ?>">
				<img class='likeImg' src='images/like.png' data-id="<?php echo $page->id ?>" />
			</form>
		<div class='bottomPort'>		
		  <?php if($page->likes == 1): ?>	
			<p class='likeHow'><?php echo $page->likes; ?> person likes this.</p>
		  <?php else: ?>
			<p class='likeHow'><?php echo $page->likes; ?> people like this.</p>
		  <?php endif; ?>	
			<?php if(!empty($page->liked_by)): ?>
				<ul class='userList'>
					<?php foreach($page->liked_by as $user): ?>
						<li><?php echo $user; ?></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>	
		</div>	
		<?php endforeach; ?>
	

</html>

<script type='text/javascript'>

/*$(document).ready(function() {
	var counter = $('.likeActive');
	alert(counter.length);
	alert('Load it up!');
	$('img.likeImg').click(function() {
		alert ('Hey!');
		var indivLikeId = $(this).attr('data-id');
			var likeCheck = $('.likeForm');;
			var likeStore;
			//alert(likeCheck.length);
			//alert(indivLikeId);
		
			for(i=0 ; i < likeCheck.length; i++) {
				if($(likeCheck[i]).attr('data-id') == indivLikeId) {
					//alert('Match!');
					likeStore = $(likeCheck[i]);
					likeStore.attr('class', 'likeActive');
					$.post($('.likeActive').attr('action'), $('.likeActive :input').serializeArray(), function(info) {$('.likeSection').load('likeSection.php');});
				}
			}

	
	
	
	});
}); */

</script>

