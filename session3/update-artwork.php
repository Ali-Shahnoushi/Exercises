<?php

$host = 'localhost';
$dbName = 'my_project';
$user = 'root';
$password = '';

try {
    $pdoConnection = new PDO("mysql:host=$host;dbname=$dbName", $user, $password);
    $pdoConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $artwork_name = $_POST['name'];
    $artwork_id = $_POST['id'];
    $photo = $_POST['primary_image'];
    $artwork_description = $_POST['description'];
    $price = $_POST['price'];
    $artwork_type = $_POST['type'];
    $artist_id = $_POST['primary_image'];

    $sql = "UPDATE artworks
            SET artwork_name = :artwork_name, photo = :photo, artwork_description = :artwork_description,
            artwork_type = :artwork_type, price = :price, artist_id = :artist_id
            WHERE id = :id";
    $stmt = $pdoConnection->prepare($sql);

    $stmt->bindParam(':artwork_name', $artwork_name);
    $stmt->bindParam(':photo', $photo);
    $stmt->bindParam(':artwork_description', $artwork_description);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':artwork_type', $artwork_type);
    $stmt->bindParam(':artist_id', $artist_id);
    $stmt->bindParam(':id', $artwork_id);

    try {
        $stmt->execute();
        echo "Product updated successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Edit Product</title>
    </head>

    <body>
        <h1>Edit Product</h1>
        <form method="POST">

            <label for="id">artwork ID:
                <input type="number" name="id"><br>
            </label>

            <label for="name">Name:
                <input type="text" name="name" required><br>
            </label>

            <label for="primary_image">photo URL:
                <input type="text" name="primary_image" required><br>
            </label>

            <label for="description">Description:
                <textarea name="description" required></textarea><br>
            </label>

            <label for="price">Price:
                <input type="number" name="price" required><br>
            </label>

            <label for="photography">photography
                <input type="radio" name="type" value="photography">
            </label><br>

            <label for="painting">painting
                <input type="radio" name="type" value="painting">
            </label><br>

            <label for="visual_art">visual art
                <input type="radio" name="type" value="visual art">
            </label>


            <label for="artist_id">Artist ID:
                <input type="number" name="artist_id"><br>
            </label>


            <input type="submit" value="Update Product">
        </form>
    </body>

</html>