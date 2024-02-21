<?php
include_once 'db.php';
include_once 'session.php';

$title = $_POST['title'];
$id = $_POST['id'];
//preverim ali so vnešeni vsi obvezni podatki
if (!empty($title)) {
    //ok-vpis v bazo
    $query = "UPDATE events SET title=? WHERE id=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$title,$id]);
    //obvestilo in preusmeritev
    msg("Uspešna posodobitev podatkov","success");
    header("Location: events.php");
}
else {
    //napaka-obvestilo in preusmeritev
    msg("Napaka", "danger");
    header("Location: event_edit.php?id=$id");
}
?>