<?php
// Handle the AJAX request to search for an event by Event ID
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the Event ID from the request
    $eventID = $_POST['eventID']; // Make sure to validate and sanitize this value
    
    // Perform a database query to fetch event details by Event ID
    // Your database connection code here
    $host = "localhost";
    $dbUsername = "root";
    $dbPassword = "";
    $dbName = "eventhub";

    $conn = new mysqli($host, $dbUsername, $dbPassword, $dbName);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM eventregister WHERE eventid = ?"; // Replace with your table name
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $eventID); // Use "i" for integer type
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        // Return event details as JSON response
        echo json_encode([
            'success' => true,
            'event_name' => $row['event_name'],
            'event_date' => $row['event_date'],
            'event_location' => $row['event_location'],
            'event_description' => $row['description'],
        ]);
    } else {
        echo json_encode(['success' => false]);
    }

    $stmt->close();
    $conn->close();
}
?>
