<?php
include_once 'session.php';
include_once 'db.php';

$id = $_GET['id'];
$employe_id = $_GET['employee_id'];

//preverim ali so vnešeni vsi obvezni podatki
if (!empty($id)) {
    $query = "SELECT * FROM pictures WHERE id = ?";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id]);
    $picture = $stmt->fetch();
    //ok-izbris iz baze
    $query = "DELETE FROM pictures WHERE id = ? AND 
                           (employee_id IN (SELECT id 
                                        FROM employees 
                                        WHERE employee_id=?))";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$id,$employe_id]);
    //vrne nam št. izbrisanih vrstic
    $deleted = $stmt->rowCount();
    //preverim št. izbrisanih vrstic
    if ($deleted>0) {
        //brisanje slike
        unlink($picture['url']);
    }
}
header("Location: employee_edit.php?id=$employe_id");
?>