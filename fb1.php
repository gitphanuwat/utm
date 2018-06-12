<?php  // Settings
include('config/config.php');

	$token = $config['App_ID']."|".$config['App_Secret'];
    	$json = file_get_contents('https://graph.facebook.com/'.$pageID.'/feed?access_token='.$token);
    	$feed = json_decode($json,true);

			//$json = file_get_contents("https://graph.facebook.com/$pageID/feed?access_token=".$token);
			//$feed = json_decode($json,true);

			for($ic=0;$ic<count($feed['data']);$ic++)
	    {
				//echo $feed['data'][$ic]['id'].'<br>';
				//echo $feed['data'][$ic]['created_time'].'<br>';
				echo $feed['data'][$ic]['email'].'<br>';
			}
?>

<?php
/* include('config/config.php');

$token = $config['App_ID']."|".$config['App_Secret'];

		$response = file_get_contents("https://graph.facebook.com/$pageID/feed?access_token=".$token);
		$get_data = json_decode($response,true);

    for($ic=0;$ic<count($get_data['data']);$ic++)
    {
      echo '<div class="pull-left image">';
        echo "<image src='".$get_data['data'][$ic]['picture']."'>".'<br>';
      echo '</div>';
      echo '<div class="pull-left info" style="font-size:16px">';
        echo '-----------------------'.'<br>';
        echo $get_data['data'][$ic]['id'].'<br>';

        $story = $get_data['data'][$ic]['message'];
        if(!isset($story))$story = $get_data['data'][$ic]['story'];
        echo $story.'<br>';
            $date = date_create($get_data['data'][$ic]['created_time']);
            $newDate = date_format($date,'Y-m-d H:i:s');
        echo $newDate.'<br>';
        //echo $get_data['data'][$ic]['picture'].'<br>';
        echo $get_data['data'][$ic]['comments']['summary']['total_count'].'<br>';
        echo $get_data['data'][$ic]['likes']['summary']['total_count'].'<br>';
        echo $get_data['data'][$ic]['shares']['count'].'<br>';
      echo '</div>';
    }
    echo '</div>';
*/
?>
