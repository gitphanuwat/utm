<?php
	session_start();
	include('config/config.php');

	if($_GET["action"]=="getFromMember"){
	$idplot=$_GET["idplot"];
	if (!$idplot==''){

		$sql="select * from tb_plot where idplot=$idplot";
		//$sql="select count(*) from tb_plot where iduser=$iduser";
		$result=mysqli_query($connect,$sql);
		$totalrow=mysqli_num_rows($result);
		$row=mysqli_fetch_array($result);

		echo " <form action='admin_plot_dataform.php?action=update' method='post' target='upload_target' onsubmit='clickSave();' >";

            echo "<div class='box-body'>";
            	echo "<div class='form-group'>";

				 echo "<input type='hidden' class='form-control' id='idplot' name='idplot' value=\"$idplot\">";

            		echo "<label>รหัสแปลง<font color=\"red\">*</font></label>";
                    echo "<input type='text' class='form-control' id='codeplot' name='codeplot' value='".$row[2]."' readonly=\"readonly\">";
                echo "</div>";

								echo "<div class='form-group'>";
	            		echo "<span class='pull-left'><label>ตำแหน่งพื้นที่ผลิต</label><div id='geo_data'><label ><font color='red'>- รอโหลดตำแหน่ง -</font></label></div></span>";
									echo '<span class="pull-right"><button type="button" title="ตำแหน่งปัจจุบัน" class="btn btn-default" onclick="getLocationedit()"><i class="icon ion-android-locate"></i></button></span>';
									echo '<div id="map_canvas" style="width: 100%; height: 150px"><div align="center"><img src="img/ajax-loader.gif" align="absmiddle"><br>Map Loading...</div></div>';
	                echo "</div>";

            	echo "<div class='form-group'>";
							echo '
							<div class="row">
								<div class="col col-md-5">
										<label>ละติจูด</label>
										<input type="text" class="form-control" id="lat" name="lat" value="'.$row[5].'">
								</div>
								<div class="col col-md-5">
										<label>ลองจิจูด</label>
										<input type="text" class="form-control" id="lng" name="lng" value="'.$row[6].'">
								</div>
								<div class="col col-md-2">
										<label>&nbsp</label>
										<button type="button" id="upgeo" class="btn btn-default" onclick="getLocation()"><i class="fa fa-refresh"></i></button>
										<input type="hidden" class="form-control" id="zm" name="zm" value="'.$row[7].'">
								</div>
							</div>';
							echo "</div>";

							echo "<div class='form-group'>";
            		echo "<label>จำนวนไร่</label>";
                    echo "<input type='text' class='form-control' id='area' name='area' value='".$row[3]."'>";
                echo "</div>";
            echo "</div>";

            	echo "<div class='form-group'>";
            		echo "<label>บันทึกช่วยจำ</label>";
                    echo "<input type='text' class='form-control' id='comment' name='comment' value='".$row[9]."'>";
                echo "</div>";
            echo "</div>";

            echo "<div class='box-footer'>";
            	echo "<button type='submit' class='btn btn-primary' >Save</button>&nbsp;";
                echo "<button type='button' class='btn btn-danger' id='butCancel'>Cancel</button>";
				echo "<div id='uploadDialog_process' align='center'></div>";
				echo "<div id='loadDialog' align='center'>";
					echo "<img src='img/ajax-loader.gif' align='absmiddle' />";
				echo "</div>";
            echo "</div>";

		echo "</form>";

		echo '
		<script src="js/geolocation_edit.js"></script>';

		echo "<script type='text/javascript'>

			function clickSave(){
                $('#loadDialog').fadeIn();
                return true;
            }
		</script>";
		exit();

	}else{
		$iduser=$_GET["iduser"];
		$sql="select codeplot from tb_plot where iduser=$iduser order by codeplot DESC";
		//$sql="select count(*) from tb_plot where iduser=$iduser";
		$result=mysqli_query($connect,$sql);
		$totalrow=mysqli_num_rows($result);
		$row=mysqli_fetch_array($result);
		if($totalrow>0){
			$arr1=explode("-",$row[0]);
			$code=$arr1[1]+1;
			$plotcode =  "PN".$iduser."-".$code;
		}else{
			$plotcode = "PN".$iduser."-1";
		}
		echo " <form action='admin_plot_dataform.php?action=insert' method='post' target='upload_target' onsubmit='clickSave();' >";

            echo "<div class='box-body'>";
            	echo "<div class='form-group'>";

				 echo "<input type='hidden' class='form-control' id='iduser' name='iduser' value=\"$iduser\">";

            		echo "<label>รหัสแปลง<font color=\"red\">*</font></label>";
                    echo "<input type='text' class='form-control' id='codeplot' name='codeplot' value=\"$plotcode\" readonly=\"readonly\">";
                echo "</div>";

								echo "<div class='form-group'>";
									echo "<span class='pull-left'><label>ตำแหน่งพื้นที่ผลิต</label><div id='geo_data'><label ><font color='red'>- รอโหลดตำแหน่ง -</font></label></div></span>";
									echo '<span class="pull-right"><button type="button" title="ตำแหน่งปัจจุบัน" class="btn btn-default" onclick="initialize()"><i class="icon ion-android-locate"></i></button></span>';
									echo '<div id="map_canvas" style="width: 100%; height: 150px"><div align="center"><img src="img/ajax-loader.gif" align="absmiddle"><br>Map Loading...</div></div>';
	                echo "</div>";

            	echo "<div class='form-group'>";
							echo '
							<div class="row">
								<div class="col col-md-5">
										<label>ละติจูด</label>
										<input type="text" class="form-control" id="lat" name="lat">
								</div>
								<div class="col col-md-5">
										<label>ลองจิจูด</label>
										<input type="text" class="form-control" id="lng" name="lng">
								</div>
								<div class="col col-md-2">
										<label>&nbsp</label>
										<button type="button" id="upgeo" class="btn btn-default" onclick="getLocation()"><i class="fa fa-refresh"></i></button>
										<input type="hidden" class="form-control" id="zm" name="zm">
								</div>
							</div>';
							echo "</div>";

							echo "<div class='form-group'>";
            		echo "<label>จำนวนไร่</label>";
                    echo "<input type='text' class='form-control' id='area' name='area'>";
                echo "</div>";
            echo "</div>";

            	echo "<div class='form-group'>";
            		echo "<label>บันทึกช่วยจำ</label>";
                    echo "<input type='text' class='form-control' id='comment' name='comment' >";
                echo "</div>";
            echo "</div>";

            echo "<div class='box-footer'>";
            	echo "<button type='submit' class='btn btn-primary' >Save</button>&nbsp;";
                echo "<button type='button' class='btn btn-danger' id='butCancel'>Cancel</button>";
				echo "<div id='uploadDialog_process' align='center'></div>";
				echo "<div id='loadDialog' align='center'>";
					echo "<img src='img/ajax-loader.gif' align='absmiddle' />";
				echo "</div>";
            echo "</div>";

		echo "</form>";

		echo '
		<script src="js/geolocation.js"></script>';

		echo "<script type='text/javascript'>

			function clickSave(){
                $('#loadDialog').fadeIn();
                return true;
            }
		</script>";
		exit();
	}
	}

	if($_GET["action"]=="insert"){
		$msgsuccess=0;
		$msgerror=0;

		$iduser=$_POST["iduser"];
		$codeplot=$_POST["codeplot"];
		$area=$_POST["area"];
		$lat=$_POST["lat"];
		$lng=$_POST["lng"];
		$zm=$_POST["zm"];
		$comment=$_POST["comment"];

		if($codeplot==""){
			$msgerror=1;
		}else{

				$sql="INSERT INTO tb_plot( `iduser` ";
				$sql=$sql . ", `codeplot`, `area` ";
				$sql=$sql . ", `lat`, `lng`, `zm`, `icon`, `comment`)";

				$sql=$sql . " VALUES ('$iduser' ";
				$sql=$sql . " , '$codeplot', '$area' ";
				$sql=$sql . " , '$lat', '$lng', '$zm', 'chart1.png', '$comment');";

			$result=mysqli_query($connect,$sql);
			$msgsuccess=1;
		}
	}

	if($_GET["action"]=="update"){
		$msgsuccess=0;
		$msgerror=0;

		$idplot=$_POST["idplot"];
		$codeplot=$_POST["codeplot"];
		$area=$_POST["area"];
		$lat=$_POST["lat"];
		$lng=$_POST["lng"];
		$zm=$_POST["zm"];
		$comment=$_POST["comment"];
		//$comment='testcomment';

		//$sql="update tb_plot set codeplot='$codeplot' , lat='$lat' , lng='$lng' ";
		//$sql=$sql . " , zm='$zm' , comment='$comment' where idplot=$idplot";
		$sql="update tb_plot set codeplot='$codeplot' , area='$area', lat='$lat' , lng='$lng' ";
		$sql=$sql . " , zm='$zm' , comment='$comment' where idplot='$idplot'";

			$result=mysqli_query($connect,$sql);
			$msgsuccess=1;
	}

	mysqli_close($connect);
?>

<script language="javascript">
	window.top.window.stopUpload(<?php echo $msgsuccess ?> , <?php echo $msgerror ?> );
</script>
