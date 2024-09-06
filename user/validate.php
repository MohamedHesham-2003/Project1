<?php
    include('config.php');

    $ID=$_GET["id"];
    $result=mysqli_query($con, "SELECT * FROM products WHERE id='$ID'");
    $data=mysqli_fetch_array($result);

    
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>نأكيد شراء المنتج</title>
    <link rel="stylesheet" href="mystyle.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200..1000&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <style>
       body { 
            font-family: 'Cairo', sans-serif;
        }
        .main{
            width: 50%;
            padding: 20px;
            margin: 30px 0px 10px 0px;
            border-radius: 5px;
            
        }
        input{
            display: none;
        }
        a{
            text-decoration: none;
            color: #007bff;
            font-size: 16px;
        }
        a:hover{
            color: red;
        }

    </style>
</head>
<body>
    <center>
        <div class="main">
            <form action="insert_card.php" method="post">
                <h2>هل فعلا تريد شراء المنتج؟</h2>
                <input type="text" name="id" value='<?php echo $data['id'] ?>'>
                <input type="text" name="username" value='<?php echo $_SESSION['user_name'] ?>'>
                <input type="text" name="name" value='<?php echo $data['name'] ?>'>
                <input type="text" name="price" value='<?php echo $data['price'] ?>'>
                <button type="submit" name="add" class='btn btn-warning'>تأكيد إضافة المنتج للعربة</button>
                <!-- <input type="submit" name="add" value="تأكيد إضافة المنتج للعربة" class='btn btn-warning'> -->
                <br>
            </form>
        </div>
        <a href="shop.php">الرجوع لصفحة المنتجات</a>
    </center>
</body>
</html>