<?php
include_once 'db.php';
include_once 'session.php';

$time = $_POST['time'];
$event_id = $_POST['event_id'];
$id = $_POST['id'];
//preverim ali so vnešeni vsi obvezni podatki
if (!empty($time) && !empty($event_id)) {
    //ok-vpis v bazo
    $query = "UPDATE work_time SET time=?, event_id=? WHERE id=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$time,$event_id,$id]);
    //obvestilo in preusmeritev
    msg("Uspešna posodobitev podatkov","success");
    header("Location: work_time_admin.php");
}
else {
    //napaka-obvestilo in preusmeritev
    msg("Napaka", "danger");
    header("Location: work_time_edit.php?id=$id");
}
?>