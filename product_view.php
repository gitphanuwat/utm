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

		$search=$_GET["search"];
		$yearID=$_GET["year"];
		if($_GET["year"]!=""){
				$_SESSION["DUR_POLL_YEAR"]=$_GET["year"];
		}
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
				echo "<th>จำนวน<br>แปลงปลูก</th>";
				echo "<th>จำนวน<br>ต้นที่ปลูก</th>";
				echo "<th>จำนวน<br>ต้นที่ให้ผลผลิต</th>";
				echo "<th>ผลผลิตรวม(ลูก)</th>";
				echo "<th>แบบสอบถาม</th>";
				echo "<th>ปัญหา</th>";
				echo "<th width='100'>จัดการข้อมูล</th>";
    		echo "</tr>";
if($_SESSION["DUR_USER_STATE"]=="ADMIN"){
    	$sql="select tb_user.iduser , tb_user.cf_aca_position , tb_user.firstname , tb_user.lastname , tb_moo.moo, tb_tambon.tambon, tb_amphur.amphur";
    	$sql=$sql . " , tb_user.cf_slevel ";
    	$sql=$sql . " from tb_user left join tb_moo on tb_user.idmoo=tb_moo.idmoo";
			$sql=$sql . " left join tb_tambon on tb_moo.idtambon=tb_tambon.idtambon";
			$sql=$sql . " left join tb_amphur on tb_tambon.idamphur=tb_amphur.idamphur";
			$sql=$sql . " where (tb_user.firstname like '%$search%' or tb_user.lastname like '%$search%')";
}
if($_SESSION["DUR_USER_STATE"]=="MANAGER"){
	$ugroup=$_SESSION["DUR_USER_GROUP"];
	$sql="select tb_user.iduser , tb_user.cf_aca_position , tb_user.firstname , tb_user.lastname , tb_moo.moo, tb_tambon.tambon, tb_amphur.amphur";
	$sql=$sql . " , tb_user.cf_slevel ";
	$sql=$sql . " from tb_user left join tb_moo on tb_user.idmoo=tb_moo.idmoo";
	$sql=$sql . " left join tb_tambon on tb_moo.idtambon=tb_tambon.idtambon";
	$sql=$sql . " left join tb_amphur on tb_tambon.idamphur=tb_amphur.idamphur";
	$sql=$sql . " where (tb_user.firstname like '%$search%' or tb_user.lastname like '%$search%')";
	$sql=$sql . " and tb_user.idgroup=$ugroup";
}
if($_SESSION["DUR_USER_STATE"]=="USER"){
	$iuser=$_SESSION["DUR_USER_ID"];
	$sql="select tb_user.iduser , tb_user.cf_aca_position , tb_user.firstname , tb_user.lastname , tb_moo.moo, tb_tambon.tambon, tb_amphur.amphur";
	$sql=$sql . " , tb_user.cf_slevel ";
	$sql=$sql . " from tb_user left join tb_moo on tb_user.idmoo=tb_moo.idmoo";
	$sql=$sql . " left join tb_tambon on tb_moo.idtambon=tb_tambon.idtambon";
	$sql=$sql . " left join tb_amphur on tb_tambon.idamphur=tb_amphur.idamphur";
	$sql=$sql . " where (tb_user.firstname like '%$search%' or tb_user.lastname like '%$search%')";
	$sql=$sql . " and tb_user.iduser=$iuser";
}
			$amp_id=$_GET["amp_id"];
			if($amp_id>0){$sql=$sql . " and tb_amphur.idamphur=$amp_id";}
			$tam_id=$_GET["tam_id"];
			if($tam_id>0){$sql=$sql . " and tb_tambon.idtambon=$tam_id";}
			$moo_id=$_GET["moo_id"];
			if($moo_id>0){$sql=$sql . " and tb_moo.idmoo=$moo_id";}

    		$sql=$sql . " order by tb_user.firstname ";
    		$result=mysqli_query($connect,$sql);

	$total=mysqli_num_rows($result);
	$e_page=20;

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

						$i=$before_p;

    		while($row=mysqli_fetch_array($result)){
    			$prefix=$cf_aca_position[$row[1]];
				$prefix=$prefix . CreatePrefix($row[7]);
    			//$url=randomText(200);
				$iduser=$row[0];
					$sqlq = " select * from tb_polluser where iduser=$iduser and idyear=$yearID";
					$resultq=mysqli_query($connect,$sqlq);
					@$nrowq=mysqli_num_rows($resultq);
					@$rowq=mysqli_fetch_array($resultq);
					$sqlpb = " select * from tb_problem where iduser=$iduser and idyear=$yearID";
					$resultpb=mysqli_query($connect,$sqlpb);
					@$nrowpb=mysqli_num_rows($resultpb);
					$sqlallpoll = " select * from tb_poll where idyear=$yearID";
					$resultallpoll=mysqli_query($connect,$sqlallpoll);
					@$nallpoll=mysqli_num_rows($resultallpoll);
								$sqlc="select d.* from tb_durian d, tb_plot p, tb_user u  where d.idplot=p.idplot and p.iduser=u.iduser and d.idyear = $yearID and u.iduser=$iduser";
								$resultc=mysqli_query($connect,$sqlc);
								$plot=0;
								$b_trunk=0;
								$e_trunk=0;
								$product=0;
								$sumproduct=0;
								while($rowc=mysqli_fetch_array($resultc)){
									$plot++;
									$b_trunk=$b_trunk+$rowc['b_trunk'];
									$e_trunk=$e_trunk+$rowc['e_trunk'];
									$product=$product+$rowc['product_durian'];
									$sumproduct=$sumproduct+($rowc['e_trunk']*$rowc['product_durian']);
								}

    			echo "<tr>";
    			echo "<td>$i</td>";
    			echo "<td><a href='profile.php?id=$row[0]' target='_blank' >".$prefix."$row[2] $row[3]</a></td>";
				echo "<td>$plot</td>";
				echo "<td>$b_trunk</td>";
				echo "<td>$e_trunk</td>";
				echo "<td>$sumproduct</td>";
				if ($nrowq==''){ echo "<td><img src='img/alert.png'></td>";}else{echo "<td><img src='img/accept.png'>"."(".$nrowq."/".$nallpoll.")"."</td>";}
				if ($nrowpb==''){ echo "<td><img src='img/alert.png'></td>";}else{echo "<td><img src='img/accept.png'></td>";}

					echo "<td>";
					echo "&nbsp;&nbsp;&nbsp;<a href='#$row[0]' title='บันทึก' class='editItemRegistered' ><img src='img/save.png'></a> ";
					echo "&nbsp;&nbsp;&nbsp;<a href='#$row[0]' title='ลบข้อมูล' class='delItemRegistered'><img src='img/del.png'></td>";
    			echo "</tr>";
    			$i++;
    		}
    	echo "</table>";
	if($total>0){
			echo "<div class='box-footer clearfix'>";
				echo "<div calss='browse_page'>";
					echo "<ul class='pagination pagination-sm no-margin pull-right'>";
						$urlfile="product.php?action=getView&url=url";
						page_navigator($urlfile , $before_p,$plus_p,$total,$total_p,$chk_page);
					echo "</ul>";
				echo "</div>";
			echo "</div>";
	}

		exit();
	}

	if($_GET["action"]=="addProduct"){
		$id=$_GET["id"];
		$idyear=$_GET["idyear"];
		$poll_idyear = $_GET["idyear"];

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
				$poll_iduser = $row[0];
				$name=$prefix . $row[2] . " " . $row[3];
				$idposition = $row[8];
					echo "<h4>$name</h4>";
					echo "<h5>ที่อยู่ : " .$row[4]. " หมู่บ้าน.". $row[5]. " ต.". $row[6]. " อ.". $row[7] ." จ.อุตรดิตถ์</h5>";
					$sqlp= "select groupname from tb_group where idgroup = $idposition ";
					$resultp=mysqli_query($connect,$sqlp);
					$rowp=mysqli_fetch_array($resultp);
					echo "<h5>กลุ่ม : " . $rowp[0] . "</h5><hr>";


			echo " <form action='product_view.php?action=insertwork' method='post' target='upload_target' onsubmit='clickSave();'>";
				echo "<div class='box-body'>";
					echo "<div class='form-group'>";
						include ('product_form.php');

					echo "</div>";
				echo "</div>";
				echo "<div class='box-footer'>";
					echo "<button type='submit' class='btn btn-primary' id='butSave'> บันทึกข้อมูล </button>&nbsp;";
					echo "<button type='button' class='btn btn-danger' id='butCancelProduct'> ยกเลิก </button>";
					//echo "<input name='iduser' type='text' value='$id' />";
					//echo "<input name='idyear' type='text' value='$idyear' />";
					echo "<div id='uploadDialog_process' align='center'></div>";
				echo "</div>";
			echo "</form>";
		//exit();
	}

	if($_GET["action"]=="uptopic"){
		$idtopic=$_POST["idtopic"];
		$iduser=$_POST["iduser"];
		$idyear=$_POST["idyear"];
		$sqlcheck = "select idtopic, idpoll from tb_topic where idtopic=$idtopic";
		 $resultcheck=mysqli_query($connect,$sqlcheck);
		 $rowcheck = mysqli_fetch_array($resultcheck);
		 $idpoll = $rowcheck[1];

		// echo $idpoll.'|';

		 $sqlcheckpoll = "select * from tb_polluser
		 where idpoll=$idpoll and iduser=$iduser and idyear=$idyear";
		 $resultcheckpoll=mysqli_query($connect,$sqlcheckpoll);
 		 $check = mysqli_num_rows($resultcheckpoll);

		 //echo $check.'|';

		if($check!=0){
			$rowup = mysqli_fetch_array($resultcheckpoll);
			$idpolluser = $rowup[0];
			//echo $idpolluser;
			$sqlup="update tb_polluser set idtopic='$idtopic' where idpolluser=$idpolluser";
		}else{
			$sqlup="INSERT INTO tb_polluser(`idpoll`,`idtopic`, `iduser`, `idyear`)
			 				VALUES ('$idpoll','$idtopic', '$iduser', '$idyear')";
		}
		$result=mysqli_query($connect,$sqlup);
		exit();
	}


	if($_GET["action"]=="insertwork"){
		$msgsuccess=0;
		$msgerror=0;

		$idproblem=$_POST["idproblem"];
		$problem=$_POST["problem"];
		$iduser=$_POST["iduser"];
		$idyear=$_POST["idyear"];

		//if($problem==""){
			//$msgerror=1;
		//}else{
			if($idproblem != ""){
				$sql="update tb_problem set problem='$problem'";
				$sql=$sql . " where idproblem=$idproblem";
			}else{
				if($problem!=""){
					$sql="INSERT INTO tb_problem( `iduser`, `idyear`, `problem`)";
					$sql=$sql . " VALUES ('$iduser', '$idyear', '$problem');";
				}
			}
			$result=mysqli_query($connect,$sql);
			$msgsuccess=2;
		}
	//}


	if($_GET["action"]=="delWork"){
		$id=$_POST["id"];
		$idyear=$_POST["idyear"];
		$sql="delete from tb_polluser where iduser=$id and idyear=$idyear";
		$result=mysqli_query($connect,$sql);
		$sql="delete from tb_problem where iduser=$id and idyear=$idyear";
		$result=mysqli_query($connect,$sql);
		exit();
	}


	//ลบข้อมูลสับปะรด
	if($_GET["action"]=="deldurian"){
		$id=$_POST["id"];
		$sql="delete from tb_durian where iddurian=$id";
		$result=mysqli_query($connect,$sql);

		exit();
	}


//mysqli_close($connect);
?>
<script language="javascript">
	window.top.window.stopUpload(<?php echo $msgsuccess ?> , <?php echo $msgerror ?> );
</script>
