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

if (!isset($_SESSION['user_id']) &&
    ($_SERVER['REQUEST_URI'] != '/webclock/login.php') &&
    ($_SERVER['REQUEST_URI'] != '/webclock/login_check.php')) {
    header("Location: login.php");
    die();
}
?>