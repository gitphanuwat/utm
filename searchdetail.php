<?php
	session_start();
	include('config/config.php');

	$pageName="search";
    $subpageName="searchdetail";

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
    <!-- Morris chart -->
    <link href="css/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="css/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Date Picker -->
    <link href="css/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="css/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
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

            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        ค้นหาข้อมูลเกษตรกร
                        <small>สืบค้นข้อมูลแบบละเอียด</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class=\"active\">ค้าหาแบบละเอียด</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Main row -->
                    <div class="row">
                        <div class="col-xs-12">

                            <!-- ส่วนของงานหลัก  -->
                            <div class="box box-solid box-primary">
                                <div class="box-header">
                                    <!-- tools box -->
                                    <div class="pull-right box-tools">
                                        <button class="btn btn-primary btn-sm pull-right" data-widget='collapse' data-toggle="tooltip"  style="margin-right: 5px;"><i class="fa fa-minus"></i></button>
                                    </div><!-- /. tools -->

                                    <i class="fa fa-cloud"></i>
                                    <h3 class="box-title">เงื่อนไขค้นหา</h3>
                                </div>

                                <div class="box-body">
                                <div class="row">
                                <div class="col-xs-4">
                                    <div class="form-group">
                                        <label>คำค้น</label>
                                        <input type="text" class="form-control" id="txtSearch" placeholder="ชื่อ สกุล">

                                            <label>เลือกอำเภอ</label>
                                            <div id="showamphur">
                                            <select class="form-control">
                                                <option> = เลือกทั้งหมด = </option>
                                            </select>
                                            </div>
                                            <label>เลือกตำบล</label>
                                            <div id="showtambon">
                                            <select class="form-control">
                                                <option> = เลือกทั้งหมด = </option>
                                            </select>
                                            </div>
                                            <label>เลือกหมู่บ้าน</label>
                                            <div id="showmoo">
                                            <select class="form-control">
                                                <option> = เลือกทั้งหมด = </option>
                                            </select>
                                            </div>
                                    </div>
                                    </div>
                                    </div>
                                </div><!-- /.box-body-->
                                <div class="box-footer no-border">
                                    <button class="btn btn-success" type="button" id="butSearch">Search</button>
                                    <button class="btn btn-default" type="button" id="butCancel">Cancel</button>
                                </div>

                            </div>
                             <!-- จบส่วนงานหลัก -->

                             <!-- ส่วนของการแสดงผล -->
                             <div class="box" id="boxSearch">
                                <div class="box-header">
                                    <h3 class="box-title">ผลการค้นหา</h3>
                                </div>
                                <div class="box-body table-responsive no-padding">
                                    <div id="showData" style="margin:auto;padding:10px;"></div>
                                    <div id="load" align="center"><img src="img/ajax-loader.gif" align="absmiddle" /></div>
                                </div>
                             </div>
                             <!--จบการแสดงผล -->
                        </div>

                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
</body>
</html>
<?php
	mysqli_close($connect);
?>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
        <!-- Morris.js charts -->
        <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
        <script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
        <!-- Sparkline -->
        <script src="js/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
        <!-- jvectormap -->
        <script src="js/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
        <script src="js/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
        <!-- jQuery Knob Chart -->
        <script src="js/plugins/jqueryKnob/jquery.knob.js" type="text/javascript"></script>
        <!-- daterangepicker -->
        <script src="js/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
        <!-- datepicker -->
        <script src="js/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(document).ready(function(){
                $("#boxSearch").hide();

                $("#butCancel").click(function(){
                    $("#txtSearch").val('');
                });
				$("#showamphur").load("searchdetail_data.php?action=loadamphur");

                $("#butSearch").click(function(){
                    var Search = $("#txtSearch").val();
					var fac_id = $("#select_fac_id").val();
					var dep_id = $("#select_dep_id").val();
					var cs_id = $("#select_cs_id").val();
                    $("#boxSearch").show();
                    $("#load").fadeIn();
                    $("#showData").load("searchdetail_data.php?action=getView&search=" + Search + "&fac_id=" + fac_id+"&dep_id=" + dep_id+"&cs_id=" + cs_id,function(){
                        $("#load").fadeOut();
                    });
                });

            });

			$(document).on('click','.naviPN', function() {
				var Search = $("#txtSearch").val();
					var fac_id = $("#select_fac_id").val();
					var dep_id = $("#select_dep_id").val();
					var cs_id = $("#select_cs_id").val();
				var url=$(this).attr("href");
				    $("#showData").load("searchdetail_data.php?action=getView&url=" + url + "&search=" + Search + "&fac_id=" + fac_id+"&dep_id=" + dep_id+"&cs_id=" + cs_id,function(){
                        $("#load").fadeOut();
                    });

				return false;
			});

			$(document).on('change','#select_fac_id', function() {
				var optionSelected = $("option:selected", this);
  				var idamphur = this.value;
				$("#showtambon").load("searchdetail_data.php?action=loadtambon&id=" + idamphur );
			});
			$(document).on('change','#select_dep_id', function() {
				var optionSelected = $("option:selected", this);
  				var idtambon = this.value;
				$("#showmoo").load("searchdetail_data.php?action=loadmoo&id=" + idtambon );
			});

        </script>
