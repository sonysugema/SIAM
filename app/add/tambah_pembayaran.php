<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include('../../conf/config.php');
$npm        = $_POST['npm'];
$nama       = $_POST['nama'];
$jenis      = $_POST['jenis'];
$nilai      = $_POST['nilai'];
$ket        = $_POST['ket'];

//Nama Foto//
$nama_file  = $_FILES['doc']['name'];
echo $nama_file;
//$nama_doc = $NoSurat.'.pdf';
//Lokasi Foto//
$file_tmp   = $_FILES['doc']['tmp_name'];
move_uploaded_file($file_tmp,'../documents/'.$nama_file);
if(isset($_POST['detail'])){
    $detail     = $_POST['detail'];
    $x =count($detail);
    for($i=0; $i<$x; $i++){	
    $query = mysqli_query($koneksi,"INSERT INTO tb_pembayaran(npm,nama,jenis,nilai,detail,keterangan,img) 
    VALUES('$npm','$nama','$jenis','$nilai','$detail[$i]','$ket','$nama_file')");
    }
}
else {
    $query = mysqli_query($koneksi,"INSERT INTO tb_pembayaran(npm,nama,jenis,nilai,detail,keterangan,img) 
    VALUES('$npm','$nama','$jenis','$nilai','$detail[$i]','$ket','$nama_file')");
    }    

header('Location: ../?page=data-Pembayaran');
?>