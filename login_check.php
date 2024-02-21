<?php
include_once 'db.php';
include_once 'session.php';

$email = $_POST['email'];
$pass = $_POST['pass'];
//preverim ali so vnešeni vsi obvezni podatki
if (!empty($email) && !empty($pass)) {
    $query = "SELECT * FROM employees WHERE email = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$email]);
    $employee = $stmt->fetch();
    //preverim ali sta vnešena podatka prava
    if ($user && password_verify($pass, $employee['pass'])) {
        //obvestilo in preusmeritev
        msg("Uspešna prijava","success");
        $_SESSION['user_id'] = $employee['id'];
        $_SESSION['admin'] = $employee['admin'];
        header("Location: index.php");
    }
    else {
        //napaka-obvestilo in preusmeritev
        msg("Napaka v podatkih.","danger");
        header("Location: login.php");
    }
}
?>