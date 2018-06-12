<?php
	session_start();
	include('config/config.php');

if($_GET["action"]=="insert"){
		$msgsuccess=0;
		$msgerror=4;
	if($_POST["idtype"]==""){
		if($_POST["nametype"] == "" or $_POST["detail"] == ""){
				$msgerror=4;
		}else{	//เพิ่มข้อมูล
				$sql="select * from tb_type where nametype = '" . $_POST["nametype"] . "'";
				$result=mysqli_query($connect,$sql);
				$nRow=mysqli_num_rows($result);
				if($nRow !=0){
					$msgerror=3;
				}else{
					if($_FILES["picture"]["error"]==4){
						$sql="insert into tb_type(nametype, detail) ";
						$sql=$sql . " values('".$_POST["nametype"]."','".$_POST['detail']."' ";
						$sql=$sql . " )";
						$resultAdd=mysqli_query($connect,$sql);
						$msgsuccess=1;
					}else{
						$accept_type=array("image/jpeg");
						$file=$_FILES["picture"]["name"];
						$typefile=$_FILES["picture"]["type"];
						$sizefile=$_FILES["picture"]["size"];
						$tempfile=$_FILES["picture"]["tmp_name"];
						if(!in_array($typefile,$accept_type)){
							$msgerror=1;
						}else{
							$a=randomText(5);
							$extension = end(explode(".",$file));
							$pname="rf_$a" . "." . $extension;
							$target_path = "user/doc/" . $pname;
							//upload file
							if(@move_uploaded_file($tempfile,$target_path)){
								$sql="insert into tb_type(nametype , detail , picture ) ";
								$sql=$sql . " values('"  .$_POST["nametype"] . "', '".$_POST["detail"] ."' ";
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
			if( $_POST["nametype"] == "" ){
				$msgerror=4;
			}else{
				if($_FILES["picture"]["error"]==4){

					$sql="update tb_type set nametype='" . $_POST["nametype"] . "' ";
					$sql=$sql . " , detail='".$_POST["detail"]."'" ;
					$sql=$sql . "  where idtype = " . $_POST["idtype"];
					$resultAdd=mysqli_query($connect,$sql);
					$msgsuccess=1;
				}else{
					$accept_type=array("image/jpeg");
					$file=$_FILES["picture"]["name"];
					$typefile=$_FILES["picture"]["type"];
					$sizefile=$_FILES["picture"]["size"];
					$tempfile=$_FILES["picture"]["tmp_name"];

					if(!in_array($typefile,$accept_type)){
						$msgerror=1;
					}else{
						$a=randomText(5);
						$extension = end(explode(".",$file));
						$pname="rf_$a" . "." . $extension;
						$target_path = "user/doc/" . $pname;
						//upload file
						if(@move_uploaded_file($tempfile,$target_path)){

							$sql="update tb_type set nametype='" . $_POST["nametype"] . "' ";
							$sql=$sql . " , detail='".$_POST["detail"]."'" ;
							$sql=$sql . " , picture = '$pname' ";
							$sql=$sql . " where idtype = " . $_POST["idtype"];
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
		/*echo "<script language=\"javascript\">window.location.href = 'cf_type.php'</script>";*/
	}

	//ดึงข้อมูลมาแสดงแก้ไข
	if($_GET["action"]=="getupdate"){
		$sql="select idtype , nametype , detail , picture from tb_type where idtype = " . $_POST["id"];
		$result=mysqli_query($connect,$sql);
		$row=mysqli_fetch_array($result);
		echo $row[0] . "|";
		echo $row[1] . "|";
		echo $row[2] . "|";
		echo $row[3] . "|";
		exit();
	}

	if($_GET["action"]=="delete"){
		$sql="delete from tb_type where idtype = " . $_POST["id"];
		$result=mysqli_query($connect,$sql);
		exit();
	}

if($_GET["action"]=="loadtype"){
	$sql="select idtype , nametype , picture from tb_type order by idtype desc";
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
    		<th>ชื่อพันธุ์สับปะรด</th>
    		<th>รูปภาพ</th>
        <th>Tools</th>
    	</tr>';
	   		$nn=1;
	   		while($row=mysqli_fetch_array($result)){
					echo "<tr>";
					echo "<td>".$nn++."</td>";
					echo "<td>$row[1]</td>";
					echo "<td><a href='user/doc/".$row[2]."'><img src='user/doc/".$row[2]."' height='40px'></a></td>";
					echo "<td>";
					echo "<a href='#$row[0]' title='แก้ไขข้อมูล' class='updateItem'><img src='img/edit.png'></a> &nbsp;&nbsp;";
					echo "<a href='#$row[0]' title='ลบข้อมูล' class='delItem'><img src='img/del.png'></a> </td>";
				echo "</tr>";
			}
    echo '</table>';

	if($total>0){
		echo "<div class='box-footer clearfix'>";
			echo "<div calss='browse_page'>";
				echo "<ul class='pagination pagination-sm no-margin pull-right'>";
					$urlfile="cfdata_type.php?url=url";
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
