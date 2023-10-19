<?php
$id = $_POST['id'];
if($_FILES['materi']){
$src1 = $_FILES['materi']['tmp_name'];
$filename1 = $_FILES['materi']['name'];
$output_dir = "../upload/materi/".$filename1;


if (move_uploaded_file($src1, $output_dir )) {
        echo "Success! Image uploaded! File: ".$filename1;
} else{
    echo "Error! Image upload failed! File: ".$filename1;
};
echo "<br>";
}
else{
    $src2 = $_FILES['tugas']['tmp_name'];
    $filename2 = $_FILES['tugas']['name'];
    $output_dir = "../upload/tugas/".$filename2;
    if (move_uploaded_file($src2, $output_dir )) {
            echo "Success! Image uploaded! File: ".$filename2;
    } else{
        echo "Error! Image upload failed! File: ".$filename2;
    };
    echo "<br>"; 
}