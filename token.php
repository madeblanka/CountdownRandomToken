<?php
include ('koneksi.php');
$id = $_GET['id'];

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
$queryupdate = mysqli_query($koneksi,"UPDATE user SET token='$token' WHERE id='$id' ");
if ($queryupdate) {
	# credirect ke page index
	header("location:index.php");
}
else{
	echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}
 ?>
