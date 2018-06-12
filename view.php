<?php
include('config/config.php');

?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
    $sql="select * from tb_pages ";
		$result=mysqli_query($connect,$sql);

    echo "<ul class='todo-list'>";
		$sql="select * from tb_feed ";
		$sql=$sql . " order by 'Date' desc LIMIT 8";
		$result=mysqli_query($connect,$sql);
        while($row=mysqli_fetch_array($result)){
          $linkfb = explode("_", $row[8]);
            echo "<li>";
                echo "<span class='handle'>";
                    echo "<i class='fa fa-ellipsis-v'></i>";
                    echo "<i class='fa fa-ellipsis-v'></i>";
                echo "</span>";
                echo "<span class='text'><a href=https://www.facebook.com/permalink.php?story_fbid=$linkfb[1]&id=$linkfb[0]' target='_blank'>$row[3] $row[2]</a></span>";
                echo "<small class='label label-info'>";
                	echo "&nbsp;<i class='fa fa-clock-o'></i>&nbsp;Comments $row[5] &nbsp;Likes $row[6] &nbsp;Shared $row[7] &nbsp;";
               	echo "</small>";
            echo "</li>";
        }
        echo "</ul>";

     ?>
  </body>
</html>
