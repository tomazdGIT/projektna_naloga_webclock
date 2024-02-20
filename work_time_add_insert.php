<?php
include_once 'session.php';
include_once 'db.php';

$time = $_POST['time'];
$event_id = $_POST['event_id'];
$employee_id = $_POST['employee_id'];

if (!empty($event_id)) {

    $query = "INSERT INTO work_time(time, employee_id, event_id) 
                    VALUES (?, ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$time,$employee_id,$event_id]);

    msg("Uspešnen vnos","success");
    header("Location: index.php");
}
else {
    msg("Napaka v podatkih.", "danger");
    header("Location: index.php");
}
?>