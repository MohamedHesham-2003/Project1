<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ElAgamy shop | متجر العجمي</title>
    <link rel="stylesheet" href="mystyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
</head>
<body>
    <center>
        <div class="main">
            <form action="insert.php" method="post" enctype="multipart/form-data">
                <h2>💙مرحبًا بك في متجر العجمي</h2>
                <img id="logo" src="logo.png" alt="Logo">
                <input type="text" name="name" placeholder="Enter the name of the product" required>
                <br>
                <br>
                <input type="text" name="price" placeholder="Enter the price of the product" required>
                <br>
                <br>
                <input type="file" name="image" id="file" style="display:none;" required>
                <label for="file">اختيار صورة للمنتج</label>
                <input type="submit" name="upload" value="رفع المنتج ✔">
                <br><br>
                <a href="products.php">عرض كل المنتجات</a>
            </form>
        </div>
        <p>Developed BY: Mohamed Hesham</p>
    </center>

</body>
</html>