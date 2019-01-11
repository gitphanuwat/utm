พื้นที่การเพาะปลูก<br>
<table class="table table-bordered" >
							  <tr>
								<td width="20">ลำดับ</td>
								<td>รหัสแปลง</td>
								<td>จำนวนไร่</td>
								<td>ลิติจูด</td>
								<td>ลองจิจูด</td>
                <td>บันทึก</td>
							  </tr>
<?php
			$iduser=$_GET["id"];

			$sql="select * from tb_plot  where iduser = $iduser";
			$result=mysqli_query($connect,$sql);
			$cr=1;
			while(@$row=mysqli_fetch_array($result)){
?>
							  <tr>
								<td>
								<?php echo $cr++; ?>
								</td>
								<td><?php echo $row[2]."&nbsp;&nbsp;&nbsp;<a href='#$row[0]' title='แก้ไขข้อมูล' class='editItemplot'><img src='img/edit.png'></a><a href='#$row[0]' title='ลบข้อมูล' class='delItemplot'><img src='img/del.png'></a>"?></td>
								<td><?php echo $row[3];?></td>
								<td><?php echo $row[5];?></td>
								<td><?php echo $row[6];?></td>
                <td><?php echo $row[9];?></td>
							  </tr>
<?php }?>
</table>
<input type="hidden" name="iduser" id="iduser" value="<?php echo $iduser;?>">
<?php mysqli_close($connect);?>
