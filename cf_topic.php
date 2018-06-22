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
                        <small>จัดการข้อมูลหัวข้อคำถาม</small>                   </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li ><a href="#">จัดการข้อมูลหัวข้อคำถาม</a></li>
                    </ol>
              	</section>
<?php
	$idpoll = $_SESSION["DUR_POLL_ID"];
	$sql = "select * from tb_poll where idpoll = $idpoll";
	$result=mysqli_query($connect,$sql);
	@$row=mysqli_fetch_array($result);
?>
                <!-- Main content -->
                <section class="content">
                	<div class="row">
                    	<div class="col-xs-12">
                        	<div class="box">
														<div class="box-header">
															<h3 class="box-title">แบบสอบถามเรื่อง - <?php echo $row['pollname'];?></h3>
														</div><!-- /.box-header -->
														<div class="box-body">
															รายละเอียด :  <?php echo $row['detail'];?>
														</div>
														<div class="box-header">
															<h3 class="box-title">รายการหัวข้อคำถามทั้งหมด</h3>
														</div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                               	  <div id="showData" style="margin:auto;padding:10px;"></div>

                                    <iframe id="upload_target" name="upload_target" src="#" style="display:none;"></iframe>
                                    <form action="cfdata_topic.php?action=insert" method="post" name="form_package"  id="form_package"  target="upload_target" onsubmit="clickupload();" >
                                     <div class="box box-primary">
                                       <div class="box-header">
                                        	<h3 class="box-title">เพิ่มหัวข้อคำถาม</h3>
                                   	   </div><!-- /.box-header -->

                                        <div class="box-body">
                                        	<div id="box1">
                                                <div class="form-topic">
                                                    <label>หัวข้อคำถาม</label>
                                                    <input type="text" class="form-control" id="topicname" name="topicname" placeholder="หัวข้อคำถาม">
                                                    <label>รายละเอียด</label>
                                                    <textarea type="text" class="form-control" id="detail" name="detail" placeholder="รายละเอียดข้อมูล"></textarea>
                                                    <input type="hidden" class="form-control" id="up_date" name="up_date" placeholder="วันที่สำรวจ" value="<?php echo date("Y-m-d H:i:s");?>">
                                                    <span id="errtopicname" class="error"></span>
                                                </div>
                                            </div>  <!-- /end box1 -->
                                            <div id="box2">
                                       	  <div class="checkbox">
                                       	    </div>
                                            </div>
                                            <!-- /end box2 -->
                                          <div class="box-footer">
                                                <button type="submit" class="btn btn-primary" id="Save">บันทึก</button>
																								<button class="btn btn-danger" onclick="goBack()">ย้อนกลับ</button>
																								<input name="idpoll" id="idpoll" type="hidden" value="<?php echo $_SESSION["DUR_POLL_ID"]; ?>" />
																								<input name="idtopic" id="idtopic" type="hidden" value="" />
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
				var idpoll = $("#idpoll").val();
				$('input[type="checkbox"]').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass: 'iradio_minimal-blue'
        });
				$("#showData").load("cfdata_topic.php?idpoll="+idpoll);
				$("#box2").hide();
				$("#box2").slideUp(0);
				$("#load").fadeOut();

				$("#Cancel").click(function(){
					$("#errTotalLoad").hide();
					$("#form_package")[0].reset();
					$("#box2").slideUp(300);
					$("#idtopic").val("");
				});

				$("#topicname").keyup(function(){
					$("#errtopicname").hide();
					if($("#topicname").val()==""){
						$("#errtopicname").html("<font color='red'>กรุณากรอกชื่อกลุ่ม</font>").show().fadeIn(2000);
						return false;
					}
				});

				//จบ function read
			});

			function goBack() {
					//window.history.back();
					window.location.replace("cf_poll.php");
			}

			$(document).on('click','.delItem', function() {
				var idtopic = $(this).attr("href");
				idtopic = idtopic.replace("#","");
				if(confirm("ท่านต้องการลบรายการนี้หรือไม่ ?")){
					$("#load").fadeIn();
					$.post("cfdata_topic.php?action=delete",{id:idtopic},function(){
						$("#load").fadeOut();
						$("#showData").load("cfdata_topic.php");
						$("#form_package")[0].reset();
					});
				}
			});

			$(document).on('click','.updateItem', function() {
				var idtopic = $(this).attr("href");
				idtopic = idtopic.replace("#","");
				$.post("cfdata_topic.php?action=getupdate",{id:idtopic},function(data){
					var returnData=data.split("|");
					$("#idtopic").val(returnData[0]);
					$("#topicname").val(returnData[2]);
					$("#detail").val(returnData[3]);
					$("#up_date").val(returnData[4]);
					$("#box2").slideDown(300);
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

			function stopUpload(success , error){
				//alert(error);
				var response="";
				if(success ==1){
					$("#upload_process").html("บันทึกข้อมูลเรียบร้อยแล้ว");
					$("#showData").load("cfdata_topic.php");
					$("#load").fadeOut();

					$("#errTotalLoad").hide();
					$("#errTerm").hide();
					$("#errYear").hide();

					$("#form_package")[0].reset();
					$("#box2").slideUp(300);
					$("#idtopic").val("");
				}else{
					if(error==1){
						$("#upload_process").html("<font color='red'>ไม่สามารถบันทึกข้อมูลได้</font>");
						$("#load").fadeOut();
					}
				}
				return true;
			}
		</script>
