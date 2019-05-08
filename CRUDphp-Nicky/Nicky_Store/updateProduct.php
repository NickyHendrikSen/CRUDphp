<?php

    session_start();

    if(isset($_POST["productName"])){
        include 'connect.php';
        
        $productID = $_POST["id"];
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
        else{
            if(isset($productImage["tmp_name"]) || $productImage["tmp_name"] != ""){
                $imagePath = "images/".basename($productImage["name"]);
                move_uploaded_file($productImage["tmp_name"], $imagePath);

                $connection->query("UPDATE product SET productImage=$imagePath WHERE ProductID = $productID");

            }

            $connection->query("UPDATE product SET ProductName = '$productName', ProductPrice = '$productPrice', ProductDescription = '$productDescription' WHERE ProductID = $productID");

            $message = "Successfully edited Product!";
        }
        
        
        $_SESSION["message"] = $message;
        // echo $_SESSION["message"];
    }

    header("location:update.php?id=$productID");
    exit();

?>