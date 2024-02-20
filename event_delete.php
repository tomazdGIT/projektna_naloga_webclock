<?php
include_once 'db.php';
include_once 'session.php';

$id = $_GET['id'];

if (!empty($id)) {
    //vse ok
    $query = "DELETE FROM events WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    msg("Uspešen izbris","success");
    header("Location: events.php");
}
else {
    msg("Napaka", "danger");
    header("Location: events.php");
}
?>
