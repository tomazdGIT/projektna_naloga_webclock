<?php
include_once 'session.php';
include_once 'db.php';

$id = $_POST['id'];
$pass = $_POST['pass'];

//preverim ali so vnešeni vsi obvezni podatki
if (!empty($pass)) {
    //ok-vpis v bazo
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $query = "UPDATE employees SET pass=?
                WHERE id=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$pass,$id]);
    //obvestilo in preusmeritev
    msg("Uspešna posodobitev podatkov","success");
    header("Location: employee.php");
    die();
}
else {
    //napaka-obvestilo in preusmeritev
    msg("Napaka", "danger");
    header("Location: employee_edit.php?id=$id");
}