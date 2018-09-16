<?php
	session_start();
	include('config/config.php');

	if($_POST["status"]==""){$_POST["status"]=0;}else{$_POST["status"]=1;}


	if($_GET["action"]=="loadtambon"){
		echo "<select id='selectDepID' class='form-control input-sm pull-right' style='width: 300px;'>";
			echo "<option value='0'> == เลือกหมู่บ้าน == </option>";
			echo "<option value='0'> - เลือกทั้งหมด - </option>";
		$sql="select idmoo , moo, tambon, amphur from tb_moo
		left join  tb_tambon on tb_moo.idtambon = tb_tambon.idtambon
		left join  tb_amphur on  tb_tambon.idamphur =  tb_amphur.idamphur
		order by tb_moo.moo ASC";
		$result=mysqli_query($connect,$sql);
		while($row=mysqli_fetch_array($result)){
			echo "<option value='$row[0]'>$row[1]($row[2]:$row[3])</option>";
		}
		echo "</select>";
		exit();
	}

	if($_GET["action"]=="loadData"){
		if($_GET["id"] !=0){
				$i=1;
				$sql="select
				*
				from tb_moo
				where idmoo =" . $_GET["id"] . " order by idmoo";
				$result=mysqli_query($connect,$sql);
					while($row=mysqli_fetch_array($result)){
						echo "<table class='table table-hover'>";
						echo "<tr>";
							echo "<th>หมู่บ้าน : $row[2]</th>";
						echo "</tr>";
						echo "<tr>";
						echo "<td>";
						//ตารางรายบุคคล
							echo "<table class='table table-bordered'>";
							echo "<tr>";
								echo "<th style=\"width:50px\">ลำดับ</th>";
								echo "<th style=\"width:300px\">ชื่อ-สกุล</th>";
								echo "<th></th>";
							echo "</tr>";
						$j=1;
						$sql2="select
						tb_moo.moo,
						tb_user.iduser, tb_user.prefix, tb_user.firstname, tb_user.lastname
						,tb_user.cf_aca_position , 	tb_user.cf_slevel
						from tb_moo, tb_user
						where tb_moo.idmoo = tb_user.idmoo
						and tb_moo.idmoo =" . $_GET["id"] . " order by tb_moo.idmoo,tb_user.firstname";
						$result2=mysqli_query($connect,$sql2);
							if(mysqli_num_rows($result2)==0){
								echo "<tr>";
								echo "<td colspan='3'><font color='red'> ยังไม่มีข้อมูล </font></td>";
								echo "</tr>";
							}else{
								while($row2=mysqli_fetch_array($result2)){
									$prefix=$cf_aca_position[$row2[5]];
									$prefix=$prefix . CreatePrefix($row2[6]);
									echo "<tr>";
										echo "<td>$j</td>";
										echo "<td style=\"width:300px\"><a href='profile.php?url=$url&id=$row2[1]' target='_blank' >$prefix$row2[3]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$row2[4]</a></td>";
										echo "<td>";
									echo "</tr>";
									$j++;
								}
							}
						echo "</table>";//table2
					echo "</td>";
					echo "</tr>";
					echo "</table>";//table1
				}

		}else{
						echo "<table class='table table-hover'>";
						echo "<tr>";
							echo "<th>กลุ่มเกษตรกร</th>";
						echo "</tr>";
						echo "<tr>";
						echo "<td>";
						//ตารางรายบุคคล
							echo "<table class='table table-bordered'>";
							echo "<tr>";
								echo "<th style=\"width:50px\">ลำดับ</th>";
								echo "<th style=\"width:300px\">ชื่อ-สกุล</th>";
								echo "<th></th>";
							echo "</tr>";
						$sql2="select
						tb_moo.moo,
						tb_user.iduser, tb_user.prefix, tb_user.firstname, tb_user.lastname
						,tb_user.cf_aca_position , 	tb_user.cf_slevel
						from tb_moo, tb_user
						where tb_moo.idmoo = tb_user.idmoo
						order by tb_moo.idmoo,tb_user.firstname";
						$result2=mysqli_query($connect,$sql2);
	$total=mysqli_num_rows($result2);
	$e_page=50;

	if(!isset($_GET['s_page'])){
		$_GET['s_page']=0;
	}else{
		$chk_page=$_GET['s_page'];
		$_GET['s_page']=$_GET['s_page']*$e_page;
	}
	$sql2=$sql2 . " LIMIT " . $_GET['s_page'] . " , $e_page";
	$result2=mysqli_query($connect,$sql2);
	if(mysqli_num_rows($result2)>=1){
		$plus_p=($chk_page*$e_page)+mysqli_num_rows($result2);
	}else{
		$plus_p=($chk_page*$e_page);
	}
	$total_p=ceil($total/$e_page);
	$before_p=($chk_page*$e_page)+1;

						$j=$before_p;
						$f="";

							if(mysqli_num_rows($result2)==0){
								echo "<tr>";
								echo "<td colspan='3'><font color='red'> ยังไม่มีข้อมูล </font></td>";
								echo "</tr>";
							}else{
								while($row2=mysqli_fetch_array($result2)){
									$prefix=$cf_aca_position[$row2[5]];
									$prefix=$prefix . CreatePrefix($row2[6]);
									if ($f!=$row2[0]){
										echo "<tr><td colspan='3'>หมู่บ้าน : $row2[0]</td></tr>";
										//$j=1;
									}
									echo "<tr>";
										echo "<td style=\"width:50px\">$j</td>";
										echo "<td style=\"width:300px\"><a href='profile.php?url=$url&id=$row2[1]' target='_blank' >$prefix$row2[3]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$row2[4]</a></td>";
										echo "<td>";
									echo "</tr>";
									$j++;
									$f=$row2[0];
								}
							}
						echo "</table>";//table2
	if($total>0){
			echo "<div class='box-footer clearfix'>";
				echo "<div calss='browse_page'>";
					echo "<ul class='pagination pagination-sm no-margin pull-right'>";
						$urlfile="repdata_moo.php?action=loadData&url=url";
						page_navigator($urlfile , $before_p,$plus_p,$total,$total_p,$chk_page);
					echo "</ul>";
				echo "</div>";
			echo "</div>";
	}
					echo "</td>";
					echo "</tr>";
					echo "</table>";//table1
			}
}


	mysqli_close($connect);
?>
<script language="javascript">
	window.top.window.stopUpload(<?php echo $msgsuccess ?> , <?php echo $msgerror ?> );
</script>
