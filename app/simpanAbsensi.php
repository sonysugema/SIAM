<?php
	session_start();
	$koneksi 	= mysqli_connect('localhost','root','','db_sttiss');

	$idcam 		= $_POST['idcam'];
	$latitude 	= $_POST['latitude'];
	$longitude 	= $_POST['longitude'];
	
	if(isset($_POST['foto']) && !empty($_POST['foto'])){
		$foto = strip_tags(addslashes($_POST['foto']));
		$latitude = strip_tags(addslashes($_POST['latitude']));
		$longitude = strip_tags(addslashes($_POST['longitude']));
		$b64Foto = str_replace("data:image/jpeg;base64,","", $foto);
		$dataFoto = base64_decode($b64Foto);
		
		//$namaFoto = date("dmYhis").".jpeg";
		$namaFoto = date("dmYhis").".jpeg";
		$_SESSION['nama'] = ucwords($_SESSION['nama']);
		$nidn	= $idcam.'-'.$_SESSION['noId'].".jpeg";
		//$lokasiFoto = "./img/dosen/{$_SESSION['nik']}-{$_SESSION['nama']}-{$namaFoto}";
		$lokasiFoto = "./img/dosen/{$nidn}";
		
		// $jam = date('G');
		// if($jam >= 6 && $jam <= 12){
		// 	$jenisAbsen = "masuk,";
		// 	$valAbsen = "now(),";
		// }else{
		// 	$jenisAbsen = "pulang,";
		// 	$valAbsen = "now(),";
		// }
		
		$keterangan = "Hadir di lokasi : {$latitude},{$longitude}";
		
		if(file_put_contents($lokasiFoto, $dataFoto)){
			//mysqli_query($koneksi, "INSERT INTO tb_khd_dsn_x(nip,nama,nama_mk,kode_mk,materi,tahun_ajaran) VALUES('$valAbsen','','$lokasiFoto','$latitude','$longitude','$keterangan')")or die(mysqli_error());
			mysqli_query($koneksi, "UPDATE tb_khd_dsn SET foto = '$lokasiFoto',latitude='$latitude',longitude='$longitude' WHERE id='$idcam'")or die(mysqli_error());
						echo "Absensi berhasil dilakukan";
		}else{
			echo "Absensi gagal dilakukan";
		}
	}
?>