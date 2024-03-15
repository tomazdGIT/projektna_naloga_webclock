<?php
include_once 'session.php';
include_once 'db.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$email = $_POST['email'];
$pass = $_POST['pass'];
$address = $_POST['address'];
$city_id = $_POST['city_id'];
$telephone = $_POST['telephone'];
$status_id = $_POST['status_id'];
$admin = $_POST['admin'];

//preverim če je bil admin checkbox obkljukan
if ($admin != 1) {
    $admin = 0;
}

//preverim če že obstaja zaposleni z tem emailom
if (!checkEmployee($pdo,$email)) {
    //preverim ali so vnešeni vsi obvezni podatki
    if (!empty($first_name) && !empty($last_name) && !empty($email) && !empty($pass) && !empty($address) && !empty($city_id) && !empty($status_id) ) {
        //ok-vpis v bazo
        $pass = password_hash($pass, PASSWORD_DEFAULT);
        $query = "INSERT INTO employees (first_name, last_name, email, pass, address, city_id, telephone,status_id,admin) 
                    VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$first_name, $last_name, $email, $pass, $address, $city_id, $telephone, $status_id, $admin]);
        //obvestilo in preusmeritev
        msg("Uspešen vnos", "success");
        header("Location: employee.php");
    }
    else {
    //napaka-obvestilo in preusmeritev
    msg("Napaka v podatkih.", "danger");
    header("Location: employee_add.php");
    }
}
else{
    //napaka-obvestilo in preusmeritev
    msg("Zaposleni že obstaja.", "danger");
    header("Location: employee_add.php");
}