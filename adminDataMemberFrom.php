<?php
	session_start();
	include('config/config.php');

	if($_GET["action"]=="getFromMember"){
		$id=$_GET["id"];
		if($id !=""){
			$sql="select * from tb_user where iduser = $id";
			$result=mysqli_query($connect,$sql);
			$row=mysqli_fetch_array($result);

			$db_prefix=$row["prefix"];
			$db_firstname=$row["firstname"];
			$db_lastname=$row["lastname"];
			$db_hnumber=$row["hnumber"];
			$db_idmoo=$row["idmoo"];
			$db_idtambon=$row["idtambon"];
			$db_idamphur=$row["idamphur"];
			$db_tel=$row["tel"];
			$db_email=$row["email"];
			$db_idgroup=$row["idgroup"];
			$db_cf_userlevel=$row["cf_userlevel"];
			$db_username=$row["username"];
			$db_password=$row["password"];

		}
		echo '<iframe id="upload_target" name="upload_target" src="#" style="display:none;"></iframe>';
		echo " <form action='adminDataMemberFrom.php?action=insert' method='post' target='upload_target' onsubmit='clickSave();' >";

            echo "<div class='box-body'>";
            	echo "<div class='form-group'>";
            		echo "<label>คำนำหน้า<font color=\"red\">*</font></label>";
            		echo "<div class='row'>";
                        echo "<div class='col-lg-6'>";
                            echo "<select class='form-control' id='cboPrefix' name='cboPrefix'>";
                            	$i=0;
                            	foreach ($cf_prefix as &$value) {
                            		if($i>0){
                            			echo "<option value='$i' ";
                            			if(is_numeric($db_prefix)){
                            				$db_in_prefix=$db_prefix;
                            			}else{
                            				$db_in_prefix=4;
                            			}

                            			if($i==$db_in_prefix){
                            				echo " selected='selected' ";
                            			}
                            			echo ">$value</option>";
                            		}
                            		$i++;
                            	}
                            echo "</select>";
                        echo "</div>";
                        echo "<div class='col-lg-6'>";
                            echo "<input type='text' class='form-control' id='txtPrefix' name='txtPrefix' ";
                            if( is_numeric($db_prefix)){
                            }else{
                            	echo " value='$db_prefix' ";
                            }
                            echo " placeholder='คำนำหน้าชื่อ'>";
                        echo "</div>";
                    echo "</div>";
            	echo "</div>";
            	echo "<div class='form-group'>";
            		echo "<div class='row'>";
            			echo "<div class='col-lg-6'>";
            				echo "<label >ชื่อ<font color=\"red\">*</font></label>";
            				echo "<input type='text' class='form-control' name='txtFirstname' value='$db_firstname'>";
            			echo "</div>";
            			echo "<div class='col-lg-6'>";
            				echo "<label >นามสกุล<font color=\"red\">*</font></label>";
            				echo "<input type='text' class='form-control' name='txtLastname' value='$db_lastname'>";
            			echo "</div>";
            		echo "</div>";
            	echo "</div>";
            	echo "<div class='form-group'>";
            		echo "<label >ที่อยู่<font color=\"red\">*</font></label>";
            		echo "<input type='text' class='form-control' name='txtHnumber' placeholder='เลขที่' value='$db_hnumber'>";
            		echo "<select class='form-control' name='cboFaculty' id='cboFaculty'>";
            			echo "<option value='0'> ==เลือกอำเภอ==</option>";
            			$sql="select idamphur , amphur from tb_amphur";
            			$result=mysqli_query($connect,$sql);
                        while($row=mysqli_fetch_array($result)){
                        	echo "<option value='$row[0]' ";
                        	if($row[0]==$db_idamphur){
                        		echo " selected='selected' ";
                        	}

                        	echo ">$row[1]</option>";
                        }
            		echo "</select>";
            		echo "<div id='boxDepartment'>";
	            		echo "<select class='form-control' name='cboDepartment' id='cboDepartment'>";
	            			if($id !=""){
	            				$sql="select idtambon , tambon from tb_tambon";
	            				$sql=$sql . " where idamphur=$db_idamphur order by tambon";
	            				$result=mysqli_query($connect,$sql);
                        		while($row=mysqli_fetch_array($result)){
                        			echo "<option value='$row[0]' ";
		                        	if($row[0]==$db_idtambon){
		                        		echo " selected='selected' ";
		                        	}
		                        	echo ">$row[1]</option>";
                        		}
	            			}else{
	            				echo "<option value='0'> ==เลือกตำบล=== </option>";
	            			}
	            		echo "</select>";
	            	echo "</div>";
	            	echo "<div id='boxCourse'>";
	            		echo "<select class='form-control' id='cboCourse' name='cboCourse'>";
	            			if($id !=""){
	            				$sql="select idmoo , moo from tb_moo";
	            				$sql=$sql . " where idtambon=$db_idtambon order by moo";
	            				$result=mysqli_query($connect,$sql);
                        		while($row=mysqli_fetch_array($result)){
                        			echo "<option value='$row[0]' ";
		                        	if($row[0]==$db_idmoo){
		                        		echo " selected='selected' ";
		                        	}
		                        	echo ">$row[1]</option>";
                        		}
	            			}else{
	            				echo "<option value='0'> ==เลือกหมู่บ้าน== </option>";
	            			}

	            		echo "</select>";
	            	echo "</div>";
            	echo "<div class='form-group'>";
            				echo "<label >เบอร์โทร</label>";
            				echo "<input type='text' class='form-control' name='txtTel' value='$db_tel'>";
            				echo "<label >อีเมล์</label>";
            				echo "<input type='text' class='form-control' name='txtEmail' value='$db_email'>";
            	echo "</div>";
            		echo "<div class='form-group'>";
						echo "<label>กลุ่ม/เครือข่าย</label>";
						if($_SESSION["DUR_USER_STATE"]=="ADMIN"){
							echo "<select class='form-control' name='cboPosition'>";
								$sql="select idgroup , groupname from tb_group";
								//$sql=$sql . " where keyman=1";
								$result=mysqli_query($connect,$sql);
								echo "<option value=''> ==เลือกกลุ่ม==</option>";
								while($row=mysqli_fetch_array($result)){
									echo "<option value='$row[0]' ";
									if($row[0]==$db_idgroup){
										echo " selected='selected' ";
									}
									echo ">$row[1]</option>";
								}
							echo "</select>";
						}
						else if($_SESSION["DUR_USER_STATE"]=="MANAGER" or $_SESSION["DUR_USER_STATE"]=="USER"){
							$ugroup=$_SESSION["DUR_USER_GROUP"];
							echo "<select class='form-control' name='cboPosition'>";
								$sql="select idgroup , groupname from tb_group";
								//$sql=$sql . " where keyman=1";
								$result=mysqli_query($connect,$sql);
								echo "<option value=0> ==เลือกกลุ่ม==</option>";
								while($row=mysqli_fetch_array($result)){
									echo "<option value='$row[0]' ";
									if($row[0]==$db_idgroup){
										echo " selected='selected' ";
									}
									echo ">$row[1]</option>";
								}							echo "</select>";
						} else{
							echo "<select class='form-control' name='cboPosition'>";
								$sql="select idgroup , groupname from tb_group";
								//$sql=$sql . " where keyman=1";
								$result=mysqli_query($connect,$sql);
								echo "<option value=''> ==เลือกกลุ่ม==</option>";
								while($row=mysqli_fetch_array($result)){
									echo "<option value='$row[0]' ";
									echo ">$row[1]</option>";
								}
							echo "</select>";
						}
					echo "</div>";
            		echo "<div class='form-group'>";
						echo "<label >สิทธิ์การใช้ระบบ</label><label ><font color='red'>*</font></label>";
                            echo "<select class='form-control' id='cboUserlevel' name='cboUserlevel'>";
                            	if($_SESSION["DUR_USER_STATE"]=="ADMIN"){
									$i=0;
									echo "<option value=0> ==เลือกสิทธิ์ใช้ระบบ==</option>";
									foreach ($cf_userlevel as &$value) {
										if($i>0){
											echo "<option value='$i' ";
											if($i==$db_cf_userlevel){
												echo " selected='selected' ";
											}
											echo ">$value</option>";
										}
										$i++;
									}
								}
                            	else if($_SESSION["DUR_USER_STATE"]=="MANAGER"){
									$i=0;
									echo "<option value=0> ==เลือกสิทธิ์ใช้ระบบ==</option>";
									foreach ($cf_userlevel as &$value) {
										if($i>1){
											echo "<option value='$i' ";
											if($i==$db_cf_userlevel){
												echo " selected='selected' ";
											}
											echo ">$value</option>";
										}
										$i++;
									}
								}
                            	else {
									$i=0;
									echo "<option value=3 selected='selected'> USER </option>";
								}
                            echo "</select>";
					echo "</div>";
            	echo "<div class='form-group'>";
				echo "<div class=\"row\">";
					echo "<div class=\"col-xs-6\">";
								echo "<label >ชื่อล็อกอิน(ถ้ามี)</label>";
								echo "<input type='text' class='form-control' name='txtusername' value='$db_username'>";
					echo "</div>";
					echo "<div class=\"col-xs-6\">";
								echo "<label >รหัสผ่าน(ถ้ามี)</label>";
								echo "<input type='text' class='form-control' name='txtpassword' value='$db_password'>";
					echo "</div>";
				echo "</div>";
            	echo "</div>";
            	echo "</div>";
            echo "</div>";
            echo "<div class='box-footer'>";
            	echo "<button type='submit' class='btn btn-primary'>Save</button>&nbsp;";
                echo "<button type='button' class='btn btn-danger' id='butCancel'>Cancel</button>";
                echo "<input name='iduser' type='hidden' value='$id' />";
				echo "<div id='uploadDialog_process' align='center'></div>";
				echo "<div id='loadDialog' align='center'>";
					echo "<img src='img/ajax-loader.gif' align='absmiddle' />";
				echo "</div>";
            echo "</div>";
		echo "</form>";

		echo "<script type='text/javascript'>
			$(document).ready(function(){
				var prefix=$('#cboPrefix').val();
				if(prefix==4){
					$('#txtPrefix').show();
				}else{
					$('#txtPrefix').hide();
				}

				$('#cboFaculty').change(function(){
					var id=this.value;
					$('#boxDepartment').load('adminDataMemberFrom.php?action=getDepartmentItems&idamphur=' + id);
					$('#boxCourse').load('adminDataMemberFrom.php?action=getCourseItems&idtambon=0' );
				});

				$('#cboPrefix').change(function(){
					var id=this.value;
					if(id==4){
						$('#txtPrefix').show();
					}else{
						$('#txtPrefix').hide();
					}
				});

			});

			$(document).on('change','#cboDepartment', function() {
				var optionSelected = $('option:selected', this);
  				var idtambon = this.value;
  				$('#boxCourse').load('adminDataMemberFrom.php?action=getCourseItems&idtambon=' + idtambon);
			});

			function clickSave(){
          $('#loadDialog').fadeIn();
          return true;
      }

			$(document).on('click','#butCancel',function(){
					window.history.back();
			});

		</script>";
		exit();
	}

	if($_GET["action"]=="getDepartmentItems"){
		$idamphur=$_GET["idamphur"];

		echo "<select class='form-control' name='cboDepartment' id='cboDepartment'>";
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

	if($_GET["action"]=="getCourseItems"){
		$idtambon=$_GET["idtambon"];
		echo "<select class='form-control' name='cboCourse' id='cboCourse'>";
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
		$msPage="saveMember";

		$iduser=$_POST["iduser"];
		$txtCode=$_POST["txtCode"];
		if($_POST["cboPrefix"]!=4){
			$Prefix=$_POST["cboPrefix"];
		}else{
			$Prefix=$_POST["txtPrefix"];
		}
		$txtFirstname=$_POST["txtFirstname"];
		$txtLastname=$_POST["txtLastname"];
		$txtHnumber=$_POST["txtHnumber"];
		$cboCourse=$_POST["cboCourse"];
		$cboDepartment=$_POST["cboDepartment"];
		$cboFaculty=$_POST["cboFaculty"];
		$txtTel=$_POST["txtTel"];
		$txtEmail=$_POST["txtEmail"];
		$cboPosition=$_POST["cboPosition"];
		$cboUserlevel=$_POST["cboUserlevel"];
		$txtusername=$_POST["txtusername"];
		$txtpassword=$_POST["txtpassword"];

		if($Prefix=="" || $txtFirstname=="" || $txtLastname=="" || $cboCourse==0 || $cboUserlevel==0){
			$msgerror=1;
		}else{
			if($iduser !=""){
				$sql="update tb_user set prefix='$Prefix' , firstname='$txtFirstname' , lastname='$txtLastname' ";
				$sql=$sql . " , hnumber='$txtHnumber' ";
				$sql=$sql . " , idmoo='$cboCourse' , idtambon='$cboDepartment' , idamphur='$cboFaculty' ";
				$sql=$sql . " , tel='$txtTel' , email='$txtEmail' ,  idgroup='$cboPosition',  cf_userlevel='$cboUserlevel',  username='$txtusername',  password='$txtpassword'  ";
				$sql=$sql . " where iduser=$iduser";
			}else{
				$sql="INSERT INTO tb_user( `prefix` ";
				$sql=$sql . ", `firstname`, `lastname`, `hnumber` ";
				$sql=$sql . ", `idmoo`, `idtambon`, `idamphur`, `tel`, `email` ";
				$sql=$sql . ", `idgroup`, `cf_userlevel`, `username`, `password`)";

				$sql=$sql . " VALUES ('$Prefix' ";
				$sql=$sql . " , '$txtFirstname', '$txtLastname', '$txtHnumber' ";
				$sql=$sql . " , '$cboCourse', '$cboDepartment', '$cboFaculty', '$txtTel', '$txtEmail' ";
				$sql=$sql . " , '$cboPosition', '$cboUserlevel', '$txtusername', '$txtpassword');";
			}
			$result=mysqli_query($connect,$sql);
			$msgsuccess=1;
			//echo
		}
		//exit();
	}

	mysqli_close($connect);
?>
<script language="javascript">
	window.top.window.stopUpload(<?php echo $msgsuccess ?> , <?php echo $msgerror ?> );
</script>
