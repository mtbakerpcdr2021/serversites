<!DOCTYPE html>
<html>
<head>
	<title>Where are the UFOs</title>
</head>
<body  class="index-page sidebar-collapse">
	<!-- navbar -->
	<?php include "navbar.php"; ?>
	<div class="wrapper">


		<div class="page-header page-header-small">
	      <div class="page-header-image" data-parallax="true" style="background-image:url('./assets/img/6.jpg');">
	      </div>
	      <div class="container">
	        <div class="content-center2">
	          <!-- <img class="n-logo" src="./assets/img/now-logo.png" alt="LOGO"> -->
	          <h1 class="h1-seo">Find Other UFOs</h1>
	          <h3>If your town has a map marker in it, there are currently FTS UFOS running around trying to help spread the word of crpytocurrency mass adoption. If not we need someone to help ASAP!</h3>
	        </div>
	        
	      </div>
	    </div>
	    <div class="container" style="margin-top: 30px;">
	        <div class="row">
            <!-- <input id="pac-input"  type="text" placeholder="Search Box" style=""> -->
            <input id="pac-input" type="text" placeholder="Search Box" autocomplete="off" style="margin-top: 15px; height: 30px;">
	          <div class="col-md-12 ml-auto mr-auto text-center" id="map" style="height: 500px;">
             


            </div>

              
	        </div>
          <div class="row" style="justify-content: center;">
            <div class="send-button">
                <a href="becomeufo.php" class="btn btn-primary btn-round btn-block btn-lg">Become an FTS UFO</a>
              </div>
          </div>

    	</div>

      <script type="text/javascript">
        var locations = [];
      </script>
    <?php 
        include 'connection.php';
        $con = connecttoDB();
        if(!$con){
          ?>
          <script type="text/javascript">
            swal("Database Error!", "Database not connected!", "error");
          </script>
          <?php 
          return;
        }
        $query = mysqli_query($con, "SELECT * FROM ufolocations");

        while($locations = mysqli_fetch_assoc($query)){
            $name=$locations['ufoname'];
            $link=$locations['ufolink'];
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
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCggZLNULJITn-vnGukYQXrcFxlJuNO8MY&libraries=places"></script>
    <script type="text/javascript">

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
        request1.send();
       }
      request.send();
    function showmap(lat,long){

      var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 12,
        center: new google.maps.LatLng(lat, long),
        mapTypeId: google.maps.MapTypeId.ROADMAP
      });

    var infowindow = new google.maps.InfoWindow();

    var marker, i;

    for (i = 0; i < locations.length; i++) { 

      var iconUrl= "assets/img/black.png";
      if(locations[i][4]==1){
        iconUrl= "assets/img/black.png";
      }else if(locations[i][4]==2){
        iconUrl= "assets/img/yellow.png";
      }else if(locations[i][4]==3){
        iconUrl= "assets/img/green.png";
      }else if(locations[i][4]==4){
        iconUrl= "assets/img/pink.png";
      }else if(locations[i][4]==5){
        iconUrl= "assets/img/blue.png";
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
    <?php include "footer.php"; ?>
	</div>
<!-- wraper div main -->




</body>
</html>
