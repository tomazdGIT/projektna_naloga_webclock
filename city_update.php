<?php
include_once 'db.php';
include_once 'session.php';

$title = $_POST['title'];
$post_number = $_POST['post_number'];
$id = $_POST['id'];

if (!empty($title) && !empty($post_number)) {

    $query = "UPDATE cities SET title=?, post_number=? WHERE id=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$title,$post_number,$id]);

    msg("Uspešna posodobitev podatkov","success");
    header("Location: cities.php");
}
else {
    msg("Napaka", "danger");
    header("Location: city_edit.php?id=$id");
}
?>