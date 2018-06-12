<?php
	session_start();
	include('config/config.php');

	if($_GET["action"]=="loadamphur"){
		echo "<select id='select_amp_id' class='form-control input-sm pull-right'>";
			echo "<option value=''> == เลือกทั้งหมด == </option>";
		$sql="select idamphur , amphur from tb_amphur order by idamphur ASC";
		$result=mysqli_query($connect,$sql);
		while($row=mysqli_fetch_array($result)){
			echo "<option value='$row[0]'>$row[1]</option>";
		}
		echo "</select>";
		exit();
	}

	if($_GET["action"]=="loadtambon"){
		$id=$_GET["id"];
		echo "<select id='select_tam_id' class='form-control input-sm pull-right'>";
			echo "<option value=''> == เลือกทั้งหมด == </option>";
		$sql="select idtambon , tambon from tb_tambon where idamphur=$id order by idtambon ASC";
		$result=mysqli_query($connect,$sql);
		while($row=mysqli_fetch_array($result)){
			echo "<option value='$row[0]'>$row[1]</option>";
		}
		echo "</select>";
		exit();
	}

	if($_GET["action"]=="loadmoo"){
		$id=$_GET["id"];
		echo "<select id='select_moo_id' class='form-control input-sm pull-right'>";
			echo "<option value=''> == เลือกทั้งหมด == </option>";
		$sql="select idmoo , moo from tb_moo where idtambon=$id order by idmoo ASC";
		$result=mysqli_query($connect,$sql);
		while($row=mysqli_fetch_array($result)){
			echo "<option value='$row[0]'>$row[1]</option>";
		}
		echo "</select>";
		exit();
	}

	if($_GET["action"]=="getView"){

		//$yearID=$_GET["year"];
		//echo "yearid=$yearID";
		if($search!=""){
			$today = date("Y-m-d");
			$sqli="insert into tb_search(keyword , sdate) ";
			$sqli=$sqli . " values('$search' , '$today' )";
			$resulti=mysqli_query($connect,$sqli);
		}
		echo '<input type="hidden" name="s_page" id="s_page" value="'.$_GET["s_page"].'">';
		echo "<table class='table table-bordered'>";
			echo "<tr>";
    			echo "<th width='50'>ลำดับ</th>";
    			echo "<th>ชื่อ - สกุล</th>";
				echo "<th>จำนวนแปลง</th>";
				echo "<th width='100'>จัดการข้อมูล</th>";
    		echo "</tr>";

if($_SESSION["DUR_USER_STATE"]=="ADMIN"){
            $sql="select tb_user.iduser , tb_user.prefix , tb_user.firstname , tb_user.lastname , tb_user.hnumber, tb_moo.moo, tb_tambon.tambon, tb_amphur.amphur, tb_user.idgroup, tb_user.cf_userlevel ";
            $sql=$sql . " from tb_user, tb_moo, tb_tambon, tb_amphur ";
			$sql=$sql . " where  tb_user.idmoo = tb_moo.idmoo ";
			$sql=$sql . " and  tb_user.idtambon = tb_tambon.idtambon ";
			$sql=$sql . " and  tb_user.idamphur = tb_amphur.idamphur ";
			 if($search !=""){
            	$sql=$sql . "and (tb_user.firstname like '%$search%' ";
            	$sql=$sql . " or tb_user.lastname like '%$search%' )";
            }$sql=$sql . " order by tb_user.iduser";
}
if($_SESSION["DUR_USER_STATE"]=="MANAGER"){
			$ugroup=$_SESSION["DUR_USER_GROUP"];
            $sql="select tb_user.iduser , tb_user.prefix , tb_user.firstname , tb_user.lastname , tb_user.hnumber, tb_moo.moo, tb_tambon.tambon, tb_amphur.amphur, tb_user.idgroup, tb_user.cf_userlevel ";
            $sql=$sql . " from tb_user, tb_moo, tb_tambon, tb_amphur ";
			$sql=$sql . " where  tb_user.idmoo = tb_moo.idmoo ";
			$sql=$sql . " and  tb_user.idtambon = tb_tambon.idtambon ";
			$sql=$sql . " and  tb_user.idamphur = tb_amphur.idamphur ";
			$sql=$sql . " and  tb_user.idgroup = $ugroup ";
			 if($search !=""){
            	$sql=$sql . "and (tb_user.firstname like '%$search%' ";
            	$sql=$sql . " or tb_user.lastname like '%$search%' )";
            }$sql=$sql . " order by tb_user.iduser";
}
if($_SESSION["DUR_USER_STATE"]=="USER"){
			$iuser=$_SESSION["DUR_USER_ID"];
      $sql="select tb_user.iduser , tb_user.prefix , tb_user.firstname , tb_user.lastname , tb_user.hnumber,'','','', tb_user.idgroup, tb_user.cf_userlevel ";
      $sql=$sql . " from tb_user ";
			$sql=$sql . " where  tb_user.iduser = $iuser ";
			if($search !=""){
        	$sql=$sql . "and (tb_user.firstname like '%$search%' ";
        	$sql=$sql . " or tb_user.lastname like '%$search%' )";
      }$sql=$sql . " order by tb_user.iduser";
}

  $result=mysqli_query($connect,$sql);
	$total=@mysqli_num_rows($result);
	$e_page=20;

	if(!isset($_GET['s_page'])){
		$_GET['s_page']=0;
	}else{
		$chk_page=$_GET['s_page'];
		$_GET['s_page']=$_GET['s_page']*$e_page;
	}
	$sql=$sql . " LIMIT " . $_GET['s_page'] . " , $e_page";
	$result=mysqli_query($connect,$sql);
	if(@mysqli_num_rows($result)>=1){
		$plus_p=($chk_page*$e_page)+mysqli_num_rows($result);
	}else{
		$plus_p=($chk_page*$e_page);
	}
	$total_p=ceil($total/$e_page);
	$before_p=($chk_page*$e_page)+1;

						$i=$before_p;

    		while(@$row=mysqli_fetch_array($result)){
    			$prefix=$cf_aca_position[$row[1]];
				$prefix=$prefix . CreatePrefix($row[7]);
    			//$url=randomText(200);
				$iduser=$row[0];
    			echo "<tr>";
    			echo "<td>$i</td>";
    			echo "<td><a href='profile.php?id=$row[0]' target='_blank' >".$prefix."$row[2] $row[3]</a></td>";

				$sqlc="select count(*) from tb_plot where iduser=$row[0]";
				$resultc=mysqli_query($connect,$sqlc);
				$rowc=mysqli_fetch_array($resultc);

				echo "<td>$rowc[0]</td>";
					echo "<td>";
					if($_SESSION["DUR_USER_STATE"]=="USER"){
						echo "&nbsp;&nbsp;&nbsp;<a href='#$row[0]' title='บันทึก' class='editItemRegistered' ><img src='img/save.png'></a></td>";
					}else{
						echo "&nbsp;&nbsp;&nbsp;<a href='#$row[0]' title='บันทึก' class='editItemRegistered' ><img src='img/save.png'></a> ";
						echo "&nbsp;&nbsp;&nbsp;<a href='#$roww[0]' title='ลบข้อมูล' class='delItemRegistered'><img src='img/del.png'></td>";
					}
    			echo "</tr>";
    			$i++;
    		}
    	echo "</table>";

	if($total>0){
			echo "<div class='box-footer clearfix'>";
				echo "<div calss='browse_page'>";
					echo "<ul class='pagination pagination-sm no-margin pull-right'>";
						$urlfile="admin_plot.php?action=getView&url=url";
						page_navigator($urlfile , $before_p,$plus_p,$total,$total_p,$chk_page);
					echo "</ul>";
				echo "</div>";
			echo "</div>";
	}

		exit();
	}

	if($_GET["action"]=="addplot"){
		$id=$_GET["id"];
		$idyear=$_GET["idyear"];
		//echo "iduser=$id<br>idyear=$idyear<br>";
            $sql="select tb_user.iduser , tb_user.prefix , tb_user.firstname , tb_user.lastname , tb_user.hnumber, tb_moo.moo, tb_tambon.tambon, tb_amphur.amphur, tb_user.idgroup ";
            $sql=$sql . " from tb_user, tb_moo, tb_tambon, tb_amphur ";
			$sql=$sql . " where  tb_user.idmoo = tb_moo.idmoo ";
			$sql=$sql . " and  tb_user.idtambon = tb_tambon.idtambon ";
			$sql=$sql . " and  tb_user.idamphur = tb_amphur.idamphur ";
			$sql=$sql . " and  tb_user.iduser = $id ";
            $result=mysqli_query($connect,$sql);
			$row=mysqli_fetch_array($result);

				if(is_numeric($row["prefix"])){
					$prefix=$cf_prefix[$row["prefix"]];
				}else{
					$prefix=$row["prefix"];
				}
				$name=$prefix . $row[2] . " " . $row[3];
				$idposition = $row[8];
					echo "<h4>$name</h4>";
					echo "<h5>ที่อยู่ : " .$row[4]. " หมู่บ้าน.". $row[5]. " ต.". $row[6]. " อ.". $row[7] ." จ.อุตรดิตถ์</h5>";
					$sqlp= "select groupname from tb_group where idgroup = $idposition ";
					$resultp=mysqli_query($connect,$sqlp);
					$rowp=mysqli_fetch_array($resultp);
					echo "<h5>กลุ่ม : " . $rowp[0] . "</h5>";


			echo " <form action='admindataplot.php?action=insertwork' method='post' enctype='multipart/form-data'  >";
				echo "<div class='box-body'>";
					echo "<div class='form-group'>";
						include ('admin_plot_form.php');

					echo "</div>";
				echo "</div>";
				echo "<div class='box-footer'>";
					//echo "<button type='submit' class='btn btn-primary' id='butSave'> บันทึกข้อมูล </button>&nbsp;";
					echo '<input type="button" class="btn btn-primary" name="butNewPlot" id="butNewPlot" value="เพิ่มแปลงเพาะปลูก">';
					echo "<button type='button' class='btn btn-danger' id='butCancelplot'> ยกเลิก </button>";
					echo "<input name='iduser' type='hidden' value='$id' />";
					echo "<div id='uploadDialog_process' align='center'></div>";
				echo "</div>";
			echo "</form>";
		//exit();
	}


	if($_GET["action"]=="delWork"){
		$id=$_POST["id"];
		$sql="delete from tb_userwork where iduserwork=$id";
		$result=mysqli_query($connect,$sql);

		exit();
	}
	//ลบข้อมูลสับปะรด
	if($_GET["action"]=="delplot"){
		$id=$_POST["id"];
		$sql="delete from tb_plot where idplot=$id";
		$result=mysqli_query($connect,$sql);

		exit();
	}

	if($_GET["action"]=="insertPic"){
		$msgsuccess=0;
		$msgerror=0;

		if($_FILES["fileField"]["error"]==4){
			$msgerror=1;
		}else{
			$accept_type=array("image/jpeg" , "image/gif" , "image/png");
			$file=$_FILES["fileField"]["name"];
			$typefile=$_FILES["fileField"]["type"];
			$sizefile=$_FILES["fileField"]["size"];
			$tempfile=$_FILES["fileField"]["tmp_name"];
			if(!in_array($typefile,$accept_type)){
				$msgerror=2;
			}else{
				$Str_file = explode(".",$file);
				$carr = count($Str_file)-1;
				$strname = $Str_file[$carr];
				$pname= "pic_" . randomText(10) . "." . $strname;
				$target_path = "user/profile_pic/" . $pname;
				if(@move_uploaded_file($tempfile,$target_path)){

						//$sql="update tb_userwork set `picture`='$pname' ";

					//$sql=$sql . "  where iduser=" .$_SESSION["DUR_USER_ID"];
					//$sql=$sql . "  where iduserwork=236";
					//$result=mysqli_query($connect,$sql);
					$msgsuccess=2;
				}else{
					$msgerror=3;
				}
			}
		}
		sleep(1);
	}

//mysqli_close($connect);
?>
<script language="javascript">
	window.top.window.stopUpload(<?php echo $msgsuccess ?> , <?php echo $msgerror ?> );
</script>
