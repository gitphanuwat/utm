<?php
if($_GET["action"]=="loadgeo"){
  echo '
<script type="text/javascript">
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(
          function(position) {
            document.write(position.coords.latitude);
            document.getElementById("lng").value = position.coords.longitude;
          },
          function(error){
              alert(error.message);
          }, {
              enableHighAccuracy: true
              ,timeout : 5000
          }
        );
    } else {
        $("#demo").html("Geolocation is not supported by this browser.");
    }
</script>';
}
