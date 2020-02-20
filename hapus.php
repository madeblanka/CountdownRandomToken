<?php
include ('koneksi.php');
$id = $_GET['id'];

$queryupdate = mysqli_query($koneksi,"UPDATE user SET token='0' WHERE id='$id' ");
if ($queryupdate) {
	# credirect ke page index
	header("location:index.php");
}
else{
	echo "ERROR, data gagal diupdate". mysqli_error($koneksi);
}
 ?>
