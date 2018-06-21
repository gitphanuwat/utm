var directionShow; // กำหนดตัวแปรสำหรับใช้งาน กับการสร้างเส้นทาง
var directionsService; // กำหนดตัวแปรสำหรับไว้เรียกใช้ข้อมูลเกี่ยวกับเส้นทาง
var map; // กำหนดตัวแปร map ไว้ด้านนอกฟังก์ชัน เพื่อให้สามารถเรียกใช้งาน จากส่วนอื่นได้
var GGM; // กำหนดตัวแปร GGM ไว้เก็บ google.maps Object จะได้เรียกใช้งานได้ง่ายขึ้น
var my_Latlng; // กำหนดตัวแปรสำหรับเก็บจุดเริ่มต้นของเส้นทางเมื่อโหลดครั้งแรก
var initialTo; // กำหนดตัวแปรสำหรับเก็บจุดปลายทาง เมื่อโหลดครั้งแรก
var searchRoute; // กำหนดตัวแปร ไว้เก็บฃื่อฟังก์ชั้น ให้สามารถใช้งานจากส่วนอื่นๆ ได้
var bb; // กำหนดตัวแปรสำหรับเก็บจุดปลายทาง เมื่อโหลดครั้งแรก
var cc; // กำหนดตัวแปร ไว้เก็บฃื่อฟังก์ชั้น ให้สามารถใช้งานจากส่วนอื่นๆ ได้
var my_Marker; // สำหรับปักหมุด

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
   initialTo=new GGM.LatLng(17.6281571, 100.0345087);
   var my_mapTypeId=GGM.MapTypeId.ROADMAP; // กำหนดรูปแบบแผนที่ที่แสดง
   // กำหนด DOM object ที่จะเอาแผนที่ไปแสดง ที่นี้คือ div id=map_canvas
   var my_DivObj=$("#map_canvas")[0];
   // กำหนด Option ของแผนที่
   var myOptions = {
     zoom: 15, // กำหนดขนาดการ zoom
     center: my_Latlng , // กำหนดจุดกึ่งกลาง จากตัวแปร my_Latlng
     mapTypeId:my_mapTypeId // กำหนดรูปแบบแผนที่ จากตัวแปร my_mapTypeId
   };
   map = new GGM.Map(my_DivObj,myOptions); // สร้างแผนที่และเก็บตัวแปรไว้ในชื่อ map

   //var markerLatLng=new GGM.LatLng(17.6281571, 100.0345087);
   my_Marker = new GGM.Marker({ // สร้างตัว marker
       position:my_Latlng,  // กำหนดไว้ที่เดียวกับจุดกึ่งกลาง
       map: map, // กำหนดว่า marker นี้ใช้กับแผนที่ชื่อ instance ว่า map
       title:'ตำแหน่งของคุณ' // แสดง title เมื่อเอาเมาส์มาอยู่เหนือ
   });


});
//var pos = new GGM.LatLng(position.coords.latitude,position.coords.longitude);



}

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
src: "http://maps.google.com/maps/api/js?v=3.0&sensor=true&language=th&key=AIzaSyBknDfGljfct2xUrrNHfIrve6EakWTNwsc&callback=initialize"
//src: "http://maps.google.com/maps/api/js?v=3.2&sensor=false&language=th&callback=initialize"
}).appendTo("body");
});
