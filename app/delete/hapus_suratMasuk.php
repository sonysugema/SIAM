<?php
include('../../conf/config.php');
$id = $_GET['id'];

$query = mysqli_query($koneksi,"DELETE FROM tb_surat_masuk WHERE NoAgenda='$id'");
header('Location: ../index.php?page=data-suratMasuk');
?>