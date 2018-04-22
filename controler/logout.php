<?php
session_start();
if ($_SESSION["logged_in_user"])
	$_SESSION["logged_in_user"] = "";
header('Location: ../index.php');