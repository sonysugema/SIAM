<?php
	error_reporting(0);
	$latitude = strip_tags(addslashes($_GET['latitude']));
	$longitude = strip_tags(addslashes($_GET['longitude']));
	$nik = strip_tags(addslashes($_GET['nik']));
	$nama = strip_tags(addslashes($_GET['nama']));
	$foto = strip_tags(addslashes($_GET['foto']));
	$waktu = strip_tags(addslashes($_GET['waktu']));
?>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../app/dist/map/leaflet.css" />
    <script src="../app/dist/map/leaflet.js"></script>
	<style>
		html, body {
			height: 100%;
			margin: 0;
		}
		.leaflet-container {
			height: 100%;
			width: 100%;
			max-width: 100%;
			max-height: 100%;
		}
		.leaflet-popup-content-wrapper .leaflet-popup-content{
			width: 200px !important;
		}
	</style>
</head>

	<div id="map" style="width: 80%; height: 100%;"></div>
	<script language="javascript">
		var map = L.map('map').setView([<?php echo $latitude; ?>, <?php echo $longitude; ?>], 13);

		var tiles = L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
			maxZoom: 19,
			attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
		}).addTo(map);

		var customIcon = L.divIcon({
			className: 'custom-icon',
			html: '<img src="<?php echo $foto; ?>" class="fotoinmap" alt="Foto Karyawan" style="width: 150px; height: 150px;">',
			iconSize: [50, 50],
		});

		var marker = L.marker([<?php echo $latitude; ?>, <?php echo $longitude; ?>]).addTo(map);

		marker.setLatLng([<?php echo $latitude; ?>, <?php echo $longitude; ?>]).bindPopup('<p style="width: 200px;"><img src="<?php echo $foto; ?>" class="fotoinmap" alt="Foto Karyawan" style="width: 205px; height: 150px;" /><br />Nama : <?php echo $nama; ?><br />NIK : <?php echo $nik; ?><br />Waktu Absen : <?php echo $waktu; ?></p>').openPopup();

		function onMapClick(e) {
			popup
				.setLatLng(e.latlng)
				.setContent('Anda Mengklik Koordinat :' + e.latlng.toString())
				.openOn(map);
		}

		map.on('click', onMapClick);
	</script>