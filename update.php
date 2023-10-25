<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "eventhub";

// Create a database connection
$conn = new mysqli($servername, $username, $password, $database);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Set character set to UTF-8 (optional, but recommended)
$conn->set_charset("utf8");

if (isset($_POST['update_event'])) {
    // Validate event ID
    $event_id = $_POST['event_id'];
    if (!is_numeric($event_id)) {
        echo "<script>alert('Event ID must be a number.'); window.location = 'Home.html';</script>";
        exit;
    }

    // Validate event name
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

    // Validate event location and description (optional, add as needed)

    // Construct the SQL query to update the record in the eventregister table
    $sql = "UPDATE eventregister SET event_name = ?, event_date = ?, event_location = ?, description = ? WHERE eventid = ?";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind the parameters
        $stmt->bind_param("ssssi", $event_name, $event_date, $event_location, $event_description, $event_id);

        // Execute the update
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            // Data updated successfully
            echo "<script>alert('Event Updated successfully.'); window.location = 'Home.html';</script>";
        } else {
            // No rows affected, possibly no matching event ID
            echo "<script>alert('Event registration failed.'); window.location = 'Home.html';</script>";
        }

        // Close the statement
        $stmt->close();
    } else {
        echo "<script>alert('Error on Database.'); window.location = 'Home.html';</script>";
    }
} else {
    // Handle the case where the form was not submitted
    echo "<script>alert('Form not submitted.'); window.location = 'Home.html';</script>";
}

// Close the database connection
$conn->close();
?>
