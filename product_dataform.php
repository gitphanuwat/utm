<?php
	session_start();
	include('config/config.php');

	if($_GET["action"]=="getFromMember"){
		 $iduser=$_GET["iduser"];
		 $idyear=$_GET["idyear"];

	echo " <form action='product_dataform.php?action=insert' method='post' target='upload_target' onsubmit='clickSave();' >";

            echo "<div class='box-body'>";
            	echo "<div class='form-group'>";

				 echo "<input type='hidden' class='form-control' id='iduser' name='iduser' value=\"$iduser\">";
				 echo "<input type='hidden' class='form-control' id='idyear' name='idyear' value=\"$idyear\">";

            		echo "<label>พันธุ์สับปะรด<font color=\"red\">*</font></label>";
                            echo "<select class='form-control' id='idtype' name='idtype'>";
                            	$i=0;
								echo "<option value=''>==เลือกพันธุ์สับปะรด==</option>";
                            	foreach ($cf_type as &$value) {
									if($i>0){
                            			echo "<option value='$i' ";
                            			echo ">$value</option>";
									}$i++;
                            	}
                            echo "</select>";
                echo "</div>";
            	echo "<div class='form-group'>";
            		echo "<label>แปลงปลูก</label>";
            		echo "<select class='form-control' name='idplot' id='idplot'>";
            			echo "<option value='0'> ==แปลงปลูก==</option>";
            			$sql="select idplot , codeplot from tb_plot where iduser=$iduser";
            			$result=mysqli_query($connect,$sql);
                        while($row=mysqli_fetch_array($result)){
                        	echo "<option value='$row[0]' ";
                        	echo ">$row[1]</option>";
                        }
            		echo "</select>";
                echo "</div>";

            	echo "<div class='form-group'>";
            		echo "<label>จำนวนต้นที่ปลูก</label>";
                    echo "<input type='text' class='form-control' id='b_trunk' name='b_trunk' >";
                echo "</div>";

            	echo "<div class='form-group'>";
            		echo "<label>จำนวนต้นที่ให้ผลผลิต</label>";
                    echo "<input type='text' class='form-control' id='e_trunk' name='e_trunk' >";
                echo "</div>";

            	echo "<div class='form-group'>";
            		echo "<label>ผลผลิตสับปะรด (ลูก)</label>";
                    echo "<input type='text' class='form-control' id='product_durian' name='product_durian' >";
                echo "</div>";

            	echo "<div class='form-group'>";
            		echo "<label>ราคาขาย (บาท/กิโลกรัม)</label>";
                    echo "<input type='text' class='form-control' id='sale_durian' name='sale_durian' >";
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

	if($_GET["action"]=="gettambonItems"){
		$idamphur=$_GET["idamphur"];

		echo "<select class='form-control' name='cbotambon' id='cbotambon'>";
			if($idamphur !=0){
				echo "<option value='0'>==ตำบล==</option>";
				$sql="select idtambon , tambon from tb_tambon";
				$sql=$sql . " where idamphur=$idamphur order by tambon";
				$result=mysqli_query($connect,$sql);
	            while($row=mysqli_fetch_array($result)){
					echo "<option value='$row[0]'>$row[1]</option>";
				}
			}else{
				echo "<option value='0'> ==ตำบล== </option>";
			}
	    echo "</select>";
		exit();
	}

	if($_GET["action"]=="getmooItems"){
		$idtambon=$_GET["idtambon"];
		echo "<select class='form-control' name='cbomoo' id='cbomoo'>";
			if($idtambon !=0){
				echo "<option value='0'> ==หมู่บ้าน== </option>";
				$sql="select idmoo , moo from tb_moo";
				$sql=$sql . " where idtambon=$idtambon order by moo";
				$result=mysqli_query($connect,$sql);
	            while($row=mysqli_fetch_array($result)){
					echo "<option value='$row[0]'>$row[1]</option>";
				}
			}else{
				echo "<option value='0'> ==หมู่บ้าน== </option>";
			}
	    echo "</select>";
		exit();
	}

	if($_GET["action"]=="insert"){
		$msgsuccess=0;
		$msgerror=0;

		$idyear=$_POST["idyear"];
		$idtype=$_POST["idtype"];
		$idplot=$_POST["idplot"];
		$b_trunk=$_POST["b_trunk"];
		$e_trunk=$_POST["e_trunk"];
		$product_durian=$_POST["product_durian"];
		$sale_durian=$_POST["sale_durian"];

		if($idtype==""){
			$msgerror=1;
		}else{

				$sql="INSERT INTO tb_durian( `idyear` ";
				$sql=$sql . ", `idtype`, `idplot`, `b_trunk` ";
				$sql=$sql . ", `e_trunk`, `product_durian`, `sale_durian`)";

				$sql=$sql . " VALUES ('$idyear' ";
				$sql=$sql . " , '$idtype', '$idplot', '$b_trunk' ";
				$sql=$sql . " , '$e_trunk', '$product_durian', '$sale_durian');";

			$result=mysqli_query($connect,$sql);
			$msgsuccess=1;
		}
	}

	mysqli_close($connect);
?>

<script language="javascript">
	window.top.window.stopUpload(<?php echo $msgsuccess ?> , <?php echo $msgerror ?> );
</script>
