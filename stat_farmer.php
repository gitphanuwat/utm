<?php
	session_start();
	include('config/config.php');


	$pageName="stat";
	$subpageName="farmer";

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
                    <div class="user-panel">
                    <?php include('user_panel.php');?>
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
                        ระบบสารสนเทศ
                        <small>เกษตรกรแยกตามสังกัด</small>                   </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li ><a href="#">ระบบสารสนเทศ</a></li>
                        <li class="active">เกษตรกรแยกตามสังกัด</li>
                    </ol>
              	</section>

                <!-- Main content -->
                <section class="content">
                	<div class="row">
                    	<div class="col-xs-12">
                        	<div class="box">
                            	<div class="box-header">
                                    <h3 class="box-title">รายการอำเภอทั้งหมด</h3>

                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                               	  <div id="showData" style="margin:auto;padding:10px;"></div>

                                    <iframe id="upload_target" name="upload_target" src="#" style="display:none;"></iframe>
                                    <form action="statdata_farmer.php?action=insert" method="post" enctype="multipart/form-data" name="form_package"  id="form_package" target="upload_target" onsubmit="clickupload();" >
                                     <div class="box box-primary">
                                       <div class="box-header">
                                        	<h3 class="box-title">ตำบล</h3>
                                   	   </div><!-- /.box-header -->
                                        <div class="box-body">
                                        	<div id="box1">
                                            ข้อมูลตำบล
                                            </div>  <!-- /end box1 -->
                                         </div>
                                         </div>
                                     <div class="box box-primary">
                                       <div class="box-header">
                                        	<h3 class="box-title">หมู่บ้าน</h3>
                                   	   </div><!-- /.box-header -->
                                         <div class="box-body">
                                            <div id="box2">
                                            ข้อมูลหมู่บ้าน
                                    		</div>
                                          </div>
                                          </div>
                                     <div class="box box-primary">
                                       <div class="box-header">
                                        	<h3 class="box-title">เกษตรกร</h3>
                                   	   </div><!-- /.box-header -->
                                          <div class="box-body">
                                            <div id="box3">
                                            ข้อมูลเกษตรกร
                                            </div>  <!-- /end box2 -->
                                        </div>
                                     </div>
                                  </form>
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
				$("#showData").load("statdata_farmer.php?action=loadfac");
				//จบ function read
			});

			$(document).on('click','.getdep', function() {
				var idamphur = $(this).attr("href");
				idamphur = idamphur.replace("#","");
				$("#box1").load("statdata_farmer.php?action=loaddep",{id:idamphur});
				$("#box2").hide();
				$("#box3").hide();
			});

			$(document).on('click','.getmoo', function() {
				var idtambon = $(this).attr("href");
				idtambon = idtambon.replace("#","");
				$("#box2").load("statdata_farmer.php?action=loadmoo",{id:idtambon});
				$("#box2").show();
				$("#box3").hide();
			});

			$(document).on('click','.getuser', function() {
				var idmoo = $(this).attr("href");
				idmoo = idmoo.replace("#","");
				$("#box3").load("statdata_farmer.php?action=loaduser",{id:idmoo});
				$("#box3").show();
			});

			function clickupload(){
				$("#load").fadeIn();
				return true;
			}

		</script>
