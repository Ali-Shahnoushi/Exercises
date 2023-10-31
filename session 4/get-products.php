function getArtworks()
{
    $currentUserID = getCurrentUserID();
    global $pdo_connection;
    $sql = "SELECT * FROM artworks;";

    $smtm = $pdo_connection->prepare($sql);
    $smtm->execute();
    $records = $smtm->fetchAll(PDO::FETCH_ASSOC);

    $table = json_encode($records);

    return $table;
}
