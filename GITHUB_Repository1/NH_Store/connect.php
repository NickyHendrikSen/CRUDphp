<?php
    
    $connection = new mysqli("localhost", "root", "", "storedb");
    if(!$connection){
        echo "Connection Error";
        exit();
    }

?>