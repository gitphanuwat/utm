<?php
	session_start();
	include('config/config.php');
	mysqli_query($connect,"SET NAMES UTF8");


	if($_GET["action"]=="startmap"){
		echo '<script src="js/gmap.js"></script>';
		exit();
	}


?>
