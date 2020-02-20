<?php
include ('koneksi.php');
$id = $_GET['id'];
$cektoken = mysqli_query($koneksi, "SELECT token FROM user WHERE id='$id'");
$hasil = mysqli_fetch_array($cektoken);
function acak($panjang)
{
    $karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
  $pos = rand(0, strlen($karakter)-1);
  $string .= $karakter{$pos};
    }
    return $string;
}
$token = acak(30);
if ($hasil[0] != 0) {
  $queryupdate = mysqli_query($koneksi,"UPDATE user SET token='0' WHERE id='$id' ");
}
$queryupdate = mysqli_query($koneksi,"UPDATE user SET token='$token' WHERE id='$id' ");
if ($queryupdate) {
	# credirect ke page index
	header("location:index.php");
}
else{
	echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}
 ?>
