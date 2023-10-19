<?php
session_start();
$nip        = $_SESSION['noId'];
$src1       = $_FILES['foto']['tmp_name'];
$filename1  = $_FILES['foto']['name'];

// $arr_str = explode(".",$filename1);
// $last_arr = end($arr_str);

//$output_dir = "../upload/profile-dosen/".$nip.'.'.$last_arr;
$output_dir = "../upload/profile-dosen/".$nip.'.png';

if (move_uploaded_file($src1, $output_dir )) {
        echo "Success! Image uploaded! File: ".$filename1;
} else{
    echo "Error! Image upload failed! File: ".$filename1;
};
echo "<br>";
