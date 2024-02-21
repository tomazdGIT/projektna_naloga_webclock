<?php
include_once 'session.php';
include_once 'db.php';

$event_id = $_POST['event_id'];
$employee_id = $_SESSION['user_id'];
//preverim ali so vnešeni vsi obvezni podatki
if (!empty($event_id)) {
    //ok-vpis v bazo
    $query = "INSERT INTO work_time(time, employee_id, event_id) 
                    VALUES (NOW(), ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$employee_id,$event_id]);
    //obvestilo in preusmeritev
    msg("Uspešnen vnos","success");
    header("Location: index.php");
    die();
}
else {
    //napaka-obvestilo in preusmeritev
    msg("Napaka", "danger");
    header("Location: index.php");
}
?>