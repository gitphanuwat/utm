<?php
	session_start();
	include('config/config.php');
	
	//เพิ่มข้อมูล/แก้ไขข้อมูล
	if($_GET["action"]=="insert"){
		$msgsuccess=0;
		$msgerror=0;

		if($_POST["idamphur"]==""){

			if($_POST["amphur"] == "" ){
				$msgerror=4;
			}else{

				if($_POST["status"]=="1"){
					$status=1;
				}else{
					$status=0;
				}
						$sql="insert into tb_amphur(amphur , amp_keyman , amp_tel , amp_fax , amp_website , amp_facebook , status ) ";
						$sql=$sql . " values('"  .$_POST["amphur"] . "' , '" . $_POST["amp_keyman"] .  "' , '" . $_POST["amp_tel"] .  "' , '" . $_POST["amp_fax"]  .  "' , '" . $_POST["amp_website"] .  "' , '" . $_POST["amp_facebook"]. "' , '$status' ";
						$sql=$sql . ")";
						$resultAdd=mysqli_query($connect,$sql);
						$msgsuccess=1;
			}
		}else{
			//แก้ไขข้อมูล
			if($_POST["amphur"] == "" ){
				$msgerror=4;
			}else{

						if($_POST["status"]=="1"){
							$status=1;
						}else{
							$status=0;
						}
					$sql="update tb_amphur set";
					$sql=$sql." amphur ='".$_POST["amphur"]."'";
					$sql=$sql . ", amp_keyman ='".$_POST["amp_keyman"]."'";
					$sql=$sql . ", amp_tel ='".$_POST["amp_tel"]."'";
					$sql=$sql . ", amp_fax ='".$_POST["amp_fax"]."'";
					$sql=$sql . ", amp_website ='".$_POST["amp_website"]."'";
					$sql=$sql . ", amp_facebook ='".$_POST["amp_facebook"]."'";
					$sql=$sql . ", status ='".$_POST["status"]."'";
					$sql=$sql." where idamphur = ". $_POST["idamphur"];
					$resultAdd=mysqli_query($connect,$sql);
					$msgsuccess=1;
			}
		}
		sleep(1);
		echo "<script language=\"javascript\">window.location.href = 'cf_amphur.php'</script>";
	}

	//ดึงข้อมูลมาแสดงแก้ไข
	if($_GET["action"]=="getupdate"){
		$sql="select * from tb_amphur where idamphur = " . $_POST["id"];
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

	if($_GET["action"]=="delete"){
		$sql="delete from tb_amphur where idamphur = " . $_POST["id"];
		$result=mysqli_query($connect,$sql);
		exit();
	}

	if($_GET["action"]=="lock"){
		$sql="select status from tb_amphur where idamphur = " . $_POST["id"];
		$result=mysqli_query($connect,$sql);
		$row=mysqli_fetch_array($result);
		if($row[0]=="1"){
			$sql="update tb_amphur set status ='0' where idamphur = " . $_POST["id"];
		}else{
			$sql="update tb_amphur set status ='1' where idamphur = " . $_POST["id"];
		}
		$result=mysqli_query($connect,$sql);
		exit();
	}

	$sql="select * from tb_amphur order by idamphur ASC";
	$result=mysqli_query($connect,$sql);
	$total=mysqli_num_rows($result);
	$e_page=10;

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
    		<th>ลำดับ</th>
    		<th>ชื่ออำเภอ</th>
    		<th>เว็บไซต์</th>
    		<th>สถานะ</th>
            <th>Tools</th>
    	</tr>
       <?php $n=0;
	   		while($row=mysqli_fetch_array($result)){
				echo "<tr>";
					$n++;
					echo "<td>$n</td>";
					echo "<td>$row[1]</td>";
					echo "<td><a href='http://$row[5]' target=\"_blank\">$row[5]</a></td>";


					if($row[7]==1){
						echo "<td><span class='label label-success'>เปิดใช้งานปกติ</span></td>";
						$img="lock.png";
						$aTitle="เปิดใช้งานปกติ";
					}else{
						echo "<td><span class='label label-danger'>ไม่เปิดใช้งาน</span></td>";
						$img="unlock.png";
						$aTitle="ไม่เปิดใช้งาน";
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
					$urlfile="cfdata_amphur.php?url=url";
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
