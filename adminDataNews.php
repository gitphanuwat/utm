<?php
	session_start();
	include('config/config.php');
		
	if($_GET["action"]=="getData"){

		echo "<table class='table table-hover'>";
        	echo "<tr>";
                echo "<th width='70'>ลำดับ</th>";
                echo "<th width='120'>วันที่</th>";
                echo "<th>หัวข้อ</th>";
                echo "<th width='100'>Views</th>";
                echo "<th width='100'>Tools</th>";
            echo "</tr>";
            $i=1;
            $sql="select news_id , day_in , title , count_view from tb_news order by news_id desc";
            $sql=$sql . " LIMIT 6 ";
            $result=mysqli_query($connect,$sql);
            while($row=mysqli_fetch_array($result)){
            	echo "<tr>";
            		echo "<td>$i</td>";
            		echo "<td><a href='#$row[0]' class='viewItem' >$row[1]</a></td>";
            		echo "<td><a href='#$row[0]' class='viewItem' >$row[2]</a></td>";
                    echo "<td><small class='label label-info'>    $row[3]  ครั้ง </small></td>";
                    echo "<td><a href='#$row[0]' title='upload file' class='uploadItem'><img src='img/file.png'></a>&nbsp;&nbsp;";
            		echo "<a href='#$row[0]' title='Edit' class='editItem'><img src='img/edit.png'></a>&nbsp;&nbsp;";
                    echo "<a href='#$row[0]' title='Delete' class='delItem'><img src='img/del.png'></a></td>";
            	echo "</tr>";
            	$i++;
            }
        echo "</table>";

		exit();
	}


    if($_GET["action"]=="getForm"){
        $id=$_GET["id"];
        $day_in=date("m/d/Y");

        if($id !=""){
            $sql="select * from tb_news where news_id = $id";
            $result=mysqli_query($connect,$sql);
            $row=mysqli_fetch_array($result);
            $title=$row["title"];
            $detail=$row["detail"];
            $day_in=strtotime($row["day_in"]);
            $day_in=date("m/d/Y",$day_in);
        }

        echo "<div class='box-header'>";
            echo "<h3 class='box-title'>รายการข่าวสาร</h3>";
        echo "</div>";
        echo " <form action='adminDataNews.php?action=saveData' method='post'  onsubmit='clickupload();' >";
            echo "<div class='box-body'>";
                echo "<div class='form-group'>";
                    echo "<label >หัวข้อ</label>";
                    echo "<input type='text' name='txtTitle' class='form-control' value='$title'>";
                echo "</div>";
                echo "<div class='form-group'>";
                    echo "<label >วันที่</label>";
                    echo "<input type='text' id='datepicker' name='datepicker' class='form-control' value='$day_in'>";
                echo "</div>";
                echo "<div class='form-group'>";
                    echo "<label >รายละเอียดข่าวสาร</label>";
                    echo "<textarea name='txtDetail' class='textarea' style='width: 100%; height: 200px; font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;''>$detail</textarea>";
                echo "</div>";
            echo "</div>";
            echo "<div class='box-footer'>";
                echo "<div class='col-lg-12'>";
                    echo "<input name='id' type='hidden' value='$id' />";
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
            $sql="select autoid , file_name , file_value from tb_news_item";
            $sql=$sql . " order by autoid";
            $result=mysqli_query($connect,$sql);
            while($row=mysqli_fetch_array($result)){
                echo "<tr>";
                    echo "<td>$i</td>";
                    echo "<td><a href='user/news/$row[2]' target='_blank'>$row[1]</a></td>";
                    echo "<td><a href='#$row[0]|$id' class='delItemsDoc'><span class='label label-danger'> ลบ </span></a></td>";
                echo "</tr>";
                $i++;
            }
        echo "<table>";

        exit();
    }

    if($_GET["action"]=="deleteDoc"){
        $id=$_POST["id"];
        $sql="delete from tb_news_item where autoid = $id";
        $result1=mysqli_query($connect,$sql);
        exit();
    }

    if($_GET["action"]=="getFormUpload"){

        $id=$_GET["id"];

        echo "<div class='box-header'>";
            echo "<h3 class='box-title'>รายการเอกสาร</h3>";
        echo "</div>";
        echo "<div class='box-body'>";
            echo "<div class='form-group'>";
                echo "<label >เอกสารอ้างอิง</label>";
                echo "<div id='showDoc'></div>";
            echo "</div>";
            echo " <form id='frmDoc' action='adminDataNews.php?action=insertDoc' enctype='multipart/form-data' method='post'   onsubmit='clickuploadDoc();' >";
                echo "<div class='form-group'>";
                    echo "<label >upload เอกสาร</label>";
                    echo "<input type='text' class='form-control' name='txtfile_name' placeholder='ชื่อเอกสาร'>";
                echo "</div>";
                echo "<div class='form-group'>";
                    echo "<label >File</label>";
                    echo "<input type='file' name='fileField' id='fileField' >";
                echo "</div>";
                echo "<div class='form-group'>";
                    echo "<button type='submit' class='btn btn-primary'>Upload</button>";
                    echo "<input name='id' type='hidden' value='$id' />";
            echo "</form><hr>";
        echo "</div>";
        echo "<div class='box-footer'>";
            echo "<div class='col-lg-12'>";
                echo "<button type='button' class='btn btn-danger' id='butCancel'>Close</button>";
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
        $msgsuccess=0;
        $msgerror=0;
        $actionPage="doc";

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
                    $pname= "news_" . randomText(10) . "." . $strname;
                    $target_path = "user/news/" . $pname;
                    if(@move_uploaded_file($tempfile,$target_path)){
                        $sql="insert into tb_news_item(news_id , file_name , file_value )";
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

        $sql="select * from tb_news where news_id = $id";
        $result=mysqli_query($connect,$sql);
        $row=mysqli_fetch_array($result);
        $title=$row["title"];
        $detail=$row["detail"];
        $day_in=$row["day_in"];

        echo "<div class='box-header'>";
            echo "<h3 class='box-title'>$title</h3>";
        echo "</div>";
        echo "<div class='box-body'>";
            echo "<p>วันที่ลงข่าว : $day_in</p>";
            echo "<p>$detail</p>";
            $sql="select * from tb_news_item where news_id = $id order by autoid";
            $result=mysqli_query($connect,$sql);
            $nRow=mysqli_num_rows($result);
            if($nRow !=0){
                echo "<br><p><b>เอกสารอ้างอิง</b></p>";
                while($row=mysqli_fetch_array($result)){
                    echo "<p>&nbsp&nbsp<a href='user/news/$row[3]' target='_blank'>$row[2]</a></p>";
                }
            }
        echo "</div>";
        exit();
    }

    if($_GET["action"]=="delete"){
        $id=$_POST["id"];

        $sql="delete from tb_news where news_id = $id";
        $result=mysqli_query($connect,$sql);
        exit();
    }

    if($_GET["action"]=="saveData"){
        date_default_timezone_set('UTC');

        $msgsuccess=0;
        $msgerror=0;
        $actionPage="news";
        $PID=0;

        $id=$_POST["id"];
        $datepicker=$_POST["datepicker"];
        $txtTitle=$_POST["txtTitle"];
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
                $sql="update tb_news set day_in='$day_in' , title='$txtTitle' ";
                $sql=$sql . " , detail='$txtDetail' where news_id=$id ";
            }else{
                $sql="insert into tb_news(day_in , title , detail , count_view ) ";
                $sql=$sql . " value('$day_in' , '$txtTitle' , '$txtDetail'  , 0 )";
            }
            $result=mysqli_query($connect,$sql);
            $msgsuccess=1;
					echo "<script language=\"javascript\">window.location.href = 'adminNews.php'</script>";
        }
    }



	mysqli_close($connect);
?>

<script language="javascript">
    window.top.window.stopUpload(<?php echo $msgsuccess ?> , <?php echo $msgerror ?> , "<?php echo $actionPage ?>" , <?php echo $PID ?>);
</script>
