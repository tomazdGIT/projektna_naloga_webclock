<?php
include_once 'db.php';
include_once 'session.php';

$title = $_POST['title'];
$id = $_POST['id'];

if (!empty($title))  {

    $query = "UPDATE events SET title=? WHERE id=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$title,$id]);

    msg("Uspešna posodobitev podatkov","success");
    header("Location: events.php");
}
else {
    msg("Napaka", "danger");
    header("Location: event_edit.php?id=$id");
}
?>