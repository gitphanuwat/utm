<?php
header("Content-type:application/json; charset=UTF-8");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
// ส่วนติดต่อกับฐานข้อมูล
	session_start();
	include('config/config.php');
	mysqli_query($connect,"SET NAMES UTF8");
?>
<?php
$q="SELECT * FROM tb_plot";
$qr=mysqli_db_query($connect,$q);
while($rs=mysql_fetch_array($qr)){
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
