<?php
session_start();
session_destroy();
//preusmeritev nazaj na login
header("Location: login.php");
?>