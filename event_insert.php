<<?php
include_once 'db.php';
include_once 'session.php';

$title = $_POST['title'];


//preverim ali so vnešeni vsi obvezni podatki
if (!empty($title)) {
    //vse ok
    $query = "INSERT INTO events(title) 
                    VALUES (?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$title]);

    msg("Uspešen vnos","success");
    header("Location: events.php");
}
else {
    msg("Napaka", "danger");
    header("Location: event_add.php");
}
?>
