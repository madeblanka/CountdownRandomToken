<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
<style type="text/css">
div {
height: 100px;
width: 300px;
background-color: white;
display: block;
margin: auto;
padding-top: 100px;
}
div span {
padding: 10px 20px;
}
strong {
opacity: 0;
background-color: red;
color: white;
padding: 3px; 5px;
transition: all ease .5s;
}


</style>
  </head>

  <body>
    <div>
      <span id="hour"> </span>h
      <span id="minute"> </span>m
      <span id="second"> </span>s<br><br>
      <strong id="expired">Expired</strong>
    </div>
    <script>
    function countdownTimer(hours = 0, mins = 0, sec = 0, date = new Date()) {

        // set manually the future deadline by time preset
        /* sec = 5; */
        var url = "tokenrefresh.php?id=1";

        document.getElementById("hour").innerHTML = hours;
        document.getElementById("minute").innerHTML = mins;
        document.getElementById("second").innerHTML = sec;

      var count = setInterval(function() {
        document.getElementById("hour").innerHTML = hours;
        document.getElementById("minute").innerHTML = mins;
        document.getElementById("second").innerHTML = --sec;

        if(hours==0 && mins==0 && sec==0) {
        	// document.getElementById("expired").style.opacity = "1";
          window.location.href = url;
          clearInterval(count);
        } else {
          if(mins==0) {
          	if(hours!=0) {
          		mins = 60;
            	document.getElementById("hour").innerHTML = hours--;
            }
          }
          if(sec==0) {
          	sec = 60;
            document.getElementById("minute").innerHTML = mins--;
          }
        }

      }, 1000);

    }

    countdownTimer(0,0,5);


    </script>

<?php
$hari = date('l');
/*$new = date('l, F d, Y', strtotime($Today));*/
if ($hari=="Sunday") {
 echo "Minggu";
}elseif ($hari=="Monday") {
 echo "Senin";
}elseif ($hari=="Tuesday") {
 echo "Selasa";
}elseif ($hari=="Wednesday") {
 echo "Rabu";
}elseif ($hari=="Thursday") {
 echo("Kamis");
}elseif ($hari=="Friday") {
 echo "Jumat";
}elseif ($hari=="Saturday") {
 echo "Sabtu";
}
?>,
<?php
$tgl =date('d');
echo $tgl;
$bulan =date('F');
if ($bulan=="January") {
 echo " Januari ";
}elseif ($bulan=="February") {
 echo " Februari ";
}elseif ($bulan=="March") {
 echo " Maret ";
}elseif ($bulan=="April") {
 echo " April ";
}elseif ($bulan=="May") {
 echo " Mei ";
}elseif ($bulan=="June") {
 echo " Juni ";
}elseif ($bulan=="July") {
 echo " Juli ";
}elseif ($bulan=="August") {
 echo " Agustus ";
}elseif ($bulan=="September") {
 echo " September ";
}elseif ($bulan=="October") {
 echo " Oktober ";
}elseif ($bulan=="November") {
 echo " November ";
}elseif ($bulan=="December") {
 echo " Desember ";
}
$tahun=date('Y');
echo $tahun;
?>
    <table width="100%">
        <tr>
        <td>NO</td>
        <td>ID</td>
        <td>Username</td>
        <td>Token</td>
        <!-- <td>Post</td> -->
        <td>Pemotongan token dari kata ke 4 - 10</td>
        <td>MD5 Hash</td>
        <td>Action</td>
      </tr>
      <?php
include_once ("koneksi.php");
$query = mysqli_query($koneksi, "SELECT * FROM user")or die(mysql_error());
$nomor = 1;
while($data = mysqli_fetch_array($query)){
?>

<tr>
  <td><?php echo $nomor++ ; ?></td>
  <td><?php echo $data['id']; ?></td>
  <td><?php echo $data['username']; ?></td>
  <td><?php echo $data['token']; ?></td>
  <!-- <td><?php echo $data['post']; ?></td> -->
  <td><?php echo $a = substr($data['token'],3,10); ?></td>
  <td><?php echo md5($a); ?></td>
  <td><a href="token.php?id=<?php echo $data['id']; ?>">Login</a> </td>
  <td><a href="hapus.php?id=<?php echo $data['id']; ?>">Logout</a> </td>
</tr>
<?php } ?>
</table>
  </body>
</html>
