<!DOCTYPE html>
<html>
<head>
  <title>Admin Page</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f2f2f2;
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
      font-size: 24px;
      font-weight: bold;
    }

    .options {
      display: flex;
      justify-content: center;
      margin-top: 40px;
    }

    .option {
      text-align: center;
      margin: 20px;
    }

    .option a {
      display: block;
      padding: 10px 20px;
      font-size: 18px;
      text-decoration: none;
      background-color: #4CAF50;
      color: #fff;
      border-radius: 4px;
      cursor: pointer;
    }

    .option a:hover {
      background-color: #45a049;
    }
  </style>
</head>
<body>
  <div class="top-bar">
    <div class="logo">Admin Page</div>
    <p href="mainpage.html" id = "signout" class="option">Logout</p>
  </div>
  <script>
    // Find the element by its ID
    var homeIcon = document.getElementById('signout');

    // Add a click event listener
    homeIcon.addEventListener('click', function() {
        // Redirect to "home.html"
        window.location.href = 'mainpage.html';
    });
</script>

  <div class="options">
    <div class="option">
      <a href="addmen.php">Men Items</a>
    </div>
    <div class="option">
      <a href="addkids.php">Kids Items</a>
    </div>
    <div class="option">
      <a href="additems.php">Women Items</a>
    </div>
  </div>

</body>
</html>
