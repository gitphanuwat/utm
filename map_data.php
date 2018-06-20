<?php
	session_start();
	include('config/config.php');

	if($_GET["action"]=="startmap"){
		echo '<script src="js/testmap.js"></script>';
		exit();
	}

?>
