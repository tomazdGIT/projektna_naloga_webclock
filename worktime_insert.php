<?php
include_once 'session.php';
include_once 'db.php';


$event_id = $_POST['event_id'];
$employee_id = $_SESSION['user_id'];

//preverim ali so vnešeni vsi obvezni podatki
if (!empty($event_id)) {
    //vse ok
    $query = "INSERT INTO work_time(time, employee_id, event_id) 
                    VALUES (NOW(), ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$employee_id,$event_id]);
    msg("Uspešnen vnos","success");
    //preusmeri na index
    header("Location: index.php");
    die();
}
else {
    msg("Napaka v podatkih.", "danger");
    //preusmeri nazaj
    header("Location: index.php");
}