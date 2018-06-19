<?php
header("Content-type:application/json; charset=UTF-8");        
header("Cache-Control: no-store, no-cache, must-revalidate");       
header("Cache-Control: post-check=0, pre-check=0", false);  
// ส่วนติดต่อกับฐานข้อมูล
	session_start();
	include('config/config.php');
	mysql_connect($host,$hostuser,$hostpass);
	mysql_query("SET NAMES UTF8");
	
	$iduser=$_SESSION["IASU_USER_ID"];
	$idtype=$_GET["idtype"];
	//$idtype=4;
?>
<?php

$q="SELECT * FROM tbbase ,tbtype
WHERE tbbase.idtype =  tbtype.idtype 
and  tbbase.idtype = $idtype  
ORDER BY tbbase.idbase ASC";
$qr=mysql_db_query($database,$q);
while($rs=mysql_fetch_array($qr)){
	$json_data[]=array(
		"idbase"=>$rs['idbase'],
		"base"=>$rs['base'],
        "latitude"=>$rs['latitude'],
        "longitude"=>$rs['longitude'],
        "zoom"=>$rs['zoom'],
		 "icon"=>$rs['icon']
	);	
}
$json= json_encode($json_data);
echo $json;
?>
<?php		
	mysql_close();
?>
