<?php
	session_start();
	include('config/config.php');

	$pageName="about";
    $subpageName="aboutus";

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
                        เกี่ยวกับระบบ
                        <small>เกี่ยวกับผู้จัดทำ</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class=\"active\">เกี่ยวกับผู้จัดทำ</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Main row -->
                    <div class="row">
                        <div class="col-md-6">
                            <div class="box box-solid">
                                <div class="box-header">
                                    <i class="fa fa-text-width"></i>
                                    <h3 class="box-title">ที่มาของโครงการ</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <dl>
                                        <dt>ชื่อโครงการ</dt>
                                        <dd>การพัฒนาระบบฐานข้อมูลผลผลิตทางการเษตร จังหวัดอุตรดิตถ์</dd>
                                        <dt>ความสำคัญ</dt>
                                        <dd>
                                        ทีมผู้พัฒนา ได้เล็งเห็นความสำคัญในการบริหารจัดการข้อมูลเกษตรกรภายในจังหวัดอุตรดิตถ์ จึงได้ศึกษาและพัฒนาระบบสารสนเทศเพื่อการจัดการข้อมูลเกษตรกร และผลผลิตเกษตรในอุตรดิตถ์ โดยการพัฒนาระบบการจัดเก็บบันทึกรายงานผลผลิตในระบบฐานข้อมูล เพื่อให้ระบบสามารถดำเนินการได้อย่างมีประสิทธิภาพ และมีเสถียรภาพ อำนวยความสะดวกในขั้นตอนการรวบรวมข้อมูล ลดความซับซ้อนในการดำเนินการ การติดตามผลการดำเนินงาน การรายงานผลของเกษตรกร การสรุปผลสำหรับผู้บริหาร และการรวบรวมหลักฐานเพื่อการนำไปใช้ประโยชน์อย่างต่อเนื่อง อีกทั้งยังสามารถส่งเสริมความร่วมมือของภาคีเครือข่ายเกษตรกรในจังหวัดอุตรดิตถ์ให้มีประสิทธิภาพมากยิ่งขึ้น</dd>
                                        <br>
                                        <dt>ผู้สนับสนุนโครงการ</dt>
                                        <dd>กลุ่มเกษตรกรจังหวัดอุตรดิตถ์, มหาวิทยาลัยราชภัฏอุตรดิตถ์</dd>
                                    </dl>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
														<div class="box box-solid">
                                <div class="box-header">
                                    <i class="fa fa-text-width"></i>
                                    <h3 class="box-title">เป้าหมาย</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                  <dl class="dl-horizontal">
                                        <dt>วัตถุประสงค์</dt>
                                      <dd>เพื่อพัฒนาฐานข้อมูลเพื่อการสำรวจและรวบรวมผลผลิตการเกษตรในจังหวัดอุตรดิตถ์<br />
                                        </dd>
                                        <dt>ผลลัพธ์</dt>
                                        <dd>ระบบฐานข้อมูลผลผลิตทางการเกษตรในจังหวัดอุตรดิตถ์</dd>
                                        <dt>ประโยชน์</dt>
                                        <dd>การบริหารจัดการเกษตรกร, ผลผลิต</dd>
                                        <dt>การประยุกต์ใช้</dt>
                                        <dd>ฐานข้อมูลศูนย์กลาง, แฟ้มสะสมผลผลิตทางการเกษตร, การประเมินศักยภาพ, แหล่งอ้างอิงข้อมูลเกษตรกร.</dd>
                                    </dl>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->

                        </div><!-- ./col -->
                        <div class="col-md-6">
                            <div class="box box-solid bg-gray">
 <div class="row">
           	<div class="box-header">
           	  <h3 class="box-title"><i class="fa fa-cogs"></i> ทีมผู้จัดทำ</h3></div>

            <!-- START LOCK SCREEN ITEM -->
            <div class="lockscreen-name" align="center">ผู้บริหารจัดการโครงการ</div>
            <div class="lockscreen-item" >
                <!-- lockscreen image -->
                <div class="lockscreen-image">
                    <img  src="user/profile_pic/logo.png" alt="user image"/>
                </div>
                <!-- /.lockscreen-image -->

                <!-- lockscreen credentials (contains the form) -->
                <div class="lockscreen-credentials">
                    <div class="input-group">
                        <h5>กลุ่มเกษตรกรอำเภอน้ำปาดจังหวัดอุตรดิตถ์</h5>
                    </div>
                </div><!-- /.lockscreen credentials -->

            </div><!-- /.lockscreen-item -->
            <br />
</div>
 <div class="row">
            <!-- START LOCK SCREEN ITEM -->
            <div class="lockscreen-name" align="center">ที่ปรึกษา</div>
            <div class="lockscreen-item" >
                <!-- lockscreen image -->
                <div class="lockscreen-image">
                    <img  src="user/profile_pic/logouru.png" alt="user image"/>
                </div>
                <!-- /.lockscreen-image -->

                <!-- lockscreen credentials (contains the form) -->
                <div class="lockscreen-credentials">
                    <div class="input-group">
                        <h5><span style="color:#5C5C5C">มหาวิทยาลัยราชภัฏอุตรดิตถ์</span></h5>
                    </div>
                </div><!-- /.lockscreen credentials -->

            </div><!-- /.lockscreen-item -->
            <br/>
</div>
<div class="row">
					 <!-- START LOCK SCREEN ITEM -->
					 <div class="lockscreen-name" align="center">ผู้สนับสนุนโครงการ</div>
					 <div class="lockscreen-item" >
							 <!-- lockscreen image -->
							 <div class="lockscreen-image">
									 <img  src="user/profile_pic/logosci.png" alt="user image"/>
							 </div>
							 <!-- /.lockscreen-image -->

							 <!-- lockscreen credentials (contains the form) -->
							 <div class="lockscreen-credentials">
									 <div class="input-group">
											 <h5><span style="color:#5C5C5C">กระทรวงวิทยาศาสตร์และเทคโนโลยี</span></h5>
									 </div>
							 </div><!-- /.lockscreen credentials -->

					 </div><!-- /.lockscreen-item -->
					 <br/>
</div>


						 	</div>
                        </div><!-- ./col -->
                    </div><!-- /.row -->
                    <!-- END TYPOGRAPHY -->

                    <!-- START ACCORDION & CAROUSEL-->
                    <h2 class="page-header"></h2>
                    <!-- /.row -->
                    <!-- END ACCORDION & CAROUSEL-->










                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->


</body>
</html>

		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
