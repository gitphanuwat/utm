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
        $sql="select count(*) from tb_userwork where idyear=$idyear";
		$result=mysqli_query($connect,$sql);
		@$row=mysqli_fetch_array($result);
		$sum=$row[0];

        //$sql="select count(*) from tb_userwork  where idyear=$idyear and work5!='||'";
        //$sql="select count(*) from tb_userwork where idyear=$idyear and work5 like '%1%' ";

		//$result=mysqli_query($connect,$sql);
		//@$row=mysqli_fetch_array($result);
		//sumwork5=$row[0];

?>
                	<div class="row">
                    	<div class="col-xs-6">
                        	<div class="box">
                            	<div class="box-header">
                                    <h3 class="box-title">อายุพืช</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-condensed">
                                        <tr>
                                            <td width="20">1.</td>
                                            <td width="120">ต่ำกว่า 3 ปี</td>
                                            <td width="250">
<?php
                            $sql="select count(*) from tb_userwork where work1 like '%1%' and idyear=$idyear";
							$result=mysqli_query($connect,$sql);
							$row1=mysqli_fetch_array($result);
                            $sql="select count(*) from tb_userwork where work1 like '%2%' and idyear=$idyear";
							$result=mysqli_query($connect,$sql);
							$row2=mysqli_fetch_array($result);
							$sql="select count(*) from tb_userwork where work1 like '%3%' and idyear=$idyear";
							$result=mysqli_query($connect,$sql);
							$row3=mysqli_fetch_array($result);
							$sumwork1 = $row1[0]+$row2[0]+$row3[0];
							@$percent=number_format(($row1[0]*100)/$sumwork1,2);
							if($percent<20){$cl="red";}else if($percent<40){$cl="yellow";}else if($percent<60){$cl="green";}else{$cl="blue";}
?>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-<?php echo $cl;?>" style="width: <?php echo $percent;?>%">
                                                    </div><?php echo $row1[0]." คน";?>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-charcoal"><?php echo "$percent%";?></span></td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>3-5 ปี</td>
                                            <td>
<?php

							@$percent=number_format(($row2[0]*100)/$sumwork1,2);
							if($percent<20){$cl="red";}else if($percent<40){$cl="yellow";}else if($percent<60){$cl="green";}else{$cl="blue";}
?>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-<?php echo $cl;?>" style="width: <?php echo $percent;?>%">
                                                    </div><?php echo $row2[0]." คน";?>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-charcoal"><?php echo "$percent%";?></span></td>
                                        </tr>
                                        <tr>
                                            <td>3.</td>
                                            <td>มากกว่า 5 ปี</td>
                                            <td>
<?php
							@$percent=number_format(($row3[0]*100)/$sumwork1,2);
							if($percent<20){$cl="red";}else if($percent<40){$cl="yellow";}else if($percent<60){$cl="green";}else{$cl="blue";}
?>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-danger" style="width: <?php echo $percent;?>%">
                                                    </div><?php echo $row3[0]." คน";?>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-charcoal"><?php echo "$percent%";?></span></td>
                                        </tr>
                                    </table>
                                </div><!-- /.box-body -->
                     		</div>
                        	<div class="box">
                            	<div class="box-header">
                                    <h3 class="box-title">รอบการออกดอกต่อปี</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-condensed">
                                        <tr>
                                            <td width="20">1.</td>
                                            <td width="120">1 ครั้งต่อปี</td>
                                            <td width="250">
<?php
                            $sql="select count(*) from tb_userwork where work2 like '%1%' and idyear=$idyear";
							$result=mysqli_query($connect,$sql);
							$row1=mysqli_fetch_array($result);
                            $sql="select count(*) from tb_userwork where work2 like '%2%' and idyear=$idyear";
							$result=mysqli_query($connect,$sql);
							$row2=mysqli_fetch_array($result);
                            $sql="select count(*) from tb_userwork where work2 like '%3%' and idyear=$idyear";
							$result=mysqli_query($connect,$sql);
							$row3=mysqli_fetch_array($result);
							$sumwork2 = $row1[0]+$row2[0]+$row3[0];
							@$percent=number_format(($row1[0]*100)/$sumwork2,2);
							if($percent<20){$cl="red";}else if($percent<40){$cl="yellow";}else if($percent<60){$cl="green";}else{$cl="blue";}
?>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-<?php echo $cl;?>" style="width: <?php echo $percent;?>%">
                                                    </div><?php echo $row1[0]." คน";?>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-charcoal"><?php echo "$percent%";?></span></td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>2 ครั้งต่อปี</td>
                                            <td>
<?php
							@$percent=number_format(($row2[0]*100)/$sumwork2,2);
							if($percent<20){$cl="red";}else if($percent<40){$cl="yellow";}else if($percent<60){$cl="green";}else{$cl="blue";}
?>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-<?php echo $cl;?>" style="width: <?php echo $percent;?>%">
                                                    </div><?php echo $row2[0]." คน";?>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-charcoal"><?php echo "$percent%";?></span></td>
                                        </tr>
                                        <tr>
                                            <td>3.</td>
                                            <td>3 ครั้งต่อปี</td>
                                            <td>
<?php
							@$percent=number_format(($row3[0]*100)/$sumwork2,2);
							if($percent<20){$cl="red";}else if($percent<40){$cl="yellow";}else if($percent<60){$cl="green";}else{$cl="blue";}
?>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-<?php echo $cl;?>" style="width: <?php echo $percent;?>%">
                                                    </div><?php echo $row3[0]." คน";?>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-charcoal"><?php echo "$percent%";?></span></td>
                                        </tr>
                                    </table>
                                </div><!-- /.box-body -->
                     		</div>
                        	<div class="box">
                            	<div class="box-header">
                                    <h3 class="box-title">รอบการตัดขายต่อปี</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                    <table class="table table-condensed">
                                        <tr>
                                            <td width="20">1.</td>
                                            <td width="120">1 ครั้งต่อปี</td>
                                            <td width="250">
<?php
                            $sql="select count(*) from tb_userwork where work3 like '%1%' and idyear=$idyear";
							$result=mysqli_query($connect,$sql);
							$row1=mysqli_fetch_array($result);
                            $sql="select count(*) from tb_userwork where work3 like '%2%' and idyear=$idyear";
							$result=mysqli_query($connect,$sql);
							$row2=mysqli_fetch_array($result);
                            $sql="select count(*) from tb_userwork where work3 like '%3%' and idyear=$idyear";
							$result=mysqli_query($connect,$sql);
							$row3=mysqli_fetch_array($result);
							$sumwork3 = $row1[0]+$row2[0]+$row3[0];
							@$percent=number_format(($row1[0]*100)/$sumwork3,2);
							if($percent<20){$cl="red";}else if($percent<40){$cl="yellow";}else if($percent<60){$cl="green";}else{$cl="blue";}
?>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-<?php echo $cl;?>" style="width: <?php echo $percent;?>%">
                                                    </div><?php echo $row1[0]." คน";?>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-charcoal"><?php echo "$percent%";?></span></td>
                                        </tr>
                                        <tr>
                                            <td>2.</td>
                                            <td>2 ครั้งต่อปี</td>
                                            <td>
<?php
							@$percent=number_format(($row2[0]*100)/$sumwork3,2);
							if($percent<20){$cl="red";}else if($percent<40){$cl="yellow";}else if($percent<60){$cl="green";}else{$cl="blue";}
?>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-<?php echo $cl;?>" style="width: <?php echo $percent;?>%">
                                                    </div><?php echo $row2[0]." คน";?>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-charcoal"><?php echo "$percent%";?></span></td>
                                        </tr>
                                        <tr>
                                            <td>3.</td>
                                            <td>3 ครั้งต่อปี</td>
                                            <td>
<?php
							@$percent=number_format(($row3[0]*100)/$sumwork3,2);
							if($percent<20){$cl="red";}else if($percent<40){$cl="yellow";}else if($percent<60){$cl="green";}else{$cl="blue";}
?>
                                                <div class="progress">
                                                    <div class="progress-bar progress-bar-danger" style="width: <?php echo $percent;?>%">
                                                    </div><?php echo $row3[0]." คน";?>
                                                </div>
                                            </td>
                                            <td><span class="badge bg-charcoal"><?php echo "$percent%";?></span></td>
                                        </tr>
                                    </table>
                                </div><!-- /.box-body -->
                     		</div>
                        </div>

                    </div>

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
$sqlp="select work6 from tb_userwork where work6 !='' and idyear=$idyear";
$resultp=mysqli_query($connect,$sqlp);
while($rowp=mysqli_fetch_array($resultp)){
?>
                                        <tr>
                                            <td><?php echo $c++;?></td>
                                            <td><?php echo $rowp[0];?></td>
                                        </tr>
<?php }?>
                                     </table>
                                </div>
                            </div>

<?php
	exit();
}


	mysqli_close($connect);
?>
<script language="javascript">
	window.top.window.stopUpload(<?php echo $msgsuccess ?> , <?php echo $msgerror ?> );
</script>
