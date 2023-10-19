<?php
include('../../conf/config.php');
$NoSurat        = $_POST['id'];
// $Pengirim        = $_POST['Pengirim'];
// $Tanggal_Jurnal  = $_POST['Tanggal_Jurnal'];
// $Perihal         = $_POST['Perihal'];
// $Tindak_Lanjut   = $_POST['Tindak_Lanjut'];

//Nama Foto//
$nama_file  = $_FILES['foto']['name'];
echo $nama_file;
//File yang diperbolehkan
$ekstensi_diperbolehkan	= array('pdf');
$x = explode('.', $nama_file);
$ekstensi = strtolower(end($x));
//echo $ekstensi;

if(in_array($ekstensi, $ekstensi_diperbolehkan) === true){
$nama_doc = $NoSurat.'.pdf';
//Lokasi Foto//
$file_tmp   = $_FILES['foto']['tmp_name'];
move_uploaded_file($file_tmp,'../doc-surat-keluar/'.$nama_doc);
$query = mysqli_query($koneksi,"UPDATE tb_surat_keluar SET document='$nama_doc' WHERE NoSurat = '$NoSurat'");
header('Location: ../index.php?page=data-suratKeluar');
}
else{
    echo 'EKSTENSI FILE YANG DI UPLOAD TIDAK DI PERBOLEHKAN';
    header('Location: ../index.php?page=data-suratKeluar&&pesan=file-not-support');
}
?>