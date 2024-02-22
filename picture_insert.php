<?php
include_once 'session.php';
include_once 'db.php';

$id = $_POST['id'];

$target_dir = "slike/";
$target_file = $target_dir . date("YmdHisu"). basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
//preverim če je datoteka res slika
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}
//preverim velikost datoteke
if ($_FILES["fileToUpload"]["size"] > 10000000) {
    $uploadOk = 0;
}
//dovoljeni formati slike
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    $uploadOk = 0;
}
//preverim če je vse ok
if ($uploadOk == 1) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        //zapis v bazo
        $query = "INSERT INTO pictures (url,employee_id) VALUES(?,?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$target_file,$id]);
        //obvestilo in preusmeritev
        msg("Uspešno nalaganje slike","success");
        header("Location: employee_edit.php?id=$id");
    }
}
else {
    //napaka-obvestilo in preusmeritev
    msg("Napaka","danger");
    header("Location: employee_edit.php?id=$id");
}
?>
