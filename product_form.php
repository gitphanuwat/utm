1.ผลผลิตสับปะรด<br>
<table class="table table-bordered" >
							  <tr>
								<td>ลำดับ</td>
								<td>พันธุ์สับปะรด</td>
								<td>แปลงปลูก</td>
								<td>จำนวนต้นที่ปลูก</td>
								<td>จำนวนต้นที่ให้ผลผลิต</td>
								<td>ผลผลิต(ลูก)</td>
                <td>ราคาขาย(บาท/กิโลกรัม)</td>
							  </tr>
<?php
			 $iduser=$_GET["id"];
			 $idyear=$_GET["idyear"];

			$sqlu="select d.* from tb_durian d, tb_plot p, tb_user u  where d.idplot=p.idplot and p.iduser=u.iduser and d.idyear = $idyear and u.iduser=$iduser";
			$resultu=mysqli_query($connect,$sqlu);
			$ci=1;
			$cr="";
			while(@$rowu=mysqli_fetch_array($resultu)){
?>
							  <tr>
								<td><?php
								echo $ci++."&nbsp;&nbsp;&nbsp;<a href='#$rowu[0]' title='ลบข้อมูล' class='delItemdurian'><img src='img/del.png'></a>
								&nbsp;&nbsp;&nbsp;<a href='#$rowu[0]' title='แก้ไข' class='editProduct'><img src='img/edit.png'></a>
								"."
								</td>";
								$cr++;
?></td>
								<td><?php echo $cf_type[$rowu[2]];?></td>
<?php
					$sqlp= "select codeplot from tb_plot where idplot = $rowu[3] ";
					$resultp=mysqli_query($connect,$sqlp);
					$rowp=mysqli_fetch_array($resultp);
?>
								<td><?php echo $rowp[0];?></td>
                                <td><?php echo $rowu[4];?></td>
								<td><?php echo $rowu[5];?></td>
								<td><?php echo $rowu[6];?></td>
								<td><?php echo $rowu[7];?></td>
							  </tr>
<?php }?>
</table>
<input type="hidden" name="work0" id="work0" value="<?php echo $cr;?>">
<input type="hidden" name="iduser" id="iduser" value="<?php echo $iduser;?>">
<input type="hidden" name="idyear" id="idyear" value="<?php echo $idyear;?>">
<input type="button" name="butNewdurian" id="butNewdurian" value="เพิ่มข้อมูล">
<br>
<hr>

<?php
	if($_POST["idyear"]!=""){
		$idyear = $_POST["idyear"];
			$_SESSION["DUR_POLL_YEAR"]=$idyear;
	}else{
		if($_SESSION["DUR_POLL_YEAR"]==""){
			$sqly="select idyear, nameyear from tb_year order by idyear DESC";
			$resulty=mysqli_query($connect,$sqly);
			$rowy=mysqli_fetch_array($resulty);
			$idyear=$rowy[0];
			$_SESSION["DUR_POLL_YEAR"]=$idyear;
		}
	}
	//$_SESSION["DUR_POLL_YEAR"]=$idyear;

	$sqlpoll="select * from tb_poll where idyear=".$_SESSION['DUR_POLL_YEAR']." order by idpoll ASC";
	$resultpoll=mysqli_query($connect,$sqlpoll);
	$total=@mysqli_num_rows($resultpoll);

?>
<div class="row">
		 <?php
			while($rowpoll=@mysqli_fetch_array($resultpoll)){
				$sqltopic="select * from tb_topic where idpoll = " . $rowpoll[0];
				$resulttopic=mysqli_query($connect,$sqltopic);
				@$nrow=mysqli_num_rows($resulttopic);
				echo '<div class="col-xs-6">';
				echo '<div class="box">
						  <div class="box-header">
									<h3 class="box-title">'.$rowpoll[2].'</h3>
							</div>
							<div class="box-body table-responsive no-padding">';
				//echo "<td>";
				echo '<table class="table table-condensed">';
				$m=0;
				while($rowtopic=mysqli_fetch_array($resulttopic)){

					$sqlpollchecked="select idpolluser from tb_polluser
					where idyear=".$_SESSION['DUR_POLL_YEAR']."
					and iduser=".$iduser."
					and idtopic=".$rowtopic[0];
					$resultpollchecked=mysqli_query($connect,$sqlpollchecked);
					@$checkselect=mysqli_num_rows($resultpollchecked);

					echo '
							<tr>
							<td width="20">';
					echo '<input type="radio" name="topic'.$rowpoll[0].'" value="'.$rowtopic[0].'" id="topic'.$rowpoll[0].'_'.$m.'" class="topicselect"';
							if ($checkselect!=''){echo 'checked';}
					echo '>';
					echo '</td>'.'
							<td>'.$rowtopic['topicname'].'</td>';
					echo '</tr>';
					$m++;
				}
				echo '</table>';
				echo "</div>";
				echo "</div>";
				echo "</div>";
		}
		?>
		<?php
		//if($idproblem!=''){
			$sqlproblem="select * from tb_problem where iduser=$iduser and idyear=$idyear";
			$resultproblem=mysqli_query($connect,$sqlproblem);
			@$rowproblem=mysqli_fetch_array($resultproblem);
		//}
		 ?>
		<div class="col-xs-12">
		<div class="box">
				<div class="box-header">
							<h3 class="box-title">ปัญหา/อุปสรรค</h3>
					</div><!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
						<table class="table table-condensed">
									<tr>
											<td width="100">
												<textarea class="form-control" id="problem" name="problem"><?php echo $rowproblem['problem']; ?></textarea>
												<input type="hidden" name="idproblem" id="idproblem" value="<?php echo $rowproblem['idproblem'];?>">
											</td>
									</tr>

							 </table>
					</div>
				</div>
			</div>
</div>
