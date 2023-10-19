<?php
session_start();
include('../../conf/config.php');
$id            = $_POST['id'];
$nip           = $_SESSION['noId'];
$nama          = $_POST['nama'];
$jamMulai      = $_POST['jamMulai'];
$jamSelesai    = $_POST['jamSelesai'];
$id_meet       = $_POST['id_meet'];
$materi        = $_POST['materi'];
$tugas         = $_POST['tugas'];
$kode          = $_POST['kode'];

if($id==0){
    // $insert = mysqli_query($koneksi,"CALL nilaiMHS('heri','abc')");
    // $query  = mysqli_query($koneksi,"SELECT * FROM tb_khd_dsn");
    // while($data  = mysqli_fetch_array($query)){
    //     $nim     = $data['nim'];
    //     $nama    = $data['nama'];
        $kode_mk = $kode;
    //     $kls     = $data['kelas'];
    //     $smt     = $data['semester'];
         $thn     = '2023/2024';
         $x  = 15;
    for($i=1; $i<$x; $i++){     
        $insert = mysqli_query($koneksi,"CALL khdDsn('$nip','$nama','$kode_mk','$kls','$smt','$i','$thn')");
    }
}
else{
    $x  = count($id_meet);
    for($i=0; $i<$x; $i++){
        $update = mysqli_query($koneksi,"UPDATE tb_khd_dsn SET nip='$nip',jam_mulai='$jamMulai[$i]',jam_selesai='$jamSelesai[$i]',materi='$materi[$i]',tugas= '$tugas[$i]' WHERE id = '$id_meet[$i]'");
        }
}    
?>