<?php
	session_start();
	include('config/config.php');

	if($_GET["action"]=="getFromMember"){
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
            		echo "<label>ลักษณะพื้นที่</label>";
                    echo "<input type='text' class='form-control' id='arear' name='arear' >";
                echo "</div>";

            	echo "<div class='form-group'>";
            		echo "<label>แหล่งน้ำ</label>";
                    echo "<input type='text' class='form-control' id='water' name='water' >";
                echo "</div>";

            	echo "<div class='form-group'>";
            		echo "<label>ละติจูด</label>";
                    echo "<input type='text' class='form-control' id='lat' name='lat' >";
                echo "</div>";

            	echo "<div class='form-group'>";
            		echo "<label>ลองจิจูด</label>";
                    echo "<input type='text' class='form-control' id='lng' name='lng' >";
                echo "</div>";

								echo "<div class='form-group'>";
	            		echo "<label>Zoom</label>";
	                    echo "<input type='text' class='form-control' id='zm' name='zm' >";
	                echo "</div>";

            	echo "<div class='form-group'>";
            		echo "<label>อื่นๆ</label>";
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

		echo "<script type='text/javascript'>

			function clickSave(){
                $('#loadDialog').fadeIn();
                return true;
            }

		</script>";
		exit();
	}

	if($_GET["action"]=="insert"){
		$msgsuccess=0;
		$msgerror=0;

		$iduser=$_POST["iduser"];
		$codeplot=$_POST["codeplot"];
		$arear=$_POST["arear"];
		$water=$_POST["water"];
		$lat=$_POST["lat"];
		$lng=$_POST["lng"];
		$zm=$_POST["zm"];
		$comment=$_POST["comment"];

		if($codeplot==""){
			$msgerror=1;
		}else{

				$sql="INSERT INTO tb_plot( `iduser` ";
				$sql=$sql . ", `codeplot`, `arear` ";
				$sql=$sql . ", `water`, `lat`, `lng`, `zm`, `comment`)";

				$sql=$sql . " VALUES ('$iduser' ";
				$sql=$sql . " , '$codeplot', '$arear' ";
				$sql=$sql . " , '$water', '$lat', '$lng', '$zm', '$comment');";

			$result=mysqli_query($connect,$sql);
			$msgsuccess=1;
		}
	}

	mysqli_close($connect);
?>

<script language="javascript">
	window.top.window.stopUpload(<?php echo $msgsuccess ?> , <?php echo $msgerror ?> );
</script>
