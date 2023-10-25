<?php

if (isset($_POST['register_event'])) {
    // Check if the required fields are set
    if (isset($_POST['event_name'], $_POST['event_date'], $_POST['event_location'], $_POST['event_description'])) {
        // Store form input data in variables
        $event_name = $_POST['event_name'];
        $event_date = $_POST['event_date'];
        $event_location = $_POST['event_location'];
        $event_description = $_POST['event_description'];

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
        $event_name = $_POST['event_name'];
        if (!preg_match("/^[a-zA-Z\s]+$/", $event_name)) {
            echo "<script>alert('Event Name can only contain letters.'); window.location = 'Home.html';</script>";
            exit;
        }
    
        // Validate event date
        $event_date = $_POST['event_date'];
        if (strtotime($event_date) < strtotime(date('Y-m-d'))) {
            echo "<script>alert('Invalid event date. Please select a future date.'); window.location = 'Home.html';</script>";
            exit;
        }
        // SQL query to insert event data into the eventregister table
        $sql = "INSERT INTO eventregister (event_name, event_date, event_location, description) VALUES (?, ?, ?, ?)";
        
        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);
        
        // Bind the parameters
        $stmt->bind_param("ssss", $event_name, $event_date, $event_location, $event_description);

        // Execute the prepared statement
        if ($stmt->execute()) {
            echo "<script>alert('Event registered successfully.'); window.location = 'Home.html';</script>";
        } else {
            echo "<script>alert('Error: Event registration failed.'); window.location = 'Home.html';</script>";
        }

        // Close the prepared statement and database connection
        $stmt->close();
        $conn->close();
    } else {
        echo "<script>alert('Please fill in all fields.'); window.location = 'Home.html';</script>";
    }
}

?>
