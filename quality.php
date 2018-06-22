<?php
	session_start();
	include('config/config.php');

	if($_SESSION["DUR_USER_ID"]==-1){
		echo "<script language=\"javascript\">window.location.href = 'login.php'</script>";
		exit();
	}

	$pageName="config";
	$subpageName="quality";

	if($_SESSION["DUR_USER_STATE"]=="ADMIN"){
		$sql="select firstname,lastname,profile_pic , reg_day from tb_managers_user where id_user=" . $_SESSION["DUR_USER_ID"];
		$result=mysqli_query($connect,$sql);
		$row=mysqli_fetch_array($result);
		$userName=$row[0] . " " . $row[1];
		$userRegDay=$row[3];
		if($row[2] !=""){
			$userPic="user/profile_pic/" . $row[2];
		}else{
			$userPic="user/profile_pic/admin.png";
		}
		$userState="Web Developer";
	}


?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $PageTitle ?></title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="//code.ionicframework.com/ionicons/1.5.2/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="css/iCheck/minimal/blue.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.1/themes/black-tie/jquery-ui.css">
</head>

<body class="skin-blue">

		<div style="font-size: 12px;" id="dialog" title="รายละเอียดคุณภาพสินค้า">
	        <div id="dialog-from" ></div>
	    </div>

		<?php
			include('header.php');
		?>

        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                        <div class="pull-left image">
                            <img src="<?php echo $userPic ?>" class="img-circle" alt="User Image" />
                        </div>
                        <div class="pull-left info">
                            <p><?php echo $userName ?></p>

                            <i class="fa fa-circle text-success"></i> Online
                        </div>
                    </div>

                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <?php
							include('sidebar_menu.php');
						?>
                    </ul>
                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- ส่วนของเนื้อหา -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        คุณภาพสินค้า
                        <small>คุณภาพสินค้าทางการเกษตร</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li ><a href="#">จัดการข้อมูลคุณภาพ</a></li>
                        <li class="active">ข้อมูลคุณภาพ</li>
                    </ol>
              	</section>

                <!-- Main content -->
                <section class="content">
                	<div class="row">
                    	<div class="col-xs-12">
                        	<div class="box">
                            	<div class="box-header">
                                    <h3 class="box-title">รายการข้อมูลคุณภาพ</h3>
                                    <form class="navbar-form navbar-right" role="search">
									  <button type="button" id="butNew" class="btn btn-primary">เพิ่มรายการ</button>
									</form>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                               	  <div id="showData" style="margin:auto;padding:10px;"></div>
                               	  <div id="loadBar" align="center">
                               	  	<img src="img/ajax-loader.gif" align="absmiddle" />
                               	  </div>
                               	  <iframe id="upload_target" name="upload_target" src="#" style="display:none;"></iframe>
                                </div><!-- /.box-body -->
                            </div>
                            <div class="box box-info" id="boxView">

                            </div>
                        </div>
                    </div>
                </section><!-- /.content -->
            </aside><!-- /.right-side -->


        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->


</body>
</html>
<?php
	mysqli_close($connect);
?>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
        <script type="text/javascript">
			$(document).ready(function(){

				$("#dialog").dialog({
                    autoOpen: false,
                });

                $("#boxView").hide();
                $("#showData").load("quality_data.php?action=getData",function(){
                    $("#loadBar").fadeOut();
                });

                $("#butNew").click(function(){
                    $("#dialog-from").load("quality_data.php?action=getForm",function(){
                        $("#dialog").dialog( "option", "width", 450 );
                        $( "#dialog" ).dialog( "open" );
                    });
                });
				//จบ function read
			});

            function clickuploadDoc(){
                $("#loadFormUpload").fadeIn();
                return true;
            }

            function clickupload(){
                $("#loadForm").fadeIn();
                return true;
            }

            function stopUpload(success , error ,actionPage , id ){
                if(actionPage=="quality"){
                    $("#loadForm").fadeOut();
                    if(success ==1){
                        $("#loadBar").fadeIn();
                        $("#showData").load("quality_data.php?action=getData",function(){
                            $("#loadBar").fadeOut();
                            $("#dialog").dialog( "close" );
                        });
                    }else{
                        if(error==1){
                            $("#boxMessageForm").html("<font color='red'>กรุณากรอกหัวข้อด้วย</font>");
                        }
                    }
                }else{
                    //upload เอกสาร
                    $("#loadFormUpload").fadeOut();
                    if(success ==1){
                        $("#showDoc").load("quality_data.php?action=getDocList&id="+id);
												$("#boxMessageFormUpload").html("<font color='green'>อัพโหลดไฟล์สมบูรณ์</font>");
                    }else{
                        if(error==1){
                            $("#boxMessageFormUpload").html("<font color='red'>กรุณากรอกชื่อเอกสารด้วย</font>");
                        }else if(error==2){
                            $("#boxMessageFormUpload").html("<font color='red'>กรุณาเลือกเอกสารด้วย</font>");
													}else if(error==3){
	                            $("#boxMessageFormUpload").html("<font color='red'>เอกสารที่ upload ต้องเป็น pdf file เท่านั้น</font>");
													}else if(error==5){
															$("#boxMessageFormUpload").html("<font color='red'>ไม่สามารถอัพโหลดไฟล์ได้</font>");
													}
                    }
                }
                return true;
            }

            $(document).on('click',".delItemsDoc",function(){
                var id = $(this).attr("href");
                id = id.replace("#","");
                yid=id.split("|");

                if(confirm("ท่านต้องการลบรายการนี้หรือไม่ ?")){
                    $.post("quality_data.php?action=deleteDoc",{id:yid[0]},function(){
                        $("#showDoc").load("quality_data.php?action=getDocList&id="+yid[1]);
												$("#boxMessageFormUpload").html("");
                    });
                }
            });

            $(document).on('click',".editItem",function(){
                var id = $(this).attr("href");
                id = id.replace("#","");
                $("#dialog-from").load("quality_data.php?action=getForm&id="+id,function(){
                    $("#dialog").dialog( "option", "width", 450 );
                    $( "#dialog" ).dialog( "open" );
                });
            });

            $(document).on("click",".delItem",function(){
                var id = $(this).attr("href");
                id = id.replace("#","");
                if(confirm("ท่านต้องการลบรายการนี้หรือไม่ ?")){
                    $("#loadBar").fadeIn();
                    $.post("quality_data.php?action=delete",{id:id},function(){
                        $("#showData").load("quality_data.php?action=getData",function(){
                            $("#loadBar").fadeOut();
                        });
                    });
                }
             });

            $(document).on("click",".uploadItem",function(){
                var id = $(this).attr("href");
                id = id.replace("#","");
                $("#dialog-from").load("quality_data.php?action=getFormUpload&id="+id,function(){
                    $("#showDoc").load("quality_data.php?action=getDocList&id="+id);
                    $("#dialog").dialog( "option", "width", 450 );
                    $( "#dialog" ).dialog( "open" );
                });
            });

            $(document).on("click",".viewItem",function(){
                var id = $(this).attr("href");
                id = id.replace("#","");
                $("#boxView").load("quality_data.php?action=getView&id="+id,function(){
                    $("#boxView").show();
                });
             });

            $(document).on('click',"#butCancel",function(){
                $("#dialog").dialog( "close" );
            });

		</script>
