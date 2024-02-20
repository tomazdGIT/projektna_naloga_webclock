<?php
include_once 'db.php';
include_once 'session.php';

$title = $_POST['title'];

if (!empty($title)) {

    $query = "INSERT INTO status (title) 
                    VALUES (?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$title]);

    msg("Uspešen vnos","success");
    header("Location: status.php");
}
else {
    msg("Napaka", "danger");
    header("Location: status_add.php");
}
?>