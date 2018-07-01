<?php
	session_start();
	include('config/config.php');

	$pageName="tag";
    $subpageName="printtag";
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
                    <div class="user-panel">
                    <?php include('user_panel.php');?>
                    </div>

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
                      	จัดการข้อมูลการขาย
                        <small>พิมพ์ ฉลาก QR Code</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li class=\"active\">ฉลาก QR Code</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">

                    <!-- Main row -->
                    <div class="row">
                        <div class="col-xs-12">

                             <!-- ส่วนของการแสดงผล -->
                             <div id="boxDisplay">
															 <?php
															 		$uid=$_SESSION["DUR_USER_ID"];

															 		$sql="select * from tb_user where iduser=$uid";
															 		$result=mysqli_query($connect,$sql);
															 		@$row=mysqli_fetch_array($result);

																	$dbiduser=$row["iduser"];
																	$db_prefix=$row["prefix"];
															 		$db_firstname=$row["firstname"];
															 		$db_lastname=$row["lastname"];
															 		$b_picture=$row["picture"];
															 		$db_idmoo=$row["idmoo"];
															 		$db_idgroup=$row["idgroup"];
															 		$db_hnumber=$row["hnumber"];

															 				$db_cardnumber=$row["cardnumber"];
															 				$db_birtdate=$row["birtdate"];
															 				$db_address=$row["address"];
															 				$db_postcode=$row["postcode"];
															 				$db_tel=$row["tel"];
															 				$db_mobile=$row["mobile"];
															 				$db_fax=$row["fax"];
															 				$db_email=$row["email"];

															 		if($b_picture==""){
															 			if($db_prefix==1){
															 				$img="user/profile_pic/user2.png";
															 			}else{
															 				$img="user/profile_pic/user1.png";
															 			}
															 		}else{
															 			$img="user/profile_pic/" . $b_picture;
															 		}

															 		if($db_idmoo !=""){

															 			$sql="select idtambon , moo from tb_moo where idmoo=$db_idmoo";
															 			$result=mysqli_query($connect,$sql);
															 			$row=mysqli_fetch_array($result);
															 			$db_idtambon=$row[0];
															 			$db_moo=$row[1];

															 			$sql="select idamphur , tambon from tb_tambon ";
															 			$sql=$sql . " where idtambon= $db_idtambon";
															 			$result=mysqli_query($connect,$sql);
															 			$row=mysqli_fetch_array($result);
															 			$db_idamphur=$row[0];
															 			$db_tambon=$row[1];

															 			$sql="select amphur from tb_amphur ";
															 			$sql=$sql . " where idamphur = $db_idamphur";
															 			$result=mysqli_query($connect,$sql);
															 			$row=mysqli_fetch_array($result);
															 			$db_amphur=$row[0];
															 		}

															 		if($db_idgroup !=""){
															 			$sql="select groupname from tb_group where idgroup=$db_idgroup";
															 			$result=mysqli_query($connect,$sql);
															 			$row=mysqli_fetch_array($result);
															 			$db_groupname=$row[0];
															 		}

															 		if($db_prefix !=4){
															 			$name=$cf_prefix[$db_prefix];
															 		}else{
															 			$name=$db_prefix;
															 		}
															 		$name=$name . $db_firstname . "  " . $db_lastname;

															 		echo "<div class='row'>";
															 			echo "<div class='col-xs-12'>";
															 				echo "<h2 class='page-header'>";
															 					echo "ฉลากสินค้า QR Code";
															 				echo "</h2>";
															 			echo "</div>";
															 		echo "</div>";

															 		echo "<div class='row invoice-info no-print'>";
																		echo "<div class='col-xs-12'>";
																			echo "<b>ชื่อ - สกุล :</b> $name ";
															 				echo "<b>บ้านเลขที่ :</b> $db_hnumber ";
															 				echo "<b>หมู่บ้าน :</b> $db_moo<br/>";
															 				echo "<b>ตำบล :</b> $db_tambon ";
															 				echo "<b>อำเภอ :</b> $db_amphur ";
															 				echo "<b>จังหวัด :</b> อุตรดิตถ์ ";
															 				echo "<b>กลุ่ม :</b> $db_groupname<br/>";
																			echo "<hr>";
																			echo "</div>";
															 		echo "</div>";


																	echo "<div class='row'>";
																	for ($i=0; $i < 15; $i++) {
																		echo "<div class='col-xs-4'>";
																			 				echo '<img src="https://chart.googleapis.com/chart?cht=qr&chs=130x130&chl=https://www.uttaraditmart.com/profile.php?id='.$uid.'&chld=L|0" alt="">';
																							$sqlpn="select codeplot from tb_plot where iduser=$dbiduser";
																							$resultpn=mysqli_query($connect,$sqlpn);
																							$rowpn=mysqli_fetch_array($resultpn);
																							if($rowpn[0]!=''){
																								echo '<br><i class="fa fa-map-marker"></i>';
																								echo $rowpn[0];
																							}
																							$sqlqa="select qatype from tb_quality where userid=$dbiduser";
																							$resultqa=mysqli_query($connect,$sqlqa);
																							while ($rowqa=mysqli_fetch_array($resultqa)) {
																								if($rowqa[0]==1){
																									echo "GI";
																								}
																								if($rowqa[0]==2){
																									echo "QA";
																								}
																								if($rowqa[0]==3){
																									echo "ET";
																								}
																							}
																							//echo 'u='.$dbiduser;
																							$sqly="select tb_durian.idyear from tb_durian,tb_plot where tb_plot.iduser=$dbiduser
																							and tb_durian.idplot=tb_plot.idplot order by tb_durian.idyear desc";
																							$resulty=mysqli_query($connect,$sqly);
																							$rowy=mysqli_fetch_array($resulty);
																							//echo 'y='.$rowy[0];
																							$sqlyn="select nameyear from tb_year where idyear=$rowy[0]";
																							$resultyn=mysqli_query($connect,$sqlyn);
																							@$rowyn=mysqli_fetch_array($resultyn);
																							//echo 'yn='.$rowyn[0];
																							if($rowyn[0]!=''){
																								echo $rowyn[0];
																							}
																							echo '<hr>';
																				echo "</div>";
																	}
															 		echo "</div>";


															 ?>
                             </div>
                             <div class="row no-print">
                                <div class="col-xs-12">
                                    <button class="btn btn-default" onClick="window.print();"><i class="fa fa-print"></i> Print</button>
                                </div>
                            </div>
                             <div id="loadBox" align="center">
                                <img src="img/ajax-loader.gif" align="absmiddle" />
                            </div>
                             <!--จบการแสดงผล -->
                        </div>

                    </div><!-- /.row (main row) -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

				<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
				<script src="js/utmmap_u.js"></script>

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

            $("#loadBox").fadeOut();
    });
</script>
