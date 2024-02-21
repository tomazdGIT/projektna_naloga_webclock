<?php
include_once 'session.php';
include_once 'db.php';

$time = $_POST['time'];
$event_id = $_POST['event_id'];
$employee_id = $_POST['employee_id'];
//preverim ali so vnešeni vsi obvezni podatki
if (!empty($event_id)) {
    //ok-vpis v bazo
    $query = "INSERT INTO work_time(time, employee_id, event_id) 
                    VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$time,$employee_id,$event_id]);
    //obvestilo in preusmeritev
    msg("Uspešnen vnos","success");
    header("Location: index.php");
}
else {
    //napaka-obvestilo in preusmeritev
    msg("Napaka v podatkih.", "danger");
    header("Location: index.php");
}
?>