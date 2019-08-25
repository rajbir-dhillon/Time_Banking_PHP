<?php
	session_start();
	include_once 'classes/class.user.php';
	$user = new User();

	$logout = $user->user_logout();
?>
