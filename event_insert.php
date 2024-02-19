<<?php
include_once 'db.php';

$title = $_POST['title'];


//preverim ali so vnešeni vsi obvezni podatki
if (!empty($title)) {
    //vse ok
    $query = "INSERT INTO events(title) 
                    VALUES (?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$title]);
    //preusmeri na seznam
    header("Location: events.php");
}
else {
    //preusmeri nazaj na dodajanje
    header("Location: event_add.php");
}

