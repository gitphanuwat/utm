<?php
	session_start();
	include('config/config.php');

	//option year
if($_GET["action"]=="loadyear"){
		echo "<select id='select_year_id' class='form-control input-sm pull-right'>";
		$sql="select idyear , nameyear from tb_year order by idyear DESC";
		$result=mysqli_query($connect,$sql);
		while($row=mysqli_fetch_array($result)){
			echo "<option value='$row[0]'>$row[1]</option>";
		}
		echo "</select>";
}

if($_GET["action"]=="loadperson"){
	echo "<label>test_loadperson</label>";
}

	if($_GET["action"]=="loadperson1"){

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
			$sumperson=0;
    		$sql="select idtambon , tambon from tb_tambon order by idtambon";
			$result=mysqli_query($connect,$sql);
			while($row=mysqli_fetch_array($result)){
				$sql="select count(*) from tb_user where idtambon = $row[0] ";
					$result1=mysqli_query($connect,$sql);
					$nRow=mysqli_num_rows($result1);
					if($nRow !=0){
						$row1=mysqli_fetch_array($result1);
						$qtambon=$row1[0];
					}else{
						$qtambon=0;
					}

					echo "{y: '$row[1]', a: $qtambon },";
					$i++;
					$sumperson=$sumperson+$qtambon;
		 	}//tambon
		 		echo "],";
		 		echo "barColors: ['#00A65A'],";
		 		echo "gridLineColor: '#666666',";
		 		echo "gridTextColor: '#000000',";
                echo "xkey: 'y',";
                echo "ykeys: ['a' ],";
                echo "labels: ['จำนวนเกษตรกร'],";
                echo "hideHover: 'auto'";
		 	echo "});";
		echo "</script>";

		echo "<div class='row'>";
			echo "<div class='col-lg-12'>";
				echo "<div class='progress'>";
                	echo "<div class='progress-bar progress-bar-green' role='progressbar' aria-valuemin='0' aria-valuemax='100' style='width:100%'>จำนวนเกษตรกร $sumperson คน</div>";
                echo "</div>";
            echo "</div>";
		echo "</div>";

		echo "<table class='table table-hover'>";
    		echo "<tr>";
    			echo "<th>ตำบล</th>";
    			echo "<th width='120'><center>จำนวนเกษตรกร</center></th>";
    		echo "</tr>";
    		$sql="select idtambon , tambon from tb_tambon order by tambon";
			$result=mysqli_query($connect,$sql);
			while($row=mysqli_fetch_array($result)){
				$sql="select count(*) from tb_user where idtambon = $row[0] ";
					$result1=mysqli_query($connect,$sql);
					$nRow=mysqli_num_rows($result1);
					if($nRow !=0){
						$row1=mysqli_fetch_array($result1);
						$qtambon=$row1[0];
					}else{
						$qtambon=0;
					}

					echo "<tr>";
						echo "<td>$row[1]</td>";
						echo "<td><center>$qtambon</center></td>";
					echo "</tr>";
			}
					echo "<tr>";
						echo "<td>รวม</td>";
						echo "<td><center>$sumperson คน</center></td>";
					echo "</tr>";
    	echo "</table>";
		exit();
	}


	if($_GET["action"]=="loadproduct"){

		   if($_POST["idyear"]!=""){
				   $idyear=$_POST["idyear"];
		   }else{
					$sql="select idyear, nameyear from tb_year order by idyear DESC";
					$result=mysqli_query($connect,$sql);
					$row=mysqli_fetch_array($result);
				   $idyear=$row[0];
		   }

		echo "<div class='chart' id='bar-chart-action2' style='height: 250px;''></div> ";
		echo "<script type='text/javascript'>";
			echo "var bar = new Morris.Bar({";
				echo "element: 'bar-chart-action2',";
				echo "resize: true,";
				echo "data: [";
				$sumb_trunk=0;
				$sume_trunk=0;
				$i=0;
				$sql="select * from tb_tambon order by idtambon";
				$result=mysqli_query($connect,$sql);
				while($row=mysqli_fetch_array($result)){
					$b_trunk=0;
					$e_trunk=0;

					$sql1="select iduser from tb_user where idtambon = $row[0]";
					$result1=mysqli_query($connect,$sql1);
					while($row1=mysqli_fetch_array($result1)){

						$sql2="select tb_durian.iddurian, tb_durian.b_trunk, tb_durian.e_trunk from tb_durian, tb_plot where tb_durian.idplot=tb_plot.idplot and tb_plot.iduser = $row1[0] and tb_durian.idyear=$idyear";
						$result2=mysqli_query($connect,$sql2);
						while($row2=mysqli_fetch_array($result2)){
							//$summoo=$summoo+$qmoo;
							$b_trunk = $b_trunk+$row2[1];
							$e_trunk = $e_trunk+$row2[2];
						}//durian
					}//user
					$sumb_trunk = $sumb_trunk+$b_trunk;
					$sume_trunk = $sume_trunk+$e_trunk;

					echo "{y: '$row[2]', a: $b_trunk, b: $e_trunk },";
					$i++;
		 		}//tambon
		 		echo "],";
		 		echo "barColors: ['#00A65A', '#F39C11' ],";
		 		echo "gridLineColor: '#666666',";
		 		echo "gridTextColor: '#000000',";
                echo "xkey: 'y',";
                echo "ykeys: ['a', 'b' ],";
                echo "labels: ['จำนวนต้นที่ปลูก', 'จำนวนต้นที่ให้ผลผลิต' ],";
                echo "hideHover: 'auto'";
		 	echo "});";
		echo "</script>";

		echo "<div class='row'>";
			echo "<div class='col-lg-6'>";
				echo "<div class='progress'>";
                	echo "<div class='progress-bar progress-bar-green' role='progressbar' aria-valuemin='0' aria-valuemax='100' style='width:100%'>รวมต้นที่ปลูก $sumb_trunk ต้น</div>";
                echo "</div>";
            echo "</div>";
            echo "<div class='col-lg-6'>";
                echo "<div class='progress'>";
                	echo "<div class='progress-bar progress-bar-warning' role='progressbar' aria-valuemin='0' aria-valuemax='100' style='width:100%'>รวมต้นที่ให้ผลผลิต $sume_trunk ต้น</div>";
                echo "</div>";
			echo "</div>";
		echo "</div>";

		echo "<table class='table table-hover'>";
    		echo "<tr>";
    			echo "<th>ตำบล</th>";
    			echo "<th width='120'><center>จำนวนต้นที่ปลูก</center></th>";
    			echo "<th width='120'><center>จำนวนต้นที่ให้ผลผลิต</center></th>";
    		echo "</tr>";
				$sumb_trunk=0;
				$sume_trunk=0;
				$i=0;
				$sql="select * from tb_tambon order by idtambon";
				$result=mysqli_query($connect,$sql);
				while($row=mysqli_fetch_array($result)){
					$b_trunk=0;
					$e_trunk=0;

					$sql1="select tb_user.iduser, tb_plot.idplot from tb_plot, tb_user where
					tb_plot.iduser=tb_user.iduser and tb_user.idtambon = $row[0]";
					$result1=mysqli_query($connect,$sql1);
					while($row1=mysqli_fetch_array($result1)){

						$sql2="select iddurian, b_trunk, e_trunk from tb_durian where idplot = $row1[1] and idyear=$idyear";
						$result2=mysqli_query($connect,$sql2);
						while($row2=mysqli_fetch_array($result2)){
							//$summoo=$summoo+$qmoo;
							$b_trunk = $b_trunk+$row2[1];
							$e_trunk = $e_trunk+$row2[2];
						}//durian
					}//user
					$sumb_trunk = $sumb_trunk+$b_trunk;
					$sume_trunk = $sume_trunk+$e_trunk;

					echo "<tr>";
						echo "<td>$row[2]</td>";
						echo "<td><center>$b_trunk</center></td>";
						echo "<td><center>$e_trunk</center></td>";
					echo "</tr>";
			}
					echo "<tr>";
						echo "<td>รวม</td>";
						echo "<td><center>$sumb_trunk ต้น</center></td>";
						echo "<td><center>$sume_trunk ต้น</center></td>";
					echo "</tr>";
    	echo "</table>";
		exit();
	}

	mysqli_close($connect);
?>
