<?php
	session_start();
	include('config/config.php');

	if($_GET["action"]=="getData"){

		$uid=$_GET["uid"];
		$s_user=$_SESSION["DUR_USER_ID"];

		$sql="select * from tb_user where iduser=$uid";
		$result=mysqli_query($connect,$sql);
		@$row=mysqli_fetch_array($result);

		$db_prefix=$row["prefix"];
		$db_firstname=$row["firstname"];
		$db_lastname=$row["lastname"];
		$b_picture=$row["picture"];
		$db_idmoo=$row["idmoo"];
		$db_idgroup=$row["idgroup"];
		$db_hnumber=$row["hnumber"];

				$db_cardnumber=$row["cardnumber"];
				$db_birtdate=$row["birtdate"];
				$db_address=$row["address"];
				$db_postcode=$row["postcode"];
				$db_tel=$row["tel"];
				$db_mobile=$row["mobile"];
				$db_fax=$row["fax"];
				$db_email=$row["email"];

		if($b_picture==""){
			if($db_prefix==1){
				$img="user/profile_pic/user2.png";
			}else{
				$img="user/profile_pic/user1.png";
			}
		}else{
			$img="user/profile_pic/" . $b_picture;
		}

		if($db_idmoo !=""){

			$sql="select idtambon , moo from tb_moo where idmoo=$db_idmoo";
			$result=mysqli_query($connect,$sql);
			$row=mysqli_fetch_array($result);
			$db_idtambon=$row[0];
			$db_moo=$row[1];

			$sql="select idamphur , tambon from tb_tambon ";
			$sql=$sql . " where idtambon= $db_idtambon";
			$result=mysqli_query($connect,$sql);
			$row=mysqli_fetch_array($result);
			$db_idamphur=$row[0];
			$db_tambon=$row[1];

			$sql="select amphur from tb_amphur ";
			$sql=$sql . " where idamphur = $db_idamphur";
			$result=mysqli_query($connect,$sql);
			$row=mysqli_fetch_array($result);
			$db_amphur=$row[0];
		}

		if($db_idgroup !=""){
			$sql="select groupname from tb_group where idgroup=$db_idgroup";
			$result=mysqli_query($connect,$sql);
			$row=mysqli_fetch_array($result);
			$db_groupname=$row[0];
		}

		if($db_prefix !=4){
			$name=$cf_prefix[$db_prefix];
		}else{
			$name=$db_prefix;
		}
		$name=$name . $db_firstname . "  " . $db_lastname;

		echo "<div class='row'>";
			echo "<div class='col-xs-12'>";
				echo "<h2 class='page-header'>";
					echo "ข้อมูลทั่วไป";
				echo "</h2>";
			echo "</div>";
		echo "</div>";
		echo "<div class='row invoice-info'>";
			echo "<div class='col-xs-1'>";
			echo "</div>";
			echo "<div class='col-xs-7'>";
				echo "<b>ชื่อ - สกุล :</b> $name<br/>";
				echo "<b>บ้านเลขที่ :</b> $db_hnumber<br/>";
				echo "<b>หมู่บ้าน :</b> $db_moo<br/>";
				echo "<b>ตำบล :</b> $db_tambon<br/>";
				echo "<b>อำเภอ :</b> $db_amphur<br/>";
				echo "<b>จังหวัด :</b> อุตรดิตถ์<br/>";
				echo "<b>กลุ่ม/เครือข่าย :</b> $db_groupname<br/>";
			echo "</div>";
			echo "<div class='col-xs-4'>";
				echo "<img src='$img' class='img-thumbnail' width='150' height='150'><br>";
			echo "</div>";
		echo "</div>";

		echo "<div class='row'>";
			echo "<div class='col-xs-12'>";
				echo "<h2 class='page-header'>";
					echo "ประวัติผลผลิตของเกษตรกร";
				echo "</h2>";
			echo "<table class='table table-hover'>";
				echo "<tr>";
    			echo "<th width='50'>ลำดับ</th>";
				echo "<th>แปลงปลูก</th>";
    			echo "<th>ชนิดสับปะรด(พันธ์)</th>";
				echo "<th>ต้นที่ปลูก</th>";
				echo "<th>ต้นที่ให้ผลผลิต</th>";
				echo "<th>ผลผลิต(ลูก)</th>";
				echo "<th>ปี พ.ศ.</th>";
    		echo "</tr>";

    		$sql="select tb_durian.*, tb_plot.codeplot from tb_durian, tb_plot where tb_durian.idplot=tb_plot.idplot and tb_plot.iduser=$uid";
    		$sql=$sql . " order by tb_durian.iddurian";
    		$i=1;
    		$result=mysqli_query($connect,$sql);
			while(@$row=mysqli_fetch_array($result)){
				echo "<tr>";
					echo "<td>$i</td>";
					//HTTP://202.29.52.232/map/longlin/index.php?parcel_id=รหัสแปลง
					echo '<td><a href=\'../map/longlin/index.php?parcel_id='.$row["codeplot"].'\' title=\'แสดงพื้นที่เพาะปลูก\' >'.$row["codeplot"].'</a></td>';
					echo "<td>". $cf_type[$row["idtype"]] . "</td>";
					echo "<td>" . $row["b_trunk"] . "</td>";
					echo "<td>" . $row["e_trunk"] . "</td>";
					echo "<td>" . $row["product_durian"] . "</td>";
						$sql1="select nameyear from tb_year where idyear=".$row["idyear"];
						$result1=mysqli_query($connect,$sql1);
						$row1=mysqli_fetch_array($result1);
						echo "<td>" . $row1[0] . "</td>";
				echo "</tr>";
				$i++;
			}
			echo "</table>";
			echo "</div>";
		echo "</div>";


		exit();
	}

	mysqli_close($connect);
?>
