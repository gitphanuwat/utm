<?php

		$userPic="user/profile_pic/" .$_SESSION["DUR_USER_PIC"];

if(!$_SESSION["DUR_USER_PIC"]){
	$userPic="user/profile_pic/logo.png";
}

		if (!$_SESSION["DUR_USER_ID"]){
		?>
    <div class="pull-left image">
        <img src="<?php echo $userPic ?>" alt="User Image"/>
    </div>
    <div class="pull-left info" style="font-size:14px">
        ระบบฐานข้อมูล<p>ผู้ผลิตสับปะรด
    </div>
		<?php
		}else{
		?>
    <div class="pull-left image">
        <img src="<?php echo $userPic ?>" class="img-circle" alt="User Image" />
    </div>
    <div class="pull-left info">
        <p><?php echo $_SESSION["DUR_USER_NAME"]; ?></p>
        <p><i class="fa fa-circle text-success"></i> <?php echo $_SESSION["DUR_USER_STATE"]; ?></p>
        <p><?php echo "กลุ่ม:".$_SESSION["DUR_USER_GROUP_NAME"]; ?></p>
    </div>
<?php } ?>
