<!DOCTYPE html>
<html lang="en">

<head>
   <title>NV Phong</title>
</head>

<body>
   <form>
      <label for="ngay">Chọn Ngày:</label>
      <select id="ngay" name="ngay">
         <option value="0">Chọn Ngày</option>
         <?php
         for ($i = 1; $i <= 31; $i++) {
            echo "<option value='$i'>Ngày $i</option>";
         }
         ?>
      </select>

      <label for="thang">Chọn tháng:</label>
      <select id="thang" name="thang">
         <option value="0">Chọn tháng</option>
         <?php
         for ($i = 1; $i <= 12; $i++) {
            echo "<option value='$i'>Tháng $i</option>";
         }
         ?>
      </select>

      <label for="nam">Chọn năm:</label>
      <select id="nam" name="nam">
         <option value="0">Chọn năm</option>
         <?php
         $namHienTai = date("Y");
         for ($i = $namHienTai; $i >= 1900; $i--) {
            echo "<option value='$i'>$i</option>";
         }
         ?>
      </select>
   </form>
</body>

</html>