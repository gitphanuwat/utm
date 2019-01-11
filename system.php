<?php
	session_start();
	include('config/config.php');

	$pageName="about";
    $subpageName="system";

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
                        <small>รายละเอียดระบบ</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class=\"active\">รายละเอียดระบบ</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <!-- Main row -->

                    <!-- START ACCORDION & CAROUSEL-->
                    <div class="row">
                        <div class="col-md-12">
                            <div class="box box-solid">
                                <div class="box-header">
                                    <h3 class="box-title">รายละเอียดของระบบ</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <div class="box-group" id="accordion">
                                        <!-- we are adding the .panel class so bootstrap.js collapse plugin detects it -->
                                        <div class="panel box box-primary">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseOne">
                                                        การออกแบบระบบ
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseOne" class="panel-collapse collapse in">
                                                <div class="box-body">
                                                <h4 class="box-title">เป้าหมายการพัฒนา</h4>
                                                <ul>
                                                  <li>สร้างระบบฐานข้อมูลเกษตรกรในจังหวัดอุตรดิตถ์</li>
                                                  <li>สร้างระบบฐานข้อมูลผลผลิตทางการเกษตรในจังหวัดอุตรดิตถ์</li>
                                                  <li>เกิดศูนย์กลางข้อมูลในการประสานงานด้านเกษตรในจังหวัดอุตรดิตถ์ </li>
                                                  <li>ส่งเสริมการสร้างความเข้มแข็งของกระบวนการพัฒนาด้านการเกษตรในจังหวัดอุตรดิตถ์</li>
                                                  <li>เกิดสารสนเทศด้านเกษตรกรรมใช้ในด้านต่างๆได้ </li>
                                                </ul>
                                              </div>
                                            </div>
                                        </div>
                                        <div class="panel box box-danger">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseTwo">
                                                        การประมวลผลข้อมูล
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseTwo" class="panel-collapse collapse">
                                                <div class="box-body">
                                                    <p>การประมวลผลข้อมูลประกอบไปด้วย </p>
                                                    <ul>
                                                      <li>ระบบประมวลผลรายการ (Transaction Processing Systems) การบันทึกข้อมูลทะเบียนเกษตรกร และผลผลิตของเกษตรกรรายปี</li>
                                                      <li>การประมวลสารสนเทศ (Information Processing) การประมวลผลตามการเปลี่ยนแปลงของข้อมูล</li>
                                                      <li>การตรวจสอบข้อมูล (Verifying) การต้องตรวจสอบข้อมูลให้มีความถูกต้องน่าเชื่อถือ</li>
                                                      <li> การจำแนก (Classifying) เป็นการแบ่งแยกข้อมูลออกเป็นกลุ่ม หมวดหมู่
เพื่อให้การดำเนินการสร้างสารสนเทศได้สะดวกและรวดเร็วขึ้น</li>
                                                      <li>การจัดเรียงข้อมูล (Arranging) การจัดโครงสร้างข้อมูลให้เป็นแฟ้มให้มีการจัดเรียงลำดับข้อมูลเพื่อสะดวกต่อการค้นหาหรืออ้างอิง </li>
                                                      <li>การสรุป (Summarizing) เป็นการจัดรวบรวมข้อมูลเข้าด้วยกัน เพื่อเตรียมคำนวณหาค่าดัชนีหรือสารสนเทศ</li>
                                                      <li>การคำนวณ (Calculating) เป็นขั้นตอนสำคัญในการจัดการข้อมูลให้เป็นสารสนเทศ โดยอาศัยกระบวนการทางคณิตศาสตร์</li>
                                                      <li>การเรียกใช้ (Retrieving)  เป็นกระบวนการค้นหา และดึงข้อมูลที่ต้องการให้แก่ผู้ใช้</li>
                                                      <li>การเผยแพร่ (Disseminating and Reproducing)  เป็นการเผยแพร่สารสนเทศโดยเสนอข้อมูลได้อย่างรวดเร็วให้กับผู้ใช้ ในรูปแบบต่าง ๆ</li>
                                                    </ul>

                                              </div>
                                            </div>
                                        </div>
                                         <div class="panel box box-warning">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseThree">
                                                        ความสามารถของระบบ
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseThree" class="panel-collapse collapse">
                                                <div class="box-body">
                                                <div class="row" >
                                                <div class="col-md-6">
                                                  <ol>
                                                    <li>พัฒนากราฟิก GUI ในรูปแบบใหม่ด้วย Bootstrap</li>
                                                    <li>ออกแบบระบบฐานข้อมูลให้รองรับการเปลี่ยนแปลงของข้อมูลระบบ</li>
                                                    <li>ระบบควบคุมข้อมูลของผู้ดูแลระบบ<br />
                                                      - ระบบสมัครสมาชิก<br />
                                                      - ควบคุมสมาชิกระบบ<br />
                                                    - อนุมัติสิทธิ์</li>
                                                    <li>ระบบจัดการปีดำเนินการสำรวจข้อมูล<br />
                                                    <li>ระบบบันทึกประวัติการผลิตของเกษตรกร<br />
                                                    <li>ระบบบันทึกรายงานผลผลิตของเกษตรกร<br />
                                                    <li>ระบบรายงานผล/ติดตาม<br />
                                                      - สรุปผลการบันทึกข้อมูลของเกษตรกรและผลผลิต<br />
                                                      - แสดงข้อมูลตามระดับ top-down<br />
                                                    - ค้นหาข้อมูลเกษตรกร<br />
                                                    - สร้างระบบรายงานผลผู้ใช้<br />
                                                    - เก็บข้อมูลสถิติการใช้ระบบ<br />
                                                    - วิเคราะห์การใช้ระบบ</li>
                                                    <li>ระบบส่งออกเอกสาร<br />
                                                      - ส่งออกเอกสารข้อมูลเกษตรกร<br />
                                                      - ส่งออกเอกสารผลผลิตของเกษตกร<br />
                                                    - ส่งออกเป็นไฟล์ .doc</li>
                                                    <li>ระบบความปลอดภัยของข้อมูล<br />
                                                      - การป้องกันการเข้าถึงระบบฐานข้อมูล<br />
                                                      - การป้องกันการเข้าถึงไฟล์ของระบบ<br />
                                                      - การป้องกันการโจมตีระบบจากภายนอก<br />
                                                    <li>ระบบสำรองข้อมูล<br />
                                                      - สร้างโมดูลแบคอัพระบบฐานข้อมูล<br />
                                                    - สร้างโมดูลแบคอัพไฟล์เอกสารของระบบ</li>
                                                  </ol>
                                                </div>
                                           <div class="col-md-6">
                                           [Picture]
											</div>
                                            </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="panel box box-success">
                                            <div class="box-header">
                                                <h4 class="box-title">
                                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapseFour">
                                                        คู่มือผู้ใช้ระบบ
                                                    </a>
                                                </h4>
                                            </div>
                                            <div id="collapseFour" class="panel-collapse collapse">
                                                <div class="box-body">
                                                <div class="row" align="center">
                                                <div class="col-md-3">
                                                 	<p><img src="img/manual4.png" class="img-thumbnail" style="width:150px"/></p>
                                                   <a href="manual.pdf"> คู่มือสำหรับผู้ใช้ระบบ</a>
                                                </div>
												</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
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

		<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>

        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
