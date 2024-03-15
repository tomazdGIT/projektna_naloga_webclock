<?php
include_once 'db.php';
include_once 'session.php';

$city_name = $_POST['city_name'];
$post_number = $_POST['post_number'];

//preverim če že obstaja kraj z istim imenom ali isto poštno številko
if (!checkCity($pdo,$city_name,$post_number)) {
    //preverim ali so vnešeni vsi obvezni podatki
    if (!empty($city_name) && !empty($post_number)) {
        //ok-vpis v bazo
        $query = "INSERT INTO cities(city_name,post_number) 
                    VALUES (?, ?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$city_name, $post_number]);
        //obvestilo in preusmeritev
        msg("Uspešen vnos", "success");
        header("Location: cities.php");
    } else {
        //napaka-obvestilo in preusmeritev
        msg("Napaka", "danger");
        header("Location: city_add.php");
    }
}
else{
    //napaka-obvestilo in preusmeritev
    msg("Kraj že obstaja.", "danger");
    header("Location: city_add.php");
}
?>