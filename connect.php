<?php
// Establish a database connection
$mysqli = new mysqli("localhost", "root", "", "login page");

// Check for connection errors
if ($mysqli->connect_error) {
    die("Connection failed: " . $mysqli->connect_error);
}

// Retrieve input data from the registration form
$username = $_POST['username'];
$email = $_POST['email'];
$password = $_POST['password'];

// Hash the password for security (you should use a more secure hashing method)
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Perform an INSERT query to add the user to the database
$query = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$hashed_password')";

if ($mysqli->query($query) === TRUE) {
    echo "Registration successful!";
} else {
    echo "Error: " . $query . "<br>" . $mysqli->error;
}

// Close the database connection
$mysqli->close();
?>
