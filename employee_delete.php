<?php
include_once 'db.php';
include_once 'session.php';

$id = $_GET['id'];

if (!empty($id)) {

    $query = "DELETE FROM employees WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    msg("Uspešen izbris","success");
    header("Location: employee.php");
}
else {
    msg("Napaka", "danger");
    header("Location: employee.php");
}
