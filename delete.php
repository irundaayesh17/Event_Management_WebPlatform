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

if (isset($_POST['delete_event'])) {
    // Validate event ID
    $event_id = $_POST['event_id'];

    if (!is_numeric($event_id)) {
        echo "<script>alert('Event ID must be a number.'); window.location = 'Home.html';</script>";
        exit;
    }

    // Construct the SQL query to delete the record from the eventregister table
    $sql = "DELETE FROM eventregister WHERE eventid = ?";

    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    if ($stmt) {
        // Bind the event ID as a parameter
        $stmt->bind_param("i", $event_id);

        // Execute the delete query
        $stmt->execute();

        if ($stmt->affected_rows > 0) {
            // Data deleted successfully
            echo "<script>alert('Event removed successfully.'); window.location = 'Home.html';</script>";
        } else {
            // No rows affected, possibly no matching event ID
            echo "<script>alert('Event not found.'); window.location = 'Home.html';</script>";
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
