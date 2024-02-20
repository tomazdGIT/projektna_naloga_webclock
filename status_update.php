<?php
include_once 'db.php';
include_once 'session.php';

$title = $_POST['title'];
$id = $_POST['id'];

if (!empty($title)) {

    $query = "UPDATE status SET title=? WHERE id=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$title,$id]);

    msg("Uspešna posodobitev podatkov","success");
    header("Location: status.php");
}
else {
    msg("Napaka", "danger");
    header("Location: status_edit.php?id=$id");
}
?>