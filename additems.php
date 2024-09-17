<!DOCTYPE html>
<html>
<head>
  <title>Add Product</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
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
  <div class="container">
    <h1>Add Product</h1>

    <?php
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
        $sql = 'SELECT * FROM women';
        $result = $conn->query($sql);
  
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            echo '<div class="product">';
            echo '<img src="' . $row['image'] . '" alt="Product Image">';
            echo '<div class="name">' . $row['wname'] . '</div>';
            echo '</div>';
          }
        } else {
          echo 'No products found.';
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
            echo 'Error: File is not an image.';
            $uploadOk = 0;
          }
        }

        // Check if the file already exists
      

        // Check the file size (if desired)
        // if ($_FILES['image']['size'] > 500000) {
        //   echo 'Error: File is too large.';
        //   $uploadOk = 0;
        // }

        // Allow only certain file formats (e.g., JPEG, PNG)
        if ($imageFileType != 'jpg' && $imageFileType != 'png' && $imageFileType != 'jpeg') {
          echo 'Error: Only JPG, JPEG, and PNG files are allowed.';
          $uploadOk = 0;
        }

        // Upload the file if all checks pass
        if ($uploadOk == 1) {
          if (move_uploaded_file($_FILES['image']['tmp_name'], $targetFile)) {
            // Get the name from the form
            $name = $_POST['name'];
            $price = $_POST['price'];
            session_start();
            $unID = rand(time(), 100000000);
            

            // Insert the product into the database
            $sql = "INSERT INTO women(wid,wname,price, image) VALUES ($unID,'$name','$price', '$targetFile')";

            if ($conn->query($sql) === TRUE) {
              echo 'Product added successfully.';
            } else {
              echo 'Error adding product: ' . $conn->error;
            }
          } else {
            echo 'Error uploading file.';
          }
        }
        

        // Close the MySQL connection
        $conn->close();
      }
    ?>

    <form method="POST" enctype="multipart/form-data">
      <input type="text" name="name" placeholder="Product Name" required>
      <input type="text" name="price" placeholder="Price" required>
      <input type="file" name="image" accept="image/*" required>
      <input type="submit" name="submit" value="Add Product">
    </form>
    <div class="options">
    <div class="option">
      <a href="viewwomen.php">View Items</a>
    </div>
    
  </div>
  </div>
  
</body>
</html>
