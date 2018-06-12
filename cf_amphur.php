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
	$subpageName="amphur";
		
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
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="css/iCheck/minimal/blue.css" rel="stylesheet" type="text/css" />
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
            
            <!-- ส่วนของเนื้อหา -->
            <aside class="right-side">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        ข้อมูลหน่วยงาน
                        <small>จัดการรายชื่ออำเภอ</small>                   </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li ><a href="#">จัดการระบบ</a></li>
                        <li class="active">จัดการข้อมูลอำเภอ</li>
                    </ol>
              	</section>

                <!-- Main content -->
                <section class="content">
                	<div class="row">
                    	<div class="col-xs-12">
                        	<div class="box">
                            	<div class="box-header">
                                    <h3 class="box-title">ข้อมูลอำเภอทั้งหมดของระบบ</h3>
                                    
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                               	  <div id="showData" style="margin:auto;padding:10px;"></div>
                                    
                                    <iframe id="upload_target" name="upload_target" src="#" style="display:none;"></iframe>
                                    <form action="cfdata_amphur.php?action=insert" method="post" enctype="multipart/form-data" name="form_package"  id="form_package" onsubmit="clickupload();" >
                                     <div class="box box-primary">
                                       <div class="box-header">
                                        	<h3 class="box-title">เพิ่มอำเภอ</h3>
                                   	   </div><!-- /.box-header -->
                                        
                                        <div class="box-body">
                                        	<div id="box1">
                                                <div class="form-group">
                                                    <label>ชื่ออำเภอ<font color='red'>*</font></label>
                                                    <input type="text" class="form-control" id="amphur" name="amphur" placeholder="ชื่ออำเภอ(ภาษาไทย)">
                                                    <span id="erramphur" class="error"></span>
                                                </div>
                                            </div>  <!-- /end box1 -->
                                            <div class="box-footer">
                                        		<button type="button" class="btn btn-info" id="step1">Next >></button>
                                    		</div>
                                            <div id="box2">
                                                <div class="form-group">
                                                    <label >เบอร์โทรศัพท์ติดต่อ</label>
                                                    <input type="text" class="form-control" id="amp_tel" name="amp_tel" placeholder="เบอร์โทรศัพท์ติดต่อ">
                                                    <span id="errtel" class="error"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label >เบอร์โทรสาร</label>
                                                    <input type="text" class="form-control" id="amp_fax" name="amp_fax" placeholder="เบอร์โทรสาร">
                                                    <span id="errfax" class="error"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label >เว็บไซต์</label>
                                                    <input type="text" class="form-control" id="amp_website" name="amp_website" placeholder="ตัวอย่าง www.uru.ac.th">
                                                    <span id="errwebsite" class="error"></span>
                                                </div>
                                                <div class="form-group">
                                                    <label >เฟสบุ๊ค</label>
                                                    <input type="text" class="form-control" id="amp_facebook" name="amp_facebook" placeholder="ตัวอย่าง www.facebook.com/ILikeURU">
                                                    <span id="errfacebook" class="error"></span>
                                                </div>
                                                <div class="checkbox">
                                                  <label>
                                                        <input type="checkbox" value="1" id="status" name="status">
                                                    เปิดใช้งาน
                                                  </label>
                                                </div>
                                            </div>  <!-- /end box2 -->
                                            <div id ="step2">
                                           	  <div class="box-footer">
                                                    <button type="submit" class="btn btn-primary" id="Save">Save</button>
                                                    <button type="reset" class="btn btn-danger" id="Cancel">Cancel</button>
                                                  <input name="idamphur" id="idamphur" type="hidden" value="" />
                                                </div>
                                            </div><!-- /end step2 -->
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
        <script src="js/AdminLTE/demo.js" type="text/javascript"></script>        
        <!-- Bootstrap WYSIHTML5 -->
        <script src="js/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>
        <!-- iCheck -->
        <script src="js/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
        
        <script src="//code.jquery.com/ui/1.11.1/jquery-ui.min.js" type="text/javascript"></script>
        <script type="text/javascript">
			$(document).ready(function(){
				$('input[type="checkbox"]').iCheck({
                    checkboxClass: 'icheckbox_minimal-blue',
                    radioClass: 'iradio_minimal-blue'
                });
			
				$("#showData").load("cfdata_amphur.php");
				$("#step2").hide();
				$("#box2").slideUp(0);
				$("#load").fadeOut();
				
				$("#step1").click(function(){
					$("#step1").hide();
					$("#box2").slideDown(300);
					$("#step2").slideDown(300);
				});
				
				$("#Cancel").click(function(){
					$("#errTotalLoad").hide();
					$("#errTerm").hide();
					$("#errYear").hide();
					
					$("#form_package")[0].reset();
					$("#step2").hide();
					$("#box2").slideUp(300);
					$("#step1").show();
					$("#idamphur").val("");
				});
				
				$("#amphur").keyup(function(){
					$("#erramphur").hide();
					if($("#amphur").val()==""){
						$("#erramphur").html("<font color='red'>กรุณากรอกชื่ออำเภอ</font>").show().fadeIn(2000);
						return false;
					}
				});
				//จบ function read
			});
			
			$(document).on('click','.lockItem', function() {
				var idamphur = $(this).attr("href");
				idamphur = idamphur.replace("#","");
				$("#load").fadeIn();
				$.post("cfdata_amphur.php?action=lock",{id:idamphur},function(){
					$("#showData").load("cfdata_amphur.php");
					$("#load").fadeOut();
				});
			});
			
			$(document).on('click','.delItem', function() { 
				var idamphur = $(this).attr("href");
				idamphur = idamphur.replace("#","");
				if(confirm("ท่านต้องการลบรายการนี้หรือไม่ ?")){
					$("#load").fadeIn();
					$.post("cfdata_amphur.php?action=delete",{id:idamphur},function(){
						$("#load").fadeOut();
						$("#showData").load("cfdata_amphur.php");
					});
				}
			});
			
			$(document).on('click','.updateItem', function() { 
				var idamphur = $(this).attr("href");
				idamphur = idamphur.replace("#","");
				$.post("cfdata_amphur.php?action=getupdate",{id:idamphur},function(data){
					var returnData=data.split("|");
					$("#idamphur").val(returnData[0]);
					$("#amphur").val(returnData[1]);
					$("#amp_keyman").val(returnData[2]);
					$("#amp_tel").val(returnData[3]);
					$("#amp_fax").val(returnData[4]);
					$("#amp_website").val(returnData[5]);
					$("#amp_facebook").val(returnData[6]);
					
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
				var response="";
				if(success ==1){
					$("#upload_process").html("บันทึกข้อมูลเรียบร้อยแล้ว");
					$("#showData").load("cfdata_amphur.php");
					$("#load").fadeOut();
					
					$("#errTotalLoad").hide();
					$("#errTerm").hide();
					$("#errYear").hide();
					
					$("#form_package")[0].reset();
					$("#step2").hide();
					$("#box2").slideUp(300);
					$("#step1").show();
					$("#idamphur").val("");
				}else{
					if(error==1){
						$("#upload_process").html("<font color='red'>file ที่ upload จะต้องเป็นประเภท pdf เท่านั้น</font>");
						$("#load").fadeOut();
					}else if(error==2){
						$("#upload_process").html("<font color='red'>ไม่สามารถบันทึกข้อมูลได้  เกิดปัญหาไม่สามารถ upload file ได้</font>");
						$("#load").fadeOut();
					}else if(error==3){
						$("#upload_process").html("<font color='red'>ไม่สามารถบันทึกข้อมูลได้  เนื่องจากข้อมูลเทอมที่ท่านกรอกมีอยู่แล้ว</font>");
						$("#load").fadeOut();
					}else if(error==4){
						$("#upload_process").html("<font color='red'>ไม่สามารถบันทึกข้อมูลได้  กรุณากรอกข้อมูลให้ครบด้วย</font>");
						$("#load").fadeOut();
					}
				}
				
				return true;
			}
		</script>
		