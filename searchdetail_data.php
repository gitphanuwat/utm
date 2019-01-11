<?php
	session_start();
	include('config/config.php');
	if($_GET["action"]=="loadamphur"){
		echo "<select id='select_fac_id' class='form-control input-sm pull-right'>";
			echo "<option value=''> == เลือกทั้งหมด == </option>";
		$sql="select idamphur , amphur from tb_amphur order by idamphur ASC";
		$result=mysqli_query($connect,$sql);
		while($row=mysqli_fetch_array($result)){
			echo "<option value='$row[0]'>$row[1]</option>";
		}
		echo "</select>";
		exit();
	}
	if($_GET["action"]=="loadtambon"){
		$id=$_GET["id"];
		echo "<select id='select_dep_id' class='form-control input-sm pull-right'>";
			echo "<option value=''> == เลือกทั้งหมด == </option>";
		$sql="select idtambon , tambon from tb_tambon where idamphur=$id order by idtambon ASC";
		$result=mysqli_query($connect,$sql);
		while($row=mysqli_fetch_array($result)){
			echo "<option value='$row[0]'>$row[1]</option>";
		}
		echo "</select>";
		exit();
	}
	if($_GET["action"]=="loadmoo"){
		$id=$_GET["id"];
		echo "<select id='select_cs_id' class='form-control input-sm pull-right'>";
			echo "<option value=''> == เลือกทั้งหมด == </option>";
		$sql="select idmoo , moo from tb_moo where idtambon=$id order by idmoo ASC";
		$result=mysqli_query($connect,$sql);
		while($row=mysqli_fetch_array($result)){
			echo "<option value='$row[0]'>$row[1]</option>";
		}
		echo "</select>";
		exit();
	}

	if($_GET["action"]=="getView"){

		$search=$_GET["search"];
		if($search!=""){
			$today = date("Y-m-d");
			$sqli="insert into tb_search(keyword , sdate) ";
			$sqli=$sqli . " values('$search' , '$today' )";
			$resulti=mysqli_query($connect,$sqli);
		}
		echo "<table class='table table-hover'>";
			echo "<tr>";
    			echo "<th width='50'>ลำดับ</th>";
    			echo "<th>ชื่อ - สกุล</th>";
				echo "<th>หมู่บ้าน</th>";
				echo "<th>ตำบล</th>";
				echo "<th>อำเภอ</th>";
    		echo "</tr>";
    		$sql="select tb_user.iduser , tb_user.cf_aca_position , tb_user.firstname , tb_user.lastname , tb_moo.moo, tb_tambon.tambon, tb_amphur.amphur";
    		$sql=$sql . " , tb_user.cf_slevel ";
    		$sql=$sql . " from tb_user left join tb_moo on tb_user.idmoo=tb_moo.idmoo";
			$sql=$sql . " left join tb_tambon on tb_moo.idtambon=tb_tambon.idtambon";
			$sql=$sql . " left join tb_amphur on tb_tambon.idamphur=tb_amphur.idamphur";

			$sql=$sql . " where (tb_user.firstname like '%$search%' or tb_user.lastname like '%$search%') and tb_user.prefix !=0";

			$fac_id=$_GET["fac_id"];
			if($fac_id>0){$sql=$sql . " and tb_amphur.idamphur=$fac_id";}
			$dep_id=$_GET["dep_id"];
			if($dep_id>0){$sql=$sql . " and tb_tambon.idtambon=$dep_id";}
			$cs_id=$_GET["cs_id"];
			if($cs_id>0){$sql=$sql . " and tb_moo.idmoo=$cs_id";}

    		$sql=$sql . " order by tb_user.firstname ";
    		$result=mysqli_query($connect,$sql);

	$total=mysqli_num_rows($result);
	$e_page=25;

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

						$i=$before_p;

    		while($row=mysqli_fetch_array($result)){
    			$prefix=$cf_aca_position[$row[1]];
				$prefix=$prefix . CreatePrefix($row[7]);
    			$url=randomText(200);
    			echo "<tr>";
    			echo "<td>$i</td>";
    			echo "<td><a href='profile.php?url=$url&id=$row[0]' target='_blank' >".$prefix."$row[2] $row[3]</a></td>";
				echo "<td>$row[4]</td>";
				echo "<td>$row[5]</td>";
				echo "<td>$row[6]</td>";
    			echo "</tr>";
    			$i++;
    		}
    	echo "</table>";
	if($total>0){
			echo "<div class='box-footer clearfix'>";
				echo "<div calss='browse_page'>";
					echo "<ul class='pagination pagination-sm no-margin pull-right'>";
						$urlfile="sh_all.php?action=getView&url=url";
						page_navigator($urlfile , $before_p,$plus_p,$total,$total_p,$chk_page);
					echo "</ul>";
				echo "</div>";
			echo "</div>";
	}

		exit();
	}

	mysqli_close($connect);
?>
