<?php
include_once 'db.php';
include_once 'session.php';

$title = $_POST['title'];
$post_number = $_POST['post_number'];

if (!empty($title) && !empty($post_number)) {

    $query = "INSERT INTO cities(title,post_number) 
                    VALUES (?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$title,$post_number]);

    msg("Uspešen vnos","success");
    header("Location: cities.php");
}
else {
    msg("Napaka", "danger");
    header("Location: city_add.php");
}
?>