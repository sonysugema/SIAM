<?php
include('../../conf/config.php');
$id            = $_POST['id'];
$nim           = $_POST['nim'];
$nama          = $_POST['nama'];
$kls           = $_POST['kls'];
$khd           = $_POST['khd'];
$tgs           = $_POST['tgs'];
$uts           = $_POST['uts'];
$uas           = $_POST['uas'];
$kode          = $_POST['kode'];
$nilai         = $_POST['nilai'];
$smt           = $_POST['smt'];
if($id==0){
    // $insert = mysqli_query($koneksi,"CALL nilaiMHS('heri','abc')");
    $query  = mysqli_query($koneksi,"SELECT * FROM tb_mhs WHERE semester = '$smt'");
    while($data  = mysqli_fetch_array($query)){
        $nim     = $data['nim'];
        $nama    = $data['nama'];
        $kode_mk = $kode;
        $kls     = $data['kelas'];
        $smt     = $data['semester'];
        $thn     = '2023/2024';
    $insert = mysqli_query($koneksi,"CALL nilaiMHS('$nim','$nama','$kode_mk','$kls','$smt','$thn')");
    }
}
else{
    $x  = count($uts);
    for($i=0; $i<$x; $i++){
        $update = mysqli_query($koneksi,"UPDATE tb_nilai SET kehadiran='$khd[$i]',tugas='$tgs[$i]',uts='$uts[$i]',uas= $uas[$i],nilai= $nilai[$i] WHERE nim = '$nim[$i]'");
        }
}    
?>