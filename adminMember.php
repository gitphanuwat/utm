<?php
	session_start();
	include('config/config.php');


	if($_SESSION["DUR_USER_ID"]==-1){
		echo "<script language=\"javascript\">window.location.href = 'login.php'</script>";
		exit();
	}

	$pageName="config";
	$subpageName="member";

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $PageTitle ?></title>

	<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="//cdnjs.cloudflare.com/ajax/libs/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- bootstrap wysihtml5 - text editor -->
    <link href="css/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
    <!-- iCheck for checkboxes and radio inputs -->
    <link href="css/iCheck/minimal/blue.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="css/AdminLTE.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.1/themes/black-tie/jquery-ui.css">
</head>

<body class="skin-blue">
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
                        ข้อมูลสมาชิกในระบบ
                        <small>บริหารจัดการข้อมูลเกษตรกร</small>
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li ><a href="#">จัดการข้อมูลเกษตรกร</a></li>
                    </ol>
              	</section>

                <!-- Main content -->
                <section class="content">
                	<div class="row">
                    	<div class="col-xs-12">
                        	<div class="box">
                            	<div class="box-header">
                                    <h3 class="box-title">ข้อมูลสมาชิกในระบบ
																			<?php if($_SESSION["DUR_USER_STATE"]=="MANAGER"){echo " (กลุ่ม : ".$_SESSION["DUR_USER_GROUP_NAME"].")";}?>
																		</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive no-padding">
                                                    <div class="container-fluid">
                                                    <?php if($_SESSION["DUR_USER_STATE"]!="USER"){?>
                                                    <form class="navbar-form navbar-right" >
                                                      <button type="button" id="butNew" class="btn btn-default">เพิ่มเกษตรกร</button>
                                                    </form>
                                                  <div class="container-fluid">
                                                    <div class="navbar-form navbar-left" role="search2">
                                                      <div class="form-group">
                                                        <input type="text" id="txtSearch_edit" class="form-control" placeholder="ค้นจากชื่อ-สกุล">
                                                      </div>
                                                      <button type="button" id="butSearch_edit" class="btn btn-default">ค้นหา</button>
                                                    </div>
                                                  </div>
 													<?php }?>
                                                </nav>
                                                <iframe id="upload_target" name="upload_target" src="#" style="display:none;"></iframe>
                                        		<div id="boxRegistered" style="margin:auto;padding:10px;">
                                        			<div id="loadRegistered" align="center">
                                                        <img src="img/ajax-loader.gif" align="absmiddle" />
                                                    </div>
                                        		</div>
                                        	</div>
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

                $("#dialog").dialog({
                    autoOpen: false,
                    width : 600,
                });


                $("#butSearch_edit").click(function(){
                    valSearch = $("#txtSearch_edit").val();
                    $("#loadInfo").fadeIn();
                    $("#boxRegistered").load("adminDataMember.php?action=getRegistered&search=" + valSearch ,function(){
                        $("#loadInfo").fadeOut();
                    });
                });

                //กำลังลงทะเบียน
				$("#boxRegistered").load("adminDataMember.php?action=getRegistered" ,function(){
					$("#loadRegistered").fadeOut();
				});

                $("#butNew").click(function(){
                    $("#dialog-from").load("adminDataMemberFrom.php?action=getFromMember",function(){
                        $("#dialog").dialog( "option", "width", 400 );
                        $( "#dialog" ).dialog( "open" );
                        $("#loadDialog").fadeOut();
                    });
                });
				//จบ function read
			});

			$(document).on('click','.delItemRegistered', function() {
				var id = $(this).attr("href");
				id = id.replace("#","");
				if(confirm("ท่านต้องการลบรายการนี้หรือไม่ ?")){
					$("#loadRegistered").fadeIn();
					$.post("adminDataMember.php?action=delUser",{id:id},function(){
						$("#boxRegistered").load("adminDataMember.php?action=getRegistered" ,function(){
							$("#loadRegistered").fadeOut();
						});
					});
				}
			});

            $(document).on('click','.viewItemRegistered',function(){
                var id=$(this).attr("href");
                id=id.replace("#","");
                $("#dialog-from").load("adminDataMember.php?action=getDetail&id="+id,function(){
                    $("#dialog").dialog( "option", "width", 400 );
                    $( "#dialog" ).dialog( "open" );
                });
            });

            $(document).on('click','.editItemRegistered',function(){
                var id=$(this).attr("href");
                id=id.replace("#","");
                $("#dialog-from").load("adminDataMemberFrom.php?action=getFromMember&id="+id,function(){
                    $("#dialog").dialog( "option", "width", 400 );
                    $( "#dialog" ).dialog( "open" );
                    $("#loadDialog").fadeOut();
                });
            });

            $(document).on('click','#butExit',function(){
                $("#dialog").dialog( "close" );
            });

						$(document).on('click','.btnpic',function(){
							var id=$(this).attr("href");
							id=id.replace("#","");
							//$("#showpic").html("123456789"+id,function(){
							$("#showpic").load("adminDataMember.php?action=uppic&id="+id,function(){
									//$("#dialog").dialog( "option", "width", 400 );
									//$( "#dialog" ).dialog( "open" );
							});
            });

            function clickupload(){
                $("#loadInfo").fadeIn();
                return true;
            }

            function stopUpload(success , error){
                    if(success ==1){
                        $("#dialog").dialog( "close" );
                        $("#loadRegistered").fadeIn();
                        $("#boxRegistered").load("adminDataMember.php?action=getRegistered" ,function(){
                            $("#loadRegistered").fadeOut();
                        });
                    }else{
                        if(error==1){
                            $("#uploadDialog_process").html("<font color='red'>กรุณากรอกข้อมูลให้ครบ</font>");
														$('#loadDialog').fadeOut();
                        }
                    }
                return true;
            }

            $(document).on('click',"#butCancel",function(){
                $("#dialog").dialog( "close" );
            });

			$(document).on('click','.naviPN', function() {
				var url=$(this).attr("href");
				$("#loadRegistered").fadeIn();
				$("#boxRegistered").load(url + "&action=getRegistered" ,function(){
					$("#loadRegistered").fadeOut();
				});
				return false;
			});

            $(document).on('click','.naviPN1', function() {
                var url=$(this).attr("href");
                valSearch = $("#txtSearch").val();
                $("#loadInfo").fadeIn();
                $("#boxInfo").load(url + "&action=getSearch&search=" +valSearch  ,function(){
                    $("#loadInfo").fadeOut();
                });
                return false;
            });


		</script>
