<?php
	include('config/config.php');
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
</head>

<body>
<?php
$sql="select tb_user.iduser, tb_plot.codeplot, tb_user.firstname, tb_user.lastname from tb_plot, tb_user where tb_plot.iduser=tb_user.iduser order by tb_user.iduser ASC";
$result=mysqli_query($connect,$sql);
echo '<table border="1">
  <tbody>
    <tr>
      <td width="85">รหัสผู้ใช้</td>
      <td width="200">รหัสแปลง</td>
      <td width="193">ชื่อ-สกุล</td>
    </tr>';
 while($row=mysqli_fetch_array($result)){
 echo "   <tr>
      <td>$row[0]</td>
      <td>$row[1]</td>
      <td>$row[2].$row[3]</td>
    </tr>";
 }
?>
  </tbody>
</table>
</body>
</html>
