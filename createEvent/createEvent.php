<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
    <title>Create Event</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <div class= "container">
        <div class="title"><img src = "../imgs/ucf.png"></div>
            <form action = "createEvent.php" method = "post">
                <?php include('errors.php'); ?>
                <div class = "user-details">
                    <div class="input-box">
                        <span class = "details">Event Name</span>
                        <input type="text" name="name" placeholder="Enter Event Name" required value = "<?php echo $name; ?>">
                    </div>
                    <div class="input-box">
                        <span class = "details">RSO Name (For Non-Public Events)</span>
                        <input type="text" name="rsoName" placeholder="Enter Your RSO's Name" value = "<?php echo $rsoName; ?>">
                    </div>
                    <div class="input-box">
                        <span class = "details">Category</span>
                        <input type = "text" name="category" placeholder="Enter Category" required value = "<?php echo $category; ?>">
                    </div>
                    <div class="input-box">
                        <span class = "details">Description</span>
                        <input type = "text" name="description" placeholder="Enter a Short Description" required value = "<?php echo $description; ?>">
                    </div>
                    <div class="input-box">
                        <span class = "details">Time</span>
                        <input type = "time" name="time" placeholder="Enter Event Time" required value = "<?php echo $time; ?>">
                    </div>
                    <div class="input-box">
                        <span class = "details">Date</span>
                        <input type = "date" name="date" placeholder="Enter Event Date" required value = "<?php echo $date; ?>">
                    </div>
                    <div class="input-box">
                        <span class = "details">Location</span>
                        <input type = "text" id = "searchInput" name="locationName" placeholder="Enter Event Location" required value = "<?php echo $locationName; ?>">
                        <input type = "hidden"  id = "lat" name="lat"  required value = "<?php echo $lat; ?>">
                        <input type = "hidden"  id = "long" name="long" required value = "<?php echo $long; ?>">
                    </div>
                    <div class="input-box">
                        <span id = "map" class="details" style="height: 15%; width: 439px; position: absolute"></span>
                    </div>
                    <div class="input-box" style = "margin-top: 200px;">
                        <span class = "details">Email</span>
                        <input type = "email" name="email" placeholder="Enter Contact Email" required value = "<?php echo $email; ?>">
                    </div>
                    <div class="input-box">
                        <span class = "details">Phone Number</span>
                        <input type = "text" name="phoneNum" placeholder="Enter Contact Phone Number" required value = "<?php echo $phoneNum; ?>">
                    </div>
                </div>
                <div class = "gender-details">
                <input type="radio" name="type" id="dot-1" required value = "Public">
                <input type="radio" name="type" id="dot-2" required value = "Private">
                <input type="radio" name="type" id="dot-3" required value = "RSO">
                <span class="gender-title">Event Type</span>
                <div class="category">
                    <label for="dot-1">
                        <span class="dot one"></span>
                        <span class="gender">Public</span>
                    </label>
                    <label for="dot-2">
                        <span class="dot two"></span>
                        <span class="gender">Private</span>
                    </label>
                    <label for="dot-3">
                        <span class="dot three"></span>
                        <span class="gender">RSO</span>
                    </label>
                </div>
            </div>
            <div class="button">
                <input type="submit" value="Create Event" name="create_event"> 
            </div>
           </form>
    </div>


<script>
function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: 28.6024, lng: 81.2001},
      zoom: 13
    });

    var input = document.getElementById('searchInput');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });

    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }
  
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
        marker.setIcon(({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
        }));
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);
    
        var address = '';
        if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }
    
        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, marker);

        document.getElementById("lat").value  = place.geometry.location.lat();
        document.getElementById("long").value  = place.geometry.location.lng();
      
    });
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyCd-5GPLp_7TggfgoU5LcfxNBQTM4ykw24&callback=initMap"></script>


</body>
</html>