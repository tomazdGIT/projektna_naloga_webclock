<?php
include_once 'db.php';

$id = $_GET['id'];

//preverim ali so vnešeni vsi obvezni podatki
if (!empty($id)) {
    //vse ok
    $query = "DELETE FROM status WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
}

//preusmeri nazaj
header("Location: status.php");