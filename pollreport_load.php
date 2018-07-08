<?php
	session_start();
	include('config/config.php');

//option nameyear
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

//show คณะ
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

		 <?php
		 $r='end';
			while($row=mysqli_fetch_array($result)){
				$sqltopic="select * from tb_topic where idpoll = " . $row[0];
				$resulttopic=mysqli_query($connect,$sqltopic);
				@$nrow=mysqli_num_rows($resulttopic);
				if($r=='end'){
					echo '<div class="row">';
					//$r='start';
				}
				echo '<div class="col-xs-6">';
				echo '<div class="box">
						  <div class="box-header">
									<h3 class="box-title">'.$row[2].'</h3>
							</div>
							<div class="box-body table-responsive no-padding">';
				//echo "<td>";
				$n=0;
				echo '<table class="table table-condensed">';
				while($rowtopic=mysqli_fetch_array($resulttopic)){
					echo '
							<tr>
							<td width="20">'.++$n.'</td>'.'
							<td width="120">'.$rowtopic['topicname'].'</td>'.'
							<td width="250">';
							$sqlscore="select * from tb_polluser where idtopic = " . $rowtopic[0].
							" and idyear = ".$_SESSION['DUR_POLL_YEAR'];
							$resultscore=mysqli_query($connect,$sqlscore);
							@$rowscore=mysqli_num_rows($resultscore);
							$sqlnpoll="select * from tb_polluser where idpoll = " . $rowtopic[1].
							" and idyear = ".$_SESSION['DUR_POLL_YEAR'];
							$resultnpoll=mysqli_query($connect,$sqlnpoll);
							@$rownpoll=mysqli_num_rows($resultnpoll);

							//echo $rowscore;
							@$bar=$rowscore*85/$rownpoll;
							//$bar=80;
							$unit=$rowscore;
							$sqlper="select tb_topic.idpoll".
							" from tb_polluser left join tb_topic on tb_polluser.idtopic=tb_topic.idtopic".
							" where tb_topic.idpoll = ".$row['idpoll'];
							$resultper=mysqli_query($connect,$sqlper);
							$nper=mysqli_num_rows($resultper);
							$per=@round(($rowscore*100)/$nper,2);
							echo '
              <div class="progress">
                  <div class="progress-bar progress-bar-green" style="width:'.$bar.'%">
                  </div>('.$unit. ')'.'
              </div>
          		</td>
          		<td><span class="badge bg-charcoal">'.$per.'%</span></td>';

							echo '</tr>';
				}
				echo '</table>';
				echo "</div>";
				echo "</div>";
				echo "</div>";
				if($r!='end'){
					echo "</div>";
					$r='end';
				}else{$r='start';}

		}
		?>
		<div class="col-xs-12">'
		<div class="box">
				<div class="box-header">
							<h3 class="box-title">ปัญหา/อุปสรรค</h3>
					</div><!-- /.box-header -->
					<div class="box-body table-responsive no-padding">
						<table class="table table-condensed">
									<tr>
											<td width="100">ลำดับ</td>
											<td>ปัญหา/อุปสรรค</td>
									</tr>
		<?php
		$c=1;
		$sqlpro="select * from tb_problem where idyear=".$_SESSION['DUR_POLL_YEAR'];
		$resultpro=mysqli_query($connect,$sqlpro);
		while(@$rowpro=mysqli_fetch_array($resultpro)){
		?>
									<tr>
											<td><?php echo $c++;?></td>
											<td><?php echo $rowpro['problem'];?></td>
									</tr>
		<?php }?>
							 </table>
					</div>
				</div>
			</div>

</div>
<?php
}

mysqli_close($connect);
?>
<script language="javascript">
	window.top.window.stopUpload(<?php echo $msgsuccess ?> , <?php echo $msgerror ?> );
</script>
