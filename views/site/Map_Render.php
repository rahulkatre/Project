    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/jquery-1.5.1.min.js"></script>';
	<script type="text/javascript"
        src="http://maps.google.com/maps/api/js?key=AIzaSyCbHwl9FQrQbThV5fdZ-QlWWULKI3AgQUU&sensor=false">
    </script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/default.js"></script>
    <script type="text/javascript" src="<?php echo Yii::app()->baseUrl; ?>/js/jquery.timers-1.2.js"></script>
    <script  type="text/javascript">
        $(function(){
            var jsonUrl = "http://localhost/application1/index.php?r=site/GetCurrentLocation";            
            var myLocation,map,marker,lat,lon;
            lat = lon = -1;
	    time = "";
            $.ajaxSetup({cache: false});            

            $('#sidebar ').oneTime("1s",'timerOneTime',function(i)
            {
			alert('sidebar');
                $.getJSON(jsonUrl,{ action: "getCurrentLocation"}, function(data)
                    {
                        lat = data.lat;
                        lon = data.lon;
                        var text = data.lat + ' ,' + data.lon;
                        var latlng = new google.maps.LatLng(lat, lon);
                        var options = {
                          zoom: 15,                          
                          center: latlng,
                          mapTypeId: google.maps.MapTypeId.ROADMAP,
                          mapTypeControl: false,
                          zoomControl: true,
                          zoomControlOptions: {
                            style: google.maps.ZoomControlStyle.SMALL
                          },
                          streetViewControl: false
                        };
                        map = new google.maps.Map(document.getElementById('mapDiv'), options);
                        marker = new google.maps.Marker({
                           position: latlng 
                        });
                        marker.setMap(map);
                                              
                       
                    }
                );
            });

            $('#sidebar ').everyTime("5s",'timerEveryTime',function(i)
            {
                $.getJSON(jsonUrl,{ action: "getCurrentLocation"}, function(data)
                    {
                        // need to check if the record changed
						// alert(data.lat);
                        if((lat != data.lat || lon != data.lon || time != data.time) && map != null)
                        {
                            lat = data.lat;
                            lon = data.lon;	
			    time = data.time;		
                            var latlng = new google.maps.LatLng(lat, lon);
                            if (marker != null)
                                {
                                    marker.setMap(null);
                                }
                            map.setCenter(latlng);
                            marker = new google.maps.Marker({
                               position: latlng 
                            });
                            marker.setMap(map);                          
                           
                            
                        }
                    }
                );
            });             		              		
          });
    </script>

	
		
		<div id="sidebar" style=" width: 650px; height: 650px;padding: 0px 0px;">
                    <!-- <h3>Here I am right now !!</h3> -->
                    
			
                            <div id ="mapDiv"  style=" width: 650px; height: 650px;padding: 0px 0px;"></div>

		 				
		</div>		
		
	<!-- content-wrap ends-->	
	
