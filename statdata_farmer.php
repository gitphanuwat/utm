<?php
	session_start();
	include('config/config.php');
//show คณะ
if($_GET["action"]=="loadfac"){
?>
	<table class="table table-hover">
    	<tr>
    		<th style="width:50px">ลำดับ</th>
    		<th  style="width:250px">อำเภอ</th>
    		<th style="width:400px"></th>
    		<th></th>
    	</tr>
       <?php
	   	$sumuser=0;$n=0;
			$sql1="select count(*) from tb_user ";
			$result1=mysqli_query($connect,$sql1);
			$row1=mysqli_fetch_array($result1);
			$sum=$row1[0];
		$sql="select * from tb_amphur order by idamphur ASC";
		$result=mysqli_query($connect,$sql);
	   	while($row=mysqli_fetch_array($result)){
			$idfac=$row[0];
			/*$sql2="select count(*) from tb_user left join tb_moo on tb_user.idmoo = tb_moo.idmoo
			left join tb_tambon on tb_moo.idtambon = tb_tambon.idtambon
			left join tb_amphur on tb_tambon.idamphur = tb_amphur.idamphur
			 where tb_amphur.idamphur = $idfac";*/
			$sql2="select count(*) from tb_user where idamphur = $idfac";
			$result2=mysqli_query($connect,$sql2);
			$row2=mysqli_fetch_array($result2);
			$percent=number_format(($row2[0]*100)/$sum,2);
				echo "<tr>";
					$n++;
					echo "<td>$n</td>";
					echo "<td><a href='#$row[0]' title='แสดงรายละเอียดข้อมูล' class='getdep'>$row[1]</a></td>";
					echo "<td><div class=\"progress \">
                            <div class=\"progress-bar progress-bar-success\" style=\"width: ".$row2[0]/1.2."%\">".$percent."%</div>
                         </div></td>";
					echo "<td><span class=\"badge bg-light-blue\">".$row2[0]."</span> คน</td>";
				echo "</tr>";
				$sumuser=$sumuser+$row2[0];
			}
	?>
    	<tr>
    		<th  colspan="2"></th>
    		<th colspan="2">รวม <?php echo $sumuser." คน";?></th>
    	</tr>
    <?php
    echo "</table>";
	exit();
}

	//ภาควิชา
	if($_GET["action"]=="loaddep"){
?>
	<table class="table table-hover">
    	<tr>
    		<th style="width:50px">ลำดับ</th>
    		<th style="width:250px">ตำบล</th>
    		<th style="width:400px"></th>
    		<th></th>
    	</tr>
       <?php
			$sql1="select count(*) from tb_user ";
			$result1=mysqli_query($connect,$sql1);
			$row1=mysqli_fetch_array($result1);
			$sum=$row1[0];
	   	$n=0;
		$sql="select * from tb_tambon where idamphur = " . $_POST["id"]."  order by idtambon ASC";
		$result=mysqli_query($connect,$sql);
	   	while($row=mysqli_fetch_array($result)){
			$iddep=$row[0];
			$sql2="select count(*) from tb_user left join tb_moo on tb_user.idmoo = tb_moo.idmoo
			left join tb_tambon on tb_moo.idtambon = tb_tambon.idtambon
			left join tb_amphur on tb_tambon.idamphur = tb_amphur.idamphur
			 where tb_tambon.idtambon = $iddep";
			$result2=mysqli_query($connect,$sql2);
			$row2=mysqli_fetch_array($result2);
			$percent=number_format(($row2[0]*100)/$sum,2);
				echo "<tr>";
					$n++;
					echo "<td>$n</td>";
					echo "<td><a href='#$row[0]' title='แสดงรายละเอียดข้อมูล' class='getmoo'>$row[2]</a></td>";
					echo "<td><div class=\"progress \">
                            <div class=\"progress-bar progress-bar-success\" style=\"width: ".$row2[0]."%\">".$percent."%</div>
                         </div></td>";
					echo "<td><span class=\"badge bg-light-blue\">".$row2[0]."</span> คน</td>";
				echo "</tr>";
			}
    echo "</table>";
	exit();		}


	//หลักสูตร
	if($_GET["action"]=="loadmoo"){
?>
	<table class="table table-hover">
    	<tr>
    		<th style="width:50px">ลำดับ</th>
    		<th style="width:250px">หมู่บ้าน</th>
    		<th style="width:400px"></th>
    		<th></th>
    	</tr>
       <?php $n=0;
			$sql1="select count(*) from tb_user ";
			$result1=mysqli_query($connect,$sql1);
			$row1=mysqli_fetch_array($result1);
			$sum=$row1[0];
	   	$n=0;
		$sql="select * from tb_moo where idtambon = " . $_POST["id"]."  order by idmoo ASC";
		$result=mysqli_query($connect,$sql);
	   	while($row=mysqli_fetch_array($result)){
			$idcs=$row[0];
			$sql2="select count(*) from tb_user left join tb_moo on tb_user.idmoo = tb_moo.idmoo
			left join tb_tambon on tb_moo.idtambon = tb_tambon.idtambon
			left join tb_amphur on tb_tambon.idamphur = tb_amphur.idamphur
			 where tb_moo.idmoo = $idcs";
			$result2=mysqli_query($connect,$sql2);
			$row2=mysqli_fetch_array($result2);
			$percent=number_format(($row2[0]*100)/$sum,2);
				echo "<tr>";
					$n++;
					echo "<td>$n</td>";
					echo "<td><a href='#$row[0]' title='แสดงรายละเอียดข้อมูล' class='getuser'>$row[2]</a></td>";
					echo "<td><div class=\"progress \">
                            <div class=\"progress-bar progress-bar-success\" style=\"width: ".$row2[0]."%\">".$percent."%</div>
                         </div></td>";
					echo "<td><span class=\"badge bg-light-blue\">".$row2[0]."</span> คน</td>";
				echo "</tr>";
			}
    echo "</table>";
	exit();		}

	//สมาชิก
	if($_GET["action"]=="loaduser"){
	$sql="select * from tb_user where idmoo = " . $_POST["id"]." order by idmoo ASC";
	$result=mysqli_query($connect,$sql);
	$total=mysqli_num_rows($result);
?>
	<table class="table table-hover">
    	<tr>
    		<th style="width:50px">ลำดับ</th>
    		<th  style="width:250px">ชื่อเกษตรกร</th>
    		<th style="width:400px"></th>
    		<th></th>
    	</tr>
       <?php $n=0;
	   		while($row=mysqli_fetch_array($result)){
				echo "<tr>";
					$n++;
					$prefix=$cf_aca_position[$row["cf_aca_position"]];
					$prefix=$prefix . CreatePrefix($row["cf_slevel"]);

					echo "<td>$n</td>";
					echo "<td><a href='profile.php?id=$row[0]' target='_blank' >".$prefix."$row[4]  $row[5]</a></td>";
					echo "<td></td>";
					echo "<td></td>";
				echo "</tr>";
			}
    echo "</table>";
	exit();		}


	mysqli_close($connect);
?>
<script language="javascript">
	window.top.window.stopUpload(<?php echo $msgsuccess ?> , <?php echo $msgerror ?> );
</script>
