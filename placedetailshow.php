<?php
header("Content-type:text/html; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
// เชื่อมต่อกับฐานข้อมูล
	session_start();
	include('config/config.php');
	mysqli_query($connect,"SET NAMES UTF8");

// ดึงข้อมูลจากฐานข้อมูล ตามค่า id ของสถานที่ ที่ส่งมา
$q="SELECT * FROM  tb_plot,tb_user WHERE
tb_plot.idplot='".$_GET['placeID']."' and tb_plot.iduser = tb_user.iduser";
$qr=@mysqli_query($connect,$q);
$rs=@mysqli_fetch_array($qr);
?>
<!--จัดรูปแบบ ที่ต้องการแสดงตามต้องการ -->
<table width="200" height="100">
  <tr align="left">
    <td width="100" rowspan="4">
    <img src="user/profile_pic/<?php echo $rs['picture']?>"
     class="img-circle" width="80">
    </td>
    <td><?php echo $rs['codeplot']?></td>
  </tr>
  <tr align="left">
    <td>เกษตรกร:<br> <?php echo $rs['firstname'].' '.$rs['lastname']?></td>
  </tr>
  <tr align="left">
    <td>
    <?php if($rs['comment']!=""){?>
    <a href='<?php echo $rs['comment'];?>' title='ลิงค์ไปยังเฟสบุ๊ค' target="_blank"><span class="label label-primary">Facebook</span></a>
    <?php }?>
	<?php if($rs['zm']!=""){?>
	<a href='<?php echo $rs['zm'];?>' title='ลิงค์ไปยังเว็บไซต์' target="_blank"><span class="label label-success">Website</span></a>
    <?php }?>
    </td>
  </tr>
  <tr>
    <td align="right">
    <a href='#<?php echo $rs['idplot'];?>' title='แสดงข้อมูล' class='showdetail'><span class="label label-info">รายละเอียด</span></a>
    </td>
  </tr>
</table>
