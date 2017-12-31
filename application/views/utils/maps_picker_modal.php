<div class="modal fade  bs-example-modal-lg" id="maps_picker" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Search Location</h4>
            </div>
            <div class="modal-body">
                <input id="pac-input" class="controls" type="text"
                       placeholder="Enter a location">

                <div id="map"></div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button id="btn-modal-ok" type="button" class="btn btn-primary">Save</button>
            </div>
        </div>
    </div>
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDxflfz33IN4ikKO5aKE1K0mx4J2msGuVU&libraries=places"></script>
<script>

//    var currentLat= -6.2607882;
//    var currentLng = 106.7649319;

    var currentLat = 0;
    var currentLng = 0;
    $( document ).ready(function() {
       if (navigator.geolocation) {

        navigator.geolocation.getCurrentPosition(function (position) {

            currentLat = position.coords.latitude;
            currentLng = position.coords.longitude;
           
        });
        } else {
            alert("Browser doesn't support Geolocation");
            // Browser doesn't support Geolocation
            //handleLocationError(false, infoWindow, map.getCenter());
        }
    });
    
    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: currentLat, lng: currentLng},
        zoom: 13
    });
    var center = new google.maps.LatLng(currentLat, currentLng);
    var geocoder = new google.maps.Geocoder();
    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });
    initMap();
    var elementCallback;
    var elementLatCallback;
    var elementLngCallback;
    var latRet;
    var lngRet;
    var addrRet;
    var isEdit=0;
    function open_maps_picker(element, elemLat, elemLng) {
        infowindow.close();
        marker.setVisible(false);
        addrRet = "";
        isEdit=0;
        elementCallback = $("#" + element);
        elementLatCallback = $("#" + elemLat);
        elementLngCallback = $("#" + elemLng);
        var tempLat= elementLatCallback.val();
        var tempLng= elementLngCallback.val();
        if(tempLat!=""){

            currentLat =parseFloat(elementLatCallback.val());
            latRet = currentLat;
        }
        if(tempLng!=""){
            currentLng = parseFloat(elementLngCallback.val());
            lngRet = currentLng;
        }
        $("#maps_picker").modal('show');
        $("#pac-input").attr('style', 'z-index: 0;position: absolute;left: 10% !important;');
    }
    function open_maps_picker_edit(element, elemLat, elemLng, callback_edit) {
        addrRet = "";
        
        elementCallback = $("#" + element);
        elementLatCallback = $("#" + elemLat);
        elementLngCallback = $("#" + elemLng);
        isEdit=callback_edit;
        currentLat = elementLatCallback.val();
        currentLat = elementLngCallback.val();
        $("#maps_picker").modal('show');
        $("#pac-input").attr('style', 'z-index: 0;position: absolute;left: 10% !important;');
    }
    $('#maps_picker').on('shown.bs.modal', function () {        
        $("#pac-input").val("");
        google.maps.event.trigger(map, 'resize');
        map.setCenter({lat: currentLat, lng: currentLng});
       // setMarker('<div><strong>' + elementCallback.val() + '</strong><br>' , {lat: currentLat, lng: currentLng});
        setAddr({lat: currentLat, lng: currentLng});
        if(isEdit==1){
            
        }else{

        }
//        geocoder.geocode({
//            'latLng': {lat: currentLat, lng: currentLng}
//        }, function (results, status) {
//            if (status == google.maps.GeocoderStatus.OK) {
//                if (results[0]) {
//                    var placeFromMap = results[0].formatted_address;
//                    addrRet = placeFromMap;
//                    setMarker(placeFromMap, {lat: currentLat, lng: currentLng});
//                    console.log(results[0]);
//                    $("#pac-input").val(placeFromMap);
//                    //elementCallback.val(placeFromMap);
//                    //place.formatted_address;
//
//                }
//            }
//
//        });
        $("#pac-input").attr('style', 'z-index: 0;position: absolute;left: 10% !important;');
    });
    function initMap() {


        var input = /** @type {!HTMLInputElement} */(
                document.getElementById('pac-input'));

        var types = document.getElementById('type-selector');
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);
        map.controls[google.maps.ControlPosition.TOP_LEFT].push(types);

        var autocomplete = new google.maps.places.Autocomplete(input);
        autocomplete.bindTo('bounds', map);




        autocomplete.addListener('place_changed', function () {
            infowindow.close();
            marker.setVisible(false);
            var place = autocomplete.getPlace();
            if (!place.geometry) {

                window.alert("No details available for input: '" + place.name + "'");
                return;
            }
            if (place.geometry.viewport) {
                map.fitBounds(place.geometry.viewport);
            } else {
                map.setCenter(place.geometry.location);
                map.setZoom(17);
            }


            var address = '';
            if (place.address_components) {
                address = [
                    (place.address_components[0] && place.address_components[0].short_name || ''),
                    (place.address_components[1] && place.address_components[1].short_name || ''),
                    (place.address_components[2] && place.address_components[2].short_name || '')
                ].join(' ');
            }
            addrRet = place.formatted_address;

            latRet = place.geometry.location.lat();
            lngRet = place.geometry.location.lng();
            setMarker('<div><strong>' + place.name + '</strong><br>' + address, place.geometry.location);

        });
        function setupClickListener(id, types) {

        }

        setupClickListener('changetype-all', []);
        setupClickListener('changetype-address', ['address']);
        setupClickListener('changetype-establishment', ['establishment']);
        setupClickListener('changetype-geocode', ['geocode']);
    }

    google.maps.event.addListener(map, 'click', function (event) {
        console.log(event.latLng.lat());
        geocoder.geocode({
            'latLng': event.latLng
        }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    var placeFromMap = results[0].formatted_address;
                    addrRet = placeFromMap;
                    latRet = event.latLng.lat();
                    lngRet = event.latLng.lng();
                    setMarker(placeFromMap, event.latLng);
                    console.log(results[0]);
                    $("#pac-input").val(placeFromMap);
                    //elementCallback.val(placeFromMap);
                    //place.formatted_address;

                }
            }

        });
    });

    function setAddr(latLong) {
        geocoder.geocode({
            'latLng': latLong
        }, function (results, status) {
            if (status == google.maps.GeocoderStatus.OK) {
                if (results[0]) {
                    console.log(latLong);
                    var placeFromMap = results[0].formatted_address;
                    addrRet = placeFromMap;
                    latRet = latLong.lat;
                    lngRet = latLong.lng;
                    setMarker(placeFromMap, latLong);                    
                    $("#pac-input").val(placeFromMap);                    
                }
            }

        });
    }

    $("#btn-modal-ok").click(function () {
        elementCallback.val(addrRet);
        elementCallback.focus();
        elementLatCallback.val(latRet);
        elementLngCallback.val(lngRet);
        $("#maps_picker").modal('hide');
    });

    function setMarker(content, location) {
        infowindow.close();
        marker.setPosition(location);
        marker.setVisible(true);
        infowindow.setContent(content);
        infowindow.open(map, marker);
    }
</script>
