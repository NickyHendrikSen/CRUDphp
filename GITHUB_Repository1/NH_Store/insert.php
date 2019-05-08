<?php
    session_start();
?>
<html>
    <head>
    </head>
    <body>
        <?php
            include 'header.html';
        ?>
        <h1>Add Product</h1><hr>
        <br>

        <form action="addProduct.php" method = "POST" enctype = "multipart/form-data">
        <table>
            <tr>
                <td>Product Name</td>
                <td>:</td>
                <td><input type="text" name="productName" id="txtProductName"></td>
            </tr>
            <tr>
                <td>Product Description</td>
                <td>:</td>
                <td><textarea name="productDescription" id="txtProductDescription"></textarea></td>
            </tr>
            <tr>
                <td>Product Price</td>
                <td>:</td>
                <td><input type="number" name="productPrice" id="txtProductPrice"></td>
            </tr>
            <tr>
                <td>Product Image</td>
                <td>:</td>
                <td><input type="file" name="productImage" id="txtProductImage"></td>
            </tr>
        </table>
        <button>Insert</button>
        </form>
        <?php
        
            if(isset($_SESSION["message"])){
                echo $_SESSION["message"];
                unset($_SESSION["message"]);
            }
        ?>
    </body>

</html>