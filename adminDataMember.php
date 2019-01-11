<?php
	session_start();
	include('config/config.php');

	//ค้นหาข้อมูล
	if($_GET["action"]=="getSearch"){
		$search=$_GET["search"];

		echo "<table class='table table-hover'>";
        	echo "<tr>";
                echo "<th width='70'>Image</th>";
                echo "<th width='100'>รหัสอัตรา</th>";
                echo "<th>ชื่อ - สกุล</th>";
                echo "<th>ตำแหน่งวิชาการ</th>";
                echo "<th>วันที่ลงทะเบียน</th>";
                echo "<th>สถานะภาพ</th>";
                echo "<th>ประเภทสมาชิก</th>";
                echo "<th width='100'>Tools</th>";
            echo "</tr>";

            $sql="select iduser , picture , number , code , prefix , firstname , lastname , cf_aca_position ";
            $sql=$sql . " , update_time ,status , cf_userlevel , cf_slevel ";
            $sql=$sql . " from tb_user where permit='1' and update_time !='0000-00-00 00:00:00' ";
            if($search !=""){
            	$sql=$sql . " and  firstname like '%$search%' ";
            	$sql=$sql . " or  lastname like '%$search%' ";
            }
            $sql=$sql . " order by firstname";
            $result=mysqli_query($connect,$sql);
			$total=mysqli_num_rows($result);
			$e_page=25;

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
				if($row[1] !=""){
					$imgUser="user/profile_pic/" . $row[1];
				}else{
					if($row[2]==1){
						$imgUser="user/profile_pic/user2.png";
					}else{
						$imgUser="user/profile_pic/user1.png";
					}
				}

				//ชื่อ - สกุล
				$prefix=$cf_aca_position[$row["cf_aca_position"]];
				$prefix=$prefix . CreatePrefix($row["cf_slevel"]);
				$name=$prefix . $row[5] . " " . $row[6];

				echo "<tr>";
					echo "<td>$i</td>";
					echo "<td>$row[3]</td>";
					echo "<td>$name</td>";
					echo "<td>" . $cf_aca_position[$row[7]] . "</td>";
					echo "<td>" . $row[8] . "</td>";
					echo "<td>" . $cf_staus[$row[9]] . "</td>";
					echo "<td>" . $cf_userlevel[$row[10]] . "</td>";
					echo "<td><a href='#$row[0]' title='รายละเอียด' class='viewItemRegistered' ><img src='img/detail.png'></a>";
					echo "&nbsp;&nbsp;&nbsp;<a href='#$row[0]' title='เปลียนประเภทสมาชิก' class='boxMemberType'><img src='img/membertype.png'>";
					echo "&nbsp;&nbsp;&nbsp;<a href='#$row[0]' title='ลบข้อมูล' class='delItemInfo'><img src='img/del.png'></td>";
				echo "</tr>";
			}

        echo "</table>";

        if($total>0){
			echo "<div class='box-footer clearfix'>";
				echo "<div calss='browse_page'>";
					echo "<ul class='pagination pagination-sm no-margin pull-right'>";
						$urlfile="adminDataMember.php?url=url";
						page_navigator1($urlfile , $before_p,$plus_p,$total,$total_p,$chk_page);
					echo "</ul>";
				echo "</div>";
	        echo "</div>";
		}

		exit();
	}


	//กำลังลงทะเบียน
	if($_GET["action"]=="getRegistered"){
		$search = $_GET["search"];
		$iuser=$_SESSION["DUR_USER_ID"];
		echo "<table class='table table-hover'>";
        	echo "<tr>";
                echo "<th width='70'>ลำดับ</th>";
                echo "<th>ชื่อ - สกุล</th>";
                echo "<th>ที่อยู่</th>";
                echo "<th>กลุ่ม/เครือข่าย</th>";
				echo "<th>สิทธิ์ใช้ระบบ</th>";
                echo "<th width='100'>Tools</th>";
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
			$ugroup=$_SESSION["DUR_USER_GROUP"];
			$sql="select tb_user.iduser , tb_user.prefix , tb_user.firstname , tb_user.lastname , tb_user.hnumber, tb_moo.moo, tb_tambon.tambon, tb_amphur.amphur, tb_user.idgroup, tb_user.cf_userlevel ";
			$sql=$sql . " from tb_user, tb_moo, tb_tambon, tb_amphur ";
			$sql=$sql . " where  tb_user.idmoo = tb_moo.idmoo ";
			$sql=$sql . " and  tb_user.idtambon = tb_tambon.idtambon ";
			$sql=$sql . " and  tb_user.idamphur = tb_amphur.idamphur ";
			$sql=$sql . " and  tb_user.iduser = $iuser ";
			 if($search !=""){
            	$sql=$sql . "and (tb_user.firstname like '%$search%' ";
            	$sql=$sql . " or tb_user.lastname like '%$search%' )";
            }$sql=$sql . " order by tb_user.iduser";
}

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


				//ชื่อ - สกุล
				if(is_numeric($row["prefix"])){
					$prefix=$cf_prefix[$row["prefix"]];
				}else{
					$prefix=$row["prefix"];
				}
				$name=$prefix . $row[2] . " " . $row[3];
				$idgroup = $row[8];
				echo "<tr>";
					echo "<td>".$i++."</td>";
					echo "<td>$name</td>";
					echo "<td>" .$row[4]. " ". $row[5]. " ต.". $row[6]. " อ.". $row[7] ." จ.อุตรดิตถ์". "</td>";
					$sqlp= "select groupname from tb_group where idgroup = $idgroup ";
					$resultp=mysqli_query($connect,$sqlp);
					@$rowp=mysqli_fetch_array($resultp);
					echo "<td>" . $rowp[0] . "</td>";
					echo "<td>" . $cf_userlevel[$row[9]] . "</td>";
					echo "<td><a href='#$row[0]' title='รายละเอียด' class='viewItemRegistered' ><img src='img/detail.png'></a>";
					echo "&nbsp;&nbsp;&nbsp;<a href='#$row[0]' title='แก้ไขข้อมูล' class='editItemRegistered' ><img src='img/edit.png'></a> ";
					if($_SESSION["DUR_USER_STATE"]!="USER"){
						echo "&nbsp;&nbsp;&nbsp;<a href='#$row[0]' title='ลบข้อมูล' class='delItemRegistered'><img src='img/del.png'></td>";
					}
				echo "</tr>";
			}

        echo "</table>";

        if($total>0){
			echo "<div class='box-footer clearfix'>";
				echo "<div calss='browse_page'>";
					echo "<ul class='pagination pagination-sm no-margin pull-right'>";
						$urlfile="adminDataMember.php?url=url";
						page_navigator($urlfile , $before_p,$plus_p,$total,$total_p,$chk_page);
					echo "</ul>";
				echo "</div>";
	        echo "</div>";
		}

		exit();
	}

	//แสดงรายละเอียดของสมาชิก
	if($_GET["action"]=="getDetail"){

		$id=$_GET["id"];

		echo "<div class='box-body table-responsive no-padding'>";
			echo "<div role='tabpanel'>";
				echo "<ul class='nav nav-tabs' role='tablist'>";
					echo "<li role='presentation' class='active'><a href='#Userinfo' aria-controls='Userinfo' role='tab' data-toggle='tab'>ข้อมูลสมาชิก</a></li>";
					echo "<li role='presentation'><a href='#UserHiswork' aria-controls='UserHiswork' role='tab' data-toggle='tab'>ประวัติข้อมูล</a></li>";
				echo "</ul>";
				echo "<div class='tab-content'>";
					echo "<div role='tabpanel' class='tab-pane fade in active' id='Userinfo'>";
						$sql="select * from tb_user, tb_moo, tb_tambon, tb_amphur where
						tb_user.idmoo = tb_moo.idmoo and
						tb_user.idtambon = tb_tambon.idtambon and
						tb_user.idamphur = tb_amphur.idamphur and
						tb_user.iduser=$id";
						$result=mysqli_query($connect,$sql);
						$row=mysqli_fetch_array($result);

						echo "<br>";
						echo "<div class='row'>";
							echo "<div class='col-lg-12'>";
								//ข้อมูลทั่วไป
								echo "<div class='box'>";
									echo "<div class='box-header'>";
										echo "<h3 class='box-title'>ข้อมูลทั่วไป</h3>";
									echo "</div>";
									echo "<div class='box-body table-responsive no-padding'>";
										if(is_numeric($row["prefix"])){
                            				$prefix=$cf_prefix[$row["prefix"]];
                            			}else{
                            				$prefix=$row["prefix"];
                            			}
										$name=$prefix . $row["firstname"] . " " . $row["lastname"];
										echo "<p><b>ชื่อ - สกุล</b> : $name</p>";
						$idgroup=$row["idgroup"];
						$sqlg="select groupname from tb_group where idgroup=$idgroup";
						$resultg=mysqli_query($connect,$sqlg);
						$rowg=mysqli_fetch_array($resultg);
										echo "<p><b>กลุ่ม/เครือข่าย</b> : " . $rowg[0] . "</p><br><br>";
									echo "</div>";
								echo "</div>";
							echo "</div>";
						echo "</div>";
						echo "<div class='row'>";
							echo "<div class='col-lg-12'>";
								echo "<div class='box'>";
									echo "<div class='box-header'>";
										echo "<h3 class='box-title'>สถานที่ติดต่อ</h3>";
									echo "</div>";
									echo "<div class='box-body table-responsive no-padding'>";
										echo "<p><b>เลขที่</b> : " . $row["hnumber"] . "</p>";
										echo "<p><b>หมู่บ้าน</b> : " . $row["moo"] . "</p>";
										echo "<p><b>ตำบล</b> : " . $row["tambon"] . "</p>";
										echo "<p><b>อำเภอ</b> : " . $row["amphur"] . "</p>";
										echo "<p><b>จังหวัด</b> :  อุตรดิตถ์</p>";
										echo "<p><b>เบอร์โทร</b> : " . $row["tel"] . "</p>";
										echo "<p><b>อีเมล์</b> : " . $row["email"] . "</p>";
									echo "</div>";
								echo "</div>";
							echo "</div>";
						echo "</div>";
					echo "</div>";
					echo "<div role='tabpanel' class='tab-pane fade' id='UserHiswork'>";
						echo "<table class='table table-hover'>";
							echo "<tr>";
                                echo "<th>พ.ศ.</th>";
                                echo "<th>ชนิดพืช/พันธุ์พืช</th>";
                                echo "<th>ผลผลิต(ตัน)</th>";
                            echo "</tr>";
                            $sqlw="select * from tb_userwork where iduser=$id order by iduserwork";
                            $resultw=mysqli_query($connect,$sqlw);
                            while($roww=mysqli_fetch_array($resultw)){
                            	echo "<tr>";
						$idterm=$roww["idterm"];
						$sqlt="select year from tb_term where idterm=$idterm";
						$resultt=mysqli_query($connect,$sqlt);
						$rowt=mysqli_fetch_array($resultt);
                                    echo "<td>" . $rowt[0] . "</td>";
                                    echo "<td>" . $roww["subwork"] . "</td>";
                                    echo "<td>" . $roww["load"] . "</td>";
                                echo "</tr>";
                                $i++;
                            }
						echo "</table>";
					echo "</div>";
				echo "</div>";
			echo "</div>";
		echo "</div>";

		echo "<div class='box-footer'>";
	        echo "<div class='col-lg-12' align='right'>";
	        	echo "<button type='button' class='btn btn-danger' id='butExit'>Close</button>";
	        echo "</div>";
        echo "</div>";

		exit();
	}

	//ลบข้อมูลสาชิก
	if($_GET["action"]=="delUser"){
		$id=$_POST["id"];

		$sql="delete from tb_user where iduser=$id";
		$result=mysqli_query($connect,$sql);

		$sql="delete from tb_userwork where iduser=$id";
		$result=mysqli_query($connect,$sql);

		exit();
	}



	mysqli_close($connect);
?>
<script language="javascript">
window.top.window.stopUpload(<?php echo $msgsuccess ?> , <?php echo $msgerror ?> , <?php echo $box ?> , <?php echo $id ?> );
</script>
