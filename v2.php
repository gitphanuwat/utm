
<!DOCTYPE html>
<html>
<body>

<p>get your coordinates.</p>
<p id="demo"></p>
<p id="mapholder"></p>

<script>
var x = document.getElementById("demo");
function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        x.innerHTML = "Geolocation is not supported by this browser.";
    }
}

function showPosition(position) {
    var latlon = position.coords.latitude + "," + position.coords.longitude;

    var img_url = "https://maps.googleapis.com/maps/api/staticmap?center="+latlon+"&zoom=14&size=400x300&sensor=false&key=AIzaSyBknDfGljfct2xUrrNHfIrve6EakWTNwsc";

    document.getElementById("mapholder").innerHTML = "<img src='"+img_url+"'>";
}
</script>

</body>
</html>
