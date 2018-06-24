var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้
var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น
//var initialLocation;
function initialize() { // ฟังก์ชันแสดงแผนที่
    GGM=new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM
    // กำหนดจุดเริ่มต้นของแผนที่
    var my_Latlng  = new GGM.LatLng(17.6318799724915,100.09326369091798);
    var my_mapTypeId=GGM.MapTypeId.ROADMAP; // กำหนดรูปแบบแผนที่ที่แสดง
    // กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas
    var my_DivObj=$("#map_canvas")[0];
    // กำหนด Option ของแผนที่
    var myOptions = {
        zoom: 14, // กำหนดขนาดการ zoom
        center: my_Latlng , // กำหนดจุดกึ่งกลาง
        mapTypeId:my_mapTypeId // กำหนดรูปแบบแผนที่
    };
    map = new GGM.Map(my_DivObj,myOptions);// สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map
    // เรียกใช้คุณสมบัติ ระบุตำแหน่ง ของ html 5 ถ้ามี
    if(navigator.geolocation){
            navigator.geolocation.getCurrentPosition(function(position){
                var pos = new GGM.LatLng(position.coords.latitude,position.coords.longitude);
                    $("#geo_data").html('<label ><font color="green">ตำแหน่งปัจจุบันของคุณ</font></label>');
                var my_Point = pos;  // หาตำแหน่งของตัว marker เมื่อกดลากแล้วปล่อย
                map.panTo(my_Point);  // ให้แผนที่แสดงไปที่ตัว marker
                $("#lat").val(my_Point.lat());  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value
                $("#lng").val(my_Point.lng()); // เอาค่า longitude ตัว marker แสดงใน textbox id=lon_value
                $("#zm").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value
                map.setCenter(pos);
                //initialLocation = new GGM.LatLng(location.latitude, location.longitude);
                setMarker(pos);
            },function() {
                // คำสั่งทำงาน ถ้า ระบบระบุตำแหน่ง geolocation ผิดพลาด หรือไม่ทำงาน
                $("#geo_data").html('<label ><font color="red">!ไม่สามารถแสดงตำแหน่งได้</font></label>');
            });
    }else{
         // คำสั่งทำงาน ถ้า บราวเซอร์ ไม่สนับสนุน ระบุตำแหน่ง
         $("#geo_data").html('<label ><font color="red">!บราวเซอร์ไม่สนับสนุน</font></label>');
    }
    // set marker
    function setMarker(initialName) {
        var marker = new GGM.Marker({
            draggable: true,
            position: initialName,
            map: map,
            title: "คุณอยู่ที่นี่."
        });
        GGM.event.addListener(marker, 'dragend', function(event) {
            //$("#geo_data").html('lat: '+marker.getPosition().lat()+'<br />long: '+marker.getPosition().lng());
            $("#lat").val(marker.getPosition().lat());  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value
            $("#lng").val(marker.getPosition().lng()); // เอาค่า longitude ตัว marker แสดงใน textbox id=lon_value
            $("#zm").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value

        });
    }

    // กำหนด event ให้กับตัวแผนที่ เมื่อมีการเปลี่ยนแปลงการ zoom
    GGM.event.addListener(map, 'zoom_changed', function() {
        $("#zm").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value
    });



}

function getLocation() {
  var new_lat = $("#lat").val();
  var new_lng = $("#lng").val();
  $("#geo_data").html('<label ><font color="green">กำหนดตำแหน่งเอง</font></label>');

  GGM=new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM
  // กำหนดจุดเริ่มต้นของแผนที่
  var my_Latlng  = new GGM.LatLng(new_lat,new_lng);
  var my_mapTypeId=GGM.MapTypeId.ROADMAP; // กำหนดรูปแบบแผนที่ที่แสดง
  // กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas
  var my_DivObj=$("#map_canvas")[0];
  // กำหนด Option ของแผนที่
  var myOptions = {
      zoom: 14, // กำหนดขนาดการ zoom
      center: my_Latlng , // กำหนดจุดกึ่งกลาง
      mapTypeId:my_mapTypeId // กำหนดรูปแบบแผนที่
  };
  map = new GGM.Map(my_DivObj,myOptions);// สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map
  // เรียกใช้คุณสมบัติ ระบุตำแหน่ง ของ html 5 ถ้ามี
              //var pos = new GGM.LatLng(position.coords.latitude,position.coords.longitude);
              var my_Point = my_Latlng;  // หาตำแหน่งของตัว marker เมื่อกดลากแล้วปล่อย
              map.panTo(my_Point);  // ให้แผนที่แสดงไปที่ตัว marker
              $("#lat").val(my_Point.lat());  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value
              $("#lng").val(my_Point.lng()); // เอาค่า longitude ตัว marker แสดงใน textbox id=lon_value
              $("#zm").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value
              map.setCenter(my_Latlng);
              //initialLocation = new GGM.LatLng(location.latitude, location.longitude);
              setMarker(my_Latlng);
  // set marker
  function setMarker(initialName) {
      var marker = new GGM.Marker({
          draggable: true,
          position: initialName,
          map: map,
          title: "คุณอยู่ที่นี่."
      });
      GGM.event.addListener(marker, 'dragend', function(event) {
          //$("#geo_data").html('lat: '+marker.getPosition().lat()+'<br />long: '+marker.getPosition().lng());
          $("#lat").val(marker.getPosition().lat());  // เอาค่า latitude ตัว marker แสดงใน textbox id=lat_value
          $("#lng").val(marker.getPosition().lng()); // เอาค่า longitude ตัว marker แสดงใน textbox id=lon_value
          $("#zm").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value

      });
  }
  // กำหนด event ให้กับตัวแผนที่ เมื่อมีการเปลี่ยนแปลงการ zoom
  GGM.event.addListener(map, 'zoom_changed', function() {
      $("#zm").val(map.getZoom()); // เอาขนาด zoom ของแผนที่แสดงใน textbox id=zoom_value
  });

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
      src: "//maps.googleapis.com/maps/api/js?key=AIzaSyCkw9kj6fQxsFQJ89BbuRqPRZ5c_SdoDqg&callback=initialize"
      //src: "//maps.google.com/maps/api/js?v=3.2&sensor=false&language=th&callback=initialize"
    }).appendTo("body");
});
