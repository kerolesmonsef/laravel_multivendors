<?php
/**
 * $mark_lat
 * $mark_long
 * $lat_label_class
 *$long_label_class
 *
 * you should include those libraries in the head of the page
 * before including this component
 *
 *  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.6.0/dist/leaflet.css" integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ==" crossorigin=""/>
 *  <script src="https://unpkg.com/leaflet@1.6.0/dist/leaflet.js" integrity="sha512-gZwIG9x3wUXg2hdXF6+rVkLF/0Vi9U8D2Ntg4Ga5I5BZpVkVxlJWbSQtXPSiUTtC0TjtGOmxa1AJPuV0CPthew==" crossorigin=""></script>
 */
$modal_id = ("ID" . rand(455666, 56446664));
$map_id = "map_id" . uniqid("", TRUE);
?>
@component("GeneralComponents.bootstrap_modal")
    @slot('button_title',$button_title ?? '<i class="fas fa-map-marked"></i>')
    @slot('modal_title',$map_title ?? 'Shop Location')
    @slot('button_class',$button_class ?? 'btn btn-xs btn-info')
    @slot('modal_id',$modal_id)
    @slot('model_style')style='min-width: 100%;'@endslot
    @slot("body")
        <div id="mapid" style="width: 1300px; height: 500px;"></div>
    @endslot
@endcomponent
@push('custom-scripts')
    <script>
        $(document).ready(function () {


            let mymap = L.map('mapid').setView([{{ $mark_lat }}, {{ $mark_long }}], 5);
            let mark_lat = {{ $mark_lat }};
            let mark_long = {{ $mark_long }};
            L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}', {
                // L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token=pk.eyJ1Ijoia2Vyb2xlcyIsImEiOiJja2JnaHAyeDUxNWlxMnRubzQ5aTh4MzZtIn0.u9vZV73ON78skfqWcgwOtg', {
                //     attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/">OpenStreetMap</a> ',
                maxZoom: 18,
                subdomains: ['mt0', 'mt1', 'mt2', 'mt3'],
                // id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                // accessToken: 'pk.eyJ1Ijoia2Vyb2xlcyIsImEiOiJja2JnaHAyeDUxNWlxMnRubzQ5aTh4MzZtIn0.u9vZV73ON78skfqWcgwOtg'
            }).addTo(mymap);


            let marker = L.marker([{{ $mark_lat }}, {{ $mark_long }}]).addTo(mymap)
                .bindPopup(`<b>{{ $mark_title ?? 'Mark Title' }} <br> Lat : ${mark_lat} <br> Long : ${mark_long}</b>`, {
                    minWidth: 150
                }).openPopup();

            mymap.on('click', function (e) {
                mark_lat = (e.latlng.lat);
                mark_long = (e.latlng.lng);
                var newLatLng = new L.LatLng(mark_lat, mark_long);
                marker.setLatLng(newLatLng);
                $('.lat_label_class').text(mark_lat.toFixed(5))
                $('.long_label_class').text(mark_long.toFixed(5))

                $('.lat_input_class').val(mark_lat)
                $('.long_input_class').val(mark_long)

                reloadMarker();
            });


            $('#{{ $modal_id }}').on('show.bs.modal', function () {
                setTimeout(function () {
                    mymap.invalidateSize();
                }, 1000);
            });

            function reloadMarker() {
                marker.bindPopup(`<b>{{ $mark_title ?? 'Mark Title' }} <br> Lat : ${mark_lat} <br> Long : ${mark_long}</b>`, {
                    minWidth: 150
                }).openPopup();
            }
        })
    </script>
@endpush
