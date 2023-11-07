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

// Retrieve artworks from the 'artworks' table
$sql = "SELECT * FROM artworks";
$result = $conn->query($sql);

// Check if there are artworks
if ($result->num_rows > 0) {
    // Create an HTML table to display the artwork list
    echo "<table>
            <tr>
                <th>Title</th>
                <th>Artist</th>
                <th>Description</th>
            </tr>";

    // Output data for each artwork
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['title']."</td>
                <td>".$row['artist']."</td>
                <td>".$row['description']."</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No artworks found";
}

// Close the connection
$conn->close();
?>