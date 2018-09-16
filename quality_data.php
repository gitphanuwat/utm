<?php
	session_start();
	include('config/config.php');

	if($_GET["action"]=="getUser"){

			$iuser=$_SESSION["DUR_USER_ID"];
			echo "<table class='table table-hover'>";
						echo "<tr>";
									echo "<th width='70'>ลำดับ</th>";
									echo "<th>ชื่อ - สกุล</th>";
									echo "<th>รายการคุณภาพสินค้า</th>";
									echo "<th>กลุ่ม/เครือข่าย</th>";
									echo "<th width='100'>Tools</th>";
							echo "</tr>";

		if($_SESSION["DUR_USER_STATE"]=="ADMIN"){
							$sql="select tb_user.iduser , tb_user.prefix , tb_user.firstname , tb_user.lastname , tb_user.hnumber, tb_moo.moo, tb_tambon.tambon, tb_amphur.amphur, tb_user.idgroup, tb_user.cf_userlevel ";
							$sql=$sql . " from tb_user, tb_moo, tb_tambon, tb_amphur ";
				$sql=$sql . " where  tb_user.idmoo = tb_moo.idmoo ";
				$sql=$sql . " and  tb_user.idtambon = tb_tambon.idtambon ";
				$sql=$sql . " and  tb_user.idamphur = tb_amphur.idamphur ";
				 if($search !=""){
								$sql=$sql . "and (tb_user.firstname like '%$search%' ";
								$sql=$sql . " or tb_user.lastname like '%$search%' )";
							}$sql=$sql . " order by tb_user.iduser";
		}
		if($_SESSION["DUR_USER_STATE"]=="MANAGER"){
				$ugroup=$_SESSION["DUR_USER_GROUP"];
							$sql="select tb_user.iduser , tb_user.prefix , tb_user.firstname , tb_user.lastname , tb_user.hnumber, tb_moo.moo, tb_tambon.tambon, tb_amphur.amphur, tb_user.idgroup, tb_user.cf_userlevel ";
							$sql=$sql . " from tb_user, tb_moo, tb_tambon, tb_amphur ";
				$sql=$sql . " where  tb_user.idmoo = tb_moo.idmoo ";
				$sql=$sql . " and  tb_user.idtambon = tb_tambon.idtambon ";
				$sql=$sql . " and  tb_user.idamphur = tb_amphur.idamphur ";
				$sql=$sql . " and  tb_user.idgroup = $ugroup ";
				 if($search !=""){
								$sql=$sql . "and (tb_user.firstname like '%$search%' ";
								$sql=$sql . " or tb_user.lastname like '%$search%' )";
							}$sql=$sql . " order by tb_user.iduser";
		}
		if($_SESSION["DUR_USER_STATE"]=="USER"){
				$ugroup=$_SESSION["DUR_USER_GROUP"];
				$sql="select tb_user.iduser , tb_user.prefix , tb_user.firstname , tb_user.lastname , tb_user.hnumber,'','','', tb_user.idgroup, tb_user.cf_userlevel ";
				$sql=$sql . " from tb_user ";
				$sql=$sql . " where  tb_user.iduser = $iuser ";
				 if($search !=""){
								$sql=$sql . "and (tb_user.firstname like '%$search%' ";
								$sql=$sql . " or tb_user.lastname like '%$search%' )";
							}$sql=$sql . " order by tb_user.iduser";
		}

				$result=mysqli_query($connect,$sql);
				$total=mysqli_num_rows($result);
				$e_page=20;

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


					//ชื่อ - สกุล
					if(is_numeric($row["prefix"])){
						$prefix=$cf_prefix[$row["prefix"]];
					}else{
						$prefix=$row["prefix"];
					}
					$name=$prefix . $row[2] . " " . $row[3];
					$idgroup = $row[8];
					echo "<tr>";
						echo "<td>".$i++."</td>";
						echo "<td>$name</td>";
						echo "<td>";

						$sqlq = "select * from tb_quality where userid= $row[0]";
						$resultq=mysqli_query($connect,$sqlq);
						while($rowq=mysqli_fetch_array($resultq)){
							echo $rowq['title'].',';
						}

						echo "</td>";
						$sqlp= "select groupname from tb_group where idgroup = $idgroup ";
						$resultp=mysqli_query($connect,$sqlp);
						@$rowp=mysqli_fetch_array($resultp);
						echo "<td>" . $rowp[0] . "</td>";
						echo "<td><a href='#$row[0]' title='รายละเอียด' class='viewQuality' ><img src='img/detail.png'></a>";
					echo "</tr>";
				}

					echo "</table>";

					if($total>0){
				echo "<div class='box-footer clearfix'>";
					echo "<div calss='browse_page'>";
						echo "<ul class='pagination pagination-sm no-margin pull-right'>";
							$urlfile="quality_data.php?url=url";
							page_navigator($urlfile , $before_p,$plus_p,$total,$total_p,$chk_page);
						echo "</ul>";
					echo "</div>";
						echo "</div>";
			}

			exit();
	}


	if($_GET["action"]=="getData"){
			$id=$_GET["id"];
			$sql="select tb_user.iduser , tb_user.prefix , tb_user.firstname , tb_user.lastname , tb_user.hnumber, tb_moo.moo, tb_tambon.tambon, tb_amphur.amphur, tb_user.idgroup ";
			$sql=$sql . " from tb_user, tb_moo, tb_tambon, tb_amphur ";
			$sql=$sql . " where  tb_user.idmoo = tb_moo.idmoo ";
			$sql=$sql . " and  tb_user.idtambon = tb_tambon.idtambon ";
			$sql=$sql . " and  tb_user.idamphur = tb_amphur.idamphur ";
			$sql=$sql . " and  tb_user.iduser = $id ";
			$result=mysqli_query($connect,$sql);
			$row=mysqli_fetch_array($result);

			if(is_numeric($row["prefix"])){
				$prefix=$cf_prefix[$row["prefix"]];
			}else{
				$prefix=$row["prefix"];
			}
			$name=$prefix . $row[2] . " " . $row[3];
			$idposition = $row[8];
			echo "<h4>$name</h4>";
			echo "<h5>ที่อยู่ : " .$row[4]. " หมู่บ้าน.". $row[5]. " ต.". $row[6]. " อ.". $row[7] ." จ.อุตรดิตถ์</h5>";
			$sqlp= "select groupname from tb_group where idgroup = $idposition ";
			$resultp=mysqli_query($connect,$sqlp);
			$rowp=mysqli_fetch_array($resultp);
			echo "<h5>กลุ่ม : " . $rowp[0] . "</h5>";

			echo "<table class='table table-hover'>";
        	echo "<tr>";
                echo "<th width='70'>ลำดับ</th>";
                echo "<th width='120'>วันที่</th>";
                echo "<th>หัวข้อคุณภาพสินค้า</th>";
                echo "<th width='100'>ไฟล์</th>";
                echo "<th width='100'>Tools</th>";
            echo "</tr>";
            $i=1;
            $sqlq="select quality_id , day_in , title , count_view from tb_quality where userid=$row[0]";
            $resultq=mysqli_query($connect,$sqlq);
            while($rowq=mysqli_fetch_array($resultq)){
							$sqlf="select count(*) from tb_quality_item where quality_id=$rowq[0]";
							$resultf=mysqli_query($connect,$sqlf);
							$rowf=mysqli_fetch_array($resultf);
            	echo "<tr>";
            		echo "<td>$i</td>";
            		echo "<td><a href='#$rowq[0]' class='viewItem' >$rowq[1]</a></td>";
            		echo "<td><a href='#$rowq[0]' class='viewItem' >$rowq[2]</a></td>";
                    echo "<td>$rowf[0]</td>";
                    echo "<td><a href='#$rowq[0]' title='upload file' class='uploadItem'><img src='img/file.png'></a>&nbsp;&nbsp;";
            		echo "<a href='#$rowq[0]|$row[0]' title='Edit' class='editItem'><img src='img/edit.png'></a>&nbsp;&nbsp;";
                    echo "<a href='#$rowq[0]|$row[0]' title='Delete' class='delItem'><img src='img/del.png'></a></td>";
            	echo "</tr>";
            	$i++;
            }
        echo "</table>";

				echo "<a href='#$row[0]' title='เพิ่มรายการ' class='btn btn-primary butNew'>เพิ่มรายการ</a>";
				echo "<button type='button' class='btn btn-danger' id='butCancelplot'> ย้อนกลับ </button>";

		exit();
	}


    if($_GET["action"]=="getForm"){
			$id=$_GET["id"];
			$idu=$_GET["idu"];
      $day_in=date("m/d/Y");

        if($id !=""){
            $sql="select * from tb_quality where quality_id = $id";
            $result=mysqli_query($connect,$sql);
            $row=mysqli_fetch_array($result);
						$title=$row["title"];
						$qatype=$row["qatype"];
            $detail=$row["detail"];
            $day_in=strtotime($row["day_in"]);
            $day_in=date("m/d/Y",$day_in);
        }
        echo "<div class='box-header'>";
            echo "<h3 class='box-title'>รายการคุณภาพสินค้า</h3>";
        echo "</div>";
        echo " <form action='quality_data.php?action=saveData' method='post'  target='upload_target' onsubmit='clickupload();' >";
            echo "<div class='box-body'>";
                echo "<div class='form-group'>";
                    echo "<label >หัวข้อคุณภาพสินค้า</label>";
                    echo "<input type='text' name='txtTitle' class='form-control' value='$title'>";
                echo "</div>";
                echo "<div class='form-group'>";
                    echo "<label >วันที่</label>";
                    echo "<input type='text' id='datepicker' name='datepicker' class='form-control' value='$day_in'>";
                echo "</div>";

								echo "<div class='form-group'>";
									echo "<label>กลุ่มคุณภาพ<font color=\"red\">*</font></label>";
	                echo "<select class='form-control' id='qatype' name='qatype'>";
									echo "<option value='1' ";
									if($qatype==1){echo "selected";}
									echo ">สิ่งบ่งชี้ทางภูมิศาสตร์(GI)</option>";
									echo "<option value='2' ";
									if($qatype==2){echo "selected";}
									echo ">การตรวจคุณภาพทางวิทยาศาสตร์</option>";
									echo "<option value='3' ";
									if($qatype==3){echo "selected";}
									echo ">คุณภาพด้านอื่นๆ</option>";
	                echo "</select>";
								echo "</div>";

                echo "<div class='form-group'>";
                    echo "<label >รายละเอียดข้อมูลคุณภาพ</label>";
                    echo "<textarea name='txtDetail' class='textarea' style='width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;''>$detail</textarea>";
                echo "</div>";
            echo "</div>";
            echo "<div class='box-footer'>";
                echo "<div class='col-lg-12'>";
								echo "<input name='id' type='hidden' value='$id' />";
								echo "<input name='userid' type='hidden' value='$idu' />";
                    echo "<button type='submit' class='btn btn-success' id='butSave'>Save</button>";
                    echo "&nbsp&nbsp";
                    echo "<button type='button' class='btn btn-danger' id='butCancel'>Close</button>";
                    echo "<div id='loadForm' align='center'>";
                            echo "<img src='img/ajax-loader.gif' align='absmiddle' />";
                    echo "</div>";
                    echo "<div id='boxMessageForm' align='center'></div>";
                echo "</div>";
            echo "</div>";
        echo "</form>";

        echo "<script type='text/javascript'>";
            echo "$(document).ready(function(){";
                echo "$( '#datepicker' ).datepicker();";
                echo "$('.textarea').wysihtml5();";
                echo "$('#loadForm').fadeOut();";
            echo "});";
        echo "</script>";
        exit();
    }

    if($_GET["action"]=="getDocList"){
        $id=$_GET["id"];

        echo "<table class='table table-hover'>";
                echo "<tr>";
                echo "<th width='70'>ลำดับ</th>";
                echo "<th>ชื่อเอกสาร</th>";
                echo "<th width='100'>Tools</th>";
            echo "</tr>";
            $i=1;
            $sql="select autoid , file_name , file_value from tb_quality_item where quality_id = $id";
            $sql=$sql . " order by autoid";
            $result=mysqli_query($connect,$sql);
            while($row=mysqli_fetch_array($result)){
                echo "<tr>";
                    echo "<td>$i</td>";
                    echo "<td><a href='user/quality/$row[2]' target='_blank'>$row[1]</a></td>";
                    echo "<td><a href='#$row[0]|$id' class='delItemsDoc'><span class='label label-danger'> ลบ </span></a></td>";
                echo "</tr>";
                $i++;
            }
        echo "<table>";

        exit();
    }

		if($_GET["action"]=="deleteDoc"){
        $id=$_POST["id"];
        $sql="delete from tb_quality_item where autoid = $id";
        $result1=mysqli_query($connect,$sql);
        exit();
    }



    if($_GET["action"]=="getFormUpload"){

        $id=$_GET["id"];
				$sqlqa = "select * from tb_quality where quality_id=$id";
				$resultqa = mysqli_query($connect,$sqlqa);
				$rowqa = mysqli_fetch_array($resultqa);
				$idu = $rowqa['userid'];
        echo "<div class='box-header'>";
            echo "<h3 class='box-title'>รายการเอกสาร</h3>";
        echo "</div>";
        echo "<div class='box-body'>";
            echo "<div class='form-group'>";
                echo "<label >เอกสาร</label>";
                echo "<div id='showDoc'></div>";
            echo "</div>";
            echo " <form action='quality_data.php?action=insertDoc' enctype='multipart/form-data' target='upload_target' method='post'  onsubmit='clickuploadDoc();' >";
					//echo " <form action='admin_plot_dataform.php?action=insert' method='post' target='upload_target' onsubmit='clickSave();' >";

                echo "<div class='form-group'>";
                    echo "<label >upload เอกสาร</label>";
                    echo "<input type='text' class='form-control' name='txtfile_name' placeholder='ชื่อเอกสาร'>";
                echo "</div>";
                echo "<div class='form-group'>";
                    echo "<label >File</label>";
                    echo "<input type='file' name='fileField' id='fileField' >";
                echo "</div>";
                echo "<div class='form-group'>";
                    echo "<button type='submit' class='btn btn-primary'>อัพโหลด</button>";
										echo "<a href='#$idu' class='btn btn-danger butCanceldoc'>ยกเลิก</a>";
										echo "<input name='id' type='hidden' value='$id' />";
										echo "<input name='idu' type='hidden' value='$idu' />";
            echo "</form><hr>";
        echo "</div>";
        echo "<div class='box-footer'>";
            echo "<div class='col-lg-12'>";
								echo '<iframe id="upload_target" name="upload_target" src="#" style="display:none;"></iframe>';
                echo "<div id='loadFormUpload' align='center'>";
                        echo "<img src='img/ajax-loader.gif' align='absmiddle' />";
                echo "</div>";
                echo "<div id='boxMessageFormUpload' align='center'></div>";
            echo "</div>";
        echo "</div>";
        echo "<script type='text/javascript'>";
            echo "$(document).ready(function(){";
                echo "$('#loadFormUpload').fadeOut();";
            echo "});";
        echo "</script>";
        exit();
    }

		if($_GET["action"]=="insertDoc"){
			$actionPage="doc";
			$msgsuccess=0;
			$msgerror=0;

			$id=$_POST["id"];
			$PID=$id;
			$txtfile_name=$_POST["txtfile_name"];

			if($txtfile_name==""){
					$msgerror=1;
			}else{
				if($_FILES["fileField"]["error"]==4){
						$msgerror=2;
				}else{
						$accept_type=array("application/pdf");
						$file=$_FILES["fileField"]["name"];
						$typefile=$_FILES["fileField"]["type"];
						$sizefile=$_FILES["fileField"]["size"];
						$tempfile=$_FILES["fileField"]["tmp_name"];
						if(!in_array($typefile,$accept_type)){
								$msgerror=3;
						}else{
								$Str_file = explode(".",$file);
								$carr = count($Str_file)-1;
								$strname = $Str_file[$carr];
								$pname= "quality_" . randomText(10) . "." . $strname;
								$target_path = "user/quality/" . $pname;
								if(@move_uploaded_file($tempfile,$target_path)){
										$sql="insert into tb_quality_item(quality_id , file_name , file_value )";
										$sql=$sql . " values($id , '$txtfile_name' ,'$pname') ";
										$result1=mysqli_query($connect,$sql);
										$msgsuccess=1;
								}else{
										$msgerror=5;
								}
						}
				}
			}

		}

    if($_GET["action"]=="getView"){
        $id=$_GET["id"];

        $sql="select * from tb_quality where quality_id = $id";
        $result=mysqli_query($connect,$sql);
        $row=mysqli_fetch_array($result);
        $title=$row["title"];
        $detail=$row["detail"];
        $day_in=$row["day_in"];

        echo "<div class='box-header'>";
            echo "<h3 class='box-title'>$title</h3>";
        echo "</div>";
        echo "<div class='box-body'>";
            echo "<p>วันที่บันทึก : $day_in</p>";
            echo "<p>$detail</p>";
            $sql="select * from tb_quality_item where quality_id = $id order by autoid";
            $result=mysqli_query($connect,$sql);
            $nRow=mysqli_num_rows($result);
            if($nRow !=0){
                echo "<br><p><b>เอกสาร</b></p>";
                while($row=mysqli_fetch_array($result)){
                    echo "<p>&nbsp&nbsp<a href='user/quality/$row[3]' target='_blank'>$row[2]</a></p>";
                }
            }
        echo "</div>";
        exit();
    }

    if($_GET["action"]=="delete"){
        $id=$_POST["id"];

        $sql="delete from tb_quality where quality_id = $id";
        $result=mysqli_query($connect,$sql);
        exit();
    }


    if($_GET["action"]=="saveData"){
        date_default_timezone_set('UTC');

        $msgsuccess=0;
        $msgerror=0;
        $actionPage="quality";

        $id=$_POST["id"];
				$userid=$_POST["userid"];

				$PID=$userid;

				$datepicker=$_POST["datepicker"];
        $txtTitle=$_POST["txtTitle"];
				$qatype=$_POST["qatype"];
				$txtDetail=$_POST["txtDetail"];

        if($txtTitle ==""){
            $msgerror=1;
        }else{
            if($datepicker==""){
                $day_in=date("Y-m-d");
            }else{
                $datepicker=strtotime($datepicker);
                $day_in=date('Y-m-d',$datepicker);
            }

            if($id !=""){
                $sql="update tb_quality set day_in='$day_in' , title='$txtTitle' ";
                $sql=$sql . " , qatype='$qatype', detail='$txtDetail' where quality_id=$id ";
            }else{
                $sql="insert into tb_quality(userid, day_in , title , qatype, detail , count_view ) ";
                $sql=$sql . " value('$userid' , '$day_in' , '$txtTitle' , '$qatype' , '$txtDetail'  , 0 )";
            }
            $result=mysqli_query($connect,$sql);
            $msgsuccess=1;
					//echo "<script language=\"javascript\">window.location.href = 'quality.php'</script>";
        }
    }



mysqli_close($connect);
?>

<script language="javascript">
    window.top.window.stopUpload(<?php echo $msgsuccess ?> , <?php echo $msgerror ?> , "<?php echo $actionPage ?>" , <?php echo $PID ?>);
</script>
