<?php  
    $lat = $_GET['lat'];
    $long = $_GET['long'];
    echo'
    <h1>Customer Location</h1>

    <div id="googleMap" style="width:50%;height:400px;"></div>
    
    <script>
      
    function myMap() {
    var mapProp= {
      center:{lat: '.$lat.',lng: '.$long.'},
      zoom:15,
    }
    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
    
    var marker = new google.maps.Marker({
      position: {lat: '.$lat.',lng: '.$long.'},
      map: map
    })
    }
    </script>
    <!-- <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY&callback=myMap"></script> -->
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC0eEakih997Vq7AJq5wFsZZGMUfmnQxV0&callback=myMap"></script>';

?>