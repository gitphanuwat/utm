<?php
	session_start();
	include('config/config.php');
	$pageName="search";
    $subpageName="searchfamer";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $PageTitle ?></title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

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
            <link href="css/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
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
                        ค้นหาข้อมูล
                        <small>สืบค้นข้อมูลเกษตรกร</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class=\"active\">ค้นหาข้อมูลเกษตรกร</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Main row -->
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                    <h3 class="box-title">ค้นหาข้อมูลเกษตรกร</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
			<table id="example1" class="table table-bordered table-striped">
			<thead>
    			<th style="width:50px">ลำดับ</th>
    			<th style="width:200px">ชื่อ - สกุล</th>
				<th>หมู่บ้าน</th>
				<th>ตำบล</th>
				<th>อำเภอ</th>
    		</thead>
			<tbody>
            <?php
			$i=1;
    		$sql="select tb_user.iduser, tb_user.prefix , tb_user.firstname , tb_user.lastname , tb_moo.moo, tb_tambon.tambon, tb_amphur.amphur";
    		$sql=$sql . " ,tb_user.cf_aca_position , tb_user.cf_slevel ";
        $sql=$sql . " from tb_user left join tb_moo on tb_user.idmoo=tb_moo.idmoo";

			$sql=$sql . " left join tb_tambon on tb_moo.idtambon=tb_tambon.idtambon";
			$sql=$sql . " left join tb_amphur on tb_tambon.idamphur=tb_amphur.idamphur";

			$sql=$sql . " where (tb_user.firstname like '%$search%' or tb_user.lastname like '%$search%' ) and tb_user.prefix !=0";

    		//$sql="select iduser , prefix , firstname , lastname ,cf_aca_position , email , `status`";
    		//$sql=$sql . " from tb_user where firstname like '%$search%' or lastname like '%$search%' ";
    		$sql=$sql . " order by tb_user.firstname ";
    		$result=mysqli_query($connect,$sql);
    		while($row=mysqli_fetch_array($result)){
				$prefix=$cf_aca_position[$row[7]];
                $prefix=$prefix . CreatePrefix($row[8]);
    			$name=$prefix . $row[2] . " " . $row[3];

    			$url=randomText(200);
    			echo "<tr>";
    			echo "<td>$i</td>";
    			echo "<td><a href='profile.php?url=$url&id=$row[0]' target='_blank' >$name</a></td>";
				echo "<td>$row[4]</td>";
				echo "<td>$row[5]</td>";
				echo "<td>$row[6]</td>";
    			echo "</tr>";
    			$i++;
    		}
			?>
			</tbody>
    		</table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>

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



            });

        </script>

        <script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript"></script>
        <!-- DATA TABES SCRIPT -->
        <script src="js/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
        <script src="js/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
        <!-- AdminLTE App -->
        <script src="js/AdminLTE/app.js" type="text/javascript"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>
        <!-- page script -->
        <script type="text/javascript">
            $(function() {
                $("#example1").dataTable();
            });
        </script>
