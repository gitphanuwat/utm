<?php
include('config/config.php');
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  <div id="map" style="height: 500px;"></div>


  <?php
      $q="SELECT * FROM tb_plot";
      $qr=mysqli_query($connect,$q);
      while($rs=mysqli_fetch_array($qr)){
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

  <script type="text/javascript">
    function initMap() {
        var locations = [{lat: 17.6339275, lng: 100.1019697, codeplot:'uttaradit'},{lat: 17.833325, lng: 100.9597057, codeplot:'huaymun'}];
        var uluru = {lat: 17.620664, lng: 100.097566};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 8,
          center: uluru
        });
        $.each( locations, function( index, value ){
            var utm = {lat: value.lat, lng: value.lng};
            var contentString = value.codeplot;
            var infowindow = new google.maps.InfoWindow({
              content: contentString,
              maxWidth: 200
            });
            var marker = new google.maps.Marker({
              position: utm,
              map: map,
              title: value.codeplot
            });
            marker.addListener('click', function() {
              infowindow.open(map, marker);
            });
        });//foreach
    }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBknDfGljfct2xUrrNHfIrve6EakWTNwsc&callback=initMap">
    </script>

  </body>
</html>
