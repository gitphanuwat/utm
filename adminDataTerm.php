<?php
	session_start();
	include('config/config.php');
	
	//เพิ่มข้อมูล/แก้ไขข้อมูล
	if($_GET["action"]=="insert"){
		$msgsuccess=0;
		$msgerror=0;

		if($_POST["id_term"]==""){

			if($_POST["term"] == "" || $_POST["year"] == "" || $_POST["total_load"]=="" ){
				$msgerror=4;
			}else{

				if($_POST["status"]=="1"){
					$status=1;
				}else{
					$status=0;
				}
				$vowels = array("/");
				$tablename="tb_userwork_" . str_replace($vowels, "", $_POST["term"]);

				$sql="select * from tb_term where term = '" . $_POST["term"] . "'";
				$result=mysqli_query($connect,$sql);
				$nRow=mysqli_num_rows($result);
				if($nRow !=0){
					$msgerror=3;
				}else{
					if($_FILES["reference"]["error"]==4){
						$sql="insert into tb_term(term , year , tablename , status , total_load , reference ) ";
						$sql=$sql . " values('"  .$_POST["term"] . "' , '" . $_POST["year"] . "' , '$tablename' , '$status' ";
						$sql=$sql . " , " . $_POST["total_load"] . " , '')";
						$resultAdd=mysqli_query($connect,$sql);

						$sql="CREATE TABLE IF NOT EXISTS $tablename (`id_userwork` int(11) NOT NULL, `id_subwork` int(11) NOT NULL , ";
						$sql=$sql . "  `id_mainwork` int(5) NOT NULL,`subwork` varchar(150) DEFAULT NULL,";
						$sql=$sql . " `condition` varchar(200) DEFAULT NULL,`detail` text DEFAULT NULL,`num_student` varchar(100) DEFAULT NULL, ";
						$sql=$sql . " `cf_sector` varchar(2) DEFAULT NULL,  `cf_level` varchar(2) DEFAULT NULL, ";
						$sql=$sql . " `credit` varchar(100) DEFAULT NULL,  `theory_hr` varchar(100) DEFAULT NULL, ";
						$sql=$sql . " `operate_hr` varchar(100) DEFAULT NULL,  `cf_userwrite` varchar(1) DEFAULT NULL, ";
						$sql=$sql. " `amount` varchar(100) DEFAULT NULL,  `cf_committe` varchar(1) DEFAULT NULL, ";
						$sql=$sql . " `id_source` varchar(100) DEFAULT NULL,  `budget` varchar(100) DEFAULT NULL, ";
						$sql=$sql . "  `load` varchar(100) DEFAULT NULL ";
						$sql=$sql . " , `id_user` int(11) NOT NULL ";
						$sql=$sql . ") ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
						$resultAdd=mysqli_query($connect,$sql);

						$sql="ALTER TABLE `$tablename` ADD PRIMARY KEY (`id_userwork`); ";
						$resultAdd=mysqli_query($connect,$sql);

						$sql="ALTER TABLE `$tablename` MODIFY `id_userwork` int(11) NOT NULL AUTO_INCREMENT; ";
						$resultAdd=mysqli_query($connect,$sql);


						$msgsuccess=1;
					}else{
						$accept_type=array("application/pdf");
						$file=$_FILES["reference"]["name"];
						$typefile=$_FILES["reference"]["type"];
						$sizefile=$_FILES["reference"]["size"];
						$tempfile=$_FILES["reference"]["tmp_name"];

						if(!in_array($typefile,$accept_type)){
							$msgerror=1;
						}else{
							$a=randomText(5);
							$extension = end(explode(".",$file));
							$pname="rf_$a" . "." . $extension;
							$target_path = "user/doc/" . $pname;
							//upload file
							if(@move_uploaded_file($tempfile,$target_path)){
								$sql="insert into tb_term(term , year , tablename , status , total_load , reference ) ";
								$sql=$sql . " values('"  .$_POST["term"] . "' , '" . $_POST["year"] . "' , '$tablename' , '$status' ";
								$sql=$sql . " , " . $_POST["total_load"] . " , '$pname')";
								$resultAdd=mysqli_query($connect,$sql);

								$sql="CREATE TABLE IF NOT EXISTS $tablename (`id_userwork` int(11) NOT NULL, `id_subwork` int(11) NOT NULL , ";
								$sql=$sql . "  `id_mainwork` int(5) NOT NULL,`subwork` varchar(150) DEFAULT NULL,";
								$sql=$sql . " `condition` varchar(200) DEFAULT NULL,`detail` text DEFAULT NULL,`num_student` varchar(100) DEFAULT NULL, ";
								$sql=$sql . " `cf_sector` varchar(2) DEFAULT NULL,  `cf_level` varchar(2) DEFAULT NULL, ";
								$sql=$sql . " `credit` varchar(100) DEFAULT NULL,  `theory_hr` varchar(100) DEFAULT NULL, ";
								$sql=$sql . " `operate_hr` varchar(100) DEFAULT NULL,  `cf_userwrite` varchar(1) DEFAULT NULL, ";
								$sql=$sql. " `amount` varchar(100) DEFAULT NULL,  `cf_committe` varchar(1) DEFAULT NULL, ";
								$sql=$sql . " `id_source` varchar(100) DEFAULT NULL,  `budget` varchar(100) DEFAULT NULL, ";
								$sql=$sql . "  `load` varchar(100) DEFAULT NULL ";
								$sql=$sql . " , `id_user` int(11) NOT NULL ";
								$sql=$sql . ") ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;";
								$resultAdd=mysqli_query($connect,$sql);

								$sql="ALTER TABLE `$tablename` ADD PRIMARY KEY (`id_userwork`); ";
								$resultAdd=mysqli_query($connect,$sql);

								$sql="ALTER TABLE `$tablename` MODIFY `id_userwork` int(11) NOT NULL AUTO_INCREMENT; ";
								$resultAdd=mysqli_query($connect,$sql);

								$msgsuccess=1;
							}else{
								$msgerror=2;
							}
						}
					}
				}
			}
		}else{
			//แก้ไขข้อมูล
			if($_POST["term"] == "" || $_POST["year"] == "" || $_POST["total_load"]=="" ){
				$msgerror=4;
			}else{
				if($_POST["status"]=="1"){
					$status=1;
				}else{
					$status=0;
				}
				$vowels = array("/");
				$tablename="tb_userwork_" . str_replace($vowels, "", $_POST["term"]);

				if($_FILES["reference"]["error"]==4){
					$sql="select tablename from tb_term where id_term=" . $_POST["id_term"];
					$result=mysqli_query($connect,$sql);
					$row=mysqli_fetch_array($result);
					$oletablename=$row[0];

					$sql="update tb_term set term='" . $_POST["term"] . "' , year ='" . $_POST["year"] . "' ";
					$sql=$sql . " , status='$status' , total_load=" . $_POST["total_load"] ;
					$sql=$sql . " , tablename='$tablename' ";
					$sql=$sql . " where id_term = " . $_POST["id_term"];
					$resultAdd=mysqli_query($connect,$sql);

					$sql="update tb_document set tabeName ='$tablename' where tabeName='$oletablename' ";
					$resultAdd=mysqli_query($connect,$sql);

					$sql="RENAME TABLE $oletablename TO $tablename;";
					$resultAdd=mysqli_query($connect,$sql);
					$msgsuccess=1;
				}else{
					$accept_type=array("application/pdf");
					$file=$_FILES["reference"]["name"];
					$typefile=$_FILES["reference"]["type"];
					$sizefile=$_FILES["reference"]["size"];
					$tempfile=$_FILES["reference"]["tmp_name"];

					if(!in_array($typefile,$accept_type)){
						$msgerror=1;
					}else{
						$a=randomText(5);
						$extension = end(explode(".",$file));
						$pname="rf_$a" . "." . $extension;
						$target_path = "user/doc/" . $pname;
						//upload file
						if(@move_uploaded_file($tempfile,$target_path)){
							$sql="select tablename from tb_term where id_term=" . $_POST["id_term"];
							$result=mysqli_query($connect,$sql);
							$row=mysqli_fetch_array($result);
							$oletablename=$row[0];

							$sql="update tb_term set term='" . $_POST["term"] . "' , year ='" . $_POST["year"] . "' ";
							$sql=$sql . " , status='$status' , total_load=" . $_POST["total_load"] ;
							$sql=$sql . " , reference = '$pname' ";
							$sql=$sql . " , tablename='$tablename' ";
							$sql=$sql . " where id_term = " . $_POST["id_term"];
							$resultAdd=mysqli_query($connect,$sql);

							$sql="update tb_document set tabeName ='$tablename' where tabeName='$oletablename' ";
							$resultAdd=mysqli_query($connect,$sql);

							$sql="RENAME TABLE $oletablename TO $tablename;";
							$resultAdd=mysqli_query($connect,$sql);
							$msgsuccess=1;
						}else{
							$msgerror=2;
						}
					}
					//===========
				}
			}
		}
		sleep(1);
	}

	//ดึงข้อมูลมาแสดงแก้ไข
	if($_GET["action"]=="getupdate"){
		$sql="select id_term , term , year , total_load , status from tb_term where id_term = " . $_POST["id"];
		$result=mysqli_query($connect,$sql);
		$row=mysqli_fetch_array($result);
		echo $row[0] . "|";
		echo $row[1] . "|";
		echo $row[2] . "|";
		echo $row[3] . "|";
		echo $row[4] . "|";
		exit();
	}

	if($_GET["action"]=="delete"){
		$sql="select tablename from tb_term where id_term = " . $_POST["id"];
		$result=mysqli_query($connect,$sql);
		$row=mysqli_fetch_array($result);
		$tablename=$row[0];

		$sql="delete from tb_term where id_term = " . $_POST["id"];
		$result=mysqli_query($connect,$sql);

		$sql="DROP TABLE $tablename;";
		$result=mysqli_query($connect,$sql);
		exit();
	}

	if($_GET["action"]=="lock"){
		$sql="select status from tb_term where id_term = " . $_POST["id"];
		$result=mysqli_query($connect,$sql);
		$row=mysqli_fetch_array($result);
		if($row[0]=="1"){
			$sql="update tb_term set status ='0' where id_term = " . $_POST["id"];
		}else{
			$sql="update tb_term set status ='1' where id_term = " . $_POST["id"];
		}
		$result=mysqli_query($connect,$sql);
		exit();
	}

	$sql="select id_term , term , year ,total_load , reference  , status from tb_term order by id_term desc";
	$result=mysqli_query($connect,$sql);
	$total=mysqli_num_rows($result);
	$e_page=4;

	if(!isset($_GET['s_page'])){
		$_GET['s_page']=0;
	}else{
		$chk_page=$_GET['s_page'];
		$_GET['s_page']=$_GET['s_page']*$e_page;
	}
	$sql=$sql . " LIMIT " . $_GET['s_page'] . " , $e_page";
	$result=mysqli_query($connect,$sql);
	if(mysqli_num_rows($result)>=1){
		$plus_p=($chk_page*$e_page)+mysqli_num_rows($result);
	}else{
		$plus_p=($chk_page*$e_page);
	}
	$total_p=ceil($total/$e_page);
	$before_p=($chk_page*$e_page)+1;

?>
	<table class="table table-hover">
    	<tr>
    		<th>เทอม</th>
    		<th>ปีการศึกษา</th>
    		<th>ภาระงานขั้นต่ำ</th>
            <th>เอกสารประกอบ</th>
    		<th>Status</th>
            <th>Tools</th>
    	</tr>
       <?php
	   		while($row=mysqli_fetch_array($result)){
				echo "<tr>";
					echo "<td>$row[1]</td>";
					echo "<td>$row[2]</td>";
					echo "<td>$row[3]</td>";
					if($row[4] <>""){
						$doc="user/doc/$row[4]";
						echo "<td><a href='$doc' target='_blank'>เอกสารประกอบ</a></td>";
					}else{
						echo "<td>&nbsp;</td>";
					}

					if($row[5]==1){
						echo "<td><span class='label label-success'>เปิดให้กรอกข้อมูล</span></td>";
						$img="lock.png";
						$aTitle="ปิดให้กรอกข้อมูล";
					}else{
						echo "<td><span class='label label-danger'>งดให้กรอกข้อมูล</span></td>";
						$img="unlock.png";
						$aTitle="เปิดให้กรอกข้อมูล";
					}

					echo "<td><a href='#$row[0]' title='$aTitle' class='lockItem'><img src='img/$img'></a>&nbsp;&nbsp; ";
					echo "<a href='#$row[0]' title='แก้ไขข้อมูล' class='updateItem'><img src='img/edit.png'></a> &nbsp;&nbsp;";
					echo "<a href='#$row[0]' title='ลบข้อมูล' class='delItem'><img src='img/del.png'></a> </td>";
				echo "</tr>";
			}
	   ?>
    </table>

<?php
	if($total>0){
		echo "<div class='box-footer clearfix'>";
			echo "<div calss='browse_page'>";
				echo "<ul class='pagination pagination-sm no-margin pull-right'>";
					$urlfile="adminDataTerm.php?url=url";
					page_navigator($urlfile , $before_p,$plus_p,$total,$total_p,$chk_page);
				echo "</ul>";
			echo "</div>";
        echo "</div>";
	}

	mysqli_close($connect);
?>

<script language="javascript">
	window.top.window.stopUpload(<?php echo $msgsuccess ?> , <?php echo $msgerror ?> );
</script>
