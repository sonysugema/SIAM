<?php
include('../../conf/config.php');
$NoAgenda        = $_POST['id'];
$Pengirim        = $_POST['Pengirim'];
$Tanggal_Jurnal  = $_POST['Tanggal_Jurnal'];
$Perihal         = $_POST['Perihal'];
$Tindak_Lanjut   = $_POST['Tindak_Lanjut'];

//Nama Foto//
//$nama_file  = $_FILES['foto']['name'];
//echo $nama_file;

//Lokasi Foto//
// $file_tmp   = $_FILES['foto']['tmp_name'];
// move_uploaded_file($file_tmp,'../foto/'.$nama_file);
$query = mysqli_query($koneksi,"UPDATE tb_surat_masuk SET Pengirim='$Pengirim',NoAgenda='$NoAgenda',Tanggal_Jurnal='$Tanggal_Jurnal',Perihal='$Perihal',Tindak_Lanjut='$Tindak_Lanjut' WHERE NoAgenda = '$NoAgenda'");
header('Location: ../index.php?page=data-suratMasuk');
?>