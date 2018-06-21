
<script type="text/javascript" src="http://code.jquery.com/jquery-1.4.2.min.js"></script>
<script type="text/javascript">
var directionShow; // กำหนดตัวแปรสำหรับใช้งาน กับการสร้างเส้นทาง
var directionsService; // กำหนดตัวแปรสำหรับไว้เรียกใช้ข้อมูลเกี่ยวกับเส้นทาง
var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้
var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น
var my_Latlng; // กำหนดตัวแปรสำหรับเก็บจุดเริ่มต้นของเส้นทางเมื่อโหลดครั้งแรก
var initialTo; // กำหนดตัวแปรสำหรับเก็บจุดปลายทาง เมื่อโหลดครั้งแรก
var searchRoute; // กำหนดตัวแปร ไว้เก็บฃื่อฟังก์ชั้น ให้สามารถใช้งานจากส่วนอื่นๆ ได้
var bb; // กำหนดตัวแปรสำหรับเก็บจุดปลายทาง เมื่อโหลดครั้งแรก
var cc; // กำหนดตัวแปร ไว้เก็บฃื่อฟังก์ชั้น ให้สามารถใช้งานจากส่วนอื่นๆ ได้
function initialize() { // ฟังก์ชันแสดงแผนที่
GGM=new Object(google.maps); // เก็บตัวแปร google.maps Object ไว้ในตัวแปร GGM
directionShow=new  GGM.DirectionsRenderer({draggable:true});
directionsService = new GGM.DirectionsService();

// เรียกใช้คุณสมบัติ ระบุตำแหน่ง ของ html 5 ถ้ามี

navigator.geolocation.getCurrentPosition(function(position){

 var pos = new GGM.LatLng(position.coords.latitude,position.coords.longitude);

           // กำหนดจุดเริ่มต้นของแผนที่
   my_Latlng  = new GGM.LatLng(position.coords.latitude,position.coords.longitude);
   // กำหนดตำแหน่งปลายทาง สำหรับการโหลดครั้งแรก
   initialTo=new GGM.LatLng(7.096820000000001, 100.56960000000004);
   var my_mapTypeId=GGM.MapTypeId.ROADMAP; // กำหนดรูปแบบแผนที่ที่แสดง
   // กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas
   var my_DivObj=$("#map_canvas")[0];
   // กำหนด Option ของแผนที่
   var myOptions = {
     zoom: 13, // กำหนดขนาดการ zoom
     center: my_Latlng , // กำหนดจุดกึ่งกลาง จากตัวแปร my_Latlng
     mapTypeId:my_mapTypeId // กำหนดรูปแบบแผนที่ จากตัวแปร my_mapTypeId
   };
   map = new GGM.Map(my_DivObj,myOptions); // สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map
   directionShow.setMap(map); // กำหนดว่า จะให้มีการสร้างเส้นทางในแผนที่ที่ชื่อ map

   if(map){ // เงื่่อนไขถ้ามีการสร้างแผนที่แล้ว
      searchRoute(my_Latlng,initialTo); // ให้เรียกใช้ฟังก์ชัน สร้างเส้นทาง
   }



});
//var pos = new GGM.LatLng(position.coords.latitude,position.coords.longitude);


// กำหนด event ให้กับเส้นทาง กรณีเมื่อมีการเปลี่ยนแปลง
GGM.event.addListener(directionShow, 'directions_changed', function() {

var results=directionShow.directions; // เรียกใช้งานข้อมูลเส้นทางใหม่
// นำข้อมูลต่างๆ มาเก็บในตัวแปรไว้ใช้งาน
var addressStart=results.routes[0].legs[0].start_address; // สถานที่เริ่มต้น
var addressEnd=results.routes[0].legs[0].end_address;// สถานที่ปลายทาง
var distanceText=results.routes[0].legs[0].distance.text; // ระยะทางข้อความ
var distanceVal=results.routes[0].legs[0].distance.value;// ระยะทางตัวเลข
var durationText=results.routes[0].legs[0].duration.text; // ระยะเวลาข้อความ
var durationVal=results.routes[0].legs[0].duration.value; // ระยะเวลาตัวเลข
//เมื่อมีการเลื่อนหมุด
 var startlatlng = results.routes[0].legs[0].start_location;
 var startlat =  results.routes[0].legs[0].start_location.lat();
 var startlng =  results.routes[0].legs[0].start_location.lng();
 var endlatlng = results.routes[0].legs[0].end_location;
 var endlat =  results.routes[0].legs[0].end_location.lat();
 var endlng =  results.routes[0].legs[0].end_location.lng();
//เพิ่มข้อมูล ถ้ามีการเลื่อนหมุด
 $("#a").val(startlatlng);
 $("#a1").val(startlat);
         $("#a2").val(startlng);
 $("#b").val(endlatlng);
         $("#b1").val(endlat);
         $("#b2").val(endlng);

// นำค่าจากตัวแปรไปแสดงใน textbox ที่ต้องการ



});

}
$(function(){
// ส่วนของฟังก์ชัน สำหรับการสร้างเส้นทาง
searchRoute=function(FromPlace,ToPlace){ // ฟังก์ชัน สำหรับการสร้างเส้นทาง
if(!FromPlace && !ToPlace){ // ถ้าไม่ได้ส่งค่าเริ่มต้นมา ให้ใฃ้ค่าจากการค้นหา
var FromPlace=$("#namePlace").val();// รับค่าชื่อสถานที่เริ่มต้น
var ToPlace=$("#toPlace").val(); // รับค่าชื่อสถานที่ปลายทาง
}
// กำหนด option สำหรับส่งค่าไปให้ google ค้นหาข้อมูล
var request={
origin:FromPlace, // สถานที่เริ่มต้น
destination:ToPlace, // สถานที่ปลายทาง
travelMode: GGM.DirectionsTravelMode.DRIVING // กรณีการเดินทางโดยรถยนต์
};
// ส่งคำร้องขอ จะคืนค่ามาเป็นสถานะ และผลลัพธ์
directionsService.route(request, function(results, status){
if(status==GGM.DirectionsStatus.OK){ // ถ้าสามารถค้นหา และสร้างเส้นทางได้
 directionShow.setDirections(results); // สร้างเส้นทางจากผลลัพธ์
 // นำข้อมูลต่างๆ มาเก็บในตัวแปรไว้ใช้งาน
 var addressStart=results.routes[0].legs[0].start_address; // สถานที่เริ่มต้น
 var addressEnd=results.routes[0].legs[0].end_address;// สถานที่ปลายทาง

 var locaStart=results.routes[0].legs[0].start_location; // สถานที่เริ่มต้น
 var locaEnd=results.routes[0].legs[0].end_location;

 var distanceText=results.routes[0].legs[0].distance.text; // ระยะทางข้อความ
 var distanceVal=results.routes[0].legs[0].distance.value;// ระยะทางตัวเลข
 var durationText=results.routes[0].legs[0].duration.text; // ระยะเวลาข้อความ
 var durationVal=results.routes[0].legs[0].duration.value; // ระยะเวลาตัวเลข
 // นำค่าจากตัวแปรไปแสดงใน textbox ที่ต้องการ
 $("#namePlaceGet").val(addressStart);
 $("#toPlaceGet").val(addressEnd);
 $("#a").val(locaStart);
 $("#a1").val(locaStart.lat());
         $("#a2").val(locaStart.lng());
 $("#b").val(locaEnd);
         $("#b1").val(locaEnd.lat());
         $("#b2").val(locaEnd.lng());

 $("#distance_text").val(distanceText);
 $("#distance_value").val(distanceVal);
 $("#duration_text").val(durationText);
 $("#duration_value").val(durationVal);
 // ส่วนการกำหนดค่านี้ จะกำหนดไว้ที่ event direction changed ที่เดียวเลย ก็ได้
}else{
 // กรณีไม่พบเส้นทาง หรือไม่สามารถสร้างเส้นทางได้
 // โค้ดตามต้องการ ในทีนี้ ปล่อยว่าง
}
});
}


});
$(function(){
// โหลด สคริป google map api เมื่อเว็บโหลดเรียบร้อยแล้ว
// ค่าตัวแปร ที่ส่งไปในไฟล์ google map api
// v=3.2&sensor=false&language=th&callback=initialize
//	v เวอร์ชัน่ 3.2
//	sensor กำหนดให้สามารถแสดงตำแหน่งทำเปิดแผนที่อยู่ได้ เหมาะสำหรับมือถือ ปกติใช้ false
//	language ภาษา th ,en เป็นต้น
//	callback ให้เรียกใช้ฟังก์ชันแสดง แผนที่ initialize
$("<script/>", {
"type": "text/javascript",
src: "http://maps.google.com/maps/api/js?v=3.2&sensor=false&language=th&callback=initialize"
}).appendTo("body");
});
</script>
