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
    $id = $_POST['id'];

    $sql = "UPDATE `artworks` SET `isActive`= 0 WHERE id = :id";
    $stmt = $pdoConnection->prepare($sql);

    $stmt->bindParam(':id', $id);

    try {
        $stmt->execute();
        echo "Artwork deleted successfully!";
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
}
?>

<!DOCTYPE html>
<html>

    <head>
        <title>Delete Product</title>
    </head>

    <body>
        <h1>Delete Product</h1>
        <form method="POST">
            <label>ID:</label>
            <input type="text" name="id" required><br>

            <button type="submit">Delete</button>
        </form>
    </body>

</html>