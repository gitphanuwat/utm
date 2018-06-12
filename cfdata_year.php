<?php
	session_start();
	include('config/config.php');
	//เพิ่มข้อมูล/แก้ไขข้อมูล
if($_GET["action"]=="insert"){
		$msgsuccess=0;
		$msgerror=4;
	if($_POST["idyear"]==""){
		if($_POST["nameyear"] == "" ){
				$msgerror=4;
		}else{
					if($_POST["status"]=="1"){
							$status=1;
					}else{
							$status=0;
					}
				$sql="select * from tb_year where nameyear = '" . $_POST["nameyear"] . "'";
				$result=mysqli_query($connect,$sql);
				$nRow=mysqli_num_rows($result);
				if($nRow !=0){
					$msgerror=3;
				}else{
					if($_FILES["document"]["error"]==4){
						$sql="insert into tb_year(nameyear, status) ";
						$sql=$sql . " values('"  .$_POST["nameyear"] . "' , '$status' ";
						$sql=$sql . " )";
						$resultAdd=mysqli_query($connect,$sql);
						$msgsuccess=1;
					}else{
						$accept_type=array("application/pdf");
						$file=$_FILES["document"]["name"];
						$typefile=$_FILES["document"]["type"];
						$sizefile=$_FILES["document"]["size"];
						$tempfile=$_FILES["document"]["tmp_name"];
						if(!in_array($typefile,$accept_type)){
							$msgerror=1;
						}else{
							$a=randomText(5);
							$extension = end(explode(".",$file));
							$pname="rf_$a" . "." . $extension;
							$target_path = "user/doc/" . $pname;
							//upload file
							if(@move_uploaded_file($tempfile,$target_path)){
								$sql="insert into tb_year(nameyear , status , document ) ";
								$sql=$sql . " values('"  .$_POST["nameyear"] . "', '$status' ";
								$sql=$sql . " , '$pname')";
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
			if( $_POST["nameyear"] == "" ){
				$msgerror=4;
			}else{
				if($_POST["status"]=="1"){
					$status=1;
				}else{
					$status=0;
				}

				if($_FILES["document"]["error"]==4){

					$sql="update tb_year set nameyear='" . $_POST["nameyear"] . "' ";
					$sql=$sql . " , status='$status'" ;
					$sql=$sql . "  where idyear = " . $_POST["idyear"];
					$resultAdd=mysqli_query($connect,$sql);
					$msgsuccess=1;
				}else{
					$accept_type=array("application/pdf");
					$file=$_FILES["document"]["name"];
					$typefile=$_FILES["document"]["type"];
					$sizefile=$_FILES["document"]["size"];
					$tempfile=$_FILES["document"]["tmp_name"];

					if(!in_array($typefile,$accept_type)){
						$msgerror=1;
					}else{
						$a=randomText(5);
						$extension = end(explode(".",$file));
						$pname="rf_$a" . "." . $extension;
						$target_path = "user/doc/" . $pname;
						//upload file
						if(@move_uploaded_file($tempfile,$target_path)){

							$sql="update tb_year set nameyear='" . $_POST["nameyear"] . "' ";
							$sql=$sql . " , status='$status'" ;
							$sql=$sql . " , document = '$pname' ";
							$sql=$sql . " where idyear = " . $_POST["idyear"];
							$resultAdd=mysqli_query($connect,$sql);

							$msgsuccess=1;
						}else{
							$msgerror=2;
						}
					}
				}
			}
		}
		sleep(1);
		/*echo "<script language=\"javascript\">window.location.href = 'cf_year.php'</script>";*/
	}

	//ดึงข้อมูลมาแสดงแก้ไข
	if($_GET["action"]=="getupdate"){
		$sql="select idyear , nameyear , document , status from tb_year where idyear = " . $_POST["id"];
		$result=mysqli_query($connect,$sql);
		$row=mysqli_fetch_array($result);
		echo $row[0] . "|";
		echo $row[1] . "|";
		echo $row[2] . "|";
		echo $row[3] . "|";
		exit();
	}

	if($_GET["action"]=="delete"){
		$sql="select tablename from tb_year where idyear = " . $_POST["id"];
		$result=mysqli_query($connect,$sql);
		$row=mysqli_fetch_array($result);
		$tablename=$row[0];

		$sql="delete from tb_year where idyear = " . $_POST["id"];
		$result=mysqli_query($connect,$sql);

		exit();
	}

	if($_GET["action"]=="lock"){
		$sql="select status from tb_year where idyear = " . $_POST["id"];
		$result=mysqli_query($connect,$sql);
		$row=mysqli_fetch_array($result);
		if($row[0]=="1"){
			$sql="update tb_year set status ='0' where idyear = " . $_POST["id"];
		}else{
			$sql="update tb_year set status ='1' where idyear = " . $_POST["id"];
		}
		$result=mysqli_query($connect,$sql);
		exit();
	}

if($_GET["action"]=="loadyear"){

	$sql="select idyear , nameyear , document  , status from tb_year order by idyear desc";
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

	echo '<table class="table table-hover">
    	<tr>
    		<th>ลำดับ</th>
    		<th>ปีรายงานผล</th>
            <th>แบบสำรวจข้อมูล</th>
    		<th>สถานะ</th>
            <th>Tools</th>
    	</tr>';
	   		$nn=1;
	   		while($row=mysqli_fetch_array($result)){
				echo "<tr>";
					echo "<td>".$nn++."</td>";
					echo "<td>$row[1]</td>";
					if($row[2] <>""){
						$doc="user/doc/$row[2]";
						echo "<td><a href='$doc' target='_blank'>เอกสารประกอบ</a></td>";
					}else{
						echo "<td>&nbsp;</td>";
					}

					if($row[3]==1){
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
    echo '</table>';
	if($total>0){
		echo "<div class='box-footer clearfix'>";
			echo "<div calss='browse_page'>";
				echo "<ul class='pagination pagination-sm no-margin pull-right'>";
					$urlfile="cfdata_year.php?url=url";
					page_navigator($urlfile , $before_p,$plus_p,$total,$total_p,$chk_page);
				echo "</ul>";
			echo "</div>";
        echo "</div>";
	}
	exit();
}

mysqli_close($connect);

?>

<script language="javascript">
	window.top.window.stopUpload(<?php echo $msgsuccess ?> , <?php echo $msgerror ?> );
</script>
