<!DOCTYPE html>
<html>
<head>
    <title>Data Display</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
        }

        .data-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            gap: 20px;
        }

        .data-card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 10px;
            text-align: center;
        }

        .data-card img {
            max-width: 200px;
            max-height: 200px;
            border-radius: 5px;
            margin-bottom: 10px;
        }

        .data-card p {
            margin: 0;
        }
    </style>
</head>
<body>
    <h1>Requests</h1>

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

    // SQL query with JOIN and WHERE condition
    $sql = "SELECT *
            FROM signup
            LEFT JOIN request ON signup.unid = request.uniqid
            WHERE request.type IS NOT NULL AND request.type <> ''";

    // Execute the query
    $result = $conn->query($sql);

    // Check if any rows were returned
    if ($result->num_rows > 0) {
        // Output data from each row
        while ($row = $result->fetch_assoc()) {
            // Display data
            echo '<div class="data-card">';
            echo '<img src="' . $row["image"] . '" alt="' . $row["type"] . '">';
            echo '<p>Number: ' . $row["number"] . '</p>';
            echo '<p>Type: ' . $row["type"] . '</p>';
            echo '<p>Size: ' . $row["size"] . '</p>';
            echo '<p>Color: ' . $row["color"] . '</p>';
            echo '</div>';
        }
    } else {
        echo "No results found.";
    }

    // Close the connection
    $conn->close();
    ?>
    </div>
</body>
</html>
