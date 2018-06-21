<?php
	session_start();
	include('config/config.php');

	$pageName="register";
  $subpageName="member";


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
    <!-- Theme style -->
    <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
		<script src="http://code.jquery.com/jquery-latest.min.js"></script>
		<script src="js/fb.js"></script>

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
                        ลงทะเบียนสมาชิก
                        <small>สมาชิกใหม่</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class=\"active\">สมัครสมาชิกใหม่</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-md-6 col-md-push-3">
                            <div class="box box-solid">
																<div class="box-header">
																		<h3 class="box-title">สมัครสมาชิกใหม่</h3>
																</div><!-- /.box-header -->
																<iframe id="upload_target" name="upload_target" src="#" style="display:none;"></iframe>
			                          	<div class="box-body">
																		<div id="showform"></div>
																		<div id="uploadDialog_process"></div>
			                          	</div><!-- /.box-body -->
			                          	<div class="box-footer">
																		<div id="loginface">
																		<div class="margin text-center">
																				<span>หรือ ลงทะเบียนด้วยเฟสบุ๊ค</span>
																				<br/>
																				<fb:login-button scope="public_profile,email" onlogin="checkLoginState();">
																				</fb:login-button>
																			</div>
																		</div>
																	</div>
                            </div><!-- /.box -->
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
</body>
</html>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
<script src="js/AdminLTE/app.js" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#showform").load("adminDataMemberFrom.php?action=getFromMember" ,function(){
		$("#loadDialog").fadeOut();
	});
});
function stopUpload(success , error){
				if(success ==1){
					$("#showform").html("<div class='margin text-center'><font color='blue'>++ ลงทะเบียนสมาชิกเรียบร้อย ++</font></div>");
					$("#loginface").html("<div class='margin text-center'><a href='login.php'> ล็อกอินเข้าระบบ</a></div>");
						$('#loadDialog').fadeOut();

				}else{
						if(error==1){
								$("#uploadDialog_process").html("<font color='red'>กรุณากรอกข้อมูลให้ครบ</font>");
								$('#loadDialog').fadeIn();
						}
				}
		return true;
}
</script>
