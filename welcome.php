<!DOCTYPE html>
<html>
<?php 
session_start();
?>
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <title>Main Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .order-icon {
      font-size: 35px;
      cursor: pointer;
    }

    .order {
      border: none;
      background-color: #4CAF50;
      width: 38px;
      height: 40px;
      border-radius: 8px;
      cursor: pointer;
    }

    .button {
      display: inline-block;
      padding: 10px 20px;
      font-size: 18px;
      text-align: center;
      text-decoration: none;
      background-color: #4CAF50;
      color: #fff;
      border-radius: 4px;
      border: none;
      cursor: pointer;
    }

    .button:hover {
      background-color: #45a049;
    }
    
    .top-bar .signout {
      font-size: 35px;
      margin-left: 8px;
      cursor: pointer;
    }
    
    .signout {
        border: none;
        background-color: #4CAF50;
        width: 38px;
        height: 40px;
        border-radius: 8px;
        cursor: pointer;
    }
    
    .top-bar .requests {
      font-size: 35px;
      margin-right: 8px;
      cursor: pointer;
    }
    
    .requests {
        border: none;
        background-color: #4CAF50;
        width: 38px;
        height: 40px;
        border-radius: 8px;
        cursor: pointer;
    }
    
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-image: url("");
      background-repeat: no-repeat;
      background-size: cover;
      height:auto;
    }

    .top-bar {
      background-color: #333;
      color: #fff;
      height: 60px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 20px;
    }

    .logo {
      font-size: 35px;
      font-weight: bold;
    }

    .content {
      display: flex;
      flex-wrap: wrap;
      justify-content: center; /* Align items horizontally */
      align-items: center; /* Align items vertically */
      margin: 40px auto;
      max-width: 600px;
      text-align: center;
    }

    h2 {
      color: #333;
    }

    p {
      color: #666;
      line-height: 1.5;
    }

    .product-button {
      display: inline-block;
      margin: 20px;
      text-align: center;
    }

    .product-button img {
      width: 80%;
      height: 80%;
      height: auto;
      max-width: 130px;
      border-radius: 8px;
      margin-bottom: 10px;
    }

    .product-button span {
      display: block;
      font-size: 24px;
      font-weight: bold;
      color: #333;
    }

    @media only screen and (max-width: 600px) {
      .product-button {
        margin: 20px 0;
      }

      .content {
        margin: 20px;
      }

      .logo {
        font-size: 24px;
      }

      .button {
        padding: 8px 16px;
        font-size: 16px;
      }
    }
  </style>
</head>
<body>
<div class="top-bar">
    <div class="logo">Printly</div>
    <div class="top-icons">
  
      <i id="order" class="fas fa-shopping-cart order-icon"></i>
      <i class="fas fa-clipboard-list requests"></i>
      <i id="signout" class="fas fa-sign-out-alt signout"></i>
    </div>
  </div>
  

  <div class="content">
    <div class="product-button">
      <a href="women.php">
        <img src="pics/istockphoto-1333152229-612x612.jpg" alt="Cups">
      </a>
      <span>Women</span>
    </div>

    <div class="product-button">
      <a href="men.php">
        <img src="pics/36e4409d73a3677d4db1f20faf4a71c9.jpg" alt="Cups">
      </a>
      <span>Men</span>
    </div>

    <div class="product-button">
      <a href="kids.php">
        <img src="pics/istockphoto-675327444-612x612.jpg" alt="Cups">
      </a>
      <span>Kids</span>
    </div>

    <a href="request.php" class="button">Request</a>
  </div>

  <script>
    // Find the element by its ID
    var signoutIcon = document.getElementById('signout');
    var requestsIcon = document.querySelector('.requests');
    var orderIcon = document.getElementById('order');


    // Add a click event listener
    signoutIcon.addEventListener('click', function() {
      // Redirect to "home.html"
      confirm("Are you sure you want to log out?");
      window.location.href = 'mainpage.html';
    });
    
    requestsIcon.addEventListener('click', function() {
      // Redirect to "my-requests.html"
      window.location.href = 'myrequests.php';
    });
    orderIcon.addEventListener('click', function() {
      // Redirect to the "order" page
      window.location.href = 'myorders.php'; // Replace 'order.php' with the URL of your order page.
    });
  </script>
</body>

</html>
