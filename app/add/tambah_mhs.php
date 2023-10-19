<?php
include('../../conf/config.php');
$noId           = $_GET['noId'];
$nama           = $_GET['nama'];
$username       = $_GET['username'];
$perihal        = $_GET['perihal'];
$tindak_lanjut  = $_GET['tindak_lanjut'];
$query = mysqli_query($koneksi,"INSERT INTO tb_mhs(noId,nama,username,password) 
VALUES('$noId','$nama','$tgl_surat','$password')");
header('Location: ../index.php?page=data-Mhs');
?>