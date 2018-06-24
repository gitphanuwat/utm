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

	$pageName="poll";
	$subpageName="polledit";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title><?php echo $PageTitle ?></title>
<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">


<link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
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

            <!-- ส่วนของเนื้อหา -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        แบบสำรวจข้อมูลเกษตรกร
                        <small>จัดการข้อมูลแบบสำรวจ</small>                   </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li ><a href="#">จัดการข้อมูลแบบสำรวจ</a></li>
                    </ol>
              	</section>

                <!-- Main content -->
                <section class="content">
                	<div class="row">
                    	<div class="col-xs-12">
                        	<div class="box">
                            	<div class="box-header">
                                    <h3 class="box-title">รายการแบบสำรวจทั้งหมด</h3>

                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
																	<div id="showyear" style="margin:auto;padding:10px;"></div><br/>
                               	  <div id="showData" style="margin:auto;padding:10px;"></div>

                                    <iframe id="upload_target" name="upload_target" src="#" style="display:none;"></iframe>
                                    <form action="cfdata_poll.php?action=insert" method="post" name="form_package"  id="form_package"  target="upload_target" onsubmit="clickupload();" >
                                     <div class="box box-primary">
                                       <div class="box-header">
                                        	<h3 class="box-title">เพิ่มแบบสำรวจ</h3>
                                   	   </div><!-- /.box-header -->

                                        <div class="box-body">
                                        	<div id="box1">
                                                <div class="form-poll">
                                                    <label>หัวข้อแบบสำรวจ</label>
                                                    <input type="text" class="form-control" id="pollname" name="pollname" placeholder="หัวข้อแบบสำรวจ">
                                                    <label>รายละเอียด</label>
                                                    <textarea type="text" class="form-control" id="detail" name="detail" placeholder="รายละเอียดข้อมูล"></textarea>
                                                    <input type="text" class="form-control" id="up_date" name="up_date" placeholder="วันที่สำรวจ" value="<?php echo date("Y-m-d H:i:s");?>">
                                                    <span id="errpollname" class="error"></span>
                                                </div>
                                            </div>  <!-- /end box1 -->
                                            <div id="box2">
                                       	  <div class="checkbox">
                                       	    </div>
                                            </div>
                                            <!-- /end box2 -->
                                          <div class="box-footer">
                                                <button type="submit" class="btn btn-primary" id="Save">Save</button>
                                                <button type="reset" class="btn btn-danger" id="Cancel">Cancel</button>
																								<input name="idpoll" id="idpoll" type="hidden" value="" />
																								<input name="idyear" id="idyear" type="hidden" value="<?php echo $_SESSION["DUR_POLL_YEAR"];?>" />
                                            </div>
                                        </div>
                                     </div>
                                  </form>

                                  <div id="load" align="center"><img src="img/ajax-loader.gif" align="absmiddle" /></div>
                                  <div id="upload_process" align="center"></div>
                                </div><!-- /.box-body -->
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

        <script type="text/javascript">
			$(document).ready(function(){

				$("#showyear").load("cfdata_poll.php?action=loadyear");

				$(document).on('change','#select_year_id', function() {
					var optionSelected = $("option:selected", this);
	  				var idyear = this.value;
						//$("#showData").load("pollreport_load.php?action=loadstat",{idyear:idyear});
						$("#showData").load("cfdata_poll.php?action=loadpoll",{idyear:idyear});
						$("#idyear").val(idyear);
				});

				//$("#showData").load("cfdata_poll.php?action=loadpoll",{idyear:0});
				$("#showData").load("cfdata_poll.php?action=loadpoll");
				$("#box2").hide();
				$("#box2").slideUp(0);
				$("#load").fadeOut();


				$("#Cancel").click(function(){
					$("#errTotalLoad").hide();
					$("#form_package")[0].reset();
					$("#box2").slideUp(300);
					$("#idpoll").val("");
				});

				$("#pollname").keyup(function(){
					$("#errpollname").hide();
					if($("#pollname").val()==""){
						$("#errpollname").html("<font color='red'>กรุณากรอกชื่อกลุ่ม</font>").show().fadeIn(2000);
						return false;
					}
				});

				//จบ function read
			});

			$(document).on('click','.delItem', function() {
				var idpoll = $(this).attr("href");
				idpoll = idpoll.replace("#","");
				if(confirm("ท่านต้องการลบรายการนี้หรือไม่ ?")){
					$("#load").fadeIn();
					$.post("cfdata_poll.php?action=delete",{id:idpoll},function(){
						$("#load").fadeOut();
						$("#showData").load("cfdata_poll.php?action=loadpoll");
						$("#form_package")[0].reset();
					});
				}
			});

			$(document).on('click','.updateItem', function() {
				var idpoll = $(this).attr("href");
				idpoll = idpoll.replace("#","");
				$.post("cfdata_poll.php?action=getupdate",{id:idpoll},function(data){
					var returnData=data.split("|");
					$("#idpoll").val(returnData[0]);
					$("#pollname").val(returnData[2]);
					$("#detail").val(returnData[3]);
					//$("#up_date").val(returnData[4]);
					$("#box2").slideDown(300);
				});
			});

			$(document).on('click','.updatetopic', function() {
				var idpoll = $(this).attr("href");
				idpoll = idpoll.replace("#","");
				$.post("cfdata_poll.php?action=setsession",{id:idpoll},function(data){
					window.location.replace("cf_topic.php");
				});
			});

			$(document).on('click','.naviPN', function() {
				var url=$(this).attr("href");
				$("#showData").load(url);
				return false;
			});


			function clickupload(){
				$("#load").fadeIn();
				return true;
			}

			function stopUpload(success , error, idyear){
				//alert(idyear);
				var response="";
				if(success ==1){
					$("#upload_process").html("บันทึกข้อมูลเรียบร้อยแล้ว");
					$("#showData").load("cfdata_poll.php?action=loadpoll",{idyear:idyear});
					$("#load").fadeOut();

					$("#errTotalLoad").hide();
					$("#errTerm").hide();
					$("#errYear").hide();

					$("#form_package")[0].reset();
					$("#box2").slideUp(300);
					$("#idgroup").val("");
				}else{
					if(error==1){
						$("#upload_process").html("<font color='red'>ไม่สามารถบันทึกข้อมูลได้</font>");
						$("#load").fadeOut();
					}
				}
				return true;
			}
		</script>
