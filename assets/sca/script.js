 
   var storeArray = new Array(
    ["23.589242", "58.412586", "<p style='background:blue;color:white;padding:10px'> inner html in the page</p>"],["23.628695", "58.266483","ST2"],["23.622155", "58.488977","ST3"],
    ["23.239333", "58.312586", "ST4"],["23.151933", "58.312586", "ST5"],["23.609027", "58.538858", "ST6"],["23.608280", "58.538343", "ST7"],["23.607789", "58.538021", "ST8"],["23.606412", "58.537399", "ST9"]);

var myOptions = {
 center: new google.maps.LatLng(storeArray[0][0], storeArray[0][1]),
 zoom: 9,
 mapTypeId: google.maps.MapTypeId.ROADMAP
 };

 var map = new google.maps.Map(document.getElementById("map-canvas"), myOptions); 

 function testmap() {
     for (i = 0; i < storeArray.length; i++) {  
           marker = new google.maps.Marker({
           position: new google.maps.LatLng(storeArray[i][0], storeArray[i][1]),
           map: map
        });
        
       
   var infowindow = new google.maps.InfoWindow({
       content: storeArray[i][2]
       
   });
   infowindow.open(map, marker); 
 
     }
       
 }
 google.maps.event.addDomListener(window, 'load', testmap);


$('#myModal').on('shown.bs.modal', function () {
 var mapNode = map.getDiv();
     $('#map-canvas-modal').append(mapNode);
})
