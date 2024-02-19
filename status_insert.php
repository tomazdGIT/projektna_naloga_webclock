<?php
include_once 'db.php';

$title = $_POST['title'];


//preverim ali so vnešeni vsi obvezni podatki
if (!empty($title)) {
    //vse ok
    $query = "INSERT INTO status (title) 
                    VALUES (?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$title]);
    //preusmeri na seznam
    header("Location: status.php");
}
else {
    //preusmeri nazaj na dodajanje
    header("Location: status_add.php");
}
