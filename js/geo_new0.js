var x = document.getElementById("map_canvas");

function initialize() {
  if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        function(position) {
          x.innerHTML = "Latitude: " + position.coords.latitude +
          "<br>Longitude: " + position.coords.longitude;
        },
        function(error){
            alert(error.message);
        }, {
            enableHighAccuracy: true
            ,timeout : 5000
        }
      );
  } else {
      x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

$(function(){
    // โหลด สคริป google map api เมื่อเว็บโหลดเรียบร้อยแล้ว
    // ค่าตัวแปร ที่ส่งไปในไฟล์ google map api
    // v=3.2&sensor=false&language=th&callback=initialize
    //  v เวอร์ชัน่ 3.2
    //  sensor กำหนดให้สามารถแสดงตำแหน่งทำเปิดแผนที่อยู่ได้ เหมาะสำหรับมือถือ ปกติใช้ false
    //  language ภาษา th ,en เป็นต้น
    //  callback ให้เรียกใช้ฟังก์ชันแสดง แผนที่ initialize
    $("<script/>", {
      "type": "text/javascript",
      src: "http://maps.google.com/maps/api/js?v=3.0&sensor=false&language=th&key=AIzaSyBknDfGljfct2xUrrNHfIrve6EakWTNwsc&callback=initialize"
      //src: "http://maps.google.com/maps/api/js?v=3.0&sensor=true&language=th&callback=initialize"
    }).appendTo("body");
});
