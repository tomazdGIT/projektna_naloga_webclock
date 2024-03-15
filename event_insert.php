<<?php
include_once 'db.php';
include_once 'session.php';

$title = $_POST['title'];

//preverim če že obstaja isti dogodek
if (!checkEvent($pdo,$title)) {
    //preverim ali so vnešeni vsi obvezni podatki
    if (!empty($title)) {
        //ok-vpis v bazo
        $query = "INSERT INTO events(title) 
                    VALUES (?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$title]);
        //obvestilo in preusmeritev
        msg("Uspešen vnos", "success");
        header("Location: events.php");
    } else {
        //napaka-obvestilo in preusmeritev
        msg("Napaka", "danger");
        header("Location: event_add.php");
    }
}
else{
    //napaka-obvestilo in preusmeritev
    msg("Dogodek že obstaja.", "danger");
    header("Location: event_add.php");
}
?>
