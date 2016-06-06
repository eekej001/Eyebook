<?php
session_start();
mysql_connect("localhost", "root", "") or die("Could not connect!");
mysql_select_db("phplogin") or die("Couldn't find database");


$_SESSION['replyEditUser'] = $_POST['user'];
$_SESSION['replyEditUsername'] = $_POST['username'];
$_SESSION['replyEditId'] = $_POST['id'];
$_SESSION['replyEditComment'] = $_POST['comment'];
?>