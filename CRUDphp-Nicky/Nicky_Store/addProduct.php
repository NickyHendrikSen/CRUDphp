<?php

    session_start();

    if(isset($_POST["productName"])){
        include 'connect.php';
        
        $productName = $_POST["productName"];
        $productPrice = $_POST["productPrice"];
        $productDescription = $_POST["productDescription"];
        $productImage = $_FILES["productImage"];
        
        $message = "";
        if($productName == ""){
            $message = "Product Name must be filled!";
        }
        else if($productDescription == ""){
            $message = "Product Description must be filled!";
        }
        else if($productPrice == ""){
            $message = "Product Price must be filled!";
        }
        else if(!isset($productImage["tmp_name"]) || $productImage["tmp_name"] == ""){
            $message = "Product Image must be chosen!";
        }
        else{
            $imagePath = "images/".basename($productImage["name"]);
            move_uploaded_file($productImage["tmp_name"], $imagePath);

            $connection->query("INSERT INTO `product`(`ProductName`, `ProductDescription`, `ProductPrice`, `ProductImage`) VALUES('$productName','$productDescription','$productPrice','$imagePath')");

            $message = "Successfully add the new Product!";
        }
        
        
        $_SESSION["message"] = $message;
        // echo $_SESSION["message"];
    }

    header("location:insert.php");
    exit();

?>