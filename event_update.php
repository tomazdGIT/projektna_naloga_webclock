<?php
include_once 'db.php';

$title = $_POST['title'];
$id = $_POST['id'];

//preverim ali so vnešeni vsi obvezni podatki
if (!empty($title))  {
    //vse ok
    $query = "UPDATE events SET title=? WHERE id=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$title,$id]);
    //preusmeri na seznam
    header("Location: events.php");
}
else {
    //preusmeri nazaj na dodajanje
    header("Location: event_edit.php?id=$id");
}