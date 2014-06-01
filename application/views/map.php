   <script type="text/javascript"
           src="http://maps.google.com/maps/api/js?sensor=false"></script>

   <div id="map" style="width: 810px; height: 550px"></div>

   <script type="text/javascript">
      //var pos = <?php echo $lat.",".$lng; ?>;
      var myOptions = {
         zoom: 16,
         center: new google.maps.LatLng(<?php echo $lat.",".$lng; ?>),
         mapTypeId: google.maps.MapTypeId.ROADMAP
      };

      var map = new google.maps.Map(document.getElementById("map"), myOptions);
          var latlng2 = new google.maps.LatLng(<?php echo $lat.",".$lng; ?>);
          var myMarker2 = new google.maps.Marker({
                position: latlng2,
                map: map,
                title:"<?php echo $lat.",".$lng; ?>"
    });

   </script>
