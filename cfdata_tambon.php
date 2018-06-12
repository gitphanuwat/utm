<?php
	session_start();
	include('config/config.php');
	
	if($_POST["status"]==""){$_POST["status"]=0;}else{$_POST["status"]=1;}


	if($_GET["action"]=="loadtambon"){
		echo "<select id='selectDepID' class='form-control input-sm pull-right' style='width: 300px;'>";
			echo "<option value='0'> == เลือกอำเภอ == </option>";
		$sql="select idamphur , amphur from tb_amphur order by idamphur ASC";
		$result=mysqli_query($connect,$sql);
		while($row=mysqli_fetch_array($result)){
			echo "<option value='$row[0]'>$row[1]</option>";
		}
		echo "</select>";
		exit();
	}

	if($_GET["action"]=="loadData"){
		if($_GET["id"] !=0){
			echo "<table class='table table-hover'>";
				echo "<tr>";
					echo "<th>ลำดับ</th>";
					echo "<th>ตำบล</th>";
					echo "<th>เว็บไซต์</th>";
					echo "<th>สถานะ</th>";
					echo "<th>Tools</th>";
				echo "</tr>";

				$i=1;
				$sql="select idtambon , tambon , tam_website, status from tb_tambon ";
				$sql=$sql . " where idamphur =" . $_GET["id"] . " order by idtambon";
				$result=mysqli_query($connect,$sql);
				if(mysqli_num_rows($result)==0){
					echo "<tr>";
					echo "<td colspan='4'><font color='red'>ยังไม่มีข้อมูลหลัก </font></td>";
					echo "</tr>";
				}else{
					while($row=mysqli_fetch_array($result)){
						echo "<tr>";
						echo "<td>$i</td>";
						echo "<td>$row[1]</td>";
						echo "<td><a href='http://$row[2]' target=\"_blank\">$row[2]</a></td>";
						if($row[3]==1){
							echo "<td><span class='label label-success'>เปิดใช้งานปกติ</span></td>";
							$img="lock.png";
								$aTitle="ปิดการใช้งาน";
						}else{
							echo "<td><span class='label label-danger'>ไม่เปิดใช้งาน</span></td>";
							$img="unlock.png";
							$aTitle="เปิดการใช้งาน";
						}
						echo "<td><a href='#$row[0]' title='แก้ไขข้อมูล' class='updateItem'><img src='img/edit.png'></a> &nbsp;&nbsp;";
						echo "<a href='#$row[0]' title='ลบข้อมูล' class='delItem'><img src='img/del.png'></a> </td>";
						echo "</tr>";
						$i++;
					}
				}
			echo "</table>";
		}
	}

	if($_GET["action"]=="insert"){
		$msgsuccess=0;
		$msgerror=0;

		if($_POST["idamphur"]=="0" || $_POST["idamphur"]==""){
			$msgerror=1;
		}else{
			if($_POST["tambon"]==""){
				$msgerror=2;
			}else{
				if($_POST["idtambon"] !=""){
					//แก้ไขข้อมูล

					$sql="update tb_tambon set";
					$sql=$sql . " tambon ='".$_POST["tambon"]."'";
					$sql=$sql . ", tam_keyman ='".$_POST["tam_keyman"]."'";
					$sql=$sql . ", tam_tel ='".$_POST["tam_tel"]."'";
					$sql=$sql . ", tam_website ='".$_POST["tam_website"]."'";
					$sql=$sql . ", status ='".$_POST["status"]."'";
					$sql=$sql." where idtambon = ". $_POST["idtambon"];


					$resultAdd=mysqli_query($connect,$sql);
					$msgsuccess=1;
				}else{
					//เพิ่มข้อมูล
					$sql="select * from tb_tambon  where tambon='" . $_POST["tambon"] . "' ";
					$sql=$sql . " and idamphur = " . $_POST["idamphur"];
					$result=mysqli_query($connect,$sql);
					$nRow=mysqli_num_rows($result);
					if($nRow == 0){
						$sql="insert into tb_tambon(idamphur,tambon,tam_keyman,tam_tel,tam_website,status) values('".$_POST["idamphur"]."','".$_POST["tambon"]."','".$_POST["tam_keyman"]."','".$_POST["tam_tel"]."','".$_POST["tam_website"]."','".$_POST["status"]."')";
						$resultAdd=mysqli_query($connect,$sql);
						$msgsuccess=1;
					}else{
						$msgerror=3;
					}
				}
			}
		}
		sleep(1);
		echo "<script language=\"javascript\">window.location.href = 'cf_tambon.php'</script>";
		//จบบันทึก
	}

	if($_GET["action"]=="delete"){

		$sql="delete from tb_tambon where idtambon = " . $_POST["id"];
		$result=mysqli_query($connect,$sql);

		exit();
	}

	if($_GET["action"]=="getupdate"){
		$sql="select * from tb_tambon where idtambon = " . $_POST["id"];
		$result=mysqli_query($connect,$sql);
		$row=mysqli_fetch_array($result);
		echo $row[0] . "|";
		echo $row[1] . "|";
		echo $row[2] . "|";
		echo $row[3] . "|";
		echo $row[4] . "|";
		echo $row[5] . "|";
		echo $row[6] . "|";
		exit();
	}


	mysqli_close($connect);
?>
<script language="javascript">
	window.top.window.stopUpload(<?php echo $msgsuccess ?> , <?php echo $msgerror ?> );
</script>
