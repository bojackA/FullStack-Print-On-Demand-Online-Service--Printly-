<!DOCTYPE html>
<html>
<head>
    <title>User Data</title>
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 0;
        }

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

        .return-icon {
            width: 40px;
            height: 40px;
            border-radius: 5px;
            background-color: #4CAF50;
            display: flex;
            justify-content: center;
            align-items: center;
            cursor: pointer;
        }

        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: flex-start;
            gap: 20px;
            padding: 20px;
        }

        .user {
            flex-basis: calc(33.33% - 20px); /* Adjust the percentage to change the number of images per row */
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            text-align: center;
        }

        .user h3 {
            margin-top: 0;
            font-size: 24px;
        }

        .user img {
            width: 100%;
            height: auto;
            object-fit: cover;
            border-radius: 5px;
        }

        .user p {
            margin: 10px 0;
            font-size: 18px;
        }

        .order-button {
            margin-top: 10px;
            padding: 10px 20px;
            font-size: 16px;
            text-align: center;
            text-decoration: none;
            background-color: #4CAF50;
            color: #fff;
            border-radius: 4px;
            border: none;
            cursor: pointer;
        }

        .order-button:hover {
            background-color: #45a049;
        }

        @media (max-width: 768px) {
            .user {
                flex-basis: 100%;
                max-width: 100%;
            }
        }
    </style>
</head>
<body>
<div class="top-bar">
    <span>Printly</span>
    <div class="return-icon">
        <i id="home-icon" class="home-icon">&#8592;</i>
    </div>
</div>

<div class="container">
    <?php
    session_start();
    // Database connection
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'printly';

    $conn = mysqli_connect($host, $username, $password, $database);
    if (!$conn) {
        die("Failed to connect to MySQL: " . mysqli_connect_error());
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['order'])) {
        // Get the user ID from the session
        
        $id = $_SESSION['unid'];

        // Get the product ID from the button value
        $productID = $_POST['order'];

        // Insert order into the "orders" table
        $insertSql = "INSERT INTO orders (user_id, product_id) VALUES ('$id', '$productID')";
        if (mysqli_query($conn, $insertSql)) {
            echo '<script>alert("Order placed successfully.");</script>';
        } else {
            echo '<script>alert("Error placing order: ' . mysqli_error($conn) . '");</script>';
        }
    }
    // Check if the order button was clicked
   

    // Fetching data from the database
    $query = "SELECT * FROM men";
    $result = mysqli_query($conn, $query);

    // Displaying data
    while ($row = mysqli_fetch_assoc($result)) {
        
        $uniq = $row['mid'];
        $name = $row['mname'];
        $image = $row['image'];
        $price = $row['price'];

        echo '<div class="user">';
        echo '<form method="POST" action="">';
        echo '<img src="' . $image . '" alt="' . $name . '">';
        echo '<h3>' . $name . '</h3>';
        echo '<p>Price: $' . $price . '</p>';
        echo '<button class="order-button" type="submit" name="order" value="' . $uniq . '">Add To Cart</button>';
        echo '</form>';
        echo '</div>';
    }
    
    // Close database connection
    mysqli_close($conn);
    ?>
</div>
<script>
    // Find the element by its ID
    var signoutIcon = document.getElementById('home-icon');

    // Add a click event listener
    signoutIcon.addEventListener('click', function() {
        // Redirect to "home.html"
        window.location.href = 'welcome.php';
    });
</script>
</body>
</html>
