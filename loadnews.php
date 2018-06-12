<?php
session_start();
include('config/config.php');

	if($_GET["action"]=="getNews"){

		echo "<ul class='todo-list'>";
		$sql="select news_id , day_in , title , count_view from tb_news ";
		$sql=$sql . " order by news_id desc LIMIT 3";
		$result=mysqli_query($connect,$sql);
        while($row=mysqli_fetch_array($result)){
            echo "<li>";
                echo "<span class='handle'>";
                    echo "<i class='fa fa-ellipsis-v'></i>";
                    echo "<i class='fa fa-ellipsis-v'></i>";
                echo "</span>";
                echo "<span class='text'><a href='view_news.php?id=$row[0]' target='_blank'>$row[2] $row[1]</a></span>";
                echo "<small class='label label-info'>";
                	echo "&nbsp;<i class='fa fa-clock-o'></i>&nbsp;ดู $row[3] ครั้ง&nbsp;";
               	echo "</small>";
            echo "</li>";
        }
        echo "</ul>";

		exit();
	}

	if($_GET["action"]=="getNewsDetail"){
		$id=$_GET["id"];

		$sql="update tb_news set count_view=count_view+1 where news_id=$id";
		$result=mysqli_query($connect,$sql);

		$sql="select * from tb_news where news_id = $id";
        $result=mysqli_query($connect,$sql);
        $row=mysqli_fetch_array($result);
        $title=$row["title"];
        $detail=$row["detail"];
        $day_in=$row["day_in"];

        echo "<p><b>$title</b>     วันที่ลงข่าว : $day_in</p>";
        echo "<p>$detail</p>";
        $sql="select * from tb_news_item where news_id = $id order by autoid";
        $result=mysqli_query($connect,$sql);
        $nRow=mysqli_num_rows($result);
        if($nRow !=0){
            echo "<br><p><b>เอกสารอ้างอิง</b></p>";
            while($row=mysqli_fetch_array($result)){
                echo "<p>&nbsp&nbsp<a href='user/news/$row[3]' target='_blank'>$row[2]</a></p>";
            }
        }

		exit();
	}

	mysqli_close($connect);

?>
