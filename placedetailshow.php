<?php
header("Content-type:text/html; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
// เชื่อมต่อกับฐานข้อมูล
	session_start();
	include('config/config.php');
	mysqli_query($connect,"SET NAMES UTF8");

// ดึงข้อมูลจากฐานข้อมูล ตามค่า id ของสถานที่ ที่ส่งมา
$q="SELECT * FROM  tb_plot WHERE
idplot='".$_GET['placeID']."'";
$qr=@mysqli_query($connect,$q);
$rs=@mysqli_fetch_array($qr);
?>
<!--จัดรูปแบบ ที่ต้องการแสดงตามต้องการ -->
<table width="250" border="0" cellspacing="2" cellpadding="0" align="left">
  <tr align="left">
    <td width="10" rowspan="4">
    <img src="icon/<?php echo $rs['picture']?>"
     width="130" height="80">
    </td>
    <td width="10">&nbsp;</td>
    <td width="264"><?php echo $rs['codeplot']?></td>
  </tr>
  <tr align="left">
    <td>&nbsp;</td>
    <td>กลุ่มงาน: <?php echo $rs['arear']?></td>
  </tr>
  <tr align="left">
    <td>&nbsp;</td>
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
    <td>&nbsp;</td>
    <td align="right">
    <a href='#<?php echo $rs['idplot'];?>' title='แสดงข้อมูล' class='showdetail'><span class="label label-info">รายละเอียด</span></a>
    </td>
  </tr>
</table>
