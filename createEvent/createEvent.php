
<!DOCTYPE html>
<html>
<head>
    <title>Create Event</title>
</head>
<body>


<?php include('../nav.php'); include('server.php');?>
       
<form action = "createEvent.php" method = "post">
    <div class="d-flex align-items-center min-vh-100" style="margin-bottom:50px;">
        <div class="container gy-5 border bg-warning rounded" style="width: 50%;">
            <div class="row justify-content-center">
                <?php include('errors.php'); ?>

                    <div class = "col-12 text-center mt-5 mb-5" ><img src = "../imgs/logo.png" width="300" height = "200"></div>
                    <div class="w-100"></div>

                    <label for="name" class="col-lg-1 col-2 label text-center">Event Name</label>
                    <input class="col-4 text-center input-field" id="name"  type="text" name="name" placeholder="Enter Event Name" required value = "<?php echo $name; ?>">
                    <div class="w-100"></div>

                    
                    <label for="rsoName" class="col-lg-1 col-2 label text-center">RSO Name</label>
                    <input class="col-4 text-center input-field" id="rsoName"  type="text" name="rsoName" placeholder="Enter Your RSO's Name (Optional)" value = "<?php echo $rsoName; ?>">
                    <div class="w-100"></div>

                    <label for="category" class="col-lg-1 col-2 label text-center">Category</label>
                    <input class="col-4 text-center input-field" id="category" type = "text" name="category" placeholder="Enter Category" required value = "<?php echo $category; ?>">
                    <div class="w-100"></div>

                    <label for="description" class="col-lg-1 col-2 label text-center">Description</label>
                    <input class="col-4 text-center input-field" id="description" type = "text" name="description" placeholder="Enter a Short Description" required value = "<?php echo $description; ?>">
                    <div class="w-100"></div>

                    <label for="time" class="col-lg-1 col-2 label text-center">Time</label>
                    <input class="col-4 text-center input-field" id="time" type = "time" name="time" placeholder="Enter Event Time" required value = "<?php echo $time; ?>">
                    <div class="w-100"></div>

                    <label for="date" class="col-lg-1 col-2 label text-center">Date</label>
                    <input class="col-4 text-center input-field" id="date" type = "date" name="date" placeholder="Enter Event Date" required value = "<?php echo $date; ?>">
                    <div class="w-100"></div>


                    <label for="searchInput" class="col-lg-1 col-2 label text-center">Location</label>
                    <input class="col-4 text-center input-field" id = "searchInput" type = "text" name="locationName" placeholder="Enter Event Location" required value = "<?php echo $locationName; ?>">
                    <input type = "hidden"  id = "lat" name="lat"  required value = "<?php echo $lat; ?>">
                    <input type = "hidden"  id = "long" name="long" required value = "<?php echo $long; ?>">
                    <div class="w-100"></div>

                    <div id = "map" class="col-12 text-center"></div>
                    <div class="w-100"></div>

                    <label for="email" class="col-lg-1 col-2 label text-center">Email</label>
                    <input class="col-4 text-center input-field" id = "email" type = "email" name="email" placeholder="Enter Contact Email" required value = "<?php echo $email; ?>">
                    <div class="w-100"></div>

                    <label for="phoneNum" class="col-lg-1 col-2 label text-center">Phone Number</label>
                    <input class="col-4 text-center input-field" id = "phoneNum" type = "text" name="phoneNum" placeholder="Enter Contact Phone Number" required value = "<?php echo $phoneNum; ?>">
                    <div class="w-100"></div>

                    <div class="col-lg-2 col-3 label text-center">Type</div>

                    <div class="form-check form-check-inline col-2">
                        <input class="form-check-input" type="radio" name="type" id="dot-1" required value = "Public">
                        <label class="form-check-label" for="dot-1">Public</label>
                    </div>

                    <div class="form-check form-check-inline col-2">
                        <input class="form-check-input" type="radio" name="type" id="dot-2" required value = "Private">
                        <label class="form-check-label" for="dot-2" >Private</label>
                    </div>

                    <div class="form-check form-check-inline col-2">
                        <input class="form-check-input" type="radio" name="type" id="dot-3" required value = "RSO">
                        <label class="form-check-label" for="dot-3">RSO</label>
                    </div>
                    <div class="w-100"></div>


                    <button class="btn btn-outline-dark custom_btn" type="submit" >Create Event</button>
                    <div class="w-100"></div>

                    <input type="hidden" value="Create Event" name="create_event"> 
                
            </div>
        </div>
    </div>
</form>


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
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyBTUgx98HjjcpDfSKOOM90j6zNlEFWYToE&callback=initMap"></script>


</body>
</html>