<?php

// Database configuration
$host = 'localhost';
$dbName = 'my_project';
$user = 'root';
$password = '';

// Establish a database connection
try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $artwork_name = $_POST['name'];
    $photo = $_POST['primary_image'];
    $artwork_description = $_POST['description'];
    $price = $_POST['price'];
    $artwork_type = $_POST['primary_image'];
    $artist_id = $_POST['primary_image'];

    // Prepare the SQL statement
    $sql = "INSERT INTO artworks (artwork_name, photo, artwork_description,price, artwork_type,artist_id)
            VALUES (:artwork_name, :photo, :artwork_description, :price, :artwork_type, :artist_id)";
    $stmt = $pdo->prepare($sql);

    // Bind the parameters
    $stmt->bindParam(':artwork_name', $artwork_name);
    $stmt->bindParam(':photo', $photo);
    $stmt->bindParam(':artwork_description', $artwork_description);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':artwork_type', $artwork_type);
    $stmt->bindParam(':artist_id', $artist_id);

    // Execute the statement
    try {
        $stmt->execute();
        echo "Product inserted successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Add Product</title>
    </head>

    <body>
        <h1>Add Product</h1>
        <form method="POST">
            <label for="name">Name:</label>
            <input type="text" name="name" required><br>

            <label for="primary_image">photo URL:</label>
            <input type="text" name="primary_image" required><br>

            <label for="description">Description:</label>
            <textarea name="description" required></textarea><br>

            <label for="price">Price:</label>
            <input type="number" name="price" required><br>

            <input type="radio" name="type" value="photography">
            <label for="photography">photography</label><br>
            <input type="radio" name="type" value="painting">
            <label for="painting">painting</label><br>
            <input type="radio" name="type" value="visual art">
            <label for="visual_art">visual art</label>


            <label for="artist_id">Artist ID:</label>
            <input type="number" name="artist_id"><br>

            <button type="submit">Add</button>
        </form>
    </body>

</html>