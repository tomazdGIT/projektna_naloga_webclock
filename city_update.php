<?php
include_once 'db.php';
include_once 'session.php';

$city_name = $_POST['city_name'];
$post_number = $_POST['post_number'];
$id = $_POST['id'];
//preverim ali so vnešeni vsi obvezni podatki
if (!empty($city_name) && !empty($post_number)) {
    //ok-vpis v bazo
    $query = "UPDATE cities SET city_name=?, post_number=? WHERE id=?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$city_name,$post_number,$id]);
    //obvestilo in preusmeritev
    msg("Uspešna posodobitev podatkov","success");
    header("Location: cities.php");
}
else {
    //napaka-obvestilo in preusmeritev
    msg("Napaka", "danger");
    header("Location: city_edit.php?id=$id");
}
?>