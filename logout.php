<?php 
	session_start();

	session_unset('email');
	session_unset('password');

	session_destroy();

	header('Location: Editorial_Home.php');

 ?>