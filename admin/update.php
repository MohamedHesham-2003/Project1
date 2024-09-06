<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update | التعديل</title>
    <link rel="stylesheet" href="mystyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
</head>
<body>
    <?php
        include('config.php');

        $ID = $_GET['id'];
        $Update=mysqli_query($con, "SELECT * FROM products WHERE id='$ID'");
        $data=mysqli_fetch_array($Update);
    ?>
    <center>
        <div class="main">
            <form action="up.php" method="post" enctype="multipart/form-data">
                <h2>تعديل المنتجات</h2>
                <img id="logo" src="logo.png" alt="Logo">
                <input type="text" name="id" 
                placeholder="Enter the id of the product"
                value='<?php echo $data['id'] ?>'>
                <br>
                <br>
                <input type="text" name="name" 
                placeholder="Enter the name of the product"
                value='<?php echo $data['name'] ?>'>
                <br>
                <br>
                <input type="text" name="price" 
                placeholder="Enter the price of the product"
                value='<?php echo $data['price'] ?>'>
                <br>
                <br>
                <input type="file" name="image" id="file" style="display:none;">
                <label for="file">تحديث صورة المنتج</label>
                <input type="submit" name="update" value="تعديل المنتج ✔">
                <br><br>
                <a href="products.php">عرض كل المنتجات</a>
            </form>
        </div>
        <p>Developed BY: Mohamed Hesham</p>
    </center>

</body>
</html>