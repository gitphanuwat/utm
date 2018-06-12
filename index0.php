<?php
	session_start();
	include('config/config.php');
	$pageName="home";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $PageTitle ?></title>

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
		<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.1/themes/black-tie/jquery-ui.css">


</head>

<body class="skin-blue">
	<div style="font-size: 12px;" id="dialog" title="ข้อมูลสมาชิก">
			<div id="dialog-from" ></div>
	</div>

		<?php
			//include('header.php');
		?>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="left-side sidebar-offcanvas">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- Sidebar user panel -->
                    <div class="user-panel">
                    <?php //include('user_panel.php');?>
                    </div>

                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu">
                        <?php
							//include('sidebar_menu.php');
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
                        ระบบฐานข้อมูลศักยภาพเกษตรกร
                        <small>ผลผลิตสับปะรด จังหวัดอุตรดิตถ์</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
						            <?php
												if (!$_SESSION["DUR_USER_ID"]){
						              echo "<li class=\"active\">Information for Guest</li>";
												}else{
													echo "<li class=\"active\">System Management</li>";
												}
												?>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
									<iframe id="upload_target" name="upload_target" src="#" style="display:none;"></iframe>

                    <?php //include('stat_box.php'); ?>

                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-6 connectedSortable">
                            <!-- Custom tabs (Charts with tabs)-->
                            <div class="box box-solid">
                                <div class="box-header">
                                <i class="fa fa-bar-chart-o"></i>
                                    <h3 class="box-title">จำนวนเกษตรกร</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                 <div id="showperson" style="margin:auto;padding:10px;">
                                 </div>
                                 <div id="loadperson" align="center">
                                        <img src="img/ajax-loader.gif" align="absmiddle" />
                                    </div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->



                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-solid">
                                <div class="box-header">
                                    <h3 class="box-title"><i class="glyphicon glyphicon-compressed"></i> ความเคลื่อนไหวของระบบ</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="box-group" id="accordion">
                                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                        <div class="panel box box-primary">
                                            <div class="box-header">
                                                <h4>
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                        <i class="glyphicon glyphicon-bookmark text-blue"></i> ความสนใจของผู้ใช้
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="box-body">
                          <?php
														$sql="select * from tb_search order by idsearch DESC";
														$result=mysqli_query($connect,$sql);
														$i=1;
														while($i<21){
															$row=mysqli_fetch_array($result);
												   			echo $row[1].", ";
															$i++;
													 	}
													?>
                                                 </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->

                            <!-- quick email widget -->

                            <div class="box box-info">
                                <div class="box-header">
                                    <i class="glyphicon glyphicon-road"></i>
                                    <h3 class="box-title">ข่าวสาร</h3>
                                    <!-- tools box -->
                                </div>
                                <div class="box-body">
                                    <div id="showDataInformation" style="margin:auto;padding:10px;"></div>

                                </div>
                            </div>

                        </section><!-- /.Left col -->
                        <!-- right col (We are only adding the ID to make the widgets sortable)-->
                        <section class="col-lg-6 connectedSortable">


                            <!-- solid sales graph -->
                            <div class="box box-solid bg-gray">
                                 <div class="box-header" style="color:#666">
                                    <i class="fa fa-th"></i>
                                    <h3 class="box-title">ผลผลิตสับปะรด</h3>
                                </div>
                                <div class="box-body border-radius-none">
                                 <div id="showyear" style="margin:auto;padding:10px;"></div>
                               	  <div id="showData" style="margin:auto;padding:10px;"></div>
								</div>
                                </div>
                                <div class="box box-solid bg-teal-gradient">
                                <div class="box-header">
                                    <i class="fa fa-th"></i>
                                    <h3 class="box-title">สถิติการใช้ระบบ</h3>
                                </div>
                                <div class="box-body border-radius-none">
                                    <div id="boxChart">

                                    </div>
                                    <div id="loadChart" align="center">
                                        <img src="img/ajax-loader.gif" align="absmiddle" />
                                    </div>
                                </div><!-- /.box-body -->

                            </div><!-- /.box -->

                                </div>
                            </div><!-- /.box -->

                        </section><!-- right col -->
                    </div><!-- /.row (main row) -->

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

        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>

        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function(){
			$("#dialog").dialog({
					autoOpen: false,
					width : 600,
			});

		$("#showperson").load("loadperson.php?action=loadperson" ,function(){
          $("#loadperson").fadeOut();
    });
		/*
		$("#showyear").load("loadperson.php?action=loadyear");
		$("#showData").load("loadperson.php?action=loadproduct");
        $("#showDataInformation").load("loadnews.php?action=getNews",function(){
        });
        $("#showDataNews").load("loadnews.php?action=getNews");

        $.post( "counter.php?action=add");
        $("#boxChart").load("counter.php?action=getChart",function(){
            $("#loadChart").fadeOut();
        });
    });

    $(document).on('change','#select_year_id', function() {
		var optionSelected = $("option:selected", this);
  		var idyear = this.value;
		$("#showData").load("loadperson.php?action=loadproduct",{idyear:idyear});
		$("#box1").hide();
	});

	$(document).on('click','.editProfile',function(){
			var id=$(this).attr("href");
			id=id.replace("#","");
			//alert(id);
			$("#dialog-from").load("adminDataMemberFrom.php?action=getFromMember&id="+id,function(){
					$("#dialog").dialog( "option", "width", 400 );
					$( "#dialog" ).dialog( "open" );
					$("#loadDialog").fadeOut();
			});
			*/

	});

	$(document).on('click',"#butCancel",function(){
			$("#dialog").dialog( "close" );
	});

	function clickupload(){
			$("#loadInfo").fadeIn();
			return true;
	}

	function stopUpload(success , error){
					if(success ==1){
							$("#dialog").dialog( "close" );
							$("#loadRegistered").fadeIn();
							$("#boxRegistered").load("adminDataMember.php?action=getRegistered" ,function(){
									$("#loadRegistered").fadeOut();
							});
					}else{
							if(error==1){
									$("#uploadDialog_process").html("<font color='red'>กรุณากรอกข้อมูลให้ครบ</font>");
									$('#loadDialog').fadeOut();
							}
					}
			return true;
	}

</script>