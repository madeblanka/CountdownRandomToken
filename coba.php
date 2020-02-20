<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>
    <?php
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
    //cara memanggilnya
    $hasil_1= acak(100);
    $hasil_2= acak(7);
    echo $hasil_1;
echo "<br />";
echo $hasil_2;
    ?>
    </body>
</html>
