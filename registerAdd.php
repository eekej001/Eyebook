<?php
session_start();
mysql_connect("localhost", "root", "") or die("Could not connect!");
mysql_select_db("phplogin") or die("Couldn't find database");
//error_reporting(0);

$_SESSION['submit'] = strip_tags($_POST['submit']);
$_SESSION['fname'] = strip_tags($_POST['fname']);
$_SESSION['lname'] = strip_tags($_POST['lname']);
$_SESSION['username'] = strtolower(strip_tags($_POST['username']));
$_SESSION['password'] = strip_tags($_POST['password']);
$_SESSION['rpassword'] = strip_tags($_POST['rpassword']);
$_SESSION['date'] = date("Y-m-d");


?>