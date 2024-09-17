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
            flex-basis: 300px;
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
            height: 200px;
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
                max-width: 300px;
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
   
    
    // Check if the order button was clicked
   

    // Fetching data from the database
    $query = "SELECT * FROM kids";
    $result = mysqli_query($conn, $query);

    // Displaying data
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo '<div class="user">';
            echo '<h3>' . $row['kname'] . '</h3>';
            echo '<img src="' . $row['image'] . '" alt="' . $row['kname'] . '">';
            echo '<p>Price: ' . $row['price'] . '</p>';
            echo '<form method="POST" action="deletekids.php?id=' . $row['uniq'] . '">';
            echo '<input type="hidden" name="id" value="' . $row['uniq'] . '">';
            echo '<input class="order-button" type="submit" value="Delete">';
            echo '</form>';
            echo '</div>';
        }
    } else {
        echo 'No users found.';
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
