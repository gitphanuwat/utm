<?php
include('config/config.php');

$token = $config['App_ID']."|".$config['App_Secret']; // making app token by its id and secret

$pageDetails = getFacebookId($pageID); // Get page details like name of page, page ID, Likes, people talking about that page.
  echo $pageDetails->id.'<br>';
  echo $pageDetails->fan_count.'<br>';
  echo $pageDetails->talking_about_count.'<br>';
  echo $pageDetails->name.'<br>';
  echo $pageDetails->about.'<br>';
  echo $pageDetails->link.'<br>';
  echo $pageDetails->phone.'<br>';
  echo $pageDetails->website.'<br>';
  echo $pageDetails->picture->data->url.'<br>';
  echo "<image src='".$pageDetails->picture->data->url."'>".'<br>';

$get_data = feedExtract("",$pageDetails->id,$token);
    for($ic=0;$ic<count($get_data['data']);$ic++)
    {
      echo '-----------------------'.'<br>';
      echo $get_data['data'][$ic]['id'].'<br>';

      $story = $get_data['data'][$ic]['message'];
      if(!isset($story))$story = $get_data['data'][$ic]['story'];

      echo $story.'<br>';
          $date = date_create($get_data['data'][$ic]['created_time']);
          $newDate = date_format($date,'Y-m-d H:i:s');
      echo $newDate.'<br>';
      echo $get_data['data'][$ic]['picture'].'<br>';
      echo "<image src='".$get_data['data'][$ic]['picture']."'>".'<br>';
      echo $get_data['data'][$ic]['comments']['summary']['total_count'].'<br>';
      echo $get_data['data'][$ic]['likes']['summary']['total_count'].'<br>';
      echo $get_data['data'][$ic]['shares']['count'].'<br>';
    }

function getFacebookId($pageID) // This function return facebook page details by its url
{
   global $token;
   $json = file_get_contents('https://graph.facebook.com/'.$pageID.'?fields=picture,phone,fan_count,talking_about_count,name,about,link,website&access_token='.$token);
   $json = json_decode($json);
   return $json;
}

 //header("Location: view.php");

function feedExtract($url="",$pageFBID)
{
 global $token; // database connection and tocken required
 // first time fetch page posts
 $response = file_get_contents("https://graph.facebook.com/v2.6/$pageFBID/feed?fields=picture,message,story,created_time,shares,likes.limit(1).summary(true),comments.limit(1).summary(true)&access_token=".$token);
 // decode json data to array
 $get_data = json_decode($response,true);
 return $get_data;
}
?>
