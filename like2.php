<?php 
    session_start();
	$connect1 = mysql_connect("localhost", "root", "") or die("Could not connect!");
	mysql_select_db("phplogin") or die("Couldn't find database");
	mysql_query("UPDATE likes SET likes=likes + 1");
	header('Location:mainpage.php');
?>