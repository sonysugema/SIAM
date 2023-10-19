<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
include('../../conf/config.php');
$npm        = $_POST['npm'];
$nama       = $_POST['nama'];
$jenis      = $_POST['jenis'];
$nilai      = $_POST['nilai'];
$total      = $_POST['total'];
$ket        = $_POST['ket'];
$nota       = $_POST['nota'];
//Nama Foto//
$nama_file  = $_FILES['doc']['name'];
echo $nama_file;
//$nama_doc = $NoSurat.'.pdf';
//Lokasi Foto//
$file_tmp   = $_FILES['doc']['tmp_name'];
move_uploaded_file($file_tmp,'../documents/'.$nama_file);
if(isset($_POST['detail'])){
    $detail     = $_POST['detail'];
    $x =count($nilai);
    for($i=0; $i<$x; $i++){	
    $query = mysqli_query($koneksi,"INSERT INTO tb_pembayaran(npm,nama,jenis,nilai,total,detail,keterangan,img) 
    VALUES('$npm','$nama','$jenis[$i]','$nilai[$i]','$total','$detail[$i]','$ket','$nama_file')");
    $update = mysqli_query($koneksi,"UPDATE tb_tagihan SET status=1 WHERE nota='$nota[$i]'");
    }
}
else {
    $query = mysqli_query($koneksi,"INSERT INTO tb_pembayaran(npm,nama,jenis,nilai,total,detail,keterangan,img) 
    VALUES('$npm','$nama','$jenis[$i]','$nilai[$i]','$total','$detail[$i]','$ket','$nama_file')");
    $update = mysqli_query($koneksi,"UPDATE tb_tagihan SET status=1 WHERE nota='$nota[$i]'");
    } 
header('Location: ../?page=data-PembayaranMhs');
?>