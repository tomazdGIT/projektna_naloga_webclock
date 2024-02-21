<?php
include_once 'db.php';
include_once 'session.php';

$title = $_POST['title'];
$post_number = $_POST['post_number'];
//preverim ali so vnešeni vsi obvezni podatki
if (!empty($title) && !empty($post_number)) {
    //ok-vpis v bazo
    $query = "INSERT INTO cities(title,post_number) 
                    VALUES (?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$title,$post_number]);
    //obvestilo in preusmeritev
    msg("Uspešen vnos","success");
    header("Location: cities.php");
}
else {
    //napaka-obvestilo in preusmeritev
    msg("Napaka", "danger");
    header("Location: city_add.php");
}
?>