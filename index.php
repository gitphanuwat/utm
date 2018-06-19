<?php
	session_start();
	include('config/config.php');
	$pageName="home";
	//echo "cookie = ".$_COOKIE['HIT_COUNTER_2018-02-25'];
	//require_once( 'feed.php' ); // facebook application load
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
	<link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
	<!-- Theme style -->
	<link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="http://code.jquery.com/ui/1.11.1/themes/black-tie/jquery-ui.css">
	<link rel="icon" href="user/profile_pic/icon.ico">

</head>

<body class="skin-blue">
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = 'https://connect.facebook.net/th_TH/sdk.js#xfbml=1&version=v2.12&appId=229042934292145&autoLogAppEvents=1';
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>

			<div style="font-size: 12px;" id="dialog" title="ข้อมูลสมาชิก">
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
                        ระบบฐานข้อมูลศักยภาพเกษตรกร
                        <small>ผลผลิตสับปะรด จังหวัดอุตรดิตถ์</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> หน้าหลัก</a></li>
						            <?php
												if (@!$_SESSION["DUR_USER_ID"]){
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

                    <?php include('stat_box.php'); ?>

                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <section class="col-lg-6 connectedSortable">
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
                          <div class="box box-solid">
                              <div class="box-header">
                                  <h3 class="box-title"><i class="glyphicon glyphicon-compressed"></i> ความเคลื่อนไหวของระบบ</h3>
                              </div>
                              <div class="box-body">
	                                <i class="glyphicon glyphicon-bookmark text-blue"></i> ความสนใจของผู้ใช้<br>
																	<?php
																		$sql="select * from tb_search order by idsearch DESC LIMIT 20";
																		$result=mysqli_query($connect,$sql);
																		while($row=mysqli_fetch_array($result)){
																   			echo $row[1].", ";
																	 	}
																	?>
                              </div>
                          </div>

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
                        </section>

                        <!-- right col -->
                        <section class="col-lg-6 connectedSortable">
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
                        </section><!-- right col -->
                    </div><!-- /.row (main row) -->


										<div class="row">
                        <section class="col-lg-12 connectedSortable">
                          <div class="box box-solid">
                              <div class="box-header">
                              		<i class="fa fa-bar-chart-o"></i>
                                  <h3 class="box-title">ข่าวสารออนไลน์</h3>
                              </div><!-- /.box-header -->
                              <div class="box-body">
																 <div id="showfeed"><div align="center"><img src="img/ajax-loader.gif" align="absmiddle"><br>Facebook Loading...</div></div>
                              </div><!-- /.box-body -->
														</div><!-- /.box -->
												</section><!-- /.content -->
									</div><!-- /.box -->

<!-- for google maps -->
									<div class="row">
											<section class="col-lg-12 connectedSortable">
												<div class="box box-solid">
														<div class="box-header">
																<i class="fa fa-bar-chart-o"></i>
																<h3 class="box-title">เกษตรกร</h3>
														</div><!-- /.box-header -->
														<div class="box-body">
															 <div id="map" style="height: 300px;"><div align="center"><img src="img/ajax-loader.gif" align="absmiddle"><br>Facebook Loading...</div></div>
														</div><!-- /.box-body -->
													</div><!-- /.box -->
											</section><!-- /.content -->
								</div><!-- /.box -->

                </section><!-- /.content -->
            </aside><!-- /.right-side -->
        </div><!-- ./wrapper -->

        <!-- add new calendar event modal -->
				<?php
						$q="SELECT * FROM tb_plot";
						$qr=mysqli_query($connect,$q);
						while($rs=mysqli_fetch_array($qr)){
							$json_data[]=array(
								"idplot"=>$rs['idplot'],
								"codeplot"=>$rs['codeplot'],
						        "lat"=>$rs['lat'],
						        "lng"=>$rs['lng'],
						        "zm"=>$rs['zm'],
								 "comment"=>$rs['comment']
							);
						}
						$json= json_encode($json_data);
						echo $json;
				?>

				<script type="text/javascript">
				  function initMap() {
							//var locations = <?php //print_r(json_encode($json_data)) ?>;
							//var locations = <?php //echo $json ?>
				      //var locations = [{lat: 17.6339275, lng: 100.1019697, codeplot:'uttaradit'},{lat: 17.833325, lng: 100.9597057, codeplot:'huaymun'}];
							var locations = [{'lat': '17.6339275', 'lng': '100.1019697', 'codeplot':'uttaradit'},{lat: 17.833325, lng: 100.9597057, codeplot:'huaymun'}];

							//var locations = [{"idplot":"65","codeplot":"PN67-1","lat":"17.7505938","lng":"100.7300733","zm":"0","comment":"comment"},{"idplot":"66","codeplot":"PN65-1","lat":"17.833325","lng":"100.9597057","zm":"14","comment":""}];

				      var uluru = {lat: 17.620664, lng: 100.097566};
				      var map = new google.maps.Map(document.getElementById('map'), {
				        zoom: 8,
				        center: uluru
				      });
				      $.each( locations, function( index, value ){
				          var utm = {lat: value.lat, lng: value.lng};
				          var contentString = value.codeplot;
				          var infowindow = new google.maps.InfoWindow({
				            content: contentString,
				            maxWidth: 200
				          });
				          var marker = new google.maps.Marker({
				            position: utm,
				            map: map,
				            title: value.codeplot
				          });
				          marker.addListener('click', function() {
				            infowindow.open(map, marker);
				          });
				      });//foreach
				  }
				  </script>
				  <script async defer
				  src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBknDfGljfct2xUrrNHfIrve6EakWTNwsc&callback=initMap">
				  </script>

</body>
</html>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js" type="text/javascript"></script>
<script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
<!-- Morris.js charts -->
<script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="js/plugins/morris/morris.min.js" type="text/javascript"></script>
<!-- AdminLTE App -->
<script src="js/AdminLTE/app.js" type="text/javascript"></script>

<script type="text/javascript">
    $(document).ready(function(){

				//test facebook
				//$("#showfb").load('https://www.codeofaninja.com/demos/display-facebook-timeline-level-3/index.php?fb_page_id=262013900603203');

					$("#dialog").dialog({
							autoOpen: false,
							width : 600,
					});

				$("#showperson").load("loadperson.php?action=loadperson" ,function(){
		          $("#loadperson").fadeOut();
		    });

				$("#showyear").load("loadperson.php?action=loadyear");
				$("#showData").load("loadperson.php?action=loadproduct");
				$("#showDataInformation").load("loadnews.php?action=getNews",function(){
		    });
				//$("#showfeed").load("loadfeed.php?action=loadfeed");
		        //$("#showDataNews").load("loadnews.php?action=getNews");
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
	});

	function stopUpload(success , error){
					if(success ==1){
						$("#loadDialog").fadeOut(300);
							$("#dialog").dialog( "close" );
					}else{
							if(error==1){
									$("#uploadDialog_process").html("<font color='red'>กรุณากรอกข้อมูลให้ครบ</font>");
									$('#loadDialog').fadeOut();
							}
					}
			return true;
	}

</script>
