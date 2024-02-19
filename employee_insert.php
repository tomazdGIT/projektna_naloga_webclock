<?php
include_once 'db.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$telephone = $_POST['telephone'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$city_id = $_POST['city_id'];
$status_id = $_POST['status_id'];

//preverim ali so vnešeni vsi obvezni podatki
if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($pass) && !empty($status_id)) {
    //vse ok
    $pass = password_hash($pass, PASSWORD_DEFAULT);
    $query = "INSERT INTO employees (first_name, last_name, telephone, email, pass, city_id,status_id) 
                    VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$first_name,$last_name,$telephone,$email,$pass,$city_id,$status_id]);


    //preusmeri na employee
    header("Location: employee.php");
}
else {

    //preusmeri nazaj na dodajanje
    header("Location: employee_add.php");
}
