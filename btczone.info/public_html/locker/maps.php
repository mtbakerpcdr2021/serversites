<!DOCTYPE html>
<html  >
<head>
  <!-- Site made with Mobirise Website Builder v4.10.1, https://mobirise.com -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="generator" content="Mobirise v4.10.1, mobirise.com">
  <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1">
  <link rel="shortcut icon" href="assets/images/logoloadingpage-128x170.png" type="image/x-icon">
  <meta name="description" content="">
  
  <title>Maps</title>
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
  <section class="cid-rv8DkrScJ1" id="features1-c">

    

    
    <div class="container">
        
        

        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-3">
                <div class="row-item">
                    <div class="card-img pb-3 align-center">
                        <a href="submit.html"><span class="mbr-iconfont mbri-edit"></span></a>
                    </div>
                    <h4 class="mbr-fonts-style mbr-card-title align-center pb-2 display-5"><a href="submit.html" class="text-info">SUBMIT BUSINESS</a></h4>
        
                    
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="row-item">
                    <div class="card-img pb-3 align-left">
                        <a href="maps.php"><span class="mbr-iconfont fa-globe fa"></span></a>
                    </div>
                    <h4 class="mbr-fonts-style mbr-card-title align-center pb-2 display-5"><a href="maps.php" class="text-info">STORE</a><br><a href="maps.php" class="text-info">MAPS</a></h4>
        
                    
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="row-item">
                    <div class="card-img pb-3 align-left">
                        <a href="online.php"><span class="mbr-iconfont mbri-shopping-cart"></span></a>
                    </div>
                    <h4 class="mbr-fonts-style mbr-card-title align-center pb-2 display-5"><a href="online.php" class="text-info">ONLINE</a><br><a href="online.php" class="text-info">BUSINESSES</a></h4>
                    
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="row-item">
                    <div class="card-img pb-3 align-left">
                        <a href="contact.html"><span class="mbr-iconfont mdi-communication-email"></span></a>
                    </div>
                    <h4 class="mbr-fonts-style mbr-card-title align-center pb-2 display-5"><a href="contact.html">CONTACT</a><br><a href="contact.html">PROJECT FTS</a></h4>
        
                 
                    
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
    
      <h3>FTSMaps.com (Don't see your business? Submit free!)</h3>
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
<body><html>
<head>
	<title>Ads</title>
</head>
<body>
	<div class="row" style="width: 100%;">
			<div style="width: 300px; margin:auto; ">
				<p style="color: black;"> Paid Advertising</p>
				<!-- don't change anything is that below line -->
				<a href="#" target="_blank" id="adlink"><img src="images/1.png" class="img-fluid" id="adImg"></a>
			</div>
		</div>

		<!-- the script below shows the ads randomly -->
		<script type="text/javascript">
			//ads/images should be named as 1,2,3,4,5 and must be png files
			//enter this number which you've maximum number of ads
			var maxImgNumber=4;


			var img=getRandomArbitrary(1,maxImgNumber);

			//if you put images in some other named folder replace "images" in below line with that folder name
			var src="images/"+img+".png"; 


			//links, put each link respectively, like for 1.png, link at first place, for second ad put link at second place
			var links = ['https://projectfts.org/',  // for 1.png
						'https://www.wwwforcrypto.com/',  // for 2.png 
						'https://cypherwarrior.com/', //for 3.png
						'https://www.notebc.com/'];		//for 4.png
						//'https://www.projectfts.org/'];	//for 5.png and so on



			document.getElementById("adImg").src=src; //setting image
			document.getElementById("adlink").href=links[img-1]; //setting image link, respectively


			//returning a random number within range
			function getRandomArbitrary(min, max) {
				max=max+1;
			  return Math.floor(Math.random() * (max - min) + min);
			}
		</script>
</body>
</html>
  <section class="footer1 cid-rv8Dj9cBJC" id="footer1-b">
</body?
    

    

    <div class="container">
        <div class="media-container-row content text-white">
            <div class="col-12 col-lg-4 col-md-6">
                <div class="media-wrap">
                    <a href="https://projectfts.org/">
                        <img src="assets/images/logo-fair-trade-system-page-1-192x255.jpg" alt="Mobirise" title="">
                    </a>
                </div>
                
            </div>
            <div class="col-12 col-lg-3 mbr-fonts-style mbr-black col-lg-4 col-md-6">
                <h5 class="pb-3 column-title display-5"><a href="upgrade.html" class="text-info">
                    ADVERTISE WITH US</a></h5>
                <div class="contact-list display-7">
                    
                    
                <div class="list-item">
                        
                        <p>© Copyright 2019 Mt. Baker PC Dr. 
<br>&amp; Project Fair Trade System- All Rights Reserved</p>
                    </div><div class="list-item">
                        
                        <p></p>
                    </div></div>
            </div>
            
            
        </div>

        
    </div>
</section>


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
