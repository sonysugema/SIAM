<?php
session_start();
include ('config.php');
$username =$_POST['username'];
$password =$_POST['password'];

$query = mysqli_query($koneksi,"SELECT * FROM tb_user WHERE username='$username' AND password='$password'");
if(mysqli_num_rows($query)==1){
    
    $user = mysqli_fetch_array($query);
    $_SESSION['nama']  = $user['nama'];
    $_SESSION['role']  = $user['role'];
    $_SESSION['noId']    = $user['noId'];
    header('Location:../app');
}
else if($username == '' || $password == ''){
    header('Location:../index.php?error=2');
}
else{
    header('Location:../index.php?error=1');
}

?>