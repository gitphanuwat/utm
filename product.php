<?php
	session_start();
	include('config/config.php');

	if($_SESSION["DUR_USER_ID"]==-1){
		echo "<script language=\"javascript\">window.location.href = 'login.php'</script>";
		exit();
	}

	$yearID=$_GET["year"];
	$userID=$_GET["userid"];
	$pageName="Memberyear";
    $subpageName="year$yearID";

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
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="css/iCheck/all.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.1/themes/black-tie/jquery-ui.css">

</head>

<body class="skin-blue">
    <div style="font-size: 12px;" id="dialog" title="ข้อมูลผลผลิต">
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
                        ข้อมูลผลผลิต
												<?php if($_SESSION["DUR_USER_STATE"]=="MANAGER"){echo " (กลุ่ม : ".$_SESSION["DUR_USER_GROUP_NAME"].")";}?>
                        <small><div id="lblHeadTitle"></div></small></h1>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li ><a href="#">จัดการผลผลิต</a></li>
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
                                    <h3 class="box-title">กรองข้อมูล</h3>
                                </div>

                                <div class="box-body">
                                <div class="row">
                                <div class="col-xs-4">
                                <?php if($_SESSION["DUR_USER_STATE"]=="ADMIN"){?>
                                    <div class="form-group">
                                        <label>คำค้น</label>
                                        <input type="hidden" id="idyear" value="<?php echo $yearID;?>">
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
                           		<?php }?>
                                <?php if($_SESSION["DUR_USER_STATE"]=="MANAGER" or "USER"){?>
                                    <div class="form-group">
                                        <label>คำค้น</label>
                                        <input type="hidden" id="idyear" value="<?php echo $yearID;?>">
                                        <input type="text" class="form-control" id="txtSearch" placeholder="ชื่อ สกุล">
                                    </div>
                           		<?php }?>
                                    </div>
                                    </div>
                                </div><!-- /.box-body-->
                                <div class="box-footer no-border">
                                    <button class="btn btn-success" type="button" id="butSearch">ค้นหา</button>
                                    <button class="btn btn-default" type="button" id="butCancel">ยกเลิก</button>
                                </div>
                            </div>
                             <!-- จบส่วนงานหลัก -->
                             <!-- ส่วนของการแสดงผล -->
                             <div class="box" id="boxSearch">
                                <div class="box-header">
                                    <h3 class="box-title">ข้อมูลผลผลิตของเกษตรกร</h3>
                                </div>
                                <div class="box-body table-responsive no-padding">
                                <iframe id="upload_target" name="upload_target" src="#" style="display:none;"></iframe>
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
				<div id="testval">testval</div>
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

        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>

        <script type="text/javascript">
        $(document).ready(function(){
				loadTitle();
                $("#dialog").dialog({
                    autoOpen: false,
                    width : 600,
                });
		//iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal',
            radioClass: 'iradio_minimal'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-red',
            radioClass: 'iradio_flat-red'
        });

				var gyear = $("#idyear").val();

				$("#showData").load("product_view.php?action=getView&year="+gyear,function(){
                        $("#load").fadeOut();
                });
                $("#butCancel").click(function(){
                    $("#txtSearch").val('');
					$("#boxSearch").fadeOut();
                });

				$("#showamphur").load("product_view.php?action=loadamphur");

                $("#butSearch").click(function(){
				 						var gyear = $("#idyear").val();
                    var Search = $("#txtSearch").val();
										var amp_id = $("#select_amp_id").val();
										var tam_id = $("#select_tam_id").val();
										var moo_id = $("#select_moo_id").val();
                    $("#boxSearch").fadeIn();
                    $("#load").fadeIn();
                    $("#showData").load("product_view.php?action=getView&search=" + Search + "&amp_id=" + amp_id+"&tam_id=" + tam_id+"&moo_id=" + moo_id+"&year=" + gyear,function(){
                        $("#load").fadeOut();
                    });
                });

								//$('.topicselect').click(function () {
								    //alert('hello');
								//});

            }); //จบ Ready

			$(document).on('click','.naviPN', function() {
				var gyear = $("#idyear").val();
				var Search = $("#txtSearch").val();
					var amp_id = $("#select_amp_id").val();
					var tam_id = $("#select_tam_id").val();
					var moo_id = $("#select_moo_id").val();
					var url=$(this).attr("href");
				    $("#showData").load("product_view.php?action=getView&url=" + url + "&search=" + Search + "&amp_id=" + amp_id+"&tam_id=" + tam_id+"&moo_id=" + moo_id+"&year=" + gyear,function(){
                        $("#load").fadeOut();
                    });

				return false;
			});



			$(document).on('change','.topicselect', function() {
				var idtopic = this.value;
				var iduser = $("#iduser").val();
				var idyear = $("#idyear").val();

				//alert(idtopic);
				$.post("product_view.php?action=uptopic",{idtopic:idtopic,iduser:iduser,idyear:idyear});
			});




			$(document).on('change','#select_amp_id', function() {
				var optionSelected = $("option:selected", this);
  				var idamphur = this.value;
				$("#showtambon").load("product_view.php?action=loadtambon&id=" + idamphur );
			});
			$(document).on('change','#select_tam_id', function() {
				var optionSelected = $("option:selected", this);
  				var idtambon = this.value;
				$("#showmoo").load("product_view.php?action=loadmoo&id=" + idtambon );
			});

            $(document).on('click','.editItemRegistered',function(){
				var gyear = $("#idyear").val();
                var id=$(this).attr("href");
				var s_page = $("#s_page").val();
                id=id.replace("#","");
                $("#showData").load("product_view.php?action=addProduct&id="+id+ "&idyear=" + gyear+ "&s_page=" + s_page ,function(){
                });
            });

			$(document).on('click',"#butCancelProduct",function(){
				var gyear = $("#idyear").val();
				var Search = $("#txtSearch").val();
					var amp_id = $("#select_amp_id").val();
					var tam_id = $("#select_tam_id").val();
					var moo_id = $("#select_moo_id").val();
					var s_page = $("#s_page").val();
				    $("#showData").load("product_view.php?action=getView&search=" + Search + "&amp_id=" + amp_id+"&tam_id=" + tam_id+"&moo_id=" + moo_id+"&year=" + gyear+"&s_page=" + s_page,function(){
                        $("#load").fadeOut();
                    });
            });

			function loadTitle(){
				var pData=<?php echo $yearID ?>;
				$.post("workloadData.php?action=getTitle",{pData:pData},function(data){
					var row=data.split("|");
					$("#lblHeadTitle").html("จัดการผลผลิตปี พ.ศ. " + row[0]);
				});
			}

			$(document).on('click','.delItemRegistered', function() {
				var gyear = $("#idyear").val();
				var Search = $("#txtSearch").val();
					var amp_id = $("#select_amp_id").val();
					var tam_id = $("#select_tam_id").val();
					var moo_id = $("#select_moo_id").val();
					var s_page = $("#s_page").val();
					var id = $(this).attr("href");
					id = id.replace("#","");
					//alert(id);
				if(confirm("ท่านต้องการลบรายการนี้หรือไม่ ?")){
					$.post("product_view.php?action=delWork",{id:id,idyear:gyear},function(){
				    	$("#showData").load("product_view.php?action=getView&search=" + Search + "&amp_id=" + amp_id+"&tam_id=" + tam_id+"&moo_id=" + moo_id+"&year=" + gyear+"&s_page=" + s_page,function(){
                        $("#load").fadeOut();
                    	});
					});
				}
			});

			$(document).on('click','.delItemdurian', function() {
				var guser = $("#iduser").val();
				var gyear = $("#idyear").val();
				var id = $(this).attr("href");
				id = id.replace("#","");
				if(confirm("ท่านต้องการลบรายการนี้หรือไม่ ?")){
					$.post("product_view.php?action=deldurian",{id:id},function(){
                		$("#showData").load("product_view.php?action=addProduct&id="+guser+ "&idyear=" + gyear ,function(){
							$("#load").fadeOut();
						});
					});
				}
			});

			$(document).on('click','#butNewdurian', function() {
				var guser = $("#iduser").val();
				var gyear = $("#idyear").val();
				$("#dialog-from").load("product_dataform.php?action=getFromMember&iduser="+guser+ "&idyear=" + gyear ,function(){
					$("#dialog").dialog( "option", "width", 420 );
					$( "#dialog" ).dialog( "open" );
					$("#loadDialog").fadeOut();
				});
			});

            $(document).on('click',"#butCancel",function(){
                $("#dialog").dialog( "close" );
            });

            function stopUpload(success , error){
					var guser = $("#iduser").val();
					var gyear = $("#idyear").val();

                    if(success ==1){
                        $("#dialog").dialog( "close" );
                		$("#showData").load("product_view.php?action=addProduct&id="+guser+ "&idyear=" + gyear ,function(){
							$("#load").fadeOut();
						});
                    }else{
                        if(error==1){
                            $("#uploadDialog_process").html("<font color='red'>กรุณากรอกข้อมูลให้ครบด้วย</font>");
                        }
                        if(error==2){
                            $("#uploadDialog_process").html("<font color='red'>ข้อมูลรูปภาพไม่ถูกต้อง</font>");
                        }
                    }
                    if(success ==2){
						var gyear = $("#idyear").val();
						var Search = $("#txtSearch").val();
							var amp_id = $("#select_amp_id").val();
							var tam_id = $("#select_tam_id").val();
							var moo_id = $("#select_moo_id").val();
							var s_page = $("#s_page").val();
							$("#showData").load("product_view.php?action=getView&search=" + Search + "&amp_id=" + amp_id+"&tam_id=" + tam_id+"&moo_id=" + moo_id+"&year=" + gyear+"&s_page=" + s_page,function(){
								$("#load").fadeOut();
							});
                    }
	                return true;
            }

</script>
