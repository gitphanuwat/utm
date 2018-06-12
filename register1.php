<?php
	session_start();
	include('config/config.php');

	$pageName="register";
    $subpageName="New User";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $PageTitle ?></title>
		<!-- bootstrap 3.0.2 -->
		<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
		<!-- font Awesome -->
		<link href="css/font-awesome.min.css" rel="stylesheet" type="text/css" />
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
                        ลงทะเบียนสมาชิก
                        <small>สมาชิกใหม่</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class=\"active\">สมัครสมาชิกใหม่</li>
                    </ol>
                </section>

                <section class="content">

                    <div class="row">
                        <div class="col-md-12">


													<div class="form-box" id="login-box">
													            <div class="header">Register New Membership</div>
													            <form action="../../index.html" method="post">
													                <div class="body bg-gray">
													                    <div class="form-group">
													                        <input type="text" name="name" class="form-control" placeholder="Full name"/>
													                    </div>
													                    <div class="form-group">
													                        <input type="text" name="userid" class="form-control" placeholder="User ID"/>
													                    </div>
													                    <div class="form-group">
													                        <input type="password" name="password" class="form-control" placeholder="Password"/>
													                    </div>
													                    <div class="form-group">
													                        <input type="password" name="password2" class="form-control" placeholder="Retype password"/>
													                    </div>
													                </div>
													                <div class="footer">

													                    <button type="submit" class="btn bg-olive btn-block">Sign me up</button>

													                    <a href="login.html" class="text-center">I already have a membership</a>
													                </div>
													            </form>

													            <div class="margin text-center">
													                <span>Register using social networks</span>
													                <br/>
													                <button class="btn bg-light-blue btn-circle"><i class="fa fa-facebook"></i></button>
													                <button class="btn bg-aqua btn-circle"><i class="fa fa-twitter"></i></button>
													                <button class="btn bg-red btn-circle"><i class="fa fa-google-plus"></i></button>

													            </div>
													        </div>

                        </div><!-- /.col -->

                    </div><!-- /.row -->
                    <!-- END ACCORDION & CAROUSEL-->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->
</body>
</html>
<?php
	mysqli_close($connect);
?>

<!-- jQuery 2.0.2 -->
<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.0.2/jquery.min.js"></script>
<!-- Bootstrap -->
<script src="js/bootstrap.min.js" type="text/javascript"></script>
