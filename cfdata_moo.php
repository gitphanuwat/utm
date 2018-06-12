<?php
	session_start();
	include('config/config.php');
		
	if($_POST["status"]==""){$_POST["status"]=0;}else{$_POST["status"]=1;}


	if($_GET["action"]=="loadmoo"){
		echo "<select id='selectDepID' class='form-control input-sm pull-right' style='width: 300px;'>";
			echo "<option value='0'> == เลือกตำบล == </option>";
		$sql="select idtambon , tambon from tb_tambon order by idtambon ASC";
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
					echo "<th>หมู่บ้าน</th>";
					echo "<th>สถานะ</th>";
					echo "<th>Tools</th>";
				echo "</tr>";

				$i=1;
				$sql="select idmoo , moo , m_website, status from tb_moo ";
				$sql=$sql . " where idtambon =" . $_GET["id"] . " order by idmoo";
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

		if($_POST["idtambon"]=="0" || $_POST["idtambon"]==""){
			$msgerror=1;
		}else{
			if($_POST["moo"]==""){
				$msgerror=2;
			}else{
				if($_POST["idmoo"] !=""){
					//แก้ไขข้อมูล

					$sql="update tb_moo set";
					$sql=$sql . " moo ='".$_POST["moo"]."'";
					//$sql=$sql . " moo_eng ='".$_POST["moo_eng"]."'";
					$sql=$sql . ", moo_eng ='".$_POST["moo_eng"]."'";
					$sql=$sql . ", m_address ='".$_POST["m_address"]."'";
					$sql=$sql . ", m_tel ='".$_POST["m_tel"]."'";
					$sql=$sql . ", m_website ='".$_POST["m_website"]."'";
					$sql=$sql . ", status ='".$_POST["status"]."'";
					$sql=$sql." where idmoo = ". $_POST["idmoo"];


					$resultAdd=mysqli_query($connect,$sql);
					$msgsuccess=1;
				}else{
					//เพิ่มข้อมูล
					$sql="select * from tb_moo  where moo='" . $_POST["moo"] . "' ";
					$sql=$sql . " and idtambon = " . $_POST["idtambon"];
					$result=mysqli_query($connect,$sql);
					$nRow=mysqli_num_rows($result);
					if($nRow == 0){
						$sql="insert into tb_moo(idtambon,moo,moo_eng,m_address,m_tel,m_website,status) values('".$_POST["idtambon"]."','".$_POST["moo"]."','".$_POST["moo_eng"]."','".$_POST["m_address"]."','".$_POST["m_tel"]."','".$_POST["m_website"]."','".$_POST["status"]."')";
						$resultAdd=mysqli_query($connect,$sql);
						$msgsuccess=1;
					}else{
						$msgerror=3;
					}
				}
			}
		}
		sleep(1);
		echo "<script language=\"javascript\">window.location.href = 'cf_moo.php'</script>";
		//จบบันทึก
	}

	if($_GET["action"]=="delete"){

		$sql="delete from tb_moo where idmoo = " . $_POST["id"];
		$result=mysqli_query($connect,$sql);

		exit();
	}

	if($_GET["action"]=="getupdate"){
		$sql="select * from tb_moo where idmoo = " . $_POST["id"];
		$result=mysqli_query($connect,$sql);
		$row=mysqli_fetch_array($result);
		echo $row[0] . "|";
		echo $row[1] . "|";
		echo $row[2] . "|";
		echo $row[3] . "|";
		echo $row[4] . "|";
		echo $row[5] . "|";
		echo $row[6] . "|";
		echo $row[7] . "|";
		exit();
	}


	mysqli_close($connect);
?>
<script language="javascript">
	window.top.window.stopUpload(<?php echo $msgsuccess ?> , <?php echo $msgerror ?> );
</script>
