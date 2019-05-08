<!DOCTYPE html>
<html>
<head>

</head>
<body>
    <?php
        include 'header.html'
    ?>
    <h1>View Product</h1><hr>
    
    <?php
        $message = "";
        include 'connect.php';
        $productList = $connection->query("SELECT * FROM product");
        if($productList->num_rows == 0) $message = "No Data";
        while($fetchProduct = $productList->fetch_assoc()){
    ?>
         <table style="display:inline-table" width= "300px">
            <tr>
                <td><img src="<?=$fetchProduct["ProductImage"]?>" alt="Image not found" style="width:100%; height:45vh"></td>
            </tr>
            <tr>
                <td><strong><?=$fetchProduct["ProductName"]?></strong></td>
            </tr>
            <tr>
                <td>IDR <?=number_format($fetchProduct["ProductPrice"])?></td>
            </tr>
            <tr>
                <td><?=$fetchProduct["ProductDescription"]?></td>
            </tr>
            <tr>
                <td>
                <a href="update.php?id=<?=$fetchProduct["ProductID"]?>">Update</a>
                <a href="delete.php?id=<?=$fetchProduct["ProductID"]?>">Delete</a>
                </td>
            </tr>
        </table>

    <?php
        }
        echo $message;
    ?>
    <br>
</body>
</html>