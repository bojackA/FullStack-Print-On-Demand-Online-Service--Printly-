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
      height: auto;
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

    h1 {
      color: #333;
      text-align: center;
    }

    p {
      color: #666;
      line-height: 1.5;
    }
    .data-container {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }

    .data-card {
      width: 200px;
      margin: 10px;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 8px;
      text-align: center;
    }

    .data-card img {
      width: 100%;
      max-height: 200px;
      object-fit: cover;
      border-radius: 8px;
    }

    .delete-button {
      margin-top: 10px;
    }

    @media only screen and (max-width: 600px) {
      .data-card {
        width: 100%;
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
    <i id="signout" class="fas fa-sign-out-alt fa-2x signout"></i>
  </div>
  <h1>My Orders</h1>
  <div class="data-container">
    <?php
    // Database connection settings
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "printly";

    // Create a connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    if (isset($_POST['delete'])) {
        $deleteID = $_POST['delete'];
        // Perform the delete operation
        $deleteSql = "DELETE FROM request WHERE id = $deleteID";
        if ($conn->query($deleteSql) === TRUE) {
          echo '<script>alert("Data deleted successfully.");</script>';
        } else {
          echo '<script>alert("Error deleting data: ' . $conn->error . '");</script>';
        }
      }

    // SQL query with JOIN and WHERE condition
    $sql = "SELECT *
    FROM orders
    JOIN kids ON orders.product_id = kids.uniq
    JOIN signup ON orders.user_id = signup.unid where signup.unid = {$_SESSION['unid']}";

    // Execute the query
    $result = $conn->query($sql);

    // Check if any rows were returned
    if ($result->num_rows > 0) {
      // Output data from each row
      while ($row = $result->fetch_assoc()) {
        // Display data
        echo '<div class="data-card">';
        echo '<img src="' . $row["image"] . '" alt="' . $row["kname"] . '">';
       
        echo '<p>Type: ' . $row["kname"] . '</p>';
        echo '<p>Price: ' . $row["price"] . '</p>';
     
        echo '<form method="POST">';
        echo '<button type="submit" class="button delete-button" name="delete" value="' . $row["id"] . '">Delete</button>';
        echo '</form>';
        echo '</div>';
      }
    } else {
      echo "";
    }
    $sql = "SELECT *
    FROM orders
    JOIN men ON orders.product_id = men.mid
    JOIN signup ON orders.user_id = signup.unid where signup.unid = {$_SESSION['unid']}";

    // Execute the query
    $result = $conn->query($sql);

    // Check if any rows were returned
    if ($result->num_rows > 0) {
      // Output data from each row
      while ($row = $result->fetch_assoc()) {
        // Display data
        echo '<div class="data-card">';
        echo '<img src="' . $row["image"] . '" alt="' . $row["mname"] . '">';
       
        echo '<p>Type: ' . $row["mname"] . '</p>';
        echo '<p>Price: ' . $row["price"] . '</p>';
     
        echo '<form method="POST">';
        echo '<button type="submit" class="button delete-button" name="delete" value="' . $row["id"] . '">Delete</button>';
        echo '</form>';
        echo '</div>';
      }
    } else {
      echo "";
    }
    $sql = "SELECT *
    FROM orders
    JOIN women ON orders.product_id = women.wid
    JOIN signup ON orders.user_id = signup.unid where signup.unid = {$_SESSION['unid']}";

    // Execute the query
    $result = $conn->query($sql);

    // Check if any rows were returned
    if ($result->num_rows > 0) {
      // Output data from each row
      while ($row = $result->fetch_assoc()) {
        // Display data
        echo '<div class="data-card">';
        echo '<img src="' . $row["image"] . '" alt="' . $row["wname"] . '">';
       
        echo '<p>Type: ' . $row["wname"] . '</p>';
        echo '<p>Price: ' . $row["price"] . '</p>';
     
        echo '<form method="POST">';
        echo '<button type="submit" class="button delete-button" name="delete" value="' . $row["id"] . '">Delete</button>';
        echo '</form>';
        echo '</div>';
      }
    } else {
      echo "";
    }

    // Close the connection
    $conn->close();
    ?>
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
