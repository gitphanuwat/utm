<?php
	session_start();
	include('config/config.php');

	if($_SESSION["DUR_USER_ID"]==-1){
		echo "<script language=\"javascript\">window.location.href = 'login.php'</script>";
		exit();
	}

	$pageName="report";
	$subpageName="tambon";

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

    <!-- iCheck for checkboxes and radio inputs -->
    <link href="css/iCheck/minimal/blue.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
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
                        สรุปรายงานข้อมูล
                        <small>ข้อมูลแยกตามตำบล</small>                   </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li ><a href="#">สรุปรายงาน</a></li>
                        <li class="active">ข้อมูลแยกตามตำบล</li>
                    </ol>
              	</section>

                <!-- Main content -->
                <section class="content">
                	<div class="row">
                    	<div class="col-xs-12">
                        	<div class="box">
                            	<div class="box-header">
                                    <h3 class="box-title">รายการตำบล</h3>
                                    <div class="box-tools">
                                        <div class="input-group">
                                            <div id="tambonView"></div>
                                            <div class="input-group-btn">
                                                <img />
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                               	  <div id="showData" style="margin:auto;padding:10px;">เลือกตำบลที่ต้องการแสดงข้อมูล</div>
                                    <iframe id="upload_target" name="upload_target" src="#" style="display:none;"></iframe>
                                    <form action="repdata_tambon.php?action=insert" method="post" enctype="multipart/form-data" name="form_package"  id="form_package" target="upload_target" onsubmit="clickupload();" >

                                  </form>

                                </div><!-- /.box-body --><!-- /.box -->

                        <div id="load" align="center"><img src="img/ajax-loader.gif" align="absmiddle" /></div>
                                <div id="upload_process" align="center"></div>

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
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>



		<script type="text/javascript">
			$(document).ready(function(){
				$('input[type="checkbox"]').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass: 'iradio_minimal-blue'
                });

				$("#tambonView").load("repdata_tambon.php?action=loadtambon");
				$("#step2").hide();
				$("#box2").slideUp(0);

				$("#boxSubwork").hide();
				$("#load").fadeOut();



				$("#step1").click(function(){
					$("#step1").hide();
					$("#box2").slideDown(300);
					$("#step2").slideDown(300);
				});

				$("#step1Subwork").click(function(){
					$("#step1Subwork").hide();
					$("#box2SubWork").slideDown(300);
					$("#step2Subwork").slideDown(300);
				});

				$("#tambon").keyup(function(){
					$("#errtambon").hide();
					if($("#tambon").val()==""){
						$("#errtambon").html("<font color='red'>กรุณากรอกชื่อภาควิชา</font>").show().fadeIn(2000);
						return false;
					}
				});



				$("#CancelSubWork").click(function(){
					$("#errSubwork").hide();

					$("#subwork").val("");
					$("#condition").val("");
					$('#detailSubwork').data("wysihtml5").editor.setValue('');


					$("#idsubwork").val("");


					$("#step2Subwork").hide();
					$("#box2SubWork").slideUp(300);
					$("#step1Subwork").show();
				});

				$("#Cancel").click(function(){
					$("#errtambon").hide();
					$("#errTotalLoad").hide();

					$("#idamphur").val("");
					$("#tambon").val("");
					$("#dep_address").val("");
					$("#dep_tel").val("");
					$("#dep_website").val("");

					$("#step2").hide();
					$("#box2").slideUp(300);
					$("#step1").show();
				});


			//จบ ready
			});

			function clickSubworkSave(){
				$("#load").fadeIn();
				return true;
			}

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
					var idamphur = $("#selectDepID").val();
					$("#showData").load("repdata_tambon.php?action=loadData&id=" + idamphur);
					$("#boxSubwork").hide();
					$("#load").fadeOut();

					$("#errtambon").hide();
					$("#errTotalLoad").hide();

					$("#tambon").val("");
					$("#dep_address").val("");
					$("#dep_tel").val("");

					$("#dep_website").val("");

					$("#step2").hide();
					$("#box2").slideUp(300);
					$("#step1").show();

				}else{
					if(error==1){
						$("#upload_process").html("<font color='red'>ไม่สามารถบันทึกข้อมูลได้  กรุณาเลือกภาคก่อน</font>");
						$("#load").fadeOut();
					}else if(error==2){
						$("#upload_process").html("<font color='red'>ไม่สามารถบันทึกข้อมูลได้  กรุณากรอกข้อมูลให้ครบด้วย</font>");
						$("#load").fadeOut();
					}else if(error==3){
						$("#upload_process").html("<font color='red'>ไม่สามารถบันทึกข้อมูลได้  ข้อมูลรายการนี้มีอยู่แล้ว</font>");
						$("#load").fadeOut();
					}
				}

				return true;
			}



			$(document).on('click','.delItem', function() {
				var id = $(this).attr("href");
				id = id.replace("#","");
				if(confirm("ท่านต้องการลบรายการนี้หรือไม่ ?")){
					$("#load").fadeIn();
					$.post("repdata_tambon.php?action=delete",{id:id},function(){
						var idamphur = $("#selectDepID").val();
						$("#showData").load("repdata_tambon.php?action=loadData&id=" + idamphur);
						$("#boxSubwork").hide();
						$("#load").fadeOut();
					});
				}
			});


			$(document).on('click','.updateItem', function() {
				var idamphur = $(this).attr("href");
				idamphur = idamphur.replace("#","");
				$.post("repdata_tambon.php?action=getupdate",{id:idamphur},function(data){
					var returnData=data.split("|");
					$("#idtambon").val(returnData[0]);
					$("#idamphur").val(returnData[1]);
					$("#tambon").val(returnData[2]);
					$("#dep_address").val(returnData[3]);
					$("#dep_tel").val(returnData[4]);
					$("#dep_website").val(returnData[5]);
					if(returnData[6]=="0"){
						$("#status").iCheck("uncheck");
					}else{
						$("#status").iCheck("check");
					}

					$("#step1").hide();
					$("#box2").slideDown(300);
					$("#step2").slideDown(300);
				});
			});

			$(document).on('change','#selectDepID', function() {
				$("#load").fadeIn();
				var optionSelected = $("option:selected", this);
  				var idamphur = this.value;
				$("#showData").load("repdata_tambon.php?action=loadData&id=" + idamphur );
				$("#idamphur").val(idamphur);
				$("#boxSubwork").hide();
				$("#load").fadeOut();
			});



		</script>
