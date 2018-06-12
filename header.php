<?php
		$_SESSION["DUR_USER_PIC"]=0;
		$userPic="user/profile_pic/" .$_SESSION["DUR_USER_PIC"];

if(!$_SESSION["DUR_USER_PIC"]){
	$userPic="user/profile_pic/logo.png";
}
?>

        <!-- header logo: style can be found in header.less -->
        <header class="header">
					<a href="/" class="logo">
			      <!-- mini logo for sidebar mini 50x50 pixels -->
			      <span class="logo-mini"><b>U</b>TM</span>
			      <!-- logo for regular state and mobile devices -->
			      <span class="logo-lg"><b>M</b>art</span>
			    </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">

                <!-- Sidebar toggle button-->
                <a href="#" class="navbar-btn sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </a>
<?php
	if (@$_SESSION["DUR_USER_ID"]){
		$uid=$_SESSION["DUR_USER_ID"];
?>

                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span><?php echo $_SESSION["DUR_USER_NAME"]; ?> <i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header bg-light-blue">
                                    <img src="<?php echo $userPic ?>" class="img-circle" alt="User Image" />
                                    <p>
                                        <?php echo $_SESSION["DUR_USER_NAME"]; ?> - <?php echo $_SESSION["DUR_USER_STATE"]; ?>
                                    </p>
                                </li>
                                <!-- Menu Footer-->

                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#<?php echo $_SESSION["DUR_USER_ID"]; ?>" class="btn btn-default btn-flat editProfile">Profile</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="signout.php" class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
<?php
	$id=$_SESSION["DUR_USER_ID"];
	$sql="select * from tb_user where iduser=$id";
	$result=mysqli_query($connect,$sql);
	$row=mysqli_fetch_array($result);
	if($row['idgroup']==0){
		echo '
				<div class="alert alert-danger"">
						<b>Note:</b> ข้อมูลพื้นฐานยังไม่สมบูรณ์ <a href="#'.$_SESSION["DUR_USER_ID"].'" class="editProfile">กรุณาเพิ่มเติมข้อมูลส่วนตัว.</a>
				</div>';
	}
?>

<?php
}else{
?>
<div class="navbar-right">
<ul class="nav navbar-nav">
  <!-- User Account: style can be found in dropdown.less -->
  <li class="pull-right">
    <a href="login.php">
      <span class="hidden-xs"><i class="fa fa-user"></i> Member Login..</span>
    </a>
  </li>
</ul>
</div>
<?php
}
?>
            </nav>

        </header>
