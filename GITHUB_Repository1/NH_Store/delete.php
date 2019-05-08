<?php
    
    $connection = new mysqli("localhost", "root", "", "storedb");
    if(!$connection){
        echo "Connection Error";
        exit();
    }

    $id = $_GET["id"];

    $connection->query("DELETE FROM product WHERE ProductID = $id");


    header("location:view.php");
    exit();
?>