<?php
	session_start();
	include('config/config.php');
//option nameyear
if($_GET["action"]=="loadyear"){
		echo "<select id='select_year_id' class='form-control input-sm pull-right'>";
		$sql="select idyear , nameyear from tb_year order by idyear DESC";
		$result=mysqli_query($connect,$sql);
		while($row=mysqli_fetch_array($result)){
			echo "<option value='$row[0]'>$row[1]</option>";
		}
		echo "</select>";
}

//show คณะ
if($_GET["action"]=="loadamp"){
?>
<table class="table table-bordered" >
							  <tr>
								<td>ลำดับ</td>
                <td>อำเภอ</td>
								<td>จำนวนแปลงปลูก</td>
								<td>ต้นที่ปลูก</td>
								<td>ต้นที่ให้ผล</td>
								<td>ผลผลิต(ลูก)</td>
								<td>ราคาขายเฉลี่ย(บาท/กก.)</td>
							  </tr>
<?php
	   if($_POST["idyear"]!=""){
	   $idyear=$_POST["idyear"];
		$sql="select idyear, nameyear from tb_year where idyear=$idyear";
		$result=mysqli_query($connect,$sql);
	   	$row=mysqli_fetch_array($result);
	   $idyear=$row[0];
	   }else{
		$sql="select idyear, nameyear from tb_year order by idyear DESC";
		$result=mysqli_query($connect,$sql);
	   	$row=mysqli_fetch_array($result);
	   $idyear=$row[0];
	   }
			$sumplot=0;
			$sume_trunk=0;
			$sumproduct_durian=0;
			$sumb_trunk=0;
			$sumsale_durian=0;
				$sumcsale_durian=0;
			$sql="select * from tb_amphur  order by idamphur";
			$result=mysqli_query($connect,$sql);
			$cr=1;
			while(@$row=mysqli_fetch_array($result)){
				$plot=0;
				$e_trunk=0;
				$product_durian=0;
				$b_trunk=0;
				$sale_durian=0;
					$csale_durian=0;
				$sql1="select * from tb_user where idamphur=$row[0]";
				$result1=mysqli_query($connect,$sql1);
				while(@$row1=mysqli_fetch_array($result1)){
					$sql2="select tb_durian.* from tb_durian, tb_plot where tb_durian.idplot=tb_plot.idplot and tb_plot.iduser=$row1[0] and tb_durian.idyear=$idyear";
					$result2=mysqli_query($connect,$sql2);
					while(@$row2=mysqli_fetch_array($result2)){
						$plot++;
						@$b_trunk=$b_trunk+$row2[4];
						@$e_trunk=$e_trunk+$row2[5];
						@$product_durian=$product_durian+$row2[6];
						@$sale_durian=$sale_durian+$row2[7];
						if ($row2[7]!=0){++$csale_durian;}

					}
				}
				@$sumplot=$sumplot+$plot;
				@$sume_trunk=$sume_trunk+$e_trunk;
				@$sumproduct_durian=$sumproduct_durian+$product_durian;
				@$sumb_trunk=$sumb_trunk+$b_trunk;
				@$sumsale_durian=$sumsale_durian+$sale_durian;
					@$sumcsale_durian=$sumcsale_durian+$csale_durian;

?>
							  <tr>
	                <td><?php echo $cr++;?></td>
									<td><?php echo '<a href=\'#'.$row[0].'\' title=\'แสดงรายละเอียดข้อมูล\' class=\'getmainwork\'>'.$row[1].'</a>';?></td>
									<td><?php echo $plot;?></td>
	                <td><?php echo $b_trunk;?></td>
	                <td><?php echo $e_trunk;?></td>
									<td><?php echo $product_durian;?></td>
									<td><?php echo @number_format(($sale_durian/$csale_durian),2);?></td>
							  </tr>
<?php }?>
							  <tr>
                              	<td colspan="2">รวม</td>
								<td><?php echo $sumplot;?></td>
                                <td><?php echo $sumb_trunk;?></td>
                                <td><?php echo $sume_trunk;?></td>
								<td><?php echo $sumproduct_durian;?></td>
								<td><?php echo "เฉลี่ย ".@number_format(($sumsale_durian/$sumcsale_durian),2);?></td>
							  </tr>
</table>
<?php
	exit();
}

	if($_GET["action"]=="loadmainwork"){
	   	$idamphur=$_POST["id"];
		$idyear=$_POST["idyear"];
?>
<table class="table table-bordered" >
							  <tr>
								<td>ลำดับ</td>
                                <td>ตำบล</td>
								<td>จำนวนแปลงปลูก</td>
								<td>ต้นที่ปลูก</td>
								<td>ต้นที่ให้ผล</td>
								<td>ผลผลิต(ลูก)</td>
								<td>ราคาขายเฉลี่ย(บาท/กก.)</td>
							  </tr>
<?php
			$sumplot=0;
			$sume_trunk=0;
			$sumproduct_durian=0;
			$sumb_trunk=0;
			$sumsale_durian=0;
				$sumcsale_durian=0;
			$sql="select * from tb_tambon  where idamphur=$idamphur order by idtambon";
			$result=mysqli_query($connect,$sql);
			$cr=1;
			while(@$row=mysqli_fetch_array($result)){
				$plot=0;
				$e_trunk=0;
				$product_durian=0;
				$b_trunk=0;
				$sale_durian=0;
					$csale_durian=0;
				$sql1="select * from tb_user where idtambon=$row[0]";
				$result1=mysqli_query($connect,$sql1);
				while(@$row1=mysqli_fetch_array($result1)){
					$sql2="select tb_durian.* from tb_durian, tb_plot where tb_durian.idplot=tb_plot.idplot and tb_plot.iduser=$row1[0] and tb_durian.idyear=$idyear";
					$result2=mysqli_query($connect,$sql2);
					while(@$row2=mysqli_fetch_array($result2)){
						$plot++;
						@$e_trunk=$e_trunk+$row2[5];
						@$product_durian=$product_durian+$row2[6];
						@$b_trunk=$b_trunk+$row2[4];
						@$sale_durian=$sale_durian+$row2[7];
						if ($row2[7]!=0){++$csale_durian;}

					}
				}
				@$sumplot=$sumplot+$plot;
				@$sume_trunk=$sume_trunk+$e_trunk;
				@$sumproduct_durian=$sumproduct_durian+$product_durian;
				@$sumb_trunk=$sumb_trunk+$b_trunk;
				@$sumsale_durian=$sumsale_durian+$sale_durian;
				@$sumcsale_durian=$sumcsale_durian+$csale_durian;

?>
							  <tr>
                              	<td><?php echo $cr++;?></td>
								<td><?php echo '<a href=\'#'.$row[0].'\' title=\'แสดงรายละเอียดข้อมูล\' class=\'getuserwork\'>'.$row[2].'</a>';?></td>

								<td><?php echo $plot;?></td>
                                <td><?php echo $b_trunk;?></td>
                                <td><?php echo $e_trunk;?></td>
								<td><?php echo $product_durian;?></td>
								<td><?php echo @number_format(($sale_durian/$csale_durian),2);?></td>
							  </tr>
<?php }?>
							  <tr>
                              	<td colspan="2">รวม</td>
								<td><?php echo $sumplot;?></td>
                                <td><?php echo $sumb_trunk;?></td>
                                <td><?php echo $sume_trunk;?></td>
								<td><?php echo $sumproduct_durian;?></td>
								<td><?php echo "เฉลี่ย ".@number_format(($sumsale_durian/$sumcsale_durian),2);?></td>
							  </tr>
</table>
<?php

	exit();
	}

	if($_GET["action"]=="loaduserwork"){

	   	$idtambon=$_POST["id"];
		$idyear=$_POST["idyear"];
?>
<table class="table table-bordered" >
					<tr>
						<td>ลำดับ</td>
						<td>รหัส</td>
                <td>เกษตรกร</td>
								<td>จำนวนแปลงปลูก</td>
								<td>จำนวนพื้นที่ปลูก</td>
								<td>ละติจูด</td>
								<td>ลองจิจูด</td>
								<td>ต้นที่ปลูก</td>
								<td>ต้นที่ให้ผล</td>
								<td>ผลผลิต(ลูก)</td>
								<td>ราคาขายเฉลี่ย(บาท/กก.)</td>
								<td>รูปภาพ</td>

					</tr>
<?php
			$sumplot=0;
			$sume_trunk=0;
			$sumproduct_durian=0;
			$sumproduct_unit=0;
			$sumb_trunk=0;
			$sumsale_durian=0;
				$sumcsale_durian=0;
				$sumcproduct_unit=0;
				$cr=1;
				$sql1="select * from tb_user where idtambon=$idtambon";
				$result1=mysqli_query($connect,$sql1);
				while(@$row1=mysqli_fetch_array($result1)){

				$plot=0;
				$e_trunk=0;
				$product_durian=0;
				$product_unit=0;
				$b_trunk=0;
				$sale_durian=0;
					$csale_durian=0;
					$cproduct_unit=0;
					$sumarea=0;
					$sql2="select tb_durian.*,tb_plot.* from tb_durian, tb_plot where tb_durian.idplot=tb_plot.idplot and tb_plot.iduser=$row1[0] and tb_durian.idyear=$idyear";
					$result2=mysqli_query($connect,$sql2);
					while(@$row2=mysqli_fetch_array($result2)){
						$plot++;
						@$e_trunk=$e_trunk+$row2[5];
						@$product_durian=$product_durian+$row2[6];
						if ($row2[6]!=0){
							@$product_unit=$product_unit+$row2[6];
							++$cproduct_unit;
						}
						@$b_trunk=$b_trunk+$row2[4];
						@$sale_durian=$sale_durian+$row2[7];
						if ($row2[7]!=0){++$csale_durian;}
						@$sumarea=$sumarea+$row2['area'];
						@$lat=$row2['lat'];
						@$lng=$row2['lng'];
					}

					@$sumplot=$sumplot+$plot;
				@$sume_trunk=$sume_trunk+$e_trunk;
				@$sumproduct_durian=$sumproduct_durian+$product_durian;
				@$sumproduct_unit=$sumproduct_unit+$product_unit;
				@$sumb_trunk=$sumb_trunk+$b_trunk;
				@$sumsale_durian=$sumsale_durian+$sale_durian;
					@$sumcsale_durian=$sumcsale_durian+$csale_durian;
					@$sumcproduct_unit=$sumcproduct_unit+$cproduct_unit;


?>
							  <tr>
                              	<td><?php echo $cr++;?></td>
																<td><?php echo $row1[0];?></td>
								<td><?php echo $row1[4].' '.$row1[5];?></td>

								<td><?php echo $plot;?></td>
								<td><?php echo $sumarea;?></td>
								<td><?php echo round($lat,5);?></td>
								<td><?php echo round($lng,5);?></td>
                                <td><?php echo $b_trunk;?></td>
                                <td><?php echo $e_trunk;?></td>
								<td><?php echo $product_durian;?></td>
								<td><?php echo @number_format(($sale_durian/$csale_durian),2);?></td>
								<td><?php if ($row1['picture']){echo "มี";}?></td>
							  </tr>
<?php }?>
							  <tr>
                              	<td colspan="3">รวม</td>
																<td><?php echo $sumplot;?></td>
																<td></td>
																<td></td>
																<td></td>
                                <td><?php echo $sumb_trunk;?></td>
                                <td><?php echo $sume_trunk;?></td>
								<td><?php echo $sumproduct_durian;?></td>
								<td><?php echo "เฉลี่ย ".@number_format(($sumsale_durian/$sumcsale_durian),2);?></td>
							  </tr>
</table>
<?php

	exit();
	}

	if($_GET["action"]=="loadperson"){
		   if($_POST["idyear"]!=""){
				   $idyear=$_POST["idyear"];
		   }else{
					$sql="select idyear, nameyear from tb_year order by idyear DESC";
					$result=mysqli_query($connect,$sql);
					$row=mysqli_fetch_array($result);
				   $idyear=$row[0];
		   }

		echo "<div class='chart' id='bar-chart-action' style='height: 250px;''></div> ";
		echo "<script type='text/javascript'>";
			echo "var bar = new Morris.Bar({";
				echo "element: 'bar-chart-action',";
				echo "resize: true,";
				echo "data: [";
				$sumb_trunk=0;
				$sume_trunk=0;
				$i=0;
				$sql="select * from tb_amphur order by idamphur";
				$result=mysqli_query($connect,$sql);
				while($row=mysqli_fetch_array($result)){
					$b_trunk=0;
					$e_trunk=0;

					$sql1="select iduser from tb_user where idamphur = $row[0]";
					$result1=mysqli_query($connect,$sql1);
					while($row1=mysqli_fetch_array($result1)){

						$sql2="select tb_durian.iddurian, tb_durian.b_trunk, tb_durian.e_trunk from tb_durian, tb_plot where tb_plot.iduser = $row1[0] and tb_durian.idyear=$idyear";
						$result2=mysqli_query($connect,$sql2);
						while($row2=mysqli_fetch_array($result2)){
							//$summoo=$summoo+$qmoo;
							@$b_trunk = $b_trunk+$row2[1];
							@$e_trunk = $e_trunk+$row2[2];
						}//durian
					}//user
					$sumb_trunk = $sumb_trunk+$b_trunk;
					$sume_trunk = $sume_trunk+$e_trunk;

					echo "{y: '$row[1]', a: $b_trunk, b: $e_trunk },";
					$i++;
		 		}//amphur
		 		echo "],";
		 		echo "barColors: ['#00A65A', '#F39C11' ],";
		 		echo "gridLineColor: '#666666',";
		 		echo "gridTextColor: '#000000',";
                echo "xkey: 'y',";
                echo "ykeys: ['a', 'b' ],";
                echo "labels: ['ต้นที่ปลูก', 'ต้นที่ให้ผลผลิต' ],";
                echo "hideHover: 'auto'";
		 	echo "});";
		echo "</script>";

		exit();
	}


	mysqli_close($connect);
?>
<script language="javascript">
	window.top.window.stopUpload(<?php echo $msgsuccess ?> , <?php echo $msgerror ?> );
</script>
