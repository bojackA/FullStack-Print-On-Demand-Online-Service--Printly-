<?php
include('conn.php');

// Retrieve form data
$name = $_POST['name'];
$email = $_POST['email'];
$pass = $_POST['password'];

$uniqueID = rand(time(), 100000000);

$sql = "INSERT INTO signup (unid, name, number, pass) VALUES ('$uniqueID', '$name', '$email', '$pass')";
if ($conn->query($sql) === TRUE) {
    session_start();
    $_SESSION['unid'] = $uniqueID; // Store the unique ID in the session
    echo "Signup successful!";
    header("Location: welcome.php");
} else {
    echo '<script> alert("Cannot sign up") </script>';
    header("Location: signup.html");
}
?>
