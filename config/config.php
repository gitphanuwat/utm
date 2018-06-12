<?php
// Turn off all error reporting
//error_reporting(0);
	error_reporting(~E_NOTICE);

	$PageTitle="UTM : ศูนย์การค้าสับปะรดห้วยมุ่น ";

	$host="localhost";
	$hostuser="root";
	$hostpass="admin@URU@1";
	//$hostpass="msql@CGI@2015";
	$database="utm";
	$connect = mysqli_connect($host,$hostuser,$hostpass,$database);
	mysqli_query($connect,"SET NAMES UTF8");
	//$Per_Page = 25;

	function getDatafromUser($tableName , $field , $id_subwork , $user_id , $id_userwork){
		$sql="select $field from $tableName where id_subwork=$id_subwork ";
		$sql=$sql . " and id_user= $user_id and id_userwork=$id_userwork" ;
		$result=mysqli_query($connect,$sql);
		$row=mysqli_fetch_array($result);
		return $row[0];
	}

	function addLogtoDB($logstr , $userID){
		// CheckIP ADDRESS For Log    ----  ====================================================*//
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

		/* END check IP ADDRESS For Log   ----- ====================================================*/

		$logdatetime = date("Y-m-d H:i:s");
		$LogSQL = "INSERT INTO cf_log";
		$LogSQL .="(logstr,id_user,logdatetime,ip) ";
		$LogSQL .="VALUES ";
		$LogSQL .="('".addslashes($logstr)."',".$userID.",'".$logdatetime."','".$ipaddress ."') ";
		$result=mysqli_query($connect,$LogSQL);

	}

	function CreatePrefix( $education){
		$ReturnPrefix="";
		if($education=="3"){
			$ReturnPrefix="ดร.";
		}

		return $ReturnPrefix;
	}

	function randomText($length){
		$text = "";
		$key_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHJKLMNPQRSTUVWXYZ0123456789';
		$rand_max  = strlen($key_chars) - 1;
		for ($i = 0; $i < $length; $i++) {
			$rand_pos  = rand(0, $rand_max);
			$text.= $key_chars{$rand_pos};
		}
		return $text;
	}

	function page_navigator($urlfile ,$before_p,$plus_p,$total,$total_p,$chk_page){
		global $e_page;
		global $querystr;

		$per_page=4;
		$num_per_page=floor($chk_page/$per_page);
		$total_end_p=($num_per_page+1)*$per_page;
		$total_start_p=$total_end_p-$per_page;
		$pPrev=$chk_page-1;
		$pPrev=($pPrev>=0)?$pPrev:0;
		$pNext=$chk_page+1;
		$pNext=($pNext>=$total_p)?$total_p-1:$pNext;
		$lt_page=$total_p-4;
		if($chk_page>0){
			echo "<li><a  href='$urlfile&s_page=$pPrev&querystr=".$querystr."' class='naviPN'>Prev</a></li>";
		}
		for($i=$total_start_p;$i<$total_end_p;$i++){
			$nClass=($chk_page==$i)?"class='selectPage'":"";
			if($e_page*$i<=$total){
			echo "<li><a href='$urlfile&s_page=$i&querystr=".$querystr."' class='naviPN'  >".intval($i+1)."</a></li> ";
			}
		}
		if($chk_page<$total_p-1){
			echo "<li><a href='$urlfile&s_page=$pNext&querystr=".$querystr."'  class='naviPN'>Next</a></li>";
		}
	}

	$cf_sex = array('','ชาย','หญิง');
	$cf_prefix = array('','นาย','นาง','นางสาว','อื่นๆ');
	$cf_userlevel = array('','ADMIN','MANAGER','USER');
	$cf_type=array('','หลงลับแล','หลินลับแล','พื้นเมือง','หมอนทอง');

	$config['App_ID'] = '1496188763803694';
	$config['App_Secret'] = '13ca95b19789a800190bc4fe50eea910';
	$pageID = '262013900603203';
	$pageID2 = '582857498471447';
	$pageID3 = 'ILikeURU';
?>
