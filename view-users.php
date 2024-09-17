<!DOCTYPE html>
<html>
<head>
  <title>User List</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
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
      border-radius: 18px;
      box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
      overflow-x: auto;
    }

    h1 {
      text-align: center;
    }

    table {
      width: 100%;
      border-collapse: collapse;
    }

    th, td {
      padding: 10px;
      text-align: left;
      border-bottom: 1px solid #ddd;
    }

    th {
      background-color: #f2f2f2;
    }

    td.actions {
      text-align: center;
    }

    td.actions a {
      color: red;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>User List</h1>

    <?php
      // MySQL database connection settings
      $host = 'localhost';
      $username = 'root';
      $password = '';
      $database = 'printly';

      // Create a MySQL connection
      $conn = new mysqli($host, $username, $password, $database);

      // Check the connection
      if ($conn->connect_error) {
        die('Connection failed: ' . $conn->connect_error);
      }

      // Retrieve users from the database
      $sql = 'SELECT * FROM signup';
      $result = $conn->query($sql);

      if ($result->num_rows > 0) {
        echo '<table>';
        echo '<tr>';
        echo '<th>Name</th>';
        echo '<th>Number</th>';
        echo '<th>Password</th>';
        echo '<th>Actions</th>';
        echo '</tr>';

        while ($row = $result->fetch_assoc()) {
          echo '<tr>';
          echo '<td>' . $row['name'] . '</td>';
          echo '<td>' . $row['number'] . '</td>';
          echo '<td>' . $row['pass'] . '</td>';
          echo '<td class="actions"><a href="delete-user.php?id=' . $row['unid'] . '">Delete</a></td>';
          echo '</tr>';
        }

        echo '</table>';
      } else {
        echo 'No users found.';
      }

      // Close the MySQL connection
      $conn->close();
    ?>
  </div>
</body>
</html>
