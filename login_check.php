<?php
include_once 'db.php';
include_once 'session.php';

$email = $_POST['email'];
$pass = $_POST['pass'];

if (!empty($email) && !empty($pass)) {
    $query = "SELECT * FROM employees WHERE email = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$email]);
    $employee = $stmt->fetch();

    if ($user && password_verify($pass, $employee['pass'])) {

        msg("Uspešna prijava","success");
        $_SESSION['user_id'] = $employee['id'];
        $_SESSION['admin'] = $employee['admin'];
        header("Location: index.php");
    }
    else {
        msg("Napaka v podatkih.","danger");
        header("Location: login.php");
    }
}
?>