<?php
	session_start();
	include('config/config.php');

	if($_GET["action"]=="setsession"){
		$_SESSION["DUR_POLL_ID"]=$_POST["id"];
	};

	if($_GET["action"]=="loadyear"){
			echo "<select id='select_year_id' class='form-control input-sm pull-left' style='width:250px'>";
			$sql="select idyear , nameyear from tb_year order by idyear DESC";
			$result=mysqli_query($connect,$sql);
			while($row=mysqli_fetch_array($result)){
				if($row[0]==$_SESSION["DUR_POLL_YEAR"]){$select = "selected";}
				echo "<option value='$row[0]' $select>$row[1]</option>";
				$select='';
			}
			echo "</select>";
	}

	//เพิ่มข้อมูล/แก้ไขข้อมูล
	if($_GET["action"]=="insert"){
		$msgsuccess=0;
		$msgerror=0;
		if($_POST["idpoll"]==""){
			if($_POST["pollname"] == ""){
				$msgerror=1;
			}else{
						$sql="insert into tb_poll(idyear, pollname , detail , up_date ) ";
						$sql=$sql . " values('".$_SESSION["DUR_POLL_YEAR"]."' ,'"  .$_POST["pollname"] . "' , '" . $_POST["detail"] . "' , '".$_POST["up_date"]."')";
						$resultAdd=mysqli_query($connect,$sql);
						$msgsuccess=1;
			}
		}else{
			//แก้ไขข้อมูล
					$sql="update tb_poll set";
					$sql=$sql." pollname ='".$_POST["pollname"]."'";
					$sql=$sql . ", detail ='".$_POST["detail"]."'";
					$sql=$sql . ", up_date ='".$_POST["up_date"]."'";
					$sql=$sql." where idpoll = ". $_POST["idpoll"];
					$resultAdd=mysqli_query($connect,$sql);
					$msgsuccess=1;
		}
		sleep(1);
		//echo "<script language=\"javascript\">window.location.href = 'cf_poll.php'</script>";
	}

	//ดึงข้อมูลมาแสดงแก้ไข
	if($_GET["action"]=="getupdate"){
		$sql="select * from tb_poll where idpoll = " . $_POST["id"];
		$result=mysqli_query($connect,$sql);
		$row=mysqli_fetch_array($result);
		echo $row[0] . "|";
		echo $row[1] . "|";
		echo $row[2] . "|";
		echo $row[3] . "|";
		//echo '5|4|3|2|';
		exit();
	}

	if($_GET["action"]=="delete"){
		$sql="delete from tb_poll where idpoll = " . $_POST["id"];
		$result=mysqli_query($connect,$sql);
		exit();
	}

	if($_GET["action"]=="loadpoll"){
		if($_POST["idyear"]!=""){
			$idyear = $_POST["idyear"];
				$_SESSION["DUR_POLL_YEAR"]=$idyear;
		}else{
			if($_SESSION["DUR_POLL_YEAR"]==""){
				$sql="select idyear, nameyear from tb_year order by idyear DESC";
				$result=mysqli_query($connect,$sql);
				$row=mysqli_fetch_array($result);
				$idyear=$row[0];
				$_SESSION["DUR_POLL_YEAR"]=$idyear;
			}
		}
		//$_SESSION["DUR_POLL_YEAR"]=$idyear;

		$sql="select * from tb_poll where idyear=".$_SESSION['DUR_POLL_YEAR']." order by idpoll ASC";
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
				<th>หัวข้อแบบสำรวจข้อมูล</th>
				<th>จำนวนหัวข้อคำถาม</th>
				<th>วันที่</th>
        <th>Tools</th>
    	</tr>
       <?php $n=0;
	   		while($row=mysqli_fetch_array($result)){
					$sqltopic="select * from tb_topic where idpoll = " . $row[0];
					$resulttopic=mysqli_query($connect,$sqltopic);
					@$nrow=mysqli_num_rows($resulttopic);
				echo "<tr>";
					$n++;
					echo "<td>$n</td>";
					echo "<td>$row[2]</td>";
					echo "<td>$nrow</td>";
					echo "<td>$row[4]</td>";
					echo "<td>";
					echo "<a href='#$row[0]' title='แก้ไขหัวข้อคำถาม' class='updatetopic'><img src='img/detail.png'></a> &nbsp;&nbsp;";
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
						$urlfile="cfdata_poll.php?url=url";
						page_navigator($urlfile , $before_p,$plus_p,$total,$total_p,$chk_page);
					echo "</ul>";
				echo "</div>";
	        echo "</div>";
		}
	}

	mysqli_close($connect);

?>

<script language="javascript">
	window.top.window.stopUpload(<?php echo $msgsuccess ?> , <?php echo $msgerror ?> , <?php echo $_SESSION["DUR_POLL_YEAR"]; ?> );
</script>
