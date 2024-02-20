<?php
include_once 'session.php';
include_once 'db.php';

$id = $_POST['id'];

$target_dir = "slike/";
$target_file = $target_dir . date("YmdHisu"). basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
    }
}

if ($_FILES["fileToUpload"]["size"] > 10000000) {
    $uploadOk = 0;
}

if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
    $uploadOk = 0;
}

if ($uploadOk == 1) {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {

        $query = "INSERT INTO pictures (url,employee_id) VALUES(?,?)";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$target_file,$id]);
    }
}

header("Location: employee_edit.php?id=$id");

?>
