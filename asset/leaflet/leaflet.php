
	  <link rel="stylesheet" type="text/css" href="asset/js/leaflet-search/src/leaflet-search.css">
	 <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>

<style>
	#mapid{
		height: 73vh;
		margin: 0;
	}
.map{
	box-shadow:0px 20px 30px rgba(0, 0, 0, 0.3);
}
</style>
   <link rel="stylesheet" href="asset/js/liedman/dist/leaflet-routing-machine.css">

	 <div id="mapid" class="map"></div>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
   <script src="asset/js/leaflet-search/src/leaflet-search.js"></script>
   <script src="asset/js/liedman/dist/leaflet-routing-machine.js"></script>
   <script src="asset/js/leaflet.ajax.js"></script>
   <script src="asset/js/liedman/examples/Control.Geocoder.js"></script>


   <script>
   	var data = [
   	<?php
   	$data = mysqli_query($conn, "SELECT * FROM map ORDER BY id");
   	while($d= mysqli_fetch_array($data)){

   	 ?>
		{"loc":[<?= $d['lat'] ?>,<?= $d['lng'] ?>], "title":"<?=$d['n_tempat'] ?>"},
		<?php } ?>
	];

	 	var mymap = L.map('mapid').setView([-7.2920513,108.2489408], 14);
	 	L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
   		attribution: '&copy; <a href="../desa">desa Sukasenang</a> contributors',
		}).addTo(mymap);


		 var style= {
	    color: "#73006e",
	    weight: 1,
	    opacity: 1,
	    fillOpacity: 0
		 	}

		function popUp(f,l){
		    var out = [];
		    if (f.properties){
		        for(key in f.properties){
		            out.push(key+": "+f.properties[key]);
		        }
		        l.bindPopup(out.join("<br />"));
		    }
		}
		var jsonTest = new L.GeoJSON.AJAX(["asset/leaflet/desa.geojson"],{style:style}).addTo(mymap);

		



			var markersLayer = new L.LayerGroup();	
			mymap.addLayer(markersLayer);
			var controlSearch = new L.Control.Search({
				position:'topleft',		
				layer: markersLayer,
				initial: false,
				zoom: 40,
				marker: false
			}); mymap.addControl( new L.Control.Search({
                    layer: markersLayer,
                    initial: false,
                    collapsed: true,
                    zoom: 40
                }) );

			var myIcon = L.Icon.extend({
                options: {
                    iconSize: [40, 40],
                iconAnchor: [12, 40],
                popupAnchor: [2, -10]
                }
            });	

		for(i in data) {
			<?php 
				$map=mysqli_query($conn, "SELECT * FROM map ORDER BY id");
				while($m=mysqli_fetch_array($map)){
				 ?>
				var title = data[i].title,	
					loc = data[i].loc,		
				marker = new L.Marker(new L.latLng(loc), {title: title, icon: new myIcon({iconUrl:'web/gambar/<?= $m['marker'] ?>'})} );
				marker.bindPopup(
				"<?= $m['n_tempat'] ?></br>"+
				"<img class='img-fluid p-2' width='150px' src='web/gambar/<?= $m['gambar_tempat'] ?>' ><br>"+
				"Jenis Tempat : <?= $m['j_tempat'] ?></br>"+
				"Alamat       : <?= $m['alamat'] ?><br>"+
				"<a href='tempat/<?= strtolower(str_replace(" ", "-", $m['n_tempat']))?>'>Lihat Selengkapnya</a><br>"

					);
			<?php } ?>
				markersLayer.addLayer(marker);
			}




	 </script>
		
