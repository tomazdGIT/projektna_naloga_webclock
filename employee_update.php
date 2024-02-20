<?php
include_once 'session.php';
include_once 'db.php';

$id = $_POST['id'];
$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$city_id = $_POST['city_id'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$telephone = $_POST['telephone'];
$status_id = $_POST['status_id'];

//preverim ali so vnešeni vsi obvezni podatki
if (!empty($first_name) && !empty($last_name) && !empty($city_id) && !empty($email) && !empty($pass)) {
    //vse ok
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $query = "UPDATE employees SET first_name=?, last_name=?, email=?, pass=?, telephone=?, city_id=?, status_id=?
                WHERE id=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$first_name,$last_name,$email,$pass,$telephone,$city_id,$status_id,$id]);

    msg("Uspešna posodobitev podatkov","success");
    header("Location: employee.php");
    die();
}
else {
    msg("Napaka", "danger");
    header("Location: employee_edit.php?id=$id");
}