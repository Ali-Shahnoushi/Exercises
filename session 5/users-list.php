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

// Retrieve users from the 'users' table
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

// Check if there are users
if ($result->num_rows > 0) {
    // Create an HTML table to display the user list
    echo "<table>
            <tr>
                <th>Name</th>
                <th>Lastname</th>
                <th>Email</th>
                <th>Role</th>
            </tr>";

    // Output data for each user
    while ($row = $result->fetch_assoc()) {
        echo "<tr>
                <td>".$row['name']."</td>
                <td>".$row['lastname']."</td>
                <td>".$row['email']."</td>
                <td>".$row['role']."</td>
            </tr>";
    }

    echo "</table>";
} else {
    echo "No users found";
}

// Close the connection
$conn->close();
?>