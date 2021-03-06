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
	$subpageName="moo";

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
                        ข้อมูลหมู่บ้าน
                        <small>จัดการข้อมูลหมู่บ้าน</small>                   </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li ><a href="#">จัดการระบบ</a></li>
                        <li class="active">ข้อมูลหมู่บ้าน</li>
                    </ol>
              	</section>

                <!-- Main content -->
                <section class="content">
                	<div class="row">
                    	<div class="col-xs-12">
                        	<div class="box">
                            	<div class="box-header">
                                    <h3 class="box-title">รายชื่อหมู่บ้าน</h3>
                                    <div class="box-tools">
                                        <div class="input-group">
                                            <div id="mooView"></div>
                                            <div class="input-group-btn">
                                                <img />
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                               	  <div id="showData" style="margin:auto;padding:10px;"></div>

                                    <iframe id="upload_target" name="upload_target" src="#" style="display:none;"></iframe>
                                    <form action="cfdata_moo.php?action=insert" method="post" enctype="multipart/form-data" name="form_package"  id="form_package"  onsubmit="clickupload();" >
                                     <div class="box box-primary">
                                       <div class="box-header">
                                        	<h3 class="box-title">เพิ่มหมู่บ้าน</h3>
                                    	</div><!-- /.box-header -->

                                        <div class="box-body">
                                        	<div id="box1">
                                                <div class="form-group">
                                                    <label>ชื่อหมู่บ้าน<font color='red'>*</font></label>
                                                    <input type="text" class="form-control" id="moo" name="moo" placeholder="ชื่อหมู่บ้าน (ภาษาไทย)">
                                                    <span id="errmoo" class="error"></span>
                                                </div>

                                            </div>  <!-- /end box1 -->
                                            <div class="box-footer">
                                        		<button type="button" class="btn btn-info" id="step1">Next >></button>
                                    		</div>
                                            <div id="box2">
                                            	<div class="form-group">
                                                    <label >ผู้นำ</label>
                                                    <input type="text" class="form-control" id="m_address" name="m_address" placeholder="ชื่อผู้นำหมู่บ้าน">
                                                    <span id="errm_address" class="error"></span>
                                                </div>
                                              <div class="form-group">
                                                <label >เบอร์โทร</label>
                                                  <input type="text" class="form-control" id="m_tel" name="m_tel" placeholder="เบอร์โทรติดต่อ">
                                                  <span id="errm_tel" class="error"></span>
                                                </div>
                                                <div class="checkbox">
                                                  <label>
                                                        <input type="checkbox" value="1" id="status" name="status">
                                                    เปิดใช้งานหมู่บ้าน
                                                  </label>
                                                </div>
                                            </div>  <!-- /end box2 -->
                                            <div id ="step2">
                                            	<div class="box-footer">
                                                    <button type="submit" class="btn btn-primary" id="Save">Save</button>
                                                    <button type="reset" class="btn btn-danger" id="Cancel">Cancle</button>
                                                    <input name="idtambon" id="idtambon" type="hidden" value="" />
                                                    <input name="idmoo" id="idmoo"  type="hidden" value="" ? />
                                                </div>
                                            </div><!-- /end step2 -->
                                        </div>
                                     </div>
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
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
       <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>

        <script type="text/javascript">
            $(function() {
                $(".textarea").wysihtml5();
            });
        </script>

		<script type="text/javascript">
			$(document).ready(function(){
				$('input[type="checkbox"]').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass: 'iradio_minimal-blue'
                });

				$("#mooView").load("cfdata_moo.php?action=loadmoo");
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

				$("#moo").keyup(function(){
					$("#errmoo").hide();
					if($("#moo").val()==""){
						$("#errmoo").html("<font color='red'>กรุณากรอกชื่อหมู่บ้าน</font>").show().fadeIn(2000);
						return false;
					}
				});



				$("#CancelSubWork").click(function(){
					$("#errSubwork").hide();

					$("#subwork").val("");
					$("#condition").val("");
					$('#detailSubwork').data("wysihtml5").editor.setValue('');


					$("#id_subwork").val("");


					$("#step2Subwork").hide();
					$("#box2SubWork").slideUp(300);
					$("#step1Subwork").show();
				});

				$("#Cancel").click(function(){
					$("#errmoo").hide();
					$("#errTotalLoad").hide();

					$("#idtambon").val("");
					$("#moo").val("");
					$("#m_address").val("");
					$("#m_tel").val("");
					$("#m_website").val("");

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

			function clickupload(){
				$("#load").fadeIn();
				return true;
			}

			function stopUpload(success , error){
				var response="";
				if(success ==1){
					$("#upload_process").html("บันทึกข้อมูลเรียบร้อยแล้ว");
					var idtambon = $("#selectDepID").val();
					$("#showData").load("cfdata_moo.php?action=loadData&id=" + idtambon);
					$("#boxSubwork").hide();
					$("#load").fadeOut();

					$("#errmoo").hide();
					$("#errTotalLoad").hide();

					$("#moo").val("");
					$("#m_address").val("");
					$("#m_tel").val("");
					$("#m_website").val("");

					$("#step2").hide();
					$("#box2").slideUp(300);
					$("#step1").show();

				}else{
					if(error==1){
						$("#upload_process").html("<font color='red'>ไม่สามารถบันทึกข้อมูลได้  กรุณาเลือกตำบลก่อน</font>");
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
					$.post("cfdata_moo.php?action=delete",{id:id},function(){
						var idtambon = $("#selectDepID").val();
						$("#showData").load("cfdata_moo.php?action=loadData&id=" + idtambon);
						$("#boxSubwork").hide();
						$("#load").fadeOut();
					});
				}
			});


			$(document).on('click','.updateItem', function() {
				var idtambon = $(this).attr("href");
				idtambon = idtambon.replace("#","");
				$.post("cfdata_moo.php?action=getupdate",{id:idtambon},function(data){
					var returnData=data.split("|");
					$("#idmoo").val(returnData[0]);
					$("#idtambon").val(returnData[1]);
					$("#moo").val(returnData[2]);
					$("#moo_eng").val(returnData[3]);
					$("#m_address").val(returnData[4]);
					$("#m_tel").val(returnData[5]);
					$("#m_website").val(returnData[6]);
					if(returnData[7]=="0"){
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
  				var idtambon = this.value;
				$("#showData").load("cfdata_moo.php?action=loadData&id=" + idtambon );
				$("#idtambon").val(idtambon);
				$("#boxSubwork").hide();
				$("#load").fadeOut();
			});



		</script>
