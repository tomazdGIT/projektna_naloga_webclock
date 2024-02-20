<?php
include_once 'session.php';
include_once 'db.php';

$event_id = $_POST['event_id'];
$employee_id = $_SESSION['user_id'];

if (!empty($event_id)) {

    $query = "INSERT INTO work_time(time, employee_id, event_id) 
                    VALUES (NOW(), ?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$employee_id,$event_id]);

    msg("Uspešnen vnos","success");
    header("Location: index.php");
    die();
}
else {
    msg("Napaka", "danger");
    header("Location: index.php");
}
?>