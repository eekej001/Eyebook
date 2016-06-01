<html>
	<link rel='stylesheet' href='style.css'/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="ajax.js"></script>
	<title>Eyebook</title>
	<h1>
	
	<?php 
	session_start();
	//error_reporting(0);
	 if(@$_SESSION['username']) {
	  echo "<div class='loggedGr'>Welcome, " .$_SESSION['username']."!</div>".
	  "<div class='reg loggedReg'><a href='member.php' class='memPl'>Member Page</a><a href='logout.php'>Logout</a></div>
	  <h1><div class='eye'><b>Eyebook</b></div></h1>";
     }
     else {
      echo "	
	  <form action='login.php' method='POST'>
	  <div class='log'>
	    <div class='log1'>
		  Username: <input type='text' name='username'/><br>
		</div>
		<div class='log2'>
		  Password: <input type='password' name='password'/><br>
		</div>    
		  <input type='submit' value='Log in'>
		 
	  </div>	
	  </form> <br>
	  <div class='reg'><a href='registerpage.php'>Register?</a></div>
	  <h1><div class='eye'><b>Eyebook</b></div></h1>";
	 }
	 ?>
	
	  
	<body>  
	  <div class='descrip'><p class='first'>Welcome to Eyebook, the latest social network!
	  These days minimalist styles are trending, so why deal with an entire face when you can just have the eye.  
	  But if you thought that amount of content was minimal, just wait! 
	  This social media site doesn't let you interact with other people; just me! In fact, some might describe this as a personal website.  Pfft...  
	  Sign up today and get access to the features described below!</p></div>
	  
	 <div class='thumbs'> 
	    <a href ='http://www.facebook.com'><img src='images/facebook.png'/></a><br>
	    <a href ='http://www.twitter.com'><img src='images/twitter.png'/></a><br>
	    <a href ='http://www.instagram.com'><img src='images/instagram.png'/></a><br>
	    <a href ='http://www.github.com'><img src='images/github.png'/></a><br>
	    <a href ='http://www.youtube.com'><img src='images/youtube.png'/></a><br>
		<a href ='http://www.pinterest.com'><img src='images/pinterest.png'/></a>
	 </div>
	 
	<div class='icons'> 
	 <dl>
	   <dt>Images</dt>
	   <dd><img style='width:200px' src='images/eye1.jpg' class='iSamp'/></dd>
	 </dl>
	 
	 <dl>
	   <dt>Videos</dt>
	   <dd><img style='width:200px' src='images/eyev.jpg' class='vSamp'/></dd>
	 </dl>
	 
	 <dl>
	   <dt>Commentary</dt>
	   <dd><img style='width:200px' src='images/eyed.jpg' class='cSamp'/></dd>
	 </dl>
	</div> 
	 
    </body>
	
	<div class='likeD'>
		<p>If you like what you see, go ahead and give the page a like!</p>
		<?php
	
			$connect1 = mysql_connect("localhost", "root", "") or die("Could not connect!");
			mysql_select_db("phplogin") or die("Couldn't find database");
	
			
			/*$query1 = mysql_query("SELECT likes FROM likes");
			$row1 = mysql_fetch_assoc($query1);
			$dataBlikes = $row1['likes'];
			echo "<div><p>".$dataBlikes."</p></div>"; */
			
			
			
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
			
			//echo '<pre>', print_r($pages, true), '</pre>';
			//die();
			
			$likeNum = 0;
		?>  

		
	  <div class='likeSection'>	
	  
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
		
		
		
		
		
		
		
		
		
		
	  
	  
	  
	 	<!--	<?php// foreach($pages as $page): ?>
			<h3> <?php// echo $page->title; ?></h3>
			<a href="like.php?type=page&id=<?php// echo $page->id; ?>" class='like'><img class='likeI' src='images/like.png'/></a>
		  <?php// if($page->likes == 1): ?>	
			<p class='likeHow'><?php// echo $page->likes; ?> person likes this.</p>
		  <?php// else: ?>
			<p class='likeHow'><?php// echo $page->likes; ?> people like this.</p>
		  <?php// endif; ?>	
			<?php// if(!empty($page->liked_by)): ?>
				<ul class='userList'>
					<?php// foreach($page->liked_by as $user): ?>
						<li><?php// echo $user; ?></li>
					<?php// endforeach; ?>
				</ul>
			<?php// endif; ?>
		<?php// endforeach; ?>  
		
		<h2 style='background:red'>Barrier!</h2><br/> -->
		<!-- Create variable that increase on foreach iteration --> 
	  
	  
	  
	  
		<!--<?php// foreach($pages as $page): ?>
			<?php// $likeNum += 1; ?>
			<h3> <?php// echo $page->title; ?></h3>
			<form class="likeIspec<?php// echo$likeNum; ?>" action='like.php' method='POST'>
				<input type='hidden' name='type' value='page'>
				<input type='hidden' name='id' value="<?php// echo $page->id ?>">
				<img class="likeIspec<?php// echo$likeNum; ?>" src='images/like.png'/>
			</form>
		<div class='bottomPort'>		
		  <?php// if($page->likes == 1): ?>	
			<p class='likeHow'><?php// echo $page->likes; ?> person likes this.</p>
		  <?php// else: ?>
			<p class='likeHow'><?php// echo $page->likes; ?> people like this.</p>
		  <?php// endif; ?>	
			<?php// if(!empty($page->liked_by)): ?>
				<ul class='userList'>
					<?php// foreach($page->liked_by as $user): ?>
						<li><?php// echo $user; ?></li>
					<?php// endforeach; ?>
				</ul>
			<?php// endif; ?>	
		</div>	
		<?php// endforeach; ?> -->
		
		
		
		
		
		
		
	  </div>
		
	</div>	

    <div class='footer'>
		<a href='google.com'>About</a>
		<a href='google.com'>FAQs</a>
		<a href='google.com'>Affiliates</a>
		<a href='google.com'>Career</a>
		<a href='google.com'>Contact</a>
	</div>




<script type='text/javascript'>

$(document).ready(function() {
	var imgBreak = 0;
	
	$('.iSamp').click(function(){
		$('p.first').append("<img class='demo' src='images/eye1.jpg'/>");
		$('h1').append("<div class='demoBack'></div>");
		
		setTimeout(function() {
			imgBreak = 1;
		}, 100);
		
	});
	
	
	$('.vSamp').click(function(){
		$('p.first').append("<img class='demo' src='images/eyev.jpg'/>");
		$('h1').append("<div class='demoBack'></div>");
		
		setTimeout(function() {
			imgBreak = 1;
		}, 100);
		
	});
	
	$('.cSamp').click(function(){
		$('p.first').append("<img class='demo' src='images/eyed.jpg'/>");
		$('h1').append("<div class='demoBack'></div>");
		
		setTimeout(function() {
			imgBreak = 1;
		}, 100);
		
	});
	
	$('html').click(function(){
	   if($('.demo').length > 0 && imgBreak == 1) {
			$('.demo').remove();
			$('.demoBack').remove();
			imgBreak = 0;
	   }
	});
	

	
	
	
	
	
	
	
	
	/*$('.like').click(function(){
		<?php  
			//mysql_query("UPDATE likes SET likes=likes + 1");
		?>
		location.reload();
	}); */
	
}); 

	/*	<?php  
			mysql_query("UPDATE likes SET likes=likes - 1");
		?> */


</script>



</html>




<!--<script type='text/javascript'>

	plike = function() {
		
		
		<?php
		/*$connect1 = mysql_connect("localhost", "root", "") or die("Could not connect!");
		mysql_select_db("phplogin") or die("Couldn't find database");
		mysql_query("UPDATE likes SET likes=likes + 1"); */
		?>
		alert("Eeeey");
		location.reload();
	}

<img class='like' src='images/like.png' onclick='plike()'/>
</script> -->