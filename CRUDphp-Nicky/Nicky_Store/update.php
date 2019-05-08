<?php
    session_start();

    if(!isset($_GET["id"])){
        header("location:view.php");
    }

    include 'connect.php';

    $id = $_GET["id"];
    $DATA = $connection->query("SELECT * FROM Product WHERE ProductID = $id");
    
    if($DATA->num_rows == 0){
        header("location:view.php");
        exit();
    }
    $DATA = $DATA->fetch_assoc();

?>
<html>
    <head><title>Update Product</title></head>
    <body>
        
        <?php
            include 'index.php';
        ?>
        <h1>Update</h1><hr>
        <br>

        <form action="updateProduct.php" method = "POST" enctype = "multipart/form-data">
        <input type="hidden" name="id" value="<?=$_GET["id"]?>">
        <table>
            <tr>
                <td>Product Name</td>
                <td>:</td>
                <td><input type="text" name="productName" id="txtProductName" value="<?=$DATA["ProductName"]?>"></td>
            </tr>
            <tr>
                <td>Product Description</td>
                <td>:</td>
                <td><textarea name="productDescription" id="txtProductDescription" ><?=$DATA["ProductDescription"]?></textarea></td>
            </tr>
            <tr>
                <td>Product Price</td>
                <td>:</td>
                <td><input type="number" name="productPrice" id="txtProductPrice" value="<?=$DATA["ProductPrice"]?>"></td>
            </tr>
            <tr>
                <td>Product Image</td>
                <td>:</td>
                <td><input type="file" name="productImage" id="txtProductImage"></td>
            </tr>
        </table>
        <button>Update</button>
        </form>
        <?php
        
            if(isset($_SESSION["message"])){
                echo $_SESSION["message"];
                unset($_SESSION["message"]);
            }
        ?>
    </body>

</html>