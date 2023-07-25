function initialize(address) {

    const labels = "ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    let labelIndex = 0;

    var latlng = new google.maps.LatLng(35.7100627, 139.8107004);
    var options = {
        zoom: 14, center: latlng,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    };
    var map = new google.maps.Map(document.getElementById("map"), options);

    geocode(address);


    function geocode() {
        var geocoder = new google.maps.Geocoder();

        geocoder.geocode({ 'address': address }, function (results, status) {
            if (status == 'OK') {
                map.setCenter(results[0].geometry.location);
                var marker = new google.maps.Marker({
                    map: map,
                    position: results[0].geometry.location
                });
            } else {
                alert('Geocode was not successful for the following reason: ' + status);
            }
        });
    }



    function addMarker(latlng, map) {
        new google.maps.Marker({
            position: latlng,
            label: labels[labelIndex++ % labels.length],
            map: map,
        });
    }
}