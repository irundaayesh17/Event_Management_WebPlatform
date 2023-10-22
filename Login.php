<?php

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    if (empty($username) || empty($password)) {
        echo "<script>alert('Please fill in all fields.'); window.location = 'Login.html';</script>";
        exit;
    }

    // Your database credentials
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "eventhub";

    // Create a database connection
    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    // Check for connection errors
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL query to check the credentials
    $sql = "SELECT * FROM adminlogin WHERE name = '$username' AND password = '$password'";
    $result = $conn->query($sql);

    // Check if a matching record was found
    if ($result->num_rows > 0) {
        // Redirect to Home.html on successful login
        header("Location: Home.html");
        exit;
    } else {
        echo "<script>alert('Login failed. Please check your username and password.'); window.location = 'Login.html';</script>";
    }

    // Close the database connection
    $conn->close();
}
?>
