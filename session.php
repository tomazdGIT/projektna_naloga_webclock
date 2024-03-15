<?php
session_start();

//funkcija ki preveri če je prijavljeni admin
function isAdmin() {
    $return = false;
    if (isset($_SESSION['admin']) && $_SESSION['admin']==1) {
        $return = true;
    }

    if (!$return) {
        header("Location: index.php");
        die();
    }
}

//funkcija za izpis obvestil
function msg($msg, $type) {
    $_SESSION['msg'] = $msg;
    $_SESSION['type'] = $type;
}
//funkcija za preverjanje že obstoječega uporabnika
function checkEmployee($pdo,$email){
    $query = "SELECT * FROM employees WHERE email = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$email]);
    $numrow = $stmt->rowCount();

    if ($numrow >= 1) {
        return true;
    }
    return false;
}

//funkcija za preverjanje že obstoječih imen in poštnih številk krajev
function checkCity($pdo,$city_name,$post_number){
    $query = "SELECT * FROM cities WHERE city_name = ? OR post_number = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$city_name,$post_number]);
    $numrow = $stmt->rowCount();

    if ($numrow >= 1) {
        return true;
    }
    return false;
}

//funkcija za preverjanje že obstoječih statusov
function checkStatus($pdo,$title){
    $query = "SELECT * FROM status WHERE title = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$title]);
    $numrow = $stmt->rowCount();

    if ($numrow >= 1) {
        return true;
    }
    return false;
}

//funkcija za preverjanje že obstoječih dogodkov
function checkEvent($pdo,$title){
    $query = "SELECT * FROM events WHERE title = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$title]);
    $numrow = $stmt->rowCount();

    if ($numrow >= 1) {
        return true;
    }
    return false;
}

if (!isset($_SESSION['user_id']) &&
    ($_SERVER['REQUEST_URI'] != '/webclock/login.php') &&
    ($_SERVER['REQUEST_URI'] != '/webclock/login_check.php')) {
    header("Location: login.php");
    die();
}
?>