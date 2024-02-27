<?php
include_once 'db.php';
include_once 'session.php';

$id = $_GET['id'];

$query = "SELECT * FROM pictures WHERE employee_id = ?";
$stmt = $pdo->prepare($query);
$stmt->execute([$id]);
$num_pictures = $stmt->rowCount();
//preverimo ce dobimo id in da zaposleni nima več shranjenih profilnih slik
if (!empty($id) && $num_pictures == 0) {
    //ok-izbris iz baze
    $query = "DELETE FROM employees WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    //obvestilo in preusmeritev
    msg("Uspešen izbris","success");
    header("Location: employee.php");
}
else {
    //napaka-obvestilo in preusmeritev
    msg("Napaka-poskusite najprej izbrisati profilne sike", "danger");
    header("Location: employee.php");
}
