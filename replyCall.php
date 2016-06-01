<?php
session_start();
mysql_connect("localhost", "root", "") or die("Could not connect!");
mysql_select_db("phplogin") or die("Couldn't find database");


$_SESSION['originalCommentUser'] = $_POST['user'];
$_SESSION['originalCommentId'] = $_POST['id'];
$_SESSION['originalPostIndex'] = $_POST['postIndex'];
?>