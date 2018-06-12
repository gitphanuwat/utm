<?php
	session_start();
	include('config/config.php');
		
	//เพิ่มข้อมูล/แก้ไขข้อมูล
	if($_GET["action"]=="insert"){
		$msgsuccess=0;
		$msgerror=0;

		if($_POST["idgroup"]==""){

			if($_POST["groupname"] == ""){
				$msgerror=2;
			}else{

						$sql="insert into tb_group(groupname , detail , keyman ) ";
$sql=$sql . " values('"  .$_POST["groupname"] . "' , '" . $_POST["detail"] . "' , '".$_POST["keyman"]."')";
						$resultAdd=mysqli_query($connect,$sql);
						$msgsuccess=1;
			}
		}else{
			//แก้ไขข้อมูล
			if($_POST["groupname"] == ""){
				$msgerror=2;
			}else{
					$sql="update tb_group set";
					$sql=$sql." groupname ='".$_POST["groupname"]."'";
					$sql=$sql . ", detail ='".$_POST["detail"]."'";
					$sql=$sql . ", keyman ='".$_POST["keyman"]."'";
					$sql=$sql." where idgroup = ". $_POST["idgroup"];
					$resultAdd=mysqli_query($connect,$sql);
					$msgsuccess=1;
			}
		}
		sleep(1);
		echo "<script language=\"javascript\">window.location.href = 'cfgroup.php'</script>";
	}

	//ดึงข้อมูลมาแสดงแก้ไข
	if($_GET["action"]=="getupdate"){
		$sql="select * from tb_group where idgroup = " . $_POST["id"];
		$result=mysqli_query($connect,$sql);
		$row=mysqli_fetch_array($result);
		echo $row[0] . "|";
		echo $row[1] . "|";
		echo $row[2] . "|";
		echo $row[4] . "|";
		exit();
	}

	if($_GET["action"]=="delete"){
		$sql="delete from tb_group where idgroup = " . $_POST["id"];
		$result=mysqli_query($connect,$sql);
		exit();
	}


	$sql="select * from tb_group order by idgroup ASC";
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
    		<th>ชื่อกลุ่ม/เครือข่าย</th>
            <th>Tools</th>
    	</tr>
       <?php $n=0;
	   		while($row=mysqli_fetch_array($result)){
				echo "<tr>";
					$n++;
					echo "<td>$n</td>";
					echo "<td>$row[1]</td>";
					echo "<td>";
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
					$urlfile="cfdata_group.php?url=url";
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
