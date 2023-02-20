<?php
if(isset($_GET['Id'])){
    $Id = $_GET["Id"];

    $servername = "localhost";
    $username = "Thanhnx";
    $password = "Thanh@0123";
    $database= "ClassVsStudent";
    // Create connection
    $conn = new mysqli($servername, $username, $password, $database);
    $sql = "DELETE FROM `Students` WHERE `Students`.`Id` = $Id";
    $conn->query($sql);
}
header('location: http://localhost/CRUD/index.php');
exit;
?>