<?php
	session_start();
	include('config/config.php');

	if($_SESSION["DUR_USER_ID"]==""){
		echo "<script language=\"javascript\">window.location.href = 'login.php'</script>";
		exit();
	}

	if($_SESSION["DUR_USER_STATE"] !="ADMIN"){
		echo "<script language=\"javascript\">window.location.href = 'login.php'</script>";
		exit();
	}

	$pageName="system";
	$subpageName="cfgroup";

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
</head>

<body class="skin-blue">
        <?php
			include('header.php');
		?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
      <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel"><?php include('user_panel.php');?></div>

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
                        ข้อมูลกลุ่ม/เครือข่ายเกษตรกร
                        <small>จัดการข้อมูลกลุ่ม/เครือข่าย</small>                   </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li ><a href="#">จัดการข้อมูลกลุ่ม/เครือข่าย</a></li>
                    </ol>
              	</section>

                <!-- Main content -->
                <section class="content">
                	<div class="row">
                    	<div class="col-xs-12">
                        	<div class="box">
                            	<div class="box-header">
                                    <h3 class="box-title">รายการกลุ่มทั้งหมด</h3>

                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                               	  <div id="showData" style="margin:auto;padding:10px;"></div>

                                    <iframe id="upload_target" name="upload_target" src="#" style="display:none;"></iframe>
                                    <form action="cfdata_group.php?action=insert" method="post" enctype="multipart/form-data" name="form_package"  id="form_package"  onsubmit="clickupload();" >
                                     <div class="box box-primary">
                                       <div class="box-header">
                                        	<h3 class="box-title">เพิ่มกลุ่ม/เครือข่าย</h3>
                                   	   </div><!-- /.box-header -->

                                        <div class="box-body">
                                        	<div id="box1">
                                                <div class="form-group">
                                                    <label>ชื่อกลุ่ม/เครือข่าย</label>
                                                    <input type="text" class="form-control" id="groupname" name="groupname" placeholder="ชื่อกลุ่มภาษาไทย">
                                                    <label>รายละเอียด</label>
                                                    <textarea type="text" class="form-control" id="detail" name="detail" placeholder="รายละเอียดข้อมูลกลุ่ม"></textarea>
                                                    <label>ชื่อผู้นำกลุ่ม</label>
                                                    <input type="text" class="form-control" id="keyman" name="keyman" placeholder="ชื่อผู้นำกลุ่ม">
                                                    <span id="errgroupname" class="error"></span>
                                                </div>
                                            </div>  <!-- /end box1 -->
                                            <div id="box2">
                                       	  <div class="checkbox">
                                       	    </div>
                                            </div>
                                            <!-- /end box2 -->
                                          <div class="box-footer">
                                                <button type="submit" class="btn btn-primary" id="Save">Save</button>
                                                <button type="reset" class="btn btn-danger" id="Cancel">Cancel</button>
                                              <input name="idgroup" id="idgroup" type="hidden" value="" />
                                            </div>
                                        </div>
                                     </div>
                                  </form>

                                  <div id="load" align="center"><img src="img/ajax-loader.gif" align="absmiddle" /></div>
                                  <div id="upload_process" align="center"></div>
                                </div><!-- /.box-body -->
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
				$('input[type="checkbox"]').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass: 'iradio_minimal-blue'
                });

				$("#showData").load("cfdata_group.php");
				$("#box2").hide();
				$("#box2").slideUp(0);
				$("#load").fadeOut();


				$("#Cancel").click(function(){
					$("#errTotalLoad").hide();
					$("#form_package")[0].reset();
					$("#box2").slideUp(300);
					$("#idgroup").val("");
				});

				$("#groupname").keyup(function(){
					$("#errgroupname").hide();
					if($("#groupname").val()==""){
						$("#errgroupname").html("<font color='red'>กรุณากรอกชื่อกลุ่ม</font>").show().fadeIn(2000);
						return false;
					}
				});

				//จบ function read
			});

			$(document).on('click','.delItem', function() {
				var idgroup = $(this).attr("href");
				idgroup = idgroup.replace("#","");
				if(confirm("ท่านต้องการลบรายการนี้หรือไม่ ?")){
					$("#load").fadeIn();
					$.post("cfdata_group.php?action=delete",{id:idgroup},function(){
						$("#load").fadeOut();
						$("#showData").load("cfdata_group.php");
						$("#form_package")[0].reset();
					});
				}
			});

			$(document).on('click','.updateItem', function() {
				var idgroup = $(this).attr("href");
				idgroup = idgroup.replace("#","");
				$.post("cfdata_group.php?action=getupdate",{id:idgroup},function(data){
					var returnData=data.split("|");
					$("#idgroup").val(returnData[0]);
					$("#groupname").val(returnData[1]);
					$("#detail").val(returnData[2]);
					$("#keyman").val(returnData[3]);
					$("#box2").slideDown(300);
				});
			});

			$(document).on('click','.naviPN', function() {
				var url=$(this).attr("href");
				$("#showData").load(url);
				return false;
			});


			function clickupload(){
				$("#load").fadeIn();
				return true;
			}

			function stopUpload(success , error){
				var response="";
				if(success ==1){
					$("#upload_process").html("บันทึกข้อมูลเรียบร้อยแล้ว");
					$("#showData").load("cfdata_group.php");
					$("#load").fadeOut();

					$("#errTotalLoad").hide();
					$("#errTerm").hide();
					$("#errYear").hide();

					$("#form_package")[0].reset();
					$("#box2").slideUp(300);
					$("#idgroup").val("");
				}else{
					if(error==2){
						$("#upload_process").html("<font color='red'>ไม่สามารถบันทึกข้อมูลได้</font>");
						$("#load").fadeOut();
					}
				}

				return true;
			}
		</script>
