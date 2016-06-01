<?php
session_start();
mysql_connect("localhost", "root", "") or die("Could not connect!");
mysql_select_db("phplogin") or die("Couldn't find database");


$_SESSION['editUser'] = $_POST['user'];
$_SESSION['editUsername'] = $_POST['username'];
$_SESSION['editId'] = $_POST['id'];
$_SESSION['editComment'] = $_POST['comment'];
?>