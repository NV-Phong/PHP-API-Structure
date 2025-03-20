<!DOCTYPE html>
<html lang="vi">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Liên kết & Tin tức</title>
   <style>
      /* styles.css */
      body {
         font-family: Arial, sans-serif;
         margin: 20px;
         padding: 0;
         background-color: #ffffff;
      }

      .container {
         max-width: 800px;
         margin: 0 auto;
         padding: 20px;
         background: #ffffff;
         /* box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.1); */
         border-radius: 10px;
      }

      /* Phần liên kết website */
      #lienketwebsite {
         padding: 15px;
         background: linear-gradient(135deg, #72c6ef, #004e92);
         color: white;
         border-radius: 8px;
         margin-bottom: 20px;
      }

      #lienketwebsite h2 {
         margin-bottom: 10px;
         font-size: 20px;
      }

      #lienketwebsite select {
         width: 100%;
         padding: 10px;
         font-size: 16px;
         border: none;
         border-radius: 5px;
         background: white;
         color: #333;
      }

      /* Phần tin xem nhiều */
      #tinxemnhieu {
         padding: 15px;
         background: linear-gradient(135deg, #ff9a9e, #fad0c4);
         border-radius: 8px;
      }

      #tinxemnhieu h2 {
         margin-bottom: 10px;
         font-size: 20px;
         color: #333;
      }

      #tinxemnhieu p {
         margin: 5px 0;
      }

      #tinxemnhieu a {
         text-decoration: none;
         color: #fff;
         font-weight: bold;
         background: rgba(255, 255, 255, 0.2);
         padding: 5px 10px;
         display: inline-block;
         border-radius: 5px;
         transition: 0.3s ease;
      }

      #tinxemnhieu a:hover {
         background: rgba(255, 255, 255, 0.5);
         color: #333;
      }
   </style>
</head>

<body>

   <div class="container">
      <?php require_once 'lienketwebsite.php'; ?>
      <?php require_once 'tinxemnhieu.php'; ?>
   </div>

</body>

</html>