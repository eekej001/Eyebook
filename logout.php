<?php
session_start();
session_destroy();
header('Location:mainpage.php');
//echo "You have been logged out.  Click <a href='mainpage.php'>here</a> to return."



?>