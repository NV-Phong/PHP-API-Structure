<!DOCTYPE html>
<html>

<head>
   <title>NV Phong</title>
</head>

<body>
   <?php

   $i = 0;
   $num = 50;
   while ($i < 10) {
      $num--;
      $i++;
   }
   echo "i = $i, num = $num";

   $hour = (gmdate('H') + 7) % 24;

   if ($hour >= 0 && $hour < 12) {
      $greeting = "<span style='color: blue; font-size: 33px;'>Bây giờ là $hour giờ sáng! Chúc một ngày an lành!</span>";
   } elseif ($hour >= 12 && $hour < 18) {
      $greeting = "<span style='color: orange; font-size: 33px;'>Bây giờ là $hour giờ chiều! Chúc bạn vui vẻ!</span>";
   } else {
      $greeting = "<span style='color: purple; font-size: 33px;'>Bây giờ là $hour giờ tối! Chúc bạn ngủ ngon!</span>";
   }
   ?>

   <div id="chao">
      <?php echo $greeting; ?>
   </div>


</body>

</html>