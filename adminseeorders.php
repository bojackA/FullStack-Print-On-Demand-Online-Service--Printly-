<!DOCTYPE html>
<html>
<head>
    <title>Order Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .order {
            display: flex; /* Use flexbox to align items horizontally */
            align-items: center; /* Align items vertically */
            padding: 20px;
            border: 1px solid #ccc;
            margin: 10px;
        }

        .order img {
            width: 100px; /* Adjust the image width as needed */
            height: 100px; /* Adjust the image height as needed */
            object-fit: cover;
            margin-right: 20px; /* Add some space between the image and other content */
        }

        .kid {
            flex: 1; /* Allow the kid section to take the remaining space */
        }

        /* Add additional styles as needed */
    </style>
</head>
<body>
    <?php
    // Database connection
    $host = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'printly';

    $conn = mysqli_connect($host, $username, $password, $database);
    if (!$conn) {
        die("Failed to connect to MySQL: " . mysqli_connect_error());
    }

    // Fetching data from the database using JOIN statements
    $query = "SELECT *
              FROM orders
              JOIN kids ON orders.product_id = kids.uniq
              JOIN signup ON orders.user_id = signup.unid";
    $result = mysqli_query($conn, $query);

    // Displaying data
    while ($row = mysqli_fetch_assoc($result)) {
        $orderId = $row['id'];
       
        $kidName = $row['kname'];
        $kidImage = $row['image'];
        $userName = $row['name'];
        $phone = $row['number'];
        // ... Other fields from the orders table

        echo '<div class="order">';
        echo '<h3>Order ID: ' . $orderId . '</h3>';
        echo '<div class="kid">';
        echo '<h4>Username: ' . $username . '</h4>';
        echo '<h4>Kid Name: ' . $kidName . '</h4>';
        echo '<h4>Phone number: ' . $phone . '</h4>';
        echo '</div>';
        echo '<img src="' . $kidImage . '" alt="' . $kidName . '">';
      
        // ... Display other fields from the orders table
        echo '</div>';
    }

    // Close database connection
    mysqli_close($conn);
    ?>
</body>
</html>
