<?php


include "conn.php"; 
include "signup.php";

if(isset($_POST['login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query the database to check if the credentials are valid
    $sql = "SELECT * FROM signup WHERE name = '$username' AND pass = '$password'";
    $result = $conn->query($sql);
    $numRows = mysqli_num_rows($result);
    $sqladmin = "SELECT * FROM admins WHERE username = '$username' AND password = '$password'";
    $resultadmin = $conn->query($sqladmin);
    $numRows2 = mysqli_num_rows($resultadmin);
    $row = $result->fetch_assoc();

    if ($numRows == 1) {
        // Login successful
        session_start();
        $_SESSION['unid'] = $row['unid']; // Set the username in the session
        header('Location: welcome.php');
        exit();
    } else if ($numRows2 == 1) {
        // Login successful as admin
        $_SESSION['unid'] = $row['unid']; // Set the username in the session
        echo '<script>alert("Logged in as admin")</script>';
    } else {
        // Invalid credentials
        echo '<script>alert("Invalid username or password!")</script>';
        header('Location: login.html');
        exit();
    }

    // Close the connection
    $conn->close();
    
}
?>
