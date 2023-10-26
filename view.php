<!DOCTYPE html>
<html>
<head>
    <title>View Events</title>
    <style type=text/css>
    table{
    border-collapse: collapse;
    width: 100%;
    color: Black;
    font-weight: bold;
    font-size: 20px;
    text-align: left;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}
th{
    background-color: #271004;
    color: white;
}
tr:nth-child(even) {
            background-color: #ff975b; /* Light Orange */
        }
</style>
    
</head>
<body>
         <table>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Date</th>
                <th>Location</th>
                <th>Description</th>
            </tr>   
            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "eventhub";
                
                // Create a database connection
                $conn = new mysqli($servername, $username, $password, $database);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                $sql = "Select eventid, event_name, event_date, event_location, description from eventregister";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr><td>".$row["eventid"]."</td><td>".$row["event_name"]."</td><td>".$row["event_date"]."</td><td>".$row["event_location"]."</td><td>".$row["description"]."</td></tr>";
                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }

                $conn->close();
            ?>
        </table>
</body>
</html>
