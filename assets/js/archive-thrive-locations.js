(function($) {
    function initMap() {
        $('.acf-map').each(function() {
            var map = new google.maps.Map(this, {
                center: new google.maps.LatLng(0, 0),
                zoom: 16
            });
            $(this).find('.marker').each(function() {
                var lat = $(this).data('lat');
                var lng = $(this).data('lng');
                var latLng = new google.maps.LatLng(lat, lng);
                var marker = new google.maps.Marker({
                    position: latLng,
                    map: map
                });
                map.setCenter(latLng);
            });
        });
    }
    $(document).ready(function() {
        if (typeof google === 'object' && typeof google.maps === 'object') {
            initMap();
        }
    });
})(jQuery);