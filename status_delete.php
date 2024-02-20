<?php
include_once 'db.php';
include_once 'session.php';

$id = $_GET['id'];

if (!empty($id)) {

    $query = "DELETE FROM status WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);

    msg("Uspešen izbris","success");
    header("Location: status.php");
}
else{
msg("Napaka", "danger");
header("Location: status.php");
}