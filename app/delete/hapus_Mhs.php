<?php
include('../../conf/config.php');
$id = $_GET['id'];

$query = mysqli_query($koneksi,"DELETE FROM tb_mhs WHERE id='$id'");
header('Location: ../?page=data-Mhs');
?>