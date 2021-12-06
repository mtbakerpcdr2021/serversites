
// var locations = [
//   ['google', 32.162369, 74.183083],
//   ['Gmail', 32.163327, 74.187640],
//   ['youtube', 32.169539, 74.186355]

// ];
// var links=["https://www.google.com/", "https://mail.google.com/", "https://www.youtube.com/"];

// var request = new XMLHttpRequest();
//         request.open('GET', 'https://api.ipify.org?format=json', true)
//         request.onload = function () {
//               var data = JSON.parse(this.response);
//               // console.log(data.ip); 
//               var ip='http://api.ipstack.com/'+data.ip+'?access_key=2ac4d1c23d53db8520bc13f11e738efa&format=1';
//                 var request1 = new XMLHttpRequest();
//                 request1.open('GET', ip, true)
//                 request1.onload = function () {
//                 var data1 = JSON.parse(this.response);           
//                 showmap(data1.latitude,data1.longitude);
//                 // alert(data.ip);
//                 }
//                 request1.send()
//           }
//         request.send()
// function showmap(lat,long){
//     var map = new google.maps.Map(document.getElementById('map'), {
//       zoom: 12,
//       center: new google.maps.LatLng(lat, long),
//       mapTypeId: google.maps.MapTypeId.ROADMAP
//     });

//     var infowindow = new google.maps.InfoWindow();

//     var marker, i;

//     for (i = 0; i < locations.length; i++) {  
//       marker = new google.maps.Marker({
//         position: new google.maps.LatLng(locations[i][1], locations[i][2]),
//         // label:"marker",
//         map: map
//       });

//       google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
//         return function() {
//           infowindow.setContent(locations[i][0]);
//           infowindow.open(map, marker);
//         }
//       })(marker, i));

//         marker.addListener('mouseout', function() {
//             infowindow.close();
//         });

//          google.maps.event.addListener(marker, 'click', (function(marker, i) {
//         return function() {
//           // alert(links[i]);
//           window.open(links[i], '_blank');
//         }
//       })(marker, i));

//     }
//     ///
//     // Create the search box and link it to the UI element.
//         var input = document.getElementById('pac-input');
//         var searchBox = new google.maps.places.SearchBox(input);
//         map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

//         // Bias the SearchBox results towards current map's viewport.
//         map.addListener('bounds_changed', function() {
//           searchBox.setBounds(map.getBounds());
//         });

//         var markers = [];
//         // Listen for the event fired when the user selects a prediction and retrieve
//         // more details for that place.
//         searchBox.addListener('places_changed', function() {
//           var places = searchBox.getPlaces();

//           if (places.length == 0) {

//             return;

//           }
//           // Clear out the old markers.
//           markers.forEach(function(marker) {
//             marker.setMap(null);
//           });
//           markers = [];

//           // For each place, get the icon, name and location.
//           var bounds = new google.maps.LatLngBounds();
//           places.forEach(function(place) {
//             if (!place.geometry) {
//               console.log("Returned place contains no geometry");
//               return;
//             }
//             var icon = {
//               url: place.icon,
//               size: new google.maps.Size(71, 71),
//               origin: new google.maps.Point(0, 0),
//               anchor: new google.maps.Point(17, 34),
//               scaledSize: new google.maps.Size(25, 25)
//             };

//             // Create a marker for each place.
//             markers.push(new google.maps.Marker({
//               map: map,
//               icon: icon,
//               title: place.name,
//               position: place.geometry.location
//             }));

//             if (place.geometry.viewport) {
//               // Only geocodes have viewport.
//               bounds.union(place.geometry.viewport);
//             } else {
//               bounds.extend(place.geometry.location);
//             }
//           });
//           map.fitBounds(bounds);
//         });
      


// }


 
//        // $.get("https://ipinfo.io", function(response) {
//        //       console.log(response.loc, response.country);
//        //       loc=response.loc;
//        //  }, "jsonp")


