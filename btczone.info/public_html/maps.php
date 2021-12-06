<!DOCTYPE html>
<html>
<head>
  <link rel="shortcut icon" href="assets/images/logoloadingpage-128x170.png" type="image/x-icon">
 
  
  <center><H2>FTS Crypto Map</h2></center>
  <link rel="stylesheet" href="assets/bootstrap-material-design-font/css/material.css">
  <link rel="stylesheet" href="assets/web/assets/mobirise-icons/mobirise-icons.css">
  <link rel="stylesheet" href="assets/font-awesome/css/font-awesome.css">
  <link rel="stylesheet" href="assets/tether/tether.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-grid.min.css">
  <link rel="stylesheet" href="assets/bootstrap/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" href="assets/soundcloud-plugin/style.css">
  <link rel="stylesheet" href="assets/socicon/css/styles.css">
  <link rel="stylesheet" href="assets/theme/css/style.css">
  <link rel="stylesheet" href="assets/mobirise/css/mbr-additional.css" type="text/css">
  
  
  
</head>
<body>
  
                </div>
            </div>
        </div>
    </div>
</section>
<html>
  <head>
    <meta charset="utf-8">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

    <link rel="stylesheet" type="text/css" href="css/map.css">
  </head>
  <body>
    <script type="text/javascript">
      var locations = [];
    </script>
    <?php 
        include 'map_connection.php';
        $con = connecttoDB();
        if(!$con){
          ?>
          <script type="text/javascript">
            swal("Database Error!", "Database not connected!", "error");
          </script>
          <?php 
          return;
        }
        $query = mysqli_query($con, "SELECT * FROM locations");

        while($locations = mysqli_fetch_assoc($query)){
            $name=$locations['Pname'];
            $link=$locations['Plink'];
            $lat=$locations['lat'];
            $longi=$locations['longi'];
            $color=$locations['color'];

            ?>
            <script type="text/javascript"> 
              
              locations.push(["<?php echo $name; ?>","<?php echo $link; ?>","<?php echo $lat; ?>","<?php echo $longi; ?>","<?php echo $color; ?>"]);


          </script>

            <?php 
        }        
      
     ?>
     <!-- <script type="text/javascript">
       for (var i = 0; i < locations.length; i++) {
        for(var j=0;j<locations[i].length;j++){
              console.log(locations[i][j]);
            }
        }
     </script> -->
    
      <center><a href="https://ftsmaps.com/submit.php">FTSMaps.com (Don't see your business? Submit free!)</a></center>
      <input id="pac-input" class="form-control" type="text" placeholder="Search Box">

      <div id="map"></div>
    
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCggZLNULJITn-vnGukYQXrcFxlJuNO8MY&libraries=places"></script>
    <!-- <script type="text/javascript" src="js/map.js"></script> -->

    <!-- whole map working in that script below -->

<script type="text/javascript">
  
// var locations = [
//   ['google', 32.162369, 74.183083],
//   ['Gmail', 32.163327, 74.187640],
//   ['youtube', 32.169539, 74.186355]

// ];
// var links=["https://www.google.com/", "https://mail.google.com/", "https://www.youtube.com/"];

var request = new XMLHttpRequest();
        request.open('GET', 'https://api.ipify.org?format=json', true)
        request.onload = function () {
              var data = JSON.parse(this.response);
              // console.log(data.ip); 
              var ip='https://api.ipstack.com/'+data.ip+'?access_key=dca51e72e461343d33c1dc8bdb171a57&format=1';
                var request1 = new XMLHttpRequest();
                request1.open('GET', ip, true)
                request1.onload = function () {
                var data1 = JSON.parse(this.response);           
                showmap(data1.latitude,data1.longitude);
                // alert(data.ip);
                }
                request1.send()
          }
        request.send()
function showmap(lat,long){
    var map = new google.maps.Map(document.getElementById('map'), {
      zoom: 12,
      center: new google.maps.LatLng(lat, long),
      mapTypeId: google.maps.MapTypeId.ROADMAP
    });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) { 
      var iconUrl= "images/black.png";
      if(locations[i][4]==1){
        iconUrl= "images/black.png";
      }else if(locations[i][4]==2){
        iconUrl= "images/yellow.png";
      }else if(locations[i][4]==3){
        iconUrl= "images/green.png";
      }else if(locations[i][4]==4){
        iconUrl= "images/pink.png";
      }else if(locations[i][4]==5){
        iconUrl= "images/blue.png";
      }
      
      marker = new google.maps.Marker({
        position: new google.maps.LatLng(locations[i][2], locations[i][3]),
        // label:"marker",
         icon: {
              url: iconUrl
        },
        map: map

      });

      google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
        return function() {
          infowindow.setContent(locations[i][0]);
          infowindow.open(map, marker);
        }
      })(marker, i));

        marker.addListener('mouseout', function() {
            infowindow.close();
        });

         google.maps.event.addListener(marker, 'click', (function(marker, i) {
        return function() {
          // alert(links[i]);
          window.open(locations[i][1], '_blank');
        }
      })(marker, i));

    }
    ///
    // Create the search box and link it to the UI element.
        var input = document.getElementById('pac-input');
        var searchBox = new google.maps.places.SearchBox(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

        // Bias the SearchBox results towards current map's viewport.
        map.addListener('bounds_changed', function() {
          searchBox.setBounds(map.getBounds());
        });

        var markers = [];
        // Listen for the event fired when the user selects a prediction and retrieve
        // more details for that place.
        searchBox.addListener('places_changed', function() {
          var places = searchBox.getPlaces();

          if (places.length == 0) {

            return;

          }
          // Clear out the old markers.
          markers.forEach(function(marker) {
            marker.setMap(null);
          });
          markers = [];

          // For each place, get the icon, name and location.
          var bounds = new google.maps.LatLngBounds();
          places.forEach(function(place) {
            if (!place.geometry) {
              console.log("Returned place contains no geometry");
              return;
            }
            var icon = {
              url: place.icon,
              size: new google.maps.Size(71, 71),
              origin: new google.maps.Point(0, 0),
              anchor: new google.maps.Point(17, 34),
              scaledSize: new google.maps.Size(25, 25)
            };

            // Create a marker for each place.
            markers.push(new google.maps.Marker({
              map: map,
              icon: icon,
              title: place.name,
              position: place.geometry.location
            }));

            if (place.geometry.viewport) {
              // Only geocodes have viewport.
              bounds.union(place.geometry.viewport);
            } else {
              bounds.extend(place.geometry.location);
            }
          });
          map.fitBounds(bounds);
        });
      


}


			
		</script>
</body>
</html>
  <center><section class="footer1 cid-rv8Dj9cBJC" id="footer1-b">
<center>
<p>© Copyright 2019 Mt. Baker PC Dr. 
</br> Project Fair Trade System- All Rights Reserved</p>
                    <div class="list-item"></div></center>
    

    

    <div class="container">
        <div class="media-container-row content text-white">
            <div class="col-12 col-lg-4 col-md-6">
                <div class="media-wrap">
                   
            </div>    
            </div>
            <div class="col-12 col-lg-3 mbr-fonts-style mbr-black col-lg-4 col-md-6">
                               <div class="contact-list display-7">
                    
                    
                <div class="list-item">
                        
                        </div>
                        
                       
                    </div>
            </div>
            
            
        </div>

        
    </div>
</section></center>


  <script src="assets/web/assets/jquery/jquery.min.js"></script>
  <script src="assets/popper/popper.min.js"></script>
  <script src="assets/tether/tether.min.js"></script>
  <script src="assets/bootstrap/js/bootstrap.min.js"></script>
  <script src="assets/smoothscroll/smooth-scroll.js"></script>
  <script src="assets/theme/js/script.js"></script>
  
  
</body>
</html>
<!-- AIzaSyCzYVaINfhglMqysdRnmAW9RedRCQvpaVc -->
<!-- 2ac4d1c23d53db8520bc13f11e738efa  api for ipstack-->

<!-- AIzaSyCggZLNULJITn-vnGukYQXrcFxlJuNO8MY  orignal api-->
