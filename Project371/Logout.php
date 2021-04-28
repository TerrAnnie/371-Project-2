<?php
	session_start();
	unset($_SESSION['username']);//unset username
	unset($_SESSION['role']);//unset role
	header("Location:Homepage1.php");//send them to the homepage
	
	?>
