<?php
include_once 'db.php';
include_once 'session.php';

$id = $_GET['id'];
//preverimo ce dobimo id
if (!empty($id)) {
    //ok-izbris iz baze
    $query = "DELETE FROM events WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    //obvestilo in preusmeritev
    msg("Uspešen izbris","success");
    header("Location: events.php");
}
else {
    //napaka-obvestilo in preusmeritev
    msg("Napaka", "danger");
    header("Location: events.php");
}
?>
