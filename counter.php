<?php

	session_start();

	//include('counter/counter.php');
	include('config/config.php');


	if($_GET["action"]=="add"){

		$today = date("Y-m-d");
		$cookie_name = 'HIT_COUNTER_' . $today;

		$sql="select * from tb_counter where day = '$today'";
		$result=mysqli_query($connect,$sql);
		$nRow=mysqli_num_rows($result);

		if($nRow==0){
			$sql="insert into tb_counter(`day` , total) ";
			$sql=$sql . " values('$today' , 1)";
		}else{
			if(!isset($_COOKIE[$cookie_name])) {
				$sql="select total from tb_counter where day = '$today'";
				$result=mysqli_query($connect,$sql);
				$row=mysqli_fetch_array($result);
				$new_total_hits=$row[0]+1;
				$sql="update tb_counter set total=".$new_total_hits;
				$sql=$sql . " where day = '$today'";
			}
		}
		$result1=mysqli_query($connect,$sql);

		// Set a cookie to prevent user from counting again during this session
			$cookie_name = 'HIT_COUNTER_' . $today;
			setcookie($cookie_name, 'TRUE', time() + 360);


		exit();
	}






	if($_GET["action"]=="getChart"){
		//$connect=mysqli_connect($host,$hostuser,$hostpass,$database);
		//mysqli_query("SET NAMES UTF8");
		date_default_timezone_set('UTC');

		echo "<div class='chart' id='line-chart' style='height: 275px;''></div> ";

		$nowdate = date("Y-m-d");
		$date=date("Y-m-d",strtotime("-6 days",strtotime($nowdate)));
		$end_date = date("Y-m-d");

		echo "<script type='text/javascript'>";
			echo "var line = new Morris.Line({";
				echo "element: 'line-chart',";
				echo "resize: true,";
				echo "data: [";
				while (strtotime($date) <= strtotime($end_date)) {
					$sql="select total from tb_counter where `day`='$date' ";
					$result=mysqli_query($connect,$sql);
					$nRow=mysqli_num_rows($result);
					if($nRow !=0){
						$row=mysqli_fetch_array($result);
						$qUser=$row[0];
					}else{
						$qUser=0;
					}
					echo "{y: '$date', item1: $qUser},";
					$date = date ("Y-m-d", strtotime("+1 day", strtotime($date)));
				}
				echo "],";
				echo "xkey: 'y',";
				echo "ykeys: ['item1'],";
				echo "labels: ['Item 1'],";
				echo "lineColors: ['#efefef'],";
				echo "lineWidth: 2,";
				echo "hideHover: 'auto',";
				echo "gridTextColor: '#fff',";
				echo "gridStrokeWidth: 0.4,";
				echo "pointSize: 4,";
				echo "pointStrokeColors: ['#efefef'],";
				echo "gridLineColor: '#efefef',";
				echo "gridTextFamily: 'Open Sans',";
				echo "gridTextSize: 10";
			echo "});";
		echo "</script>";
		exit();
	}

?>
