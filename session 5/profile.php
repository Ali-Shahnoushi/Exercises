<?php
// Database credentials
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

// Check if form submitted for updating user details
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the submitted form data
    $newName = $_POST["name"];
    $newEmail = $_POST["email"];

    // Update the user details in the database
    $sql = "UPDATE users SET name='$newName', email='$newEmail' WHERE id=1";
    if ($conn->query($sql) === TRUE) {
        echo "User details updated successfully.";
    } else {
        echo "Error updating user details: " . $conn->error;
    }
}

// Retrieve the current user details from the database
$sql = "SELECT * FROM users WHERE id=1";
$result = $conn->query($sql);

// Check if user details found
if ($result->num_rows > 0) {
    // Fetch user details
    $row = $result->fetch_assoc();
    $name = $row["name"];
    $email = $row["email"];

    // Display the user details form
    echo "
        <form method='post' action='" . $_SERVER["PHP_SELF"] . "'>
            <label for='name'>Name:</label>
            <input type='text' name='name' value='$name'><br><br>
            <label for='email'>Email:</label>
            <input type='email' name='email' value='$email'><br><br>
            <input type='submit' value='Update'>
        </form>
    ";
} else {
    echo "User details not found.";
}

// Close the connection
$conn->close();
?>