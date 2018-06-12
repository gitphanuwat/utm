<?php
include('config/config.php');

$token = $config['App_ID']."|".$config['App_Secret'];

if($_GET["action"]=="loadfeed"){
    $pageDetails = getFacebookId($pageID);
    echo '
    <div class="user-panel">
    <div class="pull-left image">
        <img src="'.$pageDetails->picture->data->url.'" class="img-circle"/>
    </div>
    <div class="pull-left info" style="font-size:16px">'.
        '<a href="'.$pageDetails->link.'">'.$pageDetails->name.'</a><br>'.
        $pageDetails->fan_count.'<br>'.
        $pageDetails->about.'<br>'.
        $pageDetails->website.'<br>'.
    '</div>';

    $get_data = feedExtract("",$pageDetails->id,$token);
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
    exit();
}
function getFacebookId($pageID) // This function return facebook page details by its url
{
   global $token;
   $json = file_get_contents('https://graph.facebook.com/'.$pageID.'?fields=picture,phone,fan_count,talking_about_count,name,about,link,website&access_token='.$token);
   $json = json_decode($json);
   return $json;
}

function feedExtract($url="",$pageFBID)
{
 global $token;
 $response = file_get_contents("https://graph.facebook.com/v2.6/$pageFBID/feed?fields=picture,message,story,created_time,shares,likes.limit(1).summary(true),comments.limit(1).summary(true)&access_token=".$token);
 $get_data = json_decode($response,true);
 return $get_data;
}
?>
