<?php
	//ob_start();
	session_start();
	include('config/config.php');

	$fbID = $_POST['fbID'];
	$fbName = $_POST['fbName'];
	$fbEmail=$_POST['fbEmail'];

	// Get User ID
	//$user = $fbID;

	if ($fbID) {
		if($fbName)
		{
			$sql="select * from tb_user where `facebook` = ".$fbID;
			$result=mysqli_query($connect,$sql);
			$nRow=mysqli_num_rows($result);
			if($nRow ==0){
					$sql ="  INSERT INTO  tb_user (firstname,lastname,email,facebook,cf_userlevel,permit,update_time)
						VALUES
						('".trim($fbName)."',
						'(FB)',
						'".trim($fbEmail)."',
						'".trim($fbID)."',
						'3',
						'1',
						'".trim(date("Y-m-d H:i:s"))."')";
					$result=mysqli_query($connect,$sql);
			}
		}
			$sql="select * from tb_user where facebook = ".$fbID;
			$sql=$sql . " and permit ='1' ";
			$result=mysqli_query($connect,$sql);
			$nRow=mysqli_num_rows($result);
			if($nRow !=0){
					$row=mysqli_fetch_array($result);
					$_SESSION["DUR_USER_ID"]=$row["iduser"];
					$_SESSION["DUR_USER_NAME"]=$row["firstname"]." ".$row["lastname"];
					$_SESSION["DUR_USER_FACEBOOK"]=$row["facebook"];
					$_SESSION["DUR_USER_PICTURE"]=$row["picture"];
					$_SESSION["DUR_USER_STATE"]=$cf_userlevel[$row["cf_userlevel"]];
					$_SESSION["DUR_USER_TIME"]=$row["update_time"];

					$_SESSION["DUR_USER_PIC"]=$row['picture'];
					$_SESSION["DUR_USER_GROUP"]=$row["idgroup"];

					$ugroupid=$row["idgroup"];
					$sql="select * from tb_group where idgroup = $ugroupid";
					$result=mysqli_query($connect,$sql);
					@$gRow=mysqli_fetch_array($result);
					$_SESSION["DUR_USER_GROUP_NAME"]=$gRow["groupname"];

			}
			mysqli_close($connect);
	  	//header("location:index.php");
			echo true;
	}

	if($_GET["Action"] == "Logout")
	{
		$facebook->destroySession();
		header("location:index.php");
		exit();
	}


?>
