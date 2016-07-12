<!DOCTYPE html>
<html>
<head>
    
</head>    

<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
<script language="javascript">
var google_maps_data = [


{'name':'名稱', 'lat':'緯度', 'lng':'經度', 'desc':'說明', 'tel':'電話', 'addr':'住址'},
{'name':'名稱', 'lat':'緯度', 'lng':'經度', 'desc':'說明', 'tel':'電話', 'addr':'住址'},

];

function loadGoogleMap() {


//設定中心點
var center = new google.maps.LatLng(緯度, 經度);
var markers = [];


//設定地圖顯示圖層
var map = new google.maps.Map(document.getElementById('置入MAP網頁 DIV名稱'), {
zoom: 14,
center: center,
mapTypeId: google.maps.MapTypeId.ROADMAP
});


//加上景點
var data_count = google_maps_data.length;
for (var i = 0; i <data_count; i++) {
var mapItem = google_maps_data[i];
var latLng = new google.maps.LatLng(mapItem.lat, mapItem.lng);
var marker = new google.maps.Marker({
position: latLng,
title: mapItem.name,
animation: google.maps.Animation.DROP,
map: map
});
markers.push(marker);
var message = "<div class='markdiv'><div class='marktitle'>" + mapItem.name + "</div>" + mapItem.desc + "<br><div class='contactinfo'>電話："+mapItem.tel+"<br>住址："+mapItem.addr+"</div><a href='#' onClick='show_streeview()'><img src='http://cbk0.google.com/cbk?output=thumbnail&w=250&h=50&ll="+mapItem.lat+","+mapItem.lng+"'></a></div>"
attachMessage(i, message, latLng);
}


//加上景點infowindow
var info_window = [];
function attachMessage(index, msg, latLng) {
google.maps.event.addListener(markers[index], 'click', function(event) {
close_other_makers(index);
if (info_window[index]){
info_window[index].close();
info_window[index] = null;
return;
}
info_window[index] = new google.maps.InfoWindow({
content: msg,
maxWidth: 280
});
info_window[index].open(markers[index].getMap(), markers[index]);


//將目前景點設為中心
markers[index].getMap().panTo(latLng);


//設定該景點街景
panorama = markers[index].getMap().getStreetView();
panorama.setPosition(latLng);
panorama.setPov({
heading: 0,
zoom: 1,
pitch: 0
});
});
}


//關閉所有景點infowindow
function close_other_makers(index){
var makers_count = markers.length;
for (var i=0;i<makers_count;i++){
if ( i == index ) continue;
if (info_window[i]) info_window[i].close();
info_window[i] = null;
}
}
}


//顯示街景
function show_streeview() {
panorama.setVisible(true);
}


//啟動 GoogleMap
google.maps.event.addDomListener(window, 'load', loadGoogleMap);
</script>

<body>
    
</body>


</html>