<?php
    $offices = get_field('addresses', 'options');

    if (!is_array($offices) || count($offices) < 1) {
        return;
    }

    $defaultOffice = $offices[0];
    $defaultLat    = array_get($defaultOffice, 'map.lat');
    $defaultLng    = array_get($defaultOffice, 'map.lng');
    $mapPin = TrueLib::getImageURL('map-pin.png');
?>

<div class="contact-map-block">
    <!-- Legend -->
    <div class="container">
        <div class="contact-map-block__inner">
            <div class="contact-map-legend" id="locationContainer">
                <?php $index = 1; ?>
                <?php foreach ($offices as $key => $office): ?>
                    <?php
                        if ($key > 1) {
                            break;
                        }
                        $city    = array_get($office, 'header');
                        $address = array_get($office, 'address');
                        $lat    = array_get($office, 'map.lat');
                        $lng    = array_get($office, 'map.lng');
                    ?>
                    <div class="contact-map-legend__item <?= $index == 1 ? 'contact-map-legend--active' : '' ?>"
                        data-legend-item
                        data-index="<?= $index ?>"
                        data-lat="<?= $lat ?>"
                        data-lng="<?= $lng ?>"
                        >
                        <a href="#contact_<?= $index ?>"
                            data-toggle="collapse"
                            data-parent="#locationContainer"
                        >
                            <div class="contact-map-legend__name">
                                <img src="<?= $mapPin ?>"/><?= $city ?>
                                <span class="contact-map-legend__arrow"></span>
                            </div>
                        </a>
                        <div class="accordion-content collapse <?= $index == 1 ? 'in' : '' ?>">
                            <div class="contact-map-legend__inner">
                                <div class="contact-map-legend__address">
                                    <?= $address ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php $index++; ?>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <!-- ./ -->

    <div class="contact-map"
        id="map_canvas"
        data-lat="<?= $defaultLat ?>"
        data-lng="<?= $defaultLng ?>"
    >
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAb-ao4VTjR6GIxYYwL9ZLeQWyOLuoB7GQ"></script>

<script>

    var setupMap = false;
    function loadMapsAPI() {
        this.key = $('#store-map').data('key');
        this.addScript( 'https://maps.googleapis.com/maps/api/js?key=' + this.key);
    }
    function addScript( url, callback ) {
        let self = this;
        let script = document.createElement( 'script' );

        script.onload = function() {
            self.initMap();
        };
        script.type = 'text/javascript';
        script.src = url;
        document.body.appendChild( script );
    }
    function initialize(lat, lng) {

        var styles = [{featureType:"water",elementType:"geometry",stylers:[{color:"#e9e9e9"},{lightness:17}]},{featureType:"landscape",elementType:"geometry",stylers:[{color:"#f5f5f5"},{lightness:20}]},{featureType:"road.highway",elementType:"geometry.fill",stylers:[{color:"#ffffff"},{lightness:17}]},{featureType:"road.highway",elementType:"geometry.stroke",stylers:[{color:"#ffffff"},{lightness:29},{weight:.2}]},{featureType:"road.arterial",elementType:"geometry",stylers:[{color:"#ffffff"},{lightness:18}]},{featureType:"road.local",elementType:"geometry",stylers:[{color:"#ffffff"},{lightness:16}]},{featureType:"poi",elementType:"geometry",stylers:[{color:"#f5f5f5"},{lightness:21}]},{featureType:"poi.park",elementType:"geometry",stylers:[{color:"#dedede"},{lightness:21}]},{elementType:"labels.text.stroke",stylers:[{visibility:"on"},{color:"#ffffff"},{lightness:16}]},{elementType:"labels.text.fill",stylers:[{saturation:36},{color:"#333333"},{lightness:40}]},{elementType:"labels.icon",stylers:[{visibility:"off"}]},{featureType:"transit",elementType:"geometry",stylers:[{color:"#f2f2f2"},{lightness:19}]},{featureType:"administrative",elementType:"geometry.fill",stylers:[{color:"#fefefe"},{lightness:20}]},{featureType:"administrative",elementType:"geometry.stroke",stylers:[{color:"#fefefe"},{lightness:17},{weight:1.2}]}];

        var map_canvas = document.getElementById('map_canvas');

        var myLatlng = new google.maps.LatLng(lat, lng);

        var map_options = {
            center: myLatlng,
            zoom: 12,
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            mapTypeId: 'nature',
            draggable: true,
            zoomControl: true,
            panControl: true,
            mapTypeControl: true,
            streetViewControl: true,
            scaleControl: true,
            scrollwheel: false,
            overviewMapControl: true,
            disableDoubleClickZoom: true

        }
        var map = new google.maps.Map(map_canvas, map_options);
        var styledMapType = new google.maps.StyledMapType(styles, {name: 'nature'});
        map.mapTypes.set('nature', styledMapType);


        var image = {
          url: '<?= TrueLib::getImageURL('map-pin@2x.png')?>',
          size: new google.maps.Size(68, 98),
          scaledSize: new google.maps.Size(34, 49),
          anchor: new google.maps.Point(0, 50)
      }

        var marker = null;
        marker = new google.maps.Marker(
        {
            position: myLatlng,
            map: map,
            icon: image
        });
    }

    function switchMap () {
        $('[data-legend-item]').each(function () {

            $(this).on('click', function () {
                var lat = $(this).data('lat');
                var lng = $(this).data('lng');

                google.maps.event.addDomListener(window, 'resize', initialize(lat, lng));

                var active = $('.contact-map-legend--active');
                if(active.data('index') != $(this).data('index')) {
                    active.removeClass('contact-map-legend--active');
                    active.find('.accordion-content').slideUp();

                    $(this).addClass('contact-map-legend--active')
                    setTimeout(() => {
                        $(this).find('.accordion-content').slideDown();
                    }, 250);
                }
            });
        });
    }

    function onAccordionChange() {
        var $locationList = $('#locationContainer');
        $locationList.on('show.bs.collapse','.collapse', function(e) {
            $locationList.find('.collapse.in').collapse('hide');
            var $target = $(e.target);
        });
    }

    if(!setupMap)
    {
        var mapCanvas = $('#map_canvas');
        var defaultLat = mapCanvas.data('lat');
        var defaultLng = mapCanvas.data('lng');

        google.maps.visualRefresh = true;
        google.maps.event.addDomListener(window, 'load', initialize(defaultLat, defaultLng));
        google.maps.event.addDomListener(window, 'resize', initialize(defaultLat, defaultLng));
        setupMap = true;

        switchMap();
        onAccordionChange();
    }

</script>
