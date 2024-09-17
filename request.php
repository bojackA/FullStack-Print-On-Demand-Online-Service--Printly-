<!DOCTYPE html>
<html>
<head>
  <title>Request Item</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
      .top-bar {
      background-color: #333;
      color: #fff;
      padding: 10px;
      display: flex;
      justify-content: space-between;
      align-items: center;
    }

    .top-bar span {
      margin-right: 10px;
      font-weight: bold;
      font-size: 35px;
    }

    .top-bar .home-icon {
      font-size: 35px;
      margin-left: 8px;
      cursor: pointer;
    }
    .home-icon {
        border: none;
        background-color: #4CAF50;
        width: 38px;
        height: 40px;
        border-radius: 8px;
        cursor: pointer;
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
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f2f2f2;
    }

    .container {
      max-width: 600px;
      margin: 40px auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
    }

    h1 {
      text-align: center;
    }

    form {
      text-align: center;
      margin-top: 20px;
    }

    input[type="text"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 10px;
    }

    input[type="file"] {
      margin-bottom: 10px;
    }

    input[type="submit"] {
      padding: 10px 20px;
      background-color: #4CAF50;
      color: #fff;
      border-radius: 4px;
      border: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
<div class="top-bar">
    <span>Printly</span>
    <i id="home-icon" class="home-icon">&#8592;</i>
</div>
  <div class="container">
    <h1>Request Item</h1>

    <?php
    session_start();
      // MySQL database connection settings
      $host = 'localhost';
      $username = 'root';
      $password = '';
      $database = 'printly';

      // Check if the form is submitted
      if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Create a MySQL connection
        $conn = new mysqli($host, $username, $password, $database);

        // Check the connection
        if ($conn->connect_error) {
          die('Connection failed: ' . $conn->connect_error);
        }
      
  

        // Process the uploaded file
        $targetDir = 'uploads/';
        $targetFile = $targetDir . basename($_FILES['image']['name']);
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        // Check if the file is an image
        if (isset($_POST['submit'])) {
          $check = getimagesize($_FILES['image']['tmp_name']);
          if ($check !== false) {
            $uploadOk = 1;
          } else {
            echo '<script> alert("Error: File is not an image") </script>';
            $uploadOk = 0;
          }
        }

        // Allow only certain file formats (e.g., JPEG, PNG)
        if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg') {
          echo '<script> alert("Error: Only JPG, JPEG, and PNG files are allowed") </script>';
          $uploadOk = 0;
        }

        // Upload the file if all checks pass
        if ($uploadOk == 1) {
          if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            // Get the name from the form
            $name = $_POST['type'];
            $size = $_POST['size'];
            $color = $_POST['color'];

            $id = $_SESSION['unid'];

            // Insert the product into the database
            $sql = "INSERT INTO request (uniqid,type,size,color, image) VALUES ($id,'$name','$size','$color', '$targetFile')";

            if ($conn->query($sql) === TRUE) {
              echo '<script> alert("added successfully") </script>';
              header('request.php');
            } else {
              echo '<script> alert("error handling product") </script>' . $conn->error;
            }
          } else {
            echo '<script> alert("Error uploading file") </script>';
          }
        }
        

        // Close the MySQL connection
        $conn->close();
      }
    ?>

    <form method="POST" enctype="multipart/form-data">
      <input type="text" name="type" placeholder="Product Name" required>
      <input type="text" name="size" placeholder="Size" required>
      <input type="text" name="color" placeholder="Color"  required>
      <input type="file" name="image" accept="image/*" required>
      <input type="submit" name="submit" value="Request">
    </form>
   
  </div>
<script>
    // Find the element by its ID
    var signoutIcon = document.getElementById('home-icon');
    var requestsIcon = document.querySelector('.requests');

    // Add a click event listener
    signoutIcon.addEventListener('click', function() {
      // Redirect to "home.html"
      
      window.location.href = 'welcome.php';
    });
    
    requestsIcon.addEventListener('click', function() {
      // Redirect to "my-requests.html"
      window.location.href = 'myrequests.php';
    });
  </script>
  
</body>
</html>
