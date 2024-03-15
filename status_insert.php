<?php
include_once 'db.php';
include_once 'session.php';

$title = $_POST['title'];

//preverim če že obstaja isti status
if (!checkStatus($pdo,$title)) {
    //preverim ali so vnešeni vsi obvezni podatki
    if (!empty($title)) {
        //ok-vpis v bazo
        $query = "INSERT INTO status (title) 
                    VALUES (?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$title]);
        //obvestilo in preusmeritev
        msg("Uspešen vnos", "success");
        header("Location: status.php");
    }
    else {
        //napaka-obvestilo in preusmeritev
        msg("Napaka", "danger");
        header("Location: status_add.php");
    }
}
else{
    //napaka-obvestilo in preusmeritev
    msg("Status že obstaja.", "danger");
    header("Location: status_add.php");
}
?>