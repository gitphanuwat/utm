<?php
	//ob_start();
	session_start();
	include('config/config.php');

	$uName = $_POST['userid'];
	$pWord = $_POST['password'];
	$ch=$_POST['remember_me'];

	$sql="select * from tb_managers_user where `username` = '$uName' and `password`='$pWord' ";
	$result=mysqli_query($connect,$sql);
	$nRow=mysqli_num_rows($result);
	if($nRow !=0){
		$row=mysqli_fetch_array($result);
		$_SESSION["DUR_USER_ID"]=$row['id_user'];
		$_SESSION["DUR_USER_NAME"]=$row['firstname'].' '.$row['lastname'];
		$_SESSION["DUR_USER_PIC"]=$row['profile_pic'];
		$_SESSION["DUR_USER_STATE"]="ADMIN";

		if($ch=="1"){
			//setcookie (“COOKIE_DUR_USER_ID”,”$row[0]”,time()+1000 );
			//setcookie (“COOKIE_DUR_USER_STATE”,”ADMIN”,time()+1000 );
		}
		$loginState=1;
		echo 'true';
	}else{
		$loginState=0;
		//echo 'false';
	}

	//login สมาชิก
	if($loginState==0){
		$sql="select * from tb_user where `username` = '$uName' and `password`='$pWord' ";
		$result=mysqli_query($connect,$sql);
		$nRow=mysqli_num_rows($result);
		if($nRow !=0){
			//ตรวจสอบการอนมุติการใช้งาน
			if($row["permit"]=='0'){
				echo '0';
			}else{
				$row=mysqli_fetch_array($result);
		$_SESSION["DUR_USER_ID"]=$row['iduser'];
		$_SESSION["DUR_USER_NAME"]=$row['firstname'].' '.$row['lastname'];
		$_SESSION["DUR_USER_PIC"]=$row['picture'];
		$_SESSION["DUR_USER_STATE"]=$cf_userlevel[$row["cf_userlevel"]];
		$_SESSION["DUR_USER_GROUP"]=$row["idgroup"];
		$_SESSION["DUR_USER_TIME"]=$row["update_time"];

		$ugroupid=$row["idgroup"];

		$sql="select * from tb_group where idgroup = 1 ";
		$result=mysqli_query($connect,$sql);
		$gRow=mysqli_fetch_array($result);
		$_SESSION["DUR_USER_GROUP_NAME"]=$gRow["groupname"];

				$ip=getIP();
				$logdatetime = date("Y-m-d H:i:s");
				$sql="insert into cf_log_userlogin(iduser , logdatetime , ip) ";
				$sql=$sql . " values(" . $row["iduser"] . ", '$logdatetime' , '$ip')";
				$result1=mysqli_query($connect,$sql);
				echo 'true';
			}
		}else{
			echo 'false';
		}
	}
	mysqli_close($connect);
	//ob_end_flush();

	function getIP(){
		$ipaddress = '';
		if (getenv('HTTP_CLIENT_IP'))
			$ipaddress = getenv('HTTP_CLIENT_IP');
		else if(getenv('HTTP_X_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_X_FORWARDED_FOR');
		else if(getenv('HTTP_X_FORWARDED'))
			$ipaddress = getenv('HTTP_X_FORWARDED');
		else if(getenv('HTTP_FORWARDED_FOR'))
			$ipaddress = getenv('HTTP_FORWARDED_FOR');
		else if(getenv('HTTP_FORWARDED'))
			$ipaddress = getenv('HTTP_FORWARDED');
		else if(getenv('REMOTE_ADDR'))
			$ipaddress = getenv('REMOTE_ADDR');
		else
			$ipaddress = 'UNKNOWN';

		return $ipaddress;
	}
?>
