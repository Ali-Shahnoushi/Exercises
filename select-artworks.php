<?php

include("style.php");
$mysqli = new mysqli("localhost", "root", "", "my_project");

if ($mysqli->connect_errno) {
    echo "failed to connect DB - ERROR : " . $mysqli->connect_error . "<br>";
    exit();
}

$select_query = "
SELECT * FROM artworks WHERE isActive = 1;
";

$select_result = $mysqli->query($select_query);

echo "<table>";
while ($row = $select_result->fetch_object()) {
    echo "<tr>";
    foreach ($row as $key => $value) {
        echo "<td>$value</td>";
    }
    echo "</tr>";

}
echo "</table>";