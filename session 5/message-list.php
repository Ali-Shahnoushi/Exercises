<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "art_shop";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve messages from the 'messages' table
$sql = "SELECT * FROM messages";
$result = $conn->query($sql);

// Check if there are messages
if ($result->num_rows > 0) {
    // Create an HTML table to display the message list
    echo "<table>
            <tr>
                <th>Sender</th>
                <th>Message</th>
                <th>Sent Date</th>
            </tr>";

    // Output data for each message
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['sender']."</td>
                <td>".$row['message']."</td>
                <td>".$row['sent_date']."</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No messages found";
}

// Close the connection
$conn->close();
?>